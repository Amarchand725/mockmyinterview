<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Whychoose;
use File;

class WhychooseController extends Controller
{
    public function index()
    {
        $whychooses = Whychoose::all();
        return View('admin.why_choose.index', compact("whychooses"));
    }

    public function create()
    {
        return View('admin.why_choose.create');
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
            $photo = $request->file('image')->getClientOriginalName();
            $request->image->move(public_path('/admin/assets/images/why_choose'), $photo);
            $whychoose->image = $photo;
        }
        if (isset($request->icon)) {
            $icon = $request->file('icon')->getClientOriginalName();
            $request->icon->move(public_path('/admin/assets/images/why_choose'), $icon);
            $whychoose->icon = $icon;
        } 

        $whychoose->name = $request->name;
        $whychoose->content = $request->content;
        $whychoose->save();

        return redirect()->route('why_choose.index')->with('status', 'Why Choose Us Added Successfully !');
    }

    public function edit($id)
    {
        $whychoose = Whychoose::find($id);
        return View('admin.why_choose.edit', compact("whychoose"));
    }

    public function update(Request $request, $id)
    {
        $update = Whychoose::find($id);

        $validator = $request->validate([
            'name' => 'required',
            'content' => 'required',
        ]);

        if(isset($request->image)) {
            $photo = $request->file('image')->getClientOriginalName();
            $request->image->move(public_path('/admin/assets/images/why_choose'), $photo);
            $update->image = $photo;
        }

        if(isset($request->icon)) {
            $icon = $request->file('icon')->getClientOriginalName();
            $request->icon->move(public_path('/admin/assets/images/why_choose'), $icon);
            $update->icon = $icon;
        }

        $update->name = $request->name;
        $update->content = $request->content;
        $update->status = $request->status;
        $update->update();

        return redirect()->route('why_choose.index')->with('status', 'Why Choose Us Updated Successfully!');
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