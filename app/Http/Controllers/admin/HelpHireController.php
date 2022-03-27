<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\HelpHire;
use Illuminate\Http\Request;
use Auth;

class HelpHireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:help-list|help-create|help-edit|help-delete', ['only' => ['index','store']]);
        $this->middleware('permission:help-create', ['only' => ['create','store']]);
        $this->middleware('permission:help-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:help-delete', ['only' => ['destroy']]);
    }
    public function index(Request $request)
    {
        if($request->ajax()){
            $query = HelpHire::orderby('id', 'desc')->where('id', '>', 0);
            if($request['search'] != ""){
                $query->where('title', 'like', '%'. $request['search'] .'%');
            }
            if($request['status']!="All"){
                if($request['status']==2){
                    $request['status'] = 0;
                }
                $query->where('status', $request['status']);
            }
            $models = $query->paginate(5);
            return (string) view('admin.help.search', compact('models'));
        }
        $page_title = 'All Hiring Helps';
        $models = HelpHire::orderby('id', 'desc')->paginate(5);
        return View('admin.help.index', compact("models", "page_title"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_title = 'Add Hiring Help';
        return View('admin.help.create', compact('page_title'));
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
            'description' => 'required|max:255',
        ]);

        $model = new HelpHire();
        $model->created_by = Auth::user()->id;
        $model->title = $request->title;
        $model->slug = \Str::slug($request->title);
        $model->description = $request->description;
        $model->save();

        return redirect()->route('help.index')->with('message', 'Hire Help Added Successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HelpHire  $helpHire
     * @return \Illuminate\Http\Response
     */
    public function show(HelpHire $helpHire)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HelpHire  $helpHire
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $page_title = 'Edit Hiring Help';
        $model = HelpHire::where('slug', $slug)->first();
        return View('admin.help.edit', compact("model", "page_title"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HelpHire  $helpHire
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $validator = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required|max:255',
        ]);

        $update = HelpHire::where('slug', $slug)->first();
        $update->title = $request->title;
        $update->slug = \Str::slug($request->title);
        $update->description = $request->description;
        $update->status = $request->status;
        $update->update();

        return redirect()->route('help.index')->with('message', 'Hire Help Updated Successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HelpHire  $helpHire
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $team = HelpHire::where('slug', $slug)->first();
        if ($team) {
            $team->delete();
            return true;
        } else {
            return response()->json(['message' => 'Failed '], 404);
        }
    }
}
