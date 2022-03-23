<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\WorkProcess;
use Illuminate\Http\Request;
use Auth;

class WorkProcessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $models = WorkProcess::orderby('id', 'desc')->get();
        return View('admin.work_process.index', compact("models"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('admin.work_process.create');
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
        ]);

        $model = new WorkProcess();
        $model->created_by = Auth::user()->id;
        $model->title = $request->title;
        $model->slug = \Str::slug($request->title);
        $model->description = $request->description;
        $model->save();

        return redirect()->route('work-process.index')->with('status', 'Work Process Added Successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WorkProcess  $workProcess
     * @return \Illuminate\Http\Response
     */
    public function show(WorkProcess $workProcess)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WorkProcess  $workProcess
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $model = WorkProcess::where('slug', $slug)->first();
        return View('admin.work_process.edit', compact("model"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WorkProcess  $workProcess
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $update = WorkProcess::where('slug', $slug)->first();
        $validator = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
        ]);

        $update->title = $request->title;
        $update->slug = \Str::slug($request->title);
        $update->description = $request->description;
        $update->status = $request->status;
        $update->update();

        return redirect()->route('work-process.index')->with('status', 'Work Process Updated Successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WorkProcess  $workProcess
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $WorkProcess = WorkProcess::where('slug', $slug)->first();
        if ($WorkProcess) {
            $WorkProcess->delete();
            return true;
        } else {
            return response()->json(['message' => 'Failed '], 404);
        }
    }
}
