<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Referral;
use App\Models\Invite;
use App\Models\InvitedUser;
use DateTime;
use Auth;

class CandidateController extends Controller
{
    /* function __construct()
    {
        $this->middleware('permission:schedule interview-list|report-list|test setup-list|notifications-list|book interview-list', 
            ['only' =>['scheduleInterview', 'report', 'testSetup', 'notifications','bookInterview']]
        );
    } */

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

    public function report()
    {
        $this->authorize('report-list', User::class);
        $page_title = 'Report - '.Auth::user()->roles->pluck('name')[0];
        return view('web-views.candidate.report', compact('page_title'));
    }
    public function testSetup()
    {
        $this->authorize('test setup-list', User::class);
        $page_title = 'Test Setup - '.Auth::user()->roles->pluck('name')[0];
        return view('web-views.candidate.test-setup', compact('page_title'));
    }
    public function notifications()
    {
        $this->authorize('notifications-list', User::class);
        $page_title = 'Notifications - '.Auth::user()->roles->pluck('name')[0];
        return view('web-views.candidate.notifications', compact('page_title'));
    }

    public function testWebcam()
    {
        $page_title = 'Notifications - '.Auth::user()->roles->pluck('name')[0];
        return view('web-views.candidate.test-webcam', compact('page_title'));
    }
    public function referAndEarn()
    {
        // return Auth::user()->referral_code;
        $this->authorize('refer & earn-list', User::class);
        $page_title = 'Refer & Earn - '.Auth::user()->roles->pluck('name')[0];

        $referral = Referral::orderby('id', 'desc')->where('status', 1)->first();
        $invite = Invite::with('hasInvitedUsers')->where('candidate_id', Auth::user()->id)->where('referral_id', $referral->id)->first();
        return view('web-views.interviewer.refer_earn', compact('page_title', 'referral', 'invite'));
    }
    
    public function inviteStore(Request $request)
    {
        $emails = explode(',', $request->emails);
        
        try{
            $invite = Invite::where('candidate_id', Auth::user()->id)->first();
            if(empty($invite)){
                $invite = Invite::create([
                    'candidate_id' => Auth::user()->id,
                    'referral_id' => $request->referral_id
                ]);
            }

            if($invite){
                foreach($emails as $email){
                    $ifempty = InvitedUser::where('email', $email)->first();

                    if(empty($ifempty)){
                        do{
                            $invited_user = rand(1000, 9999);
                        }while(InvitedUser::where('invited_user', $invited_user)->first());

                        $inserted = InvitedUser::create([
                            'invite_id' => $invite->id,
                            'invited_user' => $invited_user,
                            'email' => $email,
                        ]);

                        //Email
                        if($inserted){
                            $details = [
                                'from' => 'invite',
                                'title' => "You are welcome. You need to register yourself. Just press the button below.",
                                'body' => "If you have any questions, just reply to this email—we're always happy to help out.",
                                'referral_code' => Auth::user()->referral_code,
                                'invited_user' => $invited_user,
                            ];
                    
                            \Mail::to($email)->send(new \App\Mail\Email($details));
                        }
                    }
                }

                return redirect()->back()->with('message', 'You have invited your friends successfully');
            }
        }catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}