<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InterviewerController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:schedule interview-list|resources-list|buy & credits-list|refer & earn-list', ['only' => ['scheduleInterview','resources','buyCredits','referAndEarn']]);
    }
    public function scheduleInterview()
    {
        $page_title = 'Schedule Interview';
        return view('web-views.interviewer.schedule-interview', compact('page_title'));
    }
    public function resources()
    {
        $page_title = 'Resources';
        return view('web-views.interviewer.resources', compact('page_title'));
    }
    public function buyCredits()
    {
        $page_title = 'Buy & Credits';
        return view('web-views.interviewer.buy_credits', compact('page_title'));
    }
    public function referAndEarn()
    {
        $page_title = 'Refer & Earn';
        return view('web-views.interviewer.refer_earn', compact('page_title'));
    }
}
