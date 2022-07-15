<?php

namespace App\Http\Controllers\admin;

use App\Models\Course;
use App\Models\Degree;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:course-list|course-create|course-edit|course-delete', ['only' => ['index','store']]);
        $this->middleware('permission:course-create', ['only' => ['create','store']]);
        $this->middleware('permission:course-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:course-delete', ['only' => ['destroy']]);
    }
    public function index(Request $request)
    {
        if($request->ajax()){
            $query = Course::orderby('id', 'desc')->where('id', '>', 0);
            if($request['search'] != ""){
                $query->where('title', 'like', '%'. $request['search'] .'%')
                ->orWhere('degree_slug', 'like', '%'. $request['search'] .'%');
            }
            if($request['status']!="All"){
                if($request['status']==2){
                    $request['status'] = 0;
                }
                $query->where('status', $request['status']);
            }
            $courses = $query->paginate(10);
            return (string) view('admin.course.search', compact('courses'));
        }
        $page_title = 'All Courses';
        $courses = Course::orderBy('id','DESC')->paginate(10);
        return view('admin.course.index',compact('page_title', 'courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_title = 'Add course';
        $degrees = Degree::where('status', 1)->get();
        return view('admin.course.create',compact('page_title', 'degrees'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:100',
            'video_url' => 'required',
            'degree_slug' => 'required',
            'description' => 'max:255',
        ]);

        Course::create([
            'created_by' => Auth::user()->id,
            'degree_slug' => $request->degree_slug,
            'title' => $request->title,
            'video_url' => $request->video_url,
            'slug' => \Str::slug($request->title),
            'description'=>$request->description
        ]);

        return redirect()->route('course.index')
                        ->with('message','Course created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $page_title = 'Edit Course';
        $course = Course::where('slug', $slug)->first();
        $degrees = Degree::where('status', 1)->get();
        return view('admin.course.edit', compact('course', 'page_title', 'degrees'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $this->validate($request, [
            'degree_slug' => 'required',
            'title' => 'required|max:100',
            'video_url' => 'required',
            'description' => 'max:255',
        ]);

        $course = Course::where('slug', $slug)->first();
        $course->degree_slug = $request->degree_slug;
        $course->title = $request->title;
        $course->video_url = $request->video_url;
        $course->slug = \Str::slug($request->title);
        $course->description = $request->description;
        $course->status = $request->status;
        $course->save();

        return redirect()->route('course.index')
                        ->with('message','Course updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $course = Course::where('slug', $slug)->first();
        if ($course) {
            $course->delete();
            return true;
        } else {
            return response()->json(['message' => 'Failed '], 404);
        }
    }
    public function getCourses($slug)
    {
        $courses = Course::where('degree_slug', $slug)->get();
        return response()->json($courses);
    }
}
