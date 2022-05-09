<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AvailableSlotDate;
use App\Models\AvailableSlot;
use App\Models\PageSetting;
use Auth;
use DateTime;

class AvailableSlotDateController extends Controller
{
    public function store(Request $request)
    {
        if(empty($request->hr_type) && empty($request->technical_type)){
            return redirect()->back()->with('error', 'Select interview type hr or technical!');
        }

        if(sizeof($request->mornings)==0 && sizeof($request->evenings) == 0){
            return redirect()->back()->with('error', 'Choose slot.!');
        }

        if($request->sessiontype==1){
            $model = AvailableSlotDate::create([
                'interviewer_id' => Auth::user()->id,
                'slot_type' => $request->slot_type,
                'hr_type' => $request->hr_type,
                'technical_type' => $request->technical_type,
                'start_date' => date('Y-m-d', strtotime($request->start_date)),
                'end_date' => date('Y-m-d', strtotime($request->end_date)),
            ]);

            if($model){
                foreach($request->mornings as $morning){
                    if(!empty($morning)){
                        AvailableSlot::create([
                            'available_date_id' => $model->id,
                            'shift' => 'morning',
                            'slot' => $morning,
                        ]);
                    }
                }
                foreach($request->evenings as $evening){
                    if(!empty($evening)){
                        AvailableSlot::create([
                            'available_date_id' => $model->id,
                            'shift' => 'evening',
                            'slot' => $evening,
                        ]);
                    }
                }

                return redirect()->back()->with('message', 'You have saved avialable slots successfully.');
            }
        }else{
            return redirect()->back()->with('error', 'You have cancelled to create new avaialable slots.');
        }
    }
    public function getSlots(Request $request)
    {
        $slot_type = $request->slot_type;
        $slots = [];
        $booked_slots = [];

        $b_slots = AvailableSlotDate::where('interviewer_id', Auth::user()->id)->where('slot_type', $request->slot_type)->where('start_date', '>=', date('Y-m-d'))->where('end_date', '<=', date('Y-m-d'))->first();
        if(!empty($b_slots)){
            foreach ($b_slots->hasBookedSlots as $available_slot){
                $booked_slots[] = $available_slot->slot;         
            }
        }

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

            return (string) view('web-views.interviewer.slots', compact('slot_type', 'slots', 'booked_slots'));
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

            return (string) view('web-views.interviewer.slots', compact('slot_type', 'slots', 'booked_slots'));
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
