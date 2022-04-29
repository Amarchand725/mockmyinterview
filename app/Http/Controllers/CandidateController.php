<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookingType;
use App\Models\PageSetting;
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
}