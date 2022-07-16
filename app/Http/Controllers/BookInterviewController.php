<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Traits\MeetingZoomTrait;
use Illuminate\Http\Request;
use App\Models\PageSetting;
use App\Models\BookInterview;
use App\Models\BookingPriority;
use App\Models\AvailableSlotDate;
use App\Models\Qualification;
use App\Models\Wallet;
use App\Models\InterviewerWallet;
use App\Models\Log;
use App\Models\InterviewType;
use DateTime;
use Auth;
use Http;

class BookInterviewController extends Controller
{
    use MeetingZoomTrait;

    public function index(Request $request)
    {
        if($request->ajax()){
            if(Auth::user()->hasRole('Interviewer')){
                $query = BookInterview::orderby('id', 'desc')->where('interviewer_id', Auth::user()->id)->where('id', '>', 0);
            }elseif(Auth::user()->hasRole('Candidate')){
                $query = BookInterview::orderby('id', 'desc')->where('candidate_id', Auth::user()->id)->where('id', '>', 0);
            }else{
                $query = BookInterview::orderby('id', 'desc')->where('id', '>', 0);
            }
            if($request['search'] != ""){
                $query->where('meeting_id', 'like', '%'. $request['search'] .'%')
                ->orWhere('booking_type_slug', 'like', '%'. $request['search'] .'%')
                ->orWhere('interview_type', 'like', '%'. $request['search'] .'%')
                ->orWhere('date', 'like', '%'. $request['search'] .'%')
                ->orWhere('slot', 'like', '%'. $request['search'] .'%');
            }
            if($request['status']!="All"){
                if($request['status']==2){
                    $request['status'] = 0;
                }
                $query->where('status', $request['status']);
            }
            $booked_interviews = $query->paginate(10);
            return (string) view('web-views.interviews.search', compact('booked_interviews'));
        }
        if(Auth::user()->hasRole('Interviewer')){
            $booked_interviews = BookInterview::orderby('id', 'desc')->where('interviewer_id', Auth::user()->id)->paginate(10);
        }elseif(Auth::user()->hasRole('Candidate')){
            $booked_interviews = BookInterview::orderby('id', 'desc')->where('candidate_id', Auth::user()->id)->paginate(10);
        }else{
            $booked_interviews = BookInterview::orderby('id', 'desc')->paginate(10);
        }
        $page_title = 'All Booked Interviews';
        return view('web-views.interviews.index', compact('booked_interviews', 'page_title'));
    }

    public function create()
    {
        $this->authorize('book interview-list', User::class);
        $page_title = 'Book Interview - '.Auth::user()->roles->pluck('name')[0];
        $booking_types = BookingPriority::where('status', 1)->get();

        $parent_interview_types = InterviewType::where('parent_id', null)->where('status', 1)->get();

        $degrees = [];
        foreach(Auth::user()->hasUserQualification as $qualification){
            $degrees[] = $qualification->degree_slug;
        }

        $interviewers = Qualification::whereIn('degree_slug', $degrees)->get(['user_id']);

        $slots = [];

        return view('web-views.interviews.create', compact('page_title', 'parent_interview_types', 'booking_types'));
    }

    public function store(Request $request)
    {
        $validator = $request->validate([
            'booked_slot' => 'required',
        ]);

        $wallet = Wallet::orderby('id', 'desc')->where('candidate_id', Auth::user()->id)->first();
        $priority = BookingPriority::where('slug', 'standard-booking')->first();
        if(isset($wallet) && $wallet->balance_credits < $priority->credits){
            return 'credits';
        }
        try {
            $meeting = $this->createMeeting($request);

            $booked_interview = BookInterview::create([
                'meeting_id' => $meeting->id,
                'interviewer_id' => $request->interviewer_id,
                'candidate_id' => Auth::user()->id,
                'parent_interview_type_id' => $request->parent_interview_type_id,
                'child_interview_type_id' => $request->child_interview_type_id,
                'booking_type_slug' => $priority->slug,
                'credits' => $priority->credits,
                'date' => date('Y-m-d'),
                'slot' => $request->booked_slot,
                'start_at' => date('Y-m-d', strtotime($request->date)).' '.$request->booked_slot,
                'duration' => $meeting->duration,
                'password' => $meeting->password,
                'start_url' => $meeting->start_url,
                'join_url' => $meeting->join_url,
            ]);

            if($booked_interview){
                Log::create([
                    'booked_interview_id' => $booked_interview->id,
                    'interviewer_id' => $request->interviewer_id,
                    'candidate_id' => Auth::user()->id,
                    'credits' => $priority->credits,
                    'type' => 'charged',
                    'description' => 'Charged credits from candidate wallet.',
                ]);
            }

            return 'success';
        }catch(\Exception $e){
            return $e->getMessage();
        }
    }

    public function show($meeting_id)
    {
        $response = Http::get('https://api.zoom.us/v2/meetings/'.$meeting_id.'/recordings');
        $data = json_decode($response->body(), true);
        dd($data);
    }

    public function nextPreDate(Request $request)
    {
        // $this->authorize('report-list', User::class);
        $current_date = $request->current_date;
        $type = $request->type;

        $degrees = [];
        foreach(Auth::user()->hasUserQualification as $qualification){
            $degrees[] = $qualification->degree_slug;
        }

        $interviewers = Qualification::whereIn('degree_slug', $degrees)->get(['user_id']);

        $slots = [];

        $b_slots = AvailableSlotDate::whereIn('interviewer_id', $interviewers)->where('start_date', date('Y-m-d', strtotime($current_date)))->where('end_date', '<=', date('Y-m-d'))->get();
        if(!empty($b_slots)){
            foreach ($b_slots as $available_slot){
                if(!empty($available_slot->hasBookedSlots)){
                    foreach($available_slot->hasBookedSlots as $slot){
                        if($available_slot->slot_type=='weekdays'){
                            $slots['weekdays_slots'][] = array('interviewer_id' => $available_slot->interviewer_id,'slot' => $slot->slot);
                        }elseif($available_slot->slot_type=='weekands'){
                            $slots['weekends_slots'][] = array('interviewer_id' => $available_slot->interviewer_id,'slot' => $slot->slot);
                        }
                    }
                }
            }
        }

        $next_slots = [];
        $next_date = date('d-m-Y', strtotime($current_date.'1 days'));
        $b_slots = AvailableSlotDate::whereIn('interviewer_id', $interviewers)->where('start_date', date('Y-m-d', strtotime($next_date)))->where('end_date', '<=', date('Y-m-d'))->get();
        if(!empty($b_slots)){
            foreach ($b_slots as $available_slot){
                if(!empty($available_slot->hasBookedSlots)){
                    foreach($available_slot->hasBookedSlots as $slot){
                        if($available_slot->slot_type=='weekdays'){
                            $next_slots['weekdays_slots'][] = array('interviewer_id' => $available_slot->interviewer_id,'slot' => $slot->slot);
                        }elseif($available_slot->slot_type=='weekands'){
                            $next_slots['weekends_slots'][] = array('interviewer_id' => $available_slot->interviewer_id,'slot' => $slot->slot);
                        }
                    }
                }
            }
        }

        return (string) view('web-views.candidate.next-pre-slots', compact('slots', 'next_slots', 'current_date', 'type'));
    }

    function getTimeSlot($interval, $start_time, $end_time)
    {
        $start = new DateTime($start_time);
        $end = new DateTime($end_time);
        $startTime = $start->format('H:i');
        $endTime = $end->format('H:i');
        $i=0;
        $time = [];
        while(strtotime($startTime) <= strtotime($endTime)){
            $start = $startTime;
            $end = date('H:i',strtotime('+'.$interval.' minutes',strtotime($startTime)));
            $startTime = date('H:i',strtotime('+'.$interval.' minutes',strtotime($startTime)));
            $i++;
            if(strtotime($startTime) <= strtotime($endTime)){
                $time[] = $start;
                // $time[] = $end;
            }
        }
        return $time;
    }

    public function getBookedInterviewIds()
    {
        if(Auth::user()->hasRole('Interviewer')){
            $booked_interviews = BookInterview::orderby('id', 'desc')->where('interviewer_id', Auth::user()->id)->get(['id', 'start_at']);
        }elseif(Auth::user()->hasRole('Candidate')){
            $booked_interviews = BookInterview::orderby('id', 'desc')->where('candidate_id', Auth::user()->id)->get(['id', 'start_at']);
        }else{
            $booked_interviews = BookInterview::orderby('id', 'desc')->get(['id', 'start_at']);
        }
        return response()->json($booked_interviews);
    }

    public function status(Request $request)
    {
        $interview = BookInterview::where('id', $request->interview_id)->first();
        if($request->status==1){ //confirm
            $interview->status = $request->status;
            $interview->save();

            return 1;
        }elseif($request->status==3){ //reject
            $interview->status = $request->status;
            $interview->save();

            return 1;
        }elseif($request->status==4){ //complete
            $interview->status = $request->status;
            $interview->save();

            return 1; //completed
        }
    }

    public function review(Request $request)
    {
        $model = BookInterview::where('id', $request->interview_id)->first();
        $model->review = $request->review;
        $model->save();

        return redirect()->route('book_interview.index')->with('message', 'You have reviewed us thanks.');
    }
}
