<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Permission;
use DB;
use Illuminate\Support\Str;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Permission::orderby('id','DESC')->paginate(10);
        return view('admin.permission.index', compact('permissions'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permission = Permission::get();
        $page_title = 'Add Permission';
        return view('admin.permission.create',compact('permission', 'page_title'));
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
        ]);

        $bool = false;
        if(!empty($request->permissions)){
            foreach($request->permissions as $permission){
                $ifnotfound = Permission::where('name', Str::lower($request->name).'-'.$permission)->first();
                if(empty($ifnotfound)){
                    Permission::create([
                        'name' => Str::lower($request->name).'-'.$permission, 
                        'guard_name' => 'web'
                    ]);
                }else{
                    $bool = true;
                }
            }
        }else{
            $bool = false;
            Permission::create([
                'name' => str_replace('-', ' ', Str::lower($request->name)), 
                'guard_name' => 'web'
            ]);
        }

        if($bool){
            return redirect()->route('permission.index')
            ->with('success','You have already available these permission.');
        }
    
        return redirect()->route('permission.index')
                        ->with('success','Permission created successfully');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Permission::find($id);
        $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
            ->where("role_has_permissions.role_id",$id)
            ->get();
    
        return view('roles.show',compact('role','rolePermissions'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permission = Permission::find($id);
        $page_title = 'Edit Permission';
    
        return view('admin.permission.edit',compact('permission', 'page_title'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $permission_id)
    {
        $this->validate($request, [
            'name' => 'required',
            'guard_name' => 'required',
        ]);
    
        $permission = Permission::find($permission_id);
        $permission->name = $request->name;
        $permission->guard_name = $request->guard_name;
        $permission->save();
    
        return redirect()->route('permission.index')
                        ->with('success','Permission updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ifdeleted = DB::table("permissions")->where('id', $id)->delete();
        if($ifdeleted){
            return true;
        }
    }
}
