<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Auth;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::orderby('id', 'desc')->get();
        return view('admin.service.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.service.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'name' => 'required|max:255',
        ]);

        $service = new Service();
        $service->created_by = Auth::user()->id;
        $service->name = $request->name;
        $service->slug = \Str::slug($request->name);
        $service->description = $request->description;
        $service->save();

        return redirect()->route('service.index')->with('status', 'Service Added Successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $service = Service::where('slug', $slug)->first(); 
        return View('admin.service.show', compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $service = Service::where('slug', $slug)->first();
        return View('admin.service.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $validator = $request->validate([
            'name' => 'required|max:255',
        ]);

        $service = Service::where('slug', $slug)->first();
        $service->name = $request->name;
        $service->slug = \Str::slug($request->name);
        $service->description = $request->description;
        $service->status = $request->status;
        $service->update();

        return redirect()->route('service.index')->with('status', 'Service Updated Successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $service = Service::where('slug', $slug)->first();
        
        if ($service) {
            $service->delete();
            return true;
        } else {
            return response()->json(['message' => 'Failed '], 404);
        }
    }
}
