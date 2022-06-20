<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\InterviewCategory;
use Illuminate\Http\Request;
use Auth;

class InterviewCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $query = InterviewCategory::orderby('id', 'desc')->where('id', '>', 0);
            if($request['search'] != ""){
                $query->where('name', 'like', '%'. $request['search'] .'%');
            }
            if($request['status']!="All"){
                if($request['status']==2){
                    $request['status'] = 0;
                }
                $query->where('status', $request['status']);
            }
            $models = $query->paginate(10);
            return (string) view('admin.interview_category.search', compact('models'));
        }
        $page_title = 'All Interview Categories';
        $models = InterviewCategory::orderby('id', 'desc')->paginate(10);
        return View('admin.interview_category.index', compact("models","page_title"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_title = 'Add Interview Category';
        $parent_categories = InterviewCategory::where('parent_id', null)->where('status', 1)->get();
        return View('admin.interview_category.create', compact('page_title', 'parent_categories'));
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
            'name' => 'required|max:100',
            'description' => 'max:250',
        ]);

        $model = new InterviewCategory();
        $model->created_by = Auth::user()->id;
        $model->parent_id = $request->parent_id;
        $model->name = $request->name;
        $model->slug = \Str::slug($request->name);
        $model->description = $request->description;
        $model->save();

        return redirect()->route('interview_category.index')->with('message', 'Interview Category Added Successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\InterviewCategory  $interviewCategory
     * @return \Illuminate\Http\Response
     */
    public function show(InterviewCategory $interviewCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\InterviewCategory  $interviewCategory
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $page_title = 'Edit Interview Category';
        $parent_categories = InterviewCategory::where('parent_id', null)->where('status', 1)->get();
        $model = InterviewCategory::where('slug', $slug)->first();
        return View('admin.interview_category.edit', compact("model", "page_title", "parent_categories"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\InterviewCategory  $interviewCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $validator = $request->validate([
            'name' => 'required|max:100',
            'description' => 'max:250',
        ]);

        $update = InterviewCategory::where('slug', $slug)->first();
        $update->parent_id = $request->parent_id;
        $update->name = $request->name;
        $update->slug = \Str::slug($request->name);
        $update->description = $request->description;
        $update->status = $request->status;
        $update->update();

        return redirect()->route('interview_category.index')->with('message', 'Interview Category Updated Successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InterviewCategory  $interviewCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $model = InterviewCategory::where('slug', $slug)->first();
        if ($model) {
            $model->delete();
            return true;
        } else {
            return response()->json(['message' => 'Failed '], 404);
        }
    }
}
