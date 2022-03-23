<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CandidateController extends Controller
{
    public function scheduleInterview()
    {
        $page_title = 'Interview Scheduler';
        return view('web-views.candidate.schedule_interview', compact('page_title'));
    }

    public function report()
    {
        $page_title = 'Report';
        return view('web-views.candidate.report', compact('page_title'));
    }
    public function testSetup()
    {
        $page_title = 'Test Setup';
        return view('web-views.candidate.test-setup', compact('page_title'));
    }
    public function notifications()
    {
        $page_title = 'Notifications';
        return view('web-views.candidate.notifications', compact('page_title'));
    }
}
