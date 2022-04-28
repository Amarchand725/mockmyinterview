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
    public function resources()
    {
        $this->authorize('resources-list', User::class);
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
    public function buyCredits()
    {
        $this->authorize('buy & credits-list', User::class);
        $page_title = 'Buy & Credits - '.Auth::user()->roles->pluck('name')[0];
        return view('web-views.interviewer.buy_credits', compact('page_title'));
    }
    public function referAndEarn()
    {
        $this->authorize('refer & earn-list', User::class);
        $page_title = 'Refer & Earn - '.Auth::user()->roles->pluck('name')[0];
        return view('web-views.interviewer.refer_earn', compact('page_title'));
    }
    public function getSlots(Request $request)
    {
        $slot_type = $request->slot_type;
        $slots = [];
        if($slot_type=='weekdays'){
            //weekdays morning 
            $weekdays_morning_from_time = PageSetting::where('key', 'weekdays_morning_from_time')->first()->value;
            $weekdays_morning_to_time = PageSetting::where('key', 'weekdays_morning_to_time')->first()->value;

            //weekdays evening
            $weekdays_evening_from_time = PageSetting::where('key', 'weekdays_evening_from_time')->first()->value;
            $weekdays_evening_to_time = PageSetting::where('key', 'weekdays_evening_to_time')->first()->value;

            // Weekdays Morning & Evening Slots
            $week_days_morning_slots = $this->getTimeSlot(30, $weekdays_morning_from_time, $weekdays_morning_to_time);
            $week_days_evening_slots = $this->getTimeSlot(30, $weekdays_evening_from_time, $weekdays_evening_to_time);

            //Weekdays merged morning & evening slots
            $slots['morning_slots'] = $week_days_morning_slots;
            $slots['evening_slots'] = $week_days_evening_slots;

            return (string) view('web-views.interviewer.slots', compact('slot_type', 'slots'));
        }else{
            //weekends morning
            $weekends_morning_from_time = PageSetting::where('key', 'weekends_morning_from_time')->first()->value;
            $weekends_morning_to_time = PageSetting::where('key', 'weekends_morning_to_time')->first()->value;

            //weekends evening
            $weekends_evening_from_time = PageSetting::where('key', 'weekends_evening_from_time')->first()->value;
            $weekends_evening_to_time = PageSetting::where('key', 'weekends_evening_to_time')->first()->value;

            //Weekends Morning & Evening Slots
            $weekends_morning_slots = $this->getTimeSlot(30, $weekends_morning_from_time, $weekends_morning_to_time);
            $weekends_evening_slots = $this->getTimeSlot(30, $weekends_evening_from_time, $weekends_evening_to_time);

            //Weekends merged morning & evening slots
            $slots['morning_slots'] = $weekends_morning_slots;
            $slots['evening_slots'] = $weekends_evening_slots;
            return (string) view('web-views.interviewer.slots', compact('slot_type', 'slots'));
        }
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
}
