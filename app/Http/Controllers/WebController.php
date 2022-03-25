<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Testimonial;
use App\Models\PageSetting;
use App\Models\AdvantageMock;
use App\Models\Service;
use App\Models\WorkProcess;
use App\Models\Package;
use App\Models\Team;
use App\Models\HelpHire;
use App\Models\Role;
use Auth;
use App\Models\User;
use Hash;

class WebController extends Controller
{
    public function index()
    {
        $sliders = Slider::orderby('id', 'desc')->where('status', 1)->get();
        $testimonials = Testimonial::orderby('id', 'desc')->where('status', 1)->get();
        $mock_advantages = AdvantageMock::orderby('id', 'desc')->where('status', 1)->get();
        $services = Service::orderby('id', 'desc')->where('status', 1)->get();
        $work_processes = WorkProcess::orderby('id', 'asc')->where('status', 1)->get();
        $packages = Package::orderby('id', 'asc')->where('status', 1)->get();
        $teams = Team::orderby('id', 'asc')->where('status', 1)->get();
        $helps = HelpHire::orderby('id', 'asc')->where('status', 1)->get();

        return view('index', compact('sliders', 'testimonials', 'mock_advantages', 'services', 'work_processes', 'packages', 'teams', 'helps'));
    }
    public function myProfile()
    {
        $page_title = 'My Profile';
        if(Auth::check() && Auth::user()->hasRole('Candidate')){
            return view('web-views.candidate.my_profile', compact('page_title'));
        }elseif(Auth::check() && Auth::user()->hasRole('Interviewer')){
            return view('web-views.interviewer.my_profile', compact('page_title'));
        }
    }
    public function login()
    {
        if(Auth::check()){
            return redirect()->route('dashboard');
        }
        $page_title = 'Log In';
        return view('web-views.login.login', compact('page_title'));
    }

    public function authenticate(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if(!empty($user) && $user->status==1 && $user->hasRole($request->user_type)){
            $credentials = $request->only('email', 'password');

            if (Auth::attempt($credentials)) {
                return redirect()->route('dashboard');
            }
            return redirect()->back()->with('error', 'Failed to login try again.!');
        }elseif(!empty($user) && $user->status==0){
            return redirect()->back()->with('error', 'Your account is not active verify your email we have sent you verification link.!');
        }else{
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }
    public function signUp()
    {
        $page_title = 'Sign Up';
        $roles = Role::where('name', '!=', 'Admin')->get(['name']);
        return view('web-views.login.signup', compact('page_title', 'roles'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
        ]);

        do{
            $verify_token = uniqid();
        }while(User::where('verify_token', $verify_token)->first());
        $input = $request->all();
        $input['verify_token'] = $verify_token;
        $input['password'] = Hash::make($input['password']);
        $user = User::create($input);
        $user->assignRole($request->input('role'));

        $details = [
            'from' => 'verify',
            'title' => "We're excited to have you get started. First, you need to confirm your account. Just press the button below.",
            'body' => "If you have any questions, just reply to this email—we're always happy to help out.",
            'verify_token' => $user->verify_token,
        ];
       
        \Mail::to($user->email)->send(new \App\Mail\Email($details));

        return redirect()->back()->with('message', 'We have sent verification email. Click on link and get activation');
    }
    public function verifyEmail($token)
    {
        $user = User::where('verify_token', $token)->first();
        if(!empty($user)){
            $user->verify_token = null;
            $user->email_verified_at = date('Y-m-d H:i:s');
            $user->update();

            return redirect()->route('login')->with('message', 'You are welcome. You can login from here.');
        }else{
            return redirect()->back()->with('error', 'Your token is expired');
        }
    }

    //Reset password
    public function forgotPassword()
    {
        $page_title = 'Forgot Password';
        return view('web-views.login.forgot-password', compact('page_title'));
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
            return view('web-views.login.change-password', compact('page_title', 'verify_token'));
        }else{
            return redirect()->back()->with('error', 'Your email address is not matched.');
        }
    }
    public function changePassword(Request $request)
    {
        $this->validate($request, [
            'password' => 'required|same:confirm-password',
        ]);

        $user = User::where('verify_token', $request->verify_token)->where('status', 1)->first();
        $user->password = Hash::make($request->password);
        $user->verify_token = null;
        $user->update();

        if($user){
            return redirect()->route('login')->with('message', 'You have updated password. You can login again.');
        }else{
            return redirect()->back()->with('error', 'Something went wrong try again');
        }
    }
}