<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PageSetting;

class BookedSlotController extends Controller
{
    public function nextPreDate(Request $request)
    {
        return $request;
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



        return (string) view('web-views.candidate.next-pre-slots', compact('slots'));
    }
}
