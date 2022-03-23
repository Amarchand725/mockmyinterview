<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use App\Models\Category;
use Auth;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $models = Blog::all();
        return View('admin.blog.index', compact("models"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('status', 1)->get();
        return View('admin.blog.create', compact('categories'));
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
            'title' => 'required',
            'category_id' => 'required',
        ]);

        $model = new Blog();

        if (isset($request->post)) {
            $post = $request->file('post')->getClientOriginalName();
            $request->post->move(public_path('/admin/assets/posts'), $post);
            $model->post = $post;
        }

        $model->created_by = Auth::user()->id;
        $model->category_id = $request->category_id;
        $model->title = $request->title;
        $model->slug = \Str::slug($request->title);
        $model->description = $request->description;
        $model->save();

        return redirect()->route('blog.index')->with('status', 'blog Added Successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $model = Blog::where('slug', $slug)->first();
        $categories = Category::where('status', 1)->get();
        return View('admin.blog.edit', compact("model", "categories"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $validator = $request->validate([
            'title' => 'required',
            'category_id' => 'required',
        ]);

        $model = Blog::where('slug', $slug)->first();

        if (isset($request->post)) {
            $post = $request->file('post')->getClientOriginalName();
            $request->post->move(public_path('/admin/assets/posts'), $post);
            $model->post = $post;
        }

        $model->category_id = $request->category_id;
        $model->title = $request->title;
        $model->slug = \Str::slug($request->title);
        $model->description = $request->description;
        $model->save();

        return redirect()->route('blog.index')->with('status', 'blog updated Successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $model = Blog::find($slug);
        if ($model) {
            $model->delete();
            return true;
        } else {
            return response()->json(['message' => 'Failed '], 404);
        }
    }
}