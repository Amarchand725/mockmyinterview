<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AvailableSlotDate;
use App\Models\AvailableSlot;
use Auth;

class AvailableSlotDateController extends Controller
{
    public function store(Request $request)
    {
        $model = AvailableSlotDate::create([
            'interviewer_id' => Auth::user()->id,
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
    }
}
