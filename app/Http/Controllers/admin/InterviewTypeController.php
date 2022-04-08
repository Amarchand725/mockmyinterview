<?php

namespace App\Http\Controllers\admin;

use App\Models\InterviewType;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InterviewTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:interview type-list|interview type-create|interview type-edit|interview type-delete', ['only' => ['index','store']]);
        $this->middleware('permission:interview type-create', ['only' => ['create','store']]);
        $this->middleware('permission:interview type-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:interview type-delete', ['only' => ['destroy']]);
    }
    public function index(Request $request)
    {
        if($request->ajax()){
            $query = InterviewType::orderby('id', 'desc')->where('id', '>', 0);
            if($request['search'] != ""){
                $query->where('name', 'like', '%'. $request['search'] .'%')
                    ->orWhere('last_name', 'like', '%'. $request['search'].'%')
                    ->orWhere('phone', 'like', '%'. $request['search'].'%')
                    ->orWhere('email', 'like', '%'. $request['search'].'%');
            }
            if($request['status']!="All"){
                if($request['status']==2){
                    $request['status'] = 0;
                }
                $query->where('status', $request['status']);
            }
            $users = $query->paginate(10);
            return (string) view('admin.interview_types.search', compact('users'));
        }
        $page_title = 'All Users';
        $users = InterviewType::orderBy('id','DESC')->paginate(10);
        return view('admin.interview_types.index', compact('users','page_title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_title = 'Add User';
        $roles = Role::orderby('id', 'desc')->get(['name', 'id']);
        return view('admin.interview_types.create',compact('roles','page_title'));
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
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required'
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $user = InterviewType::create($input);
        $user->assignRole($request->input('roles'));

        return redirect()->route('interview_types.index')
                        ->with('message','User created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\InterviewType  $interviewType
     * @return \Illuminate\Http\Response
     */
    public function show(InterviewType $interviewType)
    {
        $user = InterviewType::find($id);
        return view('users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\InterviewType  $interviewType
     * @return \Illuminate\Http\Response
     */
    public function edit(InterviewType $interviewType)
    {
        $page_title = 'Edit User';
        $user = InterviewType::with('roles')->find($id);
        $roles = Role::orderby('id', 'desc')->get(['name', 'id']);
        $userRole = $user->roles->pluck('name','name')->all();
        return view('admin.interview_types.edit',compact('user','roles','userRole', 'page_title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\InterviewType  $interviewType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InterviewType $interviewType)
    {
        $this->validate($request, [
            'name' => 'required|max:200',
            'email' => 'required|max:200|email|unique:users,email,'.$id,
            'password' => 'same:confirm-password',
            'roles' => 'required'
        ]);

        $input = $request->all();
        if(!empty($input['password'])){
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input,array('password'));
        }

        $user = InterviewType::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id', $id)->delete();

        $user->assignRole($request->input('roles'));

        return redirect()->route('interview_types.index')
                        ->with('message','User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InterviewType  $interviewType
     * @return \Illuminate\Http\Response
     */
    public function destroy(InterviewType $interviewType)
    {
        $ifdeleted = InterviewType::find($id)->delete();
        if($ifdeleted){
            return true;
        }
    }
}
