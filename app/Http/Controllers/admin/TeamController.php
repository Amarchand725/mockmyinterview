<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;
use Auth;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:team-list|team-create|team-edit|team-delete', ['only' => ['index','store']]);
        $this->middleware('permission:team-create', ['only' => ['create','store']]);
        $this->middleware('permission:team-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:team-delete', ['only' => ['destroy']]);
    }
    public function index(Request $request)
    {
        if($request->ajax()){
            $query = Team::orderby('id', 'desc')->where('id', '>', 0);
            if($request['search'] != ""){
                $query->where('first_name', 'like', '%'. $request['search'] .'%')
                    ->orWhere('last_name', 'like', '%'. $request['search'] .'%');
            }
            if($request['status']!="All"){
                if($request['status']==2){
                    $request['status'] = 0;
                }
                $query->where('status', $request['status']);
            }
            $models = $query->paginate(1);
            return (string) view('admin.team.search', compact('models'));
        }
        $page_title = 'All Team Members';
        $models = Team::orderby('id', 'desc')->paginate(1);
        return View('admin.team.index', compact("models", "page_title"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_title = 'Add Team Member';
        return View('admin.team.create', compact('page_title'));
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
            'first_name' => 'required|max:255',
            'designation' => 'required|max:255',
            'description' => 'required|max:255',
            'image' => 'mimes:jpeg,jpg,png,gif|required|max:10000' // max 10000kb
        ]);

        $model = new Team();

        if (isset($request->image)) {
            $photo = $request->file('image')->getClientOriginalName();
            $request->image->move(public_path('/admin/assets/images/team'), $photo);
            $model->image = $photo;
        }

        $model->created_by = Auth::user()->id;
        $model->first_name = $request->first_name;
        $model->last_name = $request->last_name;
        $model->slug = \Str::slug($request->first_name);
        $model->designation = $request->designation;
        $model->twitter_link = $request->twitter_link;
        $model->facebook_link = $request->facebook_link;
        $model->instagram_link = $request->instagram_link;
        $model->linkedin_link = $request->linkedin_link;
        $model->description = $request->description;
        $model->save();

        return redirect()->route('team.index')->with('message', 'Team Member Added Successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $page_title = 'Edit Team Member';
        $model = Team::where('slug', $slug)->first();
        return View('admin.team.edit', compact("model", "page_title"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $validator = $request->validate([
            'first_name' => 'required|max:255',
            'designation' => 'required|max:255',
            'description' => 'required|max:255',
        ]);

        $update = Team::where('slug', $slug)->first();

        if (isset($request->image)) {
            $photo = $request->file('image')->getClientOriginalName();
            $request->image->move(public_path('/admin/assets/images/team'), $photo);
            $update->image = $photo;
        }

        $update->first_name = $request->first_name;
        $update->last_name = $request->last_name;
        $update->slug = \Str::slug($request->first_name);
        $update->designation = $request->designation;
        $update->twitter_link = $request->twitter_link;
        $update->facebook_link = $request->facebook_link;
        $update->instagram_link = $request->instagram_link;
        $update->linkedin_link = $request->linkedin_link;
        $update->description = $request->description;
        $update->status = $request->status;
        $update->update();

        return redirect()->route('team.index')->with('message', 'Team Member Updated Successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $team = Team::where('slug', $slug)->first();
        if ($team) {
            $team->delete();
            return true;
        } else {
            return response()->json(['message' => 'Failed '], 404);
        }
    }
}
