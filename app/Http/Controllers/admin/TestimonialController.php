<?php

namespace App\Http\Controllers\admin;

use App\Models\Testimonial;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use File;

class TestimonialController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:testimonial-list|testimonial-create|testimonial-edit|testimonial-delete', ['only' => ['index','store']]);
        $this->middleware('permission:testimonial-create', ['only' => ['create','store']]);
        $this->middleware('permission:testimonial-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:testimonial-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        $testimonials = Testimonial::orderby('id', 'desc')->get();
        return View('admin.testimonial.index', compact("testimonials"));
    }

    public function create()
    {
        return View('admin.testimonial.create');
    }

    public function store(Request $request)
    {
        $validator = $request->validate([
            'name' => 'required',
            'comment' => 'required',
            'image' => 'mimes:jpeg,jpg,png,gif|required|max:10000' // max 10000kb
        ]);

        $testimonail = new Testimonial();

        if (isset($request->image)) {
            $photo = $request->file('image')->getClientOriginalName();
            $request->image->move(public_path('/admin/assets/images/testimonials'), $photo);
            $testimonail->image = $photo;
        }

        $testimonail->name = $request->name;
        $testimonail->slug = \Str::slug($request->name);
        $testimonail->designation = $request->designation;
        $testimonail->comment = $request->comment;
        $testimonail->save();

        return redirect()->route('testimonial.index')->with('message', 'Testimonial Added Successfully !');
    }

    public function edit($slug)
    {
        $testimonial = Testimonial::where('slug', $slug)->first();
        return View('admin.testimonial.edit', compact("testimonial"));
    }

    public function update(Request $request, $slug)
    {
        $update = Testimonial::where('slug', $slug)->first();
        $validator = $request->validate([
            'name' => 'required',
            'comment' => 'required',
        ]);

        if (isset($request->image)) {
            $photo = $request->file('image')->getClientOriginalName();
            $Image = $request->image->move(public_path('/uploads'), $photo);
            $update->image = $photo;
        }

        $update->name = $request->name;
        $update->slug = \Str::slug($request->name);
        $update->designation = $request->designation;
        $update->comment = $request->comment;
        $update->status = $request->status;
        $update->update();

        return redirect()->route('testimonial.index')->with('message', 'Testimonial Updated Successfully !');
    }

    public function destroy($slug)
    {
        $testimonial = Testimonial::where('slug', $slug)->first();
        if ($testimonial) {
            $testimonial->delete();
            return true;
        } else {
            return response()->json(['message' => 'Failed '], 404);
        }
    }
}
