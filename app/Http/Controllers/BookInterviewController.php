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
use DateTime;
use Auth;

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

        $degrees = [];
        foreach(Auth::user()->hasUserQualification as $qualification){
            $degrees[] = $qualification->degree_slug;
        }

        $interviewers = Qualification::whereIn('degree_slug', $degrees)->get(['user_id']);

        $slots = [];
        
        $b_slots = AvailableSlotDate::whereIn('interviewer_id', $interviewers)->where('start_date', date('Y-m-d'))->get();
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
        $next_date = date('Y-m-d', strtotime("+1 day"));
        $b_slots = AvailableSlotDate::whereIn('interviewer_id', $interviewers)->where('start_date', $next_date)->get();
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

        return view('web-views.interviews.create', compact('page_title', 'booking_types', 'slots', 'next_slots'));
    }

    public function store(Request $request)
    {
        $validator = $request->validate([
            'interview_type' => 'required',
        ]);

        if(empty($request->booked_slots)){
            return redirect()->back()->with('error', 'Select slot at least one.');
        }
        
        try {
            foreach($request->booked_slots as $interviewer_id=>$slots){
                foreach($slots as $slot){
                    $meeting = $this->createMeeting($request);

                    BookInterview::create([
                        'meeting_id' => $meeting->id,
                        'interviewer_id' => $interviewer_id,
                        'candidate_id' => Auth::user()->id,
                        'booking_type_slug' => $request->booking_type,
                        'interview_type' => $request->interview_type,
                        'date' => date('Y-m-d'),
                        'slot' => $slot,
                        'start_at' => date('Y-m-d', strtotime($request->date)).' '.$slot,
                        'duration' => $meeting->duration,
                        'password' => $meeting->password,
                        'start_url' => $meeting->start_url,
                        'join_url' => $meeting->join_url,
                    ]);
                }
            }

            return redirect()->route('book_interview.index')->with('message', 'Success Created');
        }catch(\Exception $e){
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function nextPreDate(Request $request)
    {
        // $this->authorize('report-list', User::class);
        $current_date = $request->current_date;
        $type = $request->type;

        /* //weekdays morning
        $weekdays_morning_from_time = PageSetting::where('key', 'weekdays_morning_from_time')->first()->value;
        $weekdays_morning_to_time = PageSetting::where('key', 'weekdays_morning_to_time')->first()->value;

        //weekdays evening
        $weekdays_evening_from_time = PageSetting::where('key', 'weekdays_evening_from_time')->first()->value;
        $weekdays_evening_to_time = PageSetting::where('key', 'weekdays_evening_to_time')->first()->value;

        //weekends morning
        $weekends_morning_from_time = PageSetting::where('key', 'weekends_morning_from_time')->first()->value;
        $weekends_morning_to_time = PageSetting::where('key', 'weekends_morning_to_time')->first()->value;

        //weekends evening
        $weekends_evening_from_time = PageSetting::where('key', 'weekends_evening_from_time')->first()->value;
        $weekends_evening_to_time = PageSetting::where('key', 'weekends_evening_to_time')->first()->value;

        // Weekdays Morning & Evening Slots
        $week_days_morning_slots = $this->getTimeSlot(30, $weekdays_morning_from_time, $weekdays_morning_to_time);
        $week_days_evening_slots = $this->getTimeSlot(30, $weekdays_evening_from_time, $weekdays_evening_to_time);

        //Weekends Morning & Evening Slots
        $weekends_morning_slots = $this->getTimeSlot(30, $weekends_morning_from_time, $weekends_morning_to_time);
        $weekends_evening_slots = $this->getTimeSlot(30, $weekends_evening_from_time, $weekends_evening_to_time);

        $slots = [];
        //Weekdays merged morning & evening slots
        $slots['weekdays_slots'] = array_merge($week_days_morning_slots, $week_days_evening_slots);

        //Weekends merged morning & evening slots
        $slots['weekends_slots'] = array_merge($weekends_morning_slots, $weekends_evening_slots); */

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
}
