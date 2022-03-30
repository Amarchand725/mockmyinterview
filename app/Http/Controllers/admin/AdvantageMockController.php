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

    function __construct()
    {
        $this->middleware('permission:advantage-list|advantage-create|advantage-edit|advantage-delete', ['only' => ['index','store']]);
        $this->middleware('permission:advantage-create', ['only' => ['create','store']]);
        $this->middleware('permission:advantage-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:advantage-delete', ['only' => ['destroy']]);
    }
    public function index(Request $request)
    {
        if($request->ajax()){
            $query = AdvantageMock::orderby('id', 'desc')->where('id', '>', 0);
            if($request['search'] != ""){
                $query->where('title', 'like', '%'. $request['search'] .'%');
            }
            if($request['status']!="All"){
                if($request['status']==2){
                    $request['status'] = 0;
                }
                $query->where('status', $request['status']);
            }
            $models = $query->paginate(1);
            return (string) view('admin.advantage.search', compact('models'));
        }
        $page_title = 'All Mock Advantages';
        $models = AdvantageMock::orderby('id', 'desc')->paginate(1);
        return View('admin.advantage.index', compact("models","page_title"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_title = 'Add Mock Advantage';
        return View('admin.advantage.create', compact('page_title'));
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
            $photo = date('d-m-Y-His').'.'.$request->file('image')->getClientOriginalExtension();
            $request->image->move(public_path('/admin/assets/images/advantage'), $photo);
            $model->image = $photo;
        }

        $model->created_by = Auth::user()->id;
        $model->title = $request->title;
        $model->slug = \Str::slug($request->title);
        $model->description = $request->description;
        $model->save();

        return redirect()->route('advantage.index')->with('message', 'Mock Advantage Added Successfully !');
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
        $page_title = 'Edit Mock Advantage';
        $model = AdvantageMock::where('slug', $slug)->first();
        return View('admin.advantage.edit', compact("model","page_title"));
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
            $photo = date('d-m-Y-His').'.'.$request->file('image')->getClientOriginalExtension();
            $request->image->move(public_path('/admin/assets/images/advantage'), $photo);
            $update->image = $photo;
        }

        $update->title = $request->title;
        $update->slug = \Str::slug($request->title);
        $update->description = $request->description;
        $update->status = $request->status;
        $update->update();

        return redirect()->route('advantage.index')->with('message', 'Mock Advantage Updated Successfully !');
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
