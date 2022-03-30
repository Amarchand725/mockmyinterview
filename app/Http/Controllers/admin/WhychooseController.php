<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Whychoose;
use File;

class WhychooseController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:why_choose-list|why_choose-create|why_choose-edit|why_choose-delete', ['only' => ['index','store']]);
        $this->middleware('permission:why_choose-create', ['only' => ['create','store']]);
        $this->middleware('permission:why_choose-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:why_choose-delete', ['only' => ['destroy']]);
    }
    public function index(Request $request)
    {
        if($request->ajax()){
            $query = Whychoose::orderby('id', 'desc')->where('id', '>', 0);
            if($request['search'] != ""){
                $query->where('name', 'like', '%'. $request['search'] .'%');
            }
            if($request['status']!="All"){
                if($request['status']==2){
                    $request['status'] = 0;
                }
                $query->where('status', $request['status']);
            }
            $whychooses = $query->paginate(1);
            return (string) view('admin.why_choose.search', compact('whychooses'));
        }
        $page_title = 'All Why Choose Us';
        $whychooses = Whychoose::orderby('id', 'desc')->paginate(1);
        return View('admin.why_choose.index', compact("whychooses","page_title"));
    }

    public function create()
    {
        $page_title = 'Add Why Choose Us';
        return View('admin.why_choose.create', compact('page_title'));
    }

    public function store(Request $request)
    {
        $validator = $request->validate([
            'name' => 'required',
            'content' => 'required',
            'icon' => 'required',
            'image' => 'required',
        ]);

        $whychoose = new Whychoose();

        if (isset($request->image)) {
            $photo = date('d-m-Y-His').'.'.$request->file('image')->getClientOriginalExtension();
            $request->image->move(public_path('/admin/assets/images/why_choose'), $photo);
            $whychoose->image = $photo;
        }
        if (isset($request->icon)) {
            $icon = date('d-m-Y-His').'.'.$request->file('icon')->getClientOriginalExtension();
            $request->icon->move(public_path('/admin/assets/images/why_choose'), $icon);
            $whychoose->icon = $icon;
        }

        $whychoose->name = $request->name;
        $whychoose->content = $request->content;
        $whychoose->save();

        return redirect()->route('why_choose.index')->with('message', 'Why Choose Us Added Successfully !');
    }

    public function edit($id)
    {
        $page_title = 'Edit Why Choose Us';
        $whychoose = Whychoose::find($id);
        return View('admin.why_choose.edit', compact("whychoose", "page_title"));
    }

    public function update(Request $request, $id)
    {
        $update = Whychoose::find($id);

        $validator = $request->validate([
            'name' => 'required',
            'content' => 'required',
        ]);

        if(isset($request->image)) {
            $photo = date('d-m-Y-His').'.'.$request->file('image')->getClientOriginalExtension();
            $request->image->move(public_path('/admin/assets/images/why_choose'), $photo);
            $update->image = $photo;
        }

        if(isset($request->icon)) {
            $icon = date('d-m-Y-His').'.'.$request->file('icon')->getClientOriginalExtension();
            $request->icon->move(public_path('/admin/assets/images/why_choose'), $icon);
            $update->icon = $icon;
        }

        $update->name = $request->name;
        $update->content = $request->content;
        $update->status = $request->status;
        $update->update();

        return redirect()->route('why_choose.index')->with('message', 'Why Choose Us Updated Successfully!');
    }

    public function destroy($id)
    {
        $Whychoose = Whychoose::find($id);

        if ($Whychoose) {
            $Whychoose->delete();
            return true;
        } else {
            return response()->json(['message' => 'Failed '], 404);
        }
    }
}
