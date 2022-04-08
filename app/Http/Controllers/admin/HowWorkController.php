<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\HowWork;
use Illuminate\Http\Request;
use Auth;

class HowWorkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {
        $this->middleware('permission:how_work-list|how_work-create|how_work-edit|how_work-delete', ['only' => ['index','store']]);
        $this->middleware('permission:how_work-create', ['only' => ['create','store']]);
        $this->middleware('permission:how_work-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:how_work-delete', ['only' => ['destroy']]);
    }
    public function index(Request $request)
    {
        if($request->ajax()){
            $query = HowWork::orderby('id', 'desc')->where('id', '>', 0);
            if($request['search'] != ""){
                $query->where('title', 'like', '%'. $request['search'] .'%');
            }
            if($request['status']!="All"){
                if($request['status']==2){
                    $request['status'] = 0;
                }
                $query->where('status', $request['status']);
            }
            $models = $query->paginate(10);
            return (string) view('admin.how_work.search', compact('models'));
        }
        $page_title = 'All How Works';
        $models = HowWork::orderby('id', 'desc')->paginate(10);
        return View('admin.how_work.index', compact("models", "page_title"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_title = 'Add How Work';
        return View('admin.how_work.create', compact('page_title'));
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

        $model = new HowWork();
        $model->created_by = Auth::user()->id;
        $model->title = $request->title;
        $model->slug = \Str::slug($request->title);
        $model->description = $request->description;
        $model->save();

        return redirect()->route('how_work.index')->with('message', 'How Work Added Successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HowWork  $HowWork
     * @return \Illuminate\Http\Response
     */
    public function show(HowWork $HowWork)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HowWork  $HowWork
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $page_title = 'Edit How Work';
        $model = HowWork::where('slug', $slug)->first();
        return View('admin.how_work.edit', compact("model", "page_title"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HowWork  $HowWork
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $update = HowWork::where('slug', $slug)->first();
        $validator = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
        ]);

        $update->title = $request->title;
        $update->slug = \Str::slug($request->title);
        $update->description = $request->description;
        $update->status = $request->status;
        $update->update();

        return redirect()->route('how_work.index')->with('message', 'How Work Updated Successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HowWork  $HowWork
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $how_work = HowWork::where('slug', $slug)->first();
        if ($how_work) {
            $how_work->delete();
            return true;
        } else {
            return response()->json(['message' => 'Failed '], 404);
        }
    }
}
