<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use Auth;
use File;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();
        return View('admin.slider.index', compact("sliders"));
    }

    public function create()
    {
        return View('admin.slider.create');
    }

    public function store(Request $request)
    {
        $validator = $request->validate([
            'left_sec_image' => 'mimes:jpeg,jpg,png,gif|required|max:10000' // max 10000kb
        ]);

        $slider = new Slider();

        if (isset($request->left_sec_image)) {
            $photo = $request->file('left_sec_image')->getClientOriginalName();
            $request->left_sec_image->move(public_path('/admin/assets/images/slider'), $photo);

            $slider->left_sec_image = $photo;
        }

        $slider->created_by = Auth::user()->id;
        $slider->left_sec_title = $request->left_sec_title;
        $slider->left_sec_sub_description = $request->left_sec_sub_description;
        $slider->left_sec_description = $request->left_sec_description;
        $slider->right_sect_title = $request->right_sect_title;
        $slider->right_sec_description = $request->right_sec_description;
        $slider->right_sec_left_btn_lbl = $request->right_sec_left_btn_lbl;
        $slider->right_sec_right_btn_lbl = $request->right_sec_right_btn_lbl;
        $slider->right_sec_video_link = $request->right_sec_video_linkl;
        $slider->status = 1;
        $slider->save();

        return redirect()->route('slider.index')->with('status', 'Slider added successfully!');
    }

    public function edit($id)
    {
        $slider = Slider::find($id);
        return View('admin.slider.edit', compact('slider'));
    }

    public function update(Request $request, $id)
    {
        $slider = Slider::find($id);

        if (isset($request->left_sec_image)) {
            $photo = $request->file('left_sec_image')->getClientOriginalName();
            $request->left_sec_image->move(public_path('/admin/assets/images/slider'), $photo);

            $slider->left_sec_image = $photo;
        }

        $slider->left_sec_title = $request->left_sec_title;
        $slider->left_sec_sub_description = $request->left_sec_sub_description;
        $slider->left_sec_description = $request->left_sec_description;
        $slider->right_sect_title = $request->right_sect_title;
        $slider->right_sec_description = $request->right_sec_description;
        $slider->right_sec_left_btn_lbl = $request->right_sec_left_btn_lbl;
        $slider->right_sec_right_btn_lbl = $request->right_sec_right_btn_lbl;
        $slider->right_sec_video_link = $request->right_sec_video_link;
        $slider->status = $request->status;;
        $slider->update();

        return redirect()->route('slider.index')->with('status', 'Slider Updated Successfully !');
    }

    public function show($slider_id)
    {
        $slider = Slider::find($slider_id); 
        return View('admin.slider.show', compact('slider'));
    }

    public function destroy($id)
    {
        $slider = Slider::find($id);
        if ($slider) {
            $slider->delete();
            return true;
        } else {
            return response()->json(['message' => 'Failed '], 404);
        }
    }
}