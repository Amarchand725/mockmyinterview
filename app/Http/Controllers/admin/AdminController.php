<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Hash;

class AdminController extends Controller
{
    public function editProfile()
    {
        return view('admin.dashboard.edit');
    }

    public function updateProfile(Request $request)
    {   
        $user = User::where('id', Auth::user()->id)->first();
        $user->name = $request->name;

        if(empty($request->name)){
            $this->validate($request, [
                'name' => 'required',
            ]);
        }

        if(isset($request->password)){
            $this->validate($request, [
                'name' => 'required',
                'password' => 'required|same:confirm-password',
            ]);          
            
            $user->password = Hash::make($request->password);
        }

        $user->update();
        return redirect()->back()
        ->with('message','Profile updated successfully');
    }
    public function logOut()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }

    //Password reset
    public function resetPassword()
    {
        $page_title = 'Reset Password';
        return view('auth.passwords.reset-password', compact('page_title'));
    }
    public function verifyAccount(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
        ]);

        $user = User::where('email', $request->email)->where('status', 1)->first();
        if(!empty($user)){
            $page_title = 'Change Password';
            do{
                $verify_token = uniqid();
            }while(User::where('verify_token', $verify_token)->first());

            $user->verify_token = $verify_token;
            $user->update();

            return view('auth.passwords.change-password', compact('page_title', 'verify_token'));
        }else{
            return redirect()->back()->with('error', 'Your account not found.');
        }
    }
    public function changePassword(Request $request)
    {
        $this->validate($request, [
            'password' => 'required|same:confirm-password',
        ]);

        $user = User::where('verify_token', $request->verify_token)->first();
        $user->password = Hash::make($request->password);
        $user->verify_token = null;
        $user->update();

        if($user){
            return redirect()->route('admin.login')->with('message', 'You have updated password. You can login again.');
        }else{
            return redirect()->back()->with('error', 'Something went wrong try again');
        }
    }
}
