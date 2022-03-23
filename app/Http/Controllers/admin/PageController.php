<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use Auth;

class PageController extends Controller
{
    public function index()
    {
        $models = Page::orderby('id', 'desc')->get();
        return View('admin.page.index', compact("models"));
    }

    public function create()
    {
        return View('admin.page.create');
    }

    public function store(Request $request)
    {
        $validator = $request->validate([
            'title' => 'required |max:100 ',
            'description' => 'max:255',
        ]);

        $model = new Page();
        $model->created_by = Auth::user()->id;
        $model->title = $request->title;
        $model->slug = \Str::slug($request->title);
        $model->meta_title = $request->meta_title;
        $model->meta_keyword = $request->meta_keyword;
        $model->meta_description = $request->meta_description;
        $model->description = $request->description;
        $model->save();

        return redirect()->route('page.index')->with('status', 'Page Added Successfully !');
    }

    public function edit($slug)
    {
        $model = Page::where('slug', $slug)->first();
        return View('admin.page.edit', compact("model"));
    }

    public function update(Request $request, $slug)
    {
        $validator = $request->validate([
            'title' => 'required |max:100 ',
            'description' => 'max:255',
        ]);

        $model = Page::where('slug', $slug)->first();
        $model->title = $request->title;
        $model->description = $request->description;
        $model->meta_title = $request->meta_title;
        $model->meta_keyword = $request->meta_keyword;
        $model->meta_description = $request->meta_description;
        $model->status = $request->status;
        $model->update();

        return redirect()->route('page.index')->with('status', 'Page updated Successfully !');
    }

    public function destroy($slug)
    {
        $model = Page::where('slug', $slug)->first();
        if ($model) {
            $model->delete();
            return true;
        } else {
            return response()->json(['message' => 'Failed '], 404);
        }
    }
}