<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AvailableSlotDate;
use App\Models\AvailableSlot;
use Auth;
use DB;

class AvailableSlotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $query = AvailableSlotDate::orderby('id', 'desc')->where('id', '>', 0);
            $interviewer_slots = $query->paginate(10);
            return (string) view('web-views.interviewer.show', compact('interviewer_slots'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        $validator = $request->validate([
            'start_date' => 'required',
            'end_date' => 'required',
            'selected_dates' => 'required',
            'selected_dates.*' => 'required',
        ]);

        try{
            $start_date_time = date('Y-m-d H:i:s', strtotime($request->start_date));
            $start_date = explode(' ', $start_date_time);

            $end_date = date('Y-m-d H:i:s', strtotime($request->end_date));
            $end_date = explode(' ', $end_date);

            // return ;
            $bool = false;
            if (count($request->selected_dates) > 0) {
                foreach ($request->selected_dates as $slot) {
                    $date = explode(' ', $slot)[0];
                    if (!empty($slot)) {
                        $model = DB::table('available_slot_dates')
                        ->select('available_slots.*')
                        ->join('available_slots', 'available_slot_dates.id', '=', 'available_slots.available_slot_date_id')
                        ->where('available_slot_dates.interviewer_id', Auth::user()->id)
                        ->where('available_slots.slot', date('Y-m-d H', strtotime($slot)))
                        ->first();

                        if (empty($model)) {
                            $bool = true;
                        }
                    }
                }

                if ($bool) {
                    $available_date = AvailableSlotDate::create([
                        'interviewer_id' => Auth::user()->id,
                        'start_date' => date('Y-m-d', strtotime($start_date[0])),
                        'start_time' => $start_date[1],
                        'end_date' => date('Y-m-d', strtotime($end_date[0])),
                        'end_time' => $end_date[1],
                    ]);

                    if ($available_date) {
                        foreach ($request->selected_dates as $slot) {
                            $date_time = explode(' ', $slot);
                            if (!empty($slot)) {
                                $model = DB::table('available_slot_dates')
                                ->select('available_slots.*')
                                ->join('available_slots', 'available_slot_dates.id', '=', 'available_slots.available_slot_date_id')
                                ->where('available_slot_dates.interviewer_id', Auth::user()->id)
                                ->where('available_slots.slot', date('Y-m-d H', strtotime($slot)))
                                ->first();

                                if (empty($model)) {
                                    AvailableSlot::create([
                                        'available_slot_date_id' => $available_date->id,
                                        'date' => $date_time[0],
                                        'time' => $date_time[1],
                                        'slot' => $slot,
                                    ]);
                                }
                            }
                        }
                    }
                }

                return 'success';
            }else{
                return 'failed';
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('Something went wrong '.$e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slot_id)
    {
        $model = AvailableSlotDate::with('hasBookedSlots')->where('id', $slot_id)->first();
        return (string) view('web-views.interviewer.show-slots', compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function createSlot(Request $request)
    {
        $start_time = strtotime($request->start_date_time);
        $end_time = strtotime($request->end_date_time);
        $slot = strtotime(date('Y-m-d H:i:s', $start_time) . ' +30 minutes');

        $data = [];
        $selected_data = [];

        for ($i=0; $slot <= $end_time; $i++) {
            $data[$i] = [
                'start' => date('Y-m-d H:i:s', $start_time),
                'end' => date('Y-m-d H:i:s', $slot),
            ];

            $start_time = $slot;
            $slot = strtotime(date('Y-m-d H:i:s', $start_time) . ' +30 minutes');
        }

        return (string) view('web-views.interviewer.slots', compact('data'));
    }
}
