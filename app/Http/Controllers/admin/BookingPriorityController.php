<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers;
use App\Models\BookingPriority;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class BookingPriorityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:booking_type-list|booking_type-create|booking_type-edit|booking_type-delete', ['only' => ['index','store']]);
        $this->middleware('permission:booking_type-create', ['only' => ['create','store']]);
        $this->middleware('permission:booking_type-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:booking_type-delete', ['only' => ['destroy']]);
    }
    public function index(Request $request)
    {
        if($request->ajax()){
            $query = BookingPriority::orderby('id', 'desc')->where('id', '>', 0);
            if($request['search'] != ""){
                $query->where('title', 'like', '%'. $request['search'] .'%')
                    ->orWhere('type', 'like', '%'. $request['search'] .'%')
                    ->orWhere('credits', 'like', '%'. $request['search'] .'%')
                    ->orWhere('price', 'like', '%'. $request['search'] .'%')
                    ->orWhere('currency_code', 'like', '%'. $request['search'] .'%');
            }
            if($request['status']!="All"){
                if($request['status']==2){
                    $request['status'] = 0;
                }
                $query->where('status', $request['status']);
            }
            $booking_priorities = $query->paginate(10);
            return (string) view('admin.booking_priorities.search', compact('booking_priorities'));
        }
        $page_title = 'All Booking Priorities';
        $booking_priorities = BookingPriority::orderBy('id','DESC')->paginate(10);
        return view('admin.booking_priorities.index',compact('page_title', 'booking_priorities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_title = 'Add Booking Priority';
        return view('admin.booking_priorities.create',compact('page_title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:100',
            'type' => 'required',
            'price' => 'max:10',
            'credits' => 'max:10',
            'currency_code' => 'max:5',
            'description' => 'max:255',
        ]);

        $model = BookingPriority::create([
            'created_by' => Auth::user()->id,
            'type' => $request->type,
            'color' => $request->color,
            'title' => $request->title,
            'slug' => \Str::slug($request->title),
            'currency_code' => $request->currency_code,
            'price' => $request->price,
            'credits' => $request->credits,
            'description'=>$request->description
        ]);

        if($model){
            return redirect()->route('booking_priority.index')
                        ->with('message','Booking priority added successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BookingPriority  $bookingPriority
     * @return \Illuminate\Http\Response
     */
    public function show(BookingPriority $bookingPriority)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BookingPriority  $bookingPriority
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $model = BookingPriority::where('slug', $slug)->first();
        $page_title = 'Edit Booking Priority';
        return view('admin.booking_priorities.edit',compact('model', 'page_title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BookingPriority  $bookingPriority
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $this->validate($request, [
            'title' => 'required|max:100',
            'type' => 'required',
            'price' => 'max:10',
            'credits' => 'max:10',
            'currency_code' => 'max:5',
            'description' => 'max:255',
        ]);

        $model = BookingPriority::where('slug', $slug)->first();
        $model->title = $request->title;
        $model->slug = \Str::slug($request->title);
        $model->type = $request->type;
        $model->color = $request->color;
        $model->currency_code = $request->currency_code;
        $model->price = $request->price;
        $model->credits = $request->credits;
        $model->description = $request->description;
        $model->status = $request->status;
        $model->save();

        if($model){
            return redirect()->route('booking_priority.index')
                        ->with('message','Booking Priority updated successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BookingPriority  $bookingPriority
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $model = BookingPriority::where('slug', $slug)->first();

        if ($model) {
            $model->delete();
            return true;
        } else {
            return response()->json(['message' => 'Failed '], 404);
        }
    }
}