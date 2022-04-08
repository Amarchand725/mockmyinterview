<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use Auth;
use File;

class SliderController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:slider-list|slider-create|slider-edit|slider-delete', ['only' => ['index','store']]);
        $this->middleware('permission:slider-create', ['only' => ['create','store']]);
        $this->middleware('permission:slider-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:slider-delete', ['only' => ['destroy']]);
    }
    public function index(Request $request)
    {
        if($request->ajax()){
            $query = Slider::orderby('id', 'desc')->where('id', '>', 0);
            if($request['search'] != ""){
                $query->where('left_sec_title', 'like', '%'. $request['search'] .'%');
            }
            if($request['status']!="All"){
                if($request['status']==2){
                    $request['status'] = 0;
                }
                $query->where('status', $request['status']);
            }
            $sliders = $query->paginate(10);
            return (string) view('admin.slider.search', compact('sliders'));
        }
        $page_title = 'All Sliders';
        $sliders = Slider::orderby('id', 'desc')->where('status', 1)->paginate(10);
        return View('admin.slider.index', compact("sliders", "page_title"));
    }

    public function create()
    {
        $page_title = 'Add Slider';
        return View('admin.slider.create', compact('page_title'));
    }

    public function store(Request $request)
    {
        $validator = $request->validate([
            'left_sec_image' => 'mimes:jpeg,jpg,png,gif|required|max:10000' // max 10000kb
        ]);

        $slider = new Slider();

        if (isset($request->left_sec_image)) {
            $photo = date('d-m-Y-His').'.'.$request->file('left_sec_image')->getClientOriginalExtension();
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

        return redirect()->route('slider.index')->with('message', 'Slider added successfully!');
    }

    public function edit($id)
    {
        $page_title = 'Edit Slider';
        $slider = Slider::find($id);
        return View('admin.slider.edit', compact('slider','page_title'));
    }

    public function update(Request $request, $id)
    {
        $slider = Slider::find($id);

        if (isset($request->left_sec_image)) {
            $photo = date('d-m-Y-His').'.'.$request->file('left_sec_image')->getClientOriginalExtension();
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

        return redirect()->route('slider.index')->with('message', 'Slider Updated Successfully !');
    }

    public function show($slider_id)
    {
        $page_title = 'Show Slider';
        $slider = Slider::find($slider_id);
        return View('admin.slider.show', compact('slider', 'page_title'));
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
