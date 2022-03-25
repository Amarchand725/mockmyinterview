<?php

namespace App\Http\Controllers\admin;

use App\Models\Degree;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use DB;

class DegreeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:degree-list|degree-create|degree-edit|degree-delete', ['only' => ['index','store']]);
        $this->middleware('permission:degree-create', ['only' => ['create','store']]);
        $this->middleware('permission:degree-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:degree-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        $page_title = 'All Degrees';
        $degrees = Degree::orderBy('id','DESC')->paginate(10);
        return view('admin.degree.index',compact('page_title', 'degrees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_title = 'Add Degree';
        return view('admin.degree.create',compact('page_title'));
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
            'description' => 'max:255',
        ]);
    
        Degree::create([
            'created_by' => Auth::user()->id, 
            'title' => $request->title, 
            'slug' => \Str::slug($request->title), 
            'description'=>$request->description
        ]);
    
        return redirect()->route('degree.index')
                        ->with('message','Degree created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Degree  $degree
     * @return \Illuminate\Http\Response
     */
    public function show(Degree $degree)
    {
        $degree = Degree::find($id);
        return view('admin.degree.show',compact('degree'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Degree  $degree
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $degree = Degree::where('slug', $slug)->first();
        $page_title = 'Edit Degree';
        return view('admin.degree.edit',compact('degree', 'page_title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Degree  $degree
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $this->validate($request, [
            'title' => 'required|max:100',
            'description' => 'max:255',
        ]);
    
        $degree = Degree::where('slug', $slug)->first();
        $degree->title = $request->title;
        $degree->slug = \Str::slug($request->title);
        $degree->description = $request->description;
        $degree->status = $request->status;
        $degree->save();
    
        return redirect()->route('degree.index')
                        ->with('message','Degree updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Degree  $degree
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $degree = Degree::where('slug', $slug)->first();

        if ($degree) {
            $degree->delete();
            return true;
        } else {
            return response()->json(['message' => 'Failed '], 404);
        }
    }
}