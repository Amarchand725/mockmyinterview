<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\AdvantageMock;
use Illuminate\Http\Request;
use Auth;

class AdvantageMockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $models = AdvantageMock::orderby('id', 'desc')->get();
        return View('admin.advantage.index', compact("models"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('admin.advantage.create');
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
            'title' => 'required|max:255',
            'description' => 'required',
            'image' => 'mimes:jpeg,jpg,png,gif|required|max:10000' // max 10000kb
        ]);

        $model = new AdvantageMock();

        if (isset($request->image)) {
            $photo = $request->file('image')->getClientOriginalName();
            $request->image->move(public_path('/admin/assets/images/advantage'), $photo);
            $model->image = $photo;
        }

        $model->created_by = Auth::user()->id;
        $model->title = $request->title;
        $model->slug = \Str::slug($request->title);
        $model->description = $request->description;
        $model->save();

        return redirect()->route('advantage.index')->with('status', 'Mock Advantage Added Successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AdvantageMock  $advantageMock
     * @return \Illuminate\Http\Response
     */
    public function show(AdvantageMock $advantageMock)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AdvantageMock  $advantageMock
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $model = AdvantageMock::where('slug', $slug)->first();
        return View('admin.advantage.edit', compact("model"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AdvantageMock  $advantageMock
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $update = AdvantageMock::where('slug', $slug)->first();
        $validator = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
        ]);

        if (isset($request->image)) {
            $photo = $request->file('image')->getClientOriginalName();
            $request->image->move(public_path('/admin/assets/images/advantage'), $photo);
            $update->image = $photo;
        }

        $update->title = $request->title;
        $update->slug = \Str::slug($request->title);
        $update->description = $request->description;
        $update->status = $request->status;
        $update->update();

        return redirect()->route('advantage.index')->with('status', 'Mock Advantage Updated Successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AdvantageMock  $advantageMock
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $AdvantageMock = AdvantageMock::where('slug', $slug)->first();
        if ($AdvantageMock) {
            $AdvantageMock->delete();
            return true;
        } else {
            return response()->json(['message' => 'Failed '], 404);
        }
    }
}
