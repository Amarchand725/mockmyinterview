<?php

namespace App\Http\Controllers\admin;

use App\Models\Language;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use DB;

class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:language-list|language-create|language-edit|language-delete', ['only' => ['index','store']]);
         $this->middleware('permission:language-create', ['only' => ['create','store']]);
         $this->middleware('permission:language-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:language-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        if($request->ajax()){
            $query = Language::orderby('id', 'desc')->where('id', '>', 0);
            if($request['search'] != ""){
                $query->where('title', 'like', '%'. $request['search'] .'%')
                    ->orWhere('code', 'like', '%'. $request['search'].'%');
            }
            if($request['status']!="All"){
                if($request['status']==2){
                    $request['status'] = 0;
                }
                $query->where('status', $request['status']);
            }
            $languages = $query->paginate(5);
            return (string) view('admin.language.search', compact('languages'));
        }
        $page_title = 'All Languages';
        $languages = Language::orderBy('id','DESC')->paginate(5);
        return view('admin.language.index',compact('page_title', 'languages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_title = 'Add Language';
        return view('admin.language.create',compact('page_title'));
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
            'description' => 'max:255',
            'code' => 'max:5',
        ]);

        Language::create([
            'created_by' => Auth::user()->id,
            'title' => $request->title,
            'code' => $request->code,
            'slug' => \Str::slug($request->title),
            'description'=>$request->description
        ]);

        return redirect()->route('language.index')
                        ->with('message','Language created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function show(Language $language)
    {
        $language = Language::find($id);
        return view('admin.language.show',compact('language'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $language = Language::where('slug', $slug)->first();
        $page_title = 'Edit Language';
        return view('admin.language.edit',compact('language', 'page_title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $this->validate($request, [
            'title' => 'required|max:100',
            'description' => 'max:255',
            'code' => 'max:5',
        ]);

        $language = Language::where('slug', $slug)->first();
        $language->title = $request->title;
        $language->slug = \Str::slug($request->title);
        $language->code = $request->code;
        $language->description = $request->description;
        $language->save();

        return redirect()->route('language.index')
                        ->with('message','Language updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        return $slug;
        $language = Language::where('slug', $slug)->first();

        if ($language) {
            $language->delete();
            return true;
        } else {
            return response()->json(['message' => 'Failed '], 404);
        }
    }
}
