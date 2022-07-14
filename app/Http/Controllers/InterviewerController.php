<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PageSetting;
use App\Models\Category;
use App\Models\Blog;
use App\Models\BookInterview;
use App\Models\InterviewType;
use DateTime;
use Auth;

class InterviewerController extends Controller
{
    /* function __construct()
    {
        $this->middleware('permission:schedule interview-list|resources-list|buy & credits-list|refer & earn-list', ['only' => ['scheduleInterview','resources','buyCredits','referAndEarn']]);
    } */

    public function scheduleInterview()
    {
        $this->authorize('schedule interview-list', User::class);
        $page_title = 'Schedule Interview - '.Auth::user()->roles->pluck('name')[0];
        $parent_interview_types = InterviewType::where('status', 1)->where('parent_id', null)->get(['id', 'name']);
        return view('web-views.interviewer.schedule-interview', compact('page_title', 'parent_interview_types'));
    }
    public function resources(Request $request)
    {
        $this->authorize('resources-list', User::class);
        if($request->ajax()){
            $query = Blog::orderby('id', 'desc')->where('id', '>', 0);
            if($request['search'] != ""){
                $query->where('title', 'like', '%'. $request['search'] .'%')
                    ->orWhere('category_slug', 'like', '%'. $request['search'] .'%');
            }
            if($request['status']!="All"){
                $query->where('category_slug', $request['status']);
            }
            $blogs = $query->paginate(10);
            return (string) view('web-views.interviewer.resources-search', compact('blogs'));
        }

        $page_title = 'Resources - '.Auth::user()->roles->pluck('name')[0];
        $categories = Category::orderby('id', 'desc')->where('status', 1)->get();
        $blogs = Blog::orderby('id', 'desc')->where('status', 1)->paginate(10);
        return view('web-views.interviewer.resources', compact('page_title', 'categories', 'blogs'));
    }
    public function singleBlog($slug)
    {
        $this->authorize('resources-list', User::class);
        $page_title = 'Resource - Single';
        $blog = Blog::where('slug', $slug)->first();
        return view('web-views.interviewer.resource-single', compact('page_title', 'blog'));
    }
    public function report()
    {
        $this->authorize('report-list', User::class);
        $page_title = 'Report - '.Auth::user()->roles->pluck('name')[0];

        $schedule_interviews = BookInterview::where('interviewer_id', Auth::user()->id)->get();
        $total_earnings = BookInterview::where('interviewer_id', Auth::user()->id)->where('status', 4)->sum('credits');
        $total_schedule_interviews = count($schedule_interviews);
        $total_successfull_interviews = 0;
        $total_failed_interviews = 0;
        foreach($schedule_interviews as $interview){
            if($interview->status==1){
                $total_successfull_interviews += 1;
            }elseif($interview->status==0){
                $total_failed_interviews += 1;
            }
        }
        $interviews = BookInterview::where('interviewer_id', Auth::user()->id)->paginate(10);
        return view('web-views.interviewer.reports.report', compact('page_title', 'interviews', 'total_schedule_interviews', 'total_successfull_interviews', 'total_failed_interviews', 'total_earnings'));
    }
    public function reportSearch(Request $request)
    {
        $query = BookInterview::orderby('id', 'desc')->where('interviewer_id', Auth::user()->id)->where('id', '>', 0);
        if($request['date_from'] != "" && $request['date_end'] != ""){
            $query->whereBetween('date', [date('Y-m-d', strtotime($request['date_from'])), date('Y-m-d', strtotime($request['date_end']))]);
        }
        $interviews = $query->paginate(10);
        return (string) view('web-views.interviewer.reports.search', compact('interviews'));
    }
}