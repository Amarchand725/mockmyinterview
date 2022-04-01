<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookingType;
use App\Models\PageSetting;
use DateTime;

class CandidateController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:schedule interview-list|report-list|test setup-list|notifications-list', ['only' => ['scheduleInterview','report', 'testSetup', 'notifications']]);
    }
    public function bookInterview()
    {
        $page_title = 'Book Interview';
        $booking_types = BookingType::where('status', 1)->get();

        //weekdays morning 
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
        $slots['weekends_slots'] = array_merge($weekends_morning_slots, $weekends_evening_slots);
        
        return view('web-views.candidate.book_interview', compact('page_title', 'booking_types', 'slots'));
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