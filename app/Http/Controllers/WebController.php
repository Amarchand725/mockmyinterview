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

    public function login()
    {
        if(Auth::check()){
            return redirect()->route('dashboard');
        }
        $page_title = 'Log In';
        $page_settings = PageSetting::get(['parent_slug', 'key', 'value']);
        $home_page_data = [];
        foreach ($page_settings as $key => $page_setting) {
            $home_page_data[$page_setting->key] = $page_setting->value;
        }
        return view('web-views.login.login', compact('page_title', 'home_page_data'));
    }
    public function signUp()
    {
        $page_title = 'Sign Up';
        $page_settings = PageSetting::get(['parent_slug', 'key', 'value']);
        $home_page_data = [];
        foreach ($page_settings as $key => $page_setting) {
            $home_page_data[$page_setting->key] = $page_setting->value;
        }
        $roles = Role::where('name', '!=', 'Admin')->get(['name']);
        return view('web-views.login.signup', compact('page_title', 'home_page_data', 'roles'));
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
}
