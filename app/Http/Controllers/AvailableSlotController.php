<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AvailableSlot;
use Auth;

class AvailableSlotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        // return $request->selected_dates;
        $validator = $request->validate([
            'start_date' => 'required',
            'end_date' => 'required',
            'selected_dates' => 'required',
            'selected_dates.*' => 'required',
        ]);

        try{
            foreach($request->selected_dates as $slot){
                $date = explode(' ', $slot)[0];
                if(!empty($slot)){
                    AvailableSlot::create([
                        'interviewer_id' => Auth::user()->id,
                        'date' => $date,
                        'slot' => $slot,
                    ]);
                }
            }

            return 'success';
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
    public function show($id)
    {
        //
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
