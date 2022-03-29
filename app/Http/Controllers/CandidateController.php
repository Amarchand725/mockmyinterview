<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserDetail;
use App\Models\Qualification;
use App\Models\QualificationDetail;
use App\Models\Experience;
use App\Models\ExperienceDetail;
use App\Models\Resume;
use Auth;
use DateTime;
use Hash;

class CandidateController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:schedule interview-list|report-list|test setup-list|notifications-list', ['only' => ['scheduleInterview','report', 'testSetup', 'notifications']]);
    }
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
