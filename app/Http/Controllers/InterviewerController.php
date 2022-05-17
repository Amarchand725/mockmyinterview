<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PageSetting;
use App\Models\Category;
use App\Models\Blog;
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
        return view('web-views.interviewer.schedule-interview', compact('page_title'));
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
    /* public function buyCredits()
    {
        $this->authorize('buy & credits-list', User::class);
        $page_title = 'Buy & Credits - '.Auth::user()->roles->pluck('name')[0];
        return view('web-views.interviewer.buy_credits', compact('page_title'));
    } */
}
