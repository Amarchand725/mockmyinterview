<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Testimonial;
use App\Models\PageSetting;
use App\Models\AdvantageMock;
use App\Models\Service;
use App\Models\HowWork;
use App\Models\Package;
use App\Models\Team;
use App\Models\HelpHire;
use App\Models\Role;
use App\Models\User;
use App\Models\Language;
use App\Models\Degree;
use App\Models\UserDetail;
use App\Models\Qualification;
use App\Models\QualificationDetail;
use App\Models\Experience;
use App\Models\ExperienceDetail;
use App\Models\Resume;
use App\Models\Skill;
use App\Models\Project;
use Auth;
use Hash;

class WebController extends Controller
{
    public function index()
    {
        $sliders = Slider::orderby('id', 'desc')->where('status', 1)->get();
        $testimonials = Testimonial::orderby('id', 'desc')->where('status', 1)->get();
        $mock_advantages = AdvantageMock::orderby('id', 'desc')->where('status', 1)->get();
        $services = Service::orderby('id', 'desc')->where('status', 1)->get();
        $work_processes = HowWork::orderby('id', 'asc')->where('status', 1)->get();
        $packages = Package::orderby('id', 'asc')->where('status', 1)->get();
        $teams = Team::orderby('id', 'asc')->where('status', 1)->get();
        $helps = HelpHire::orderby('id', 'asc')->where('status', 1)->get();

        return view('index', compact('sliders', 'testimonials', 'mock_advantages', 'services', 'work_processes', 'packages', 'teams', 'helps'));
    }

    //my profile
    public function myProfile()
    {
        $page_title = 'My Profile';
        $languages = Language::where('status', 1)->get();
        $degrees = Degree::where('status', 1)->get(['slug', 'title']);
        if(Auth::check() && Auth::user()->hasRole('Candidate')){
            return view('web-views.candidate.my_profile', compact('page_title', 'degrees'));
        }elseif(Auth::check() && Auth::user()->hasRole('Interviewer')){
            return view('web-views.interviewer.my_profile', compact('page_title', 'languages', 'degrees'));
        }
    }
    public function personalDetails(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:200',
            'last_name' => 'max:200',
            'phone' => 'max:20',
            'skype_id' => 'max:100',
        ]);

        $user = User::where('id', Auth::user()->id)->first();

        if (isset($request->image)) {
            $photo = date('d-m-Y-His').'.'.$request->file('image')->getClientOriginalExtension();
            $request->image->move(public_path('/web/assets/images/user'), $photo);
            $user->image = $photo;
        }

        $user->name = $request->name;
        $user->last_name = $request->last_name;
        $user->phone = $request->phone;
        $user->update();

        if(isset($request->user_type)){
            return redirect()->back()->with('message', 'Details Updated Successfully.');
        }

        if(!empty($user)){
            $user_details = UserDetail::where('user_id', $user->id)->first();
            if(!empty($user_details)){
                $user_details->date_of_birth = $request->date_of_birth;
                $user_details->gender = $request->gender;
                $user_details->address = $request->address;
                $user_details->language_slug = $request->language_slug;
                $user_details->skype_id = $request->skype_id;
                $user_details->save();

                if($user_details){
                    return redirect()->back()->with('message', 'Personal Details Updated Successfully.');
                }
            }else{
                $u_details = UserDetail::create([
                    'user_id' => $user->id,
                    'date_of_birth' => $request->date_of_birth,
                    'gender' => $request->gender,
                    'address' => $request->address,
                    'language_slug' => $request->language_slug,
                    'skype_id' => $request->skype_id,
                ]);

                if($u_details){
                    return redirect()->back()->with('message', 'Personal Details added Successfully.');
                }
            }
        }
    }
    public function qualifications(Request $request)
    {
        $this->validate($request, [
            'achievement' => 'max:500',
            'awards' => 'max:500',
            'additional' => 'max:500',
            'skills' => 'max:1000',
            'projects' => 'max:1000',
        ]);

        $qualifications = Qualification::where('user_id', Auth::user()->id)->get();

        if(isset($request->user_type)){
            $project = Project::where('user_id', Auth::user()->id)->first();
            $skills = Skill::where('user_id', Auth::user()->id)->first();
            if(!empty($project)){
                $project->projects = $request->projects;
                $project->update();
            }else{
                Project::create([
                    'user_id' => Auth::user()->id,
                    'projects' => $request->projects,
                ]);
            }
            if(!empty($skills)){
                $skills->skills = $request->skills;
                $skills->update();
            }else{
                Skill::create([
                    'user_id' => Auth::user()->id,
                    'skills' => $request->skills,
                ]);
            }
        }else{
            $qualify_det = QualificationDetail::where('user_id', Auth::user()->id)->first();
            if(!empty($qualify_det)){
                $qualify_det->achievements = $request->achievements;
                $qualify_det->awards = $request->awards;
                $qualify_det->additional_data = $request->additional_data;
                $qualify_det->update();
            }else{
                QualificationDetail::create([
                    'user_id' => Auth::user()->id,
                    'achievements' => $request->achievements,
                    'awards' => $request->awards,
                    'additional_data' => $request->additional_data,
                ]);
            }
        }

        if(!empty($qualifications)){
            if(!empty($request->institutes)){
                Qualification::where('user_id', Auth::user()->id)->delete();
                foreach($request->institutes as $key=>$institute){
                    if(!empty($institute)){
                        Qualification::create([
                            'user_id' => Auth::user()->id,
                            'institute' => $institute,
                            'degree_slug' => $request->degrees[$key],
                            'course_slug' => $request->courses[$key],
                            'passing_year' => $request->passing_years[$key],
                        ]);
                    }
                }
            }
        }else{
            foreach($request->institutes as $key=>$institute){
                if(!empty($institute)){
                    Qualification::create([
                        'user_id' => Auth::user()->id,
                        'institute' => $institute,
                        'degree_slug' => $request->degrees[$key],
                        'course_slug' => $request->courses[$key],
                        'passing_year' => $request->passing_years[$key],
                    ]);
                }
            }

            if(isset($request->user_type)){
                Project::create([
                    'user_id' => Auth::user()->id,
                    'projects' => $request->projects,
                ]);
            
                Skill::create([
                    'user_id' => Auth::user()->id,
                    'skills' => $request->skills,
                ]);
            }else{
                QualificationDetail::create([
                    'user_id' => Auth::user()->id,
                    'achievements' => $request->achievements,
                    'awards' => $request->awards,
                    'additional_data' => $request->additional_data,
                ]);
            }

            return redirect()->back()->with('message', 'Qualifications & Details added Successfully.');
        }

        return redirect()->back()->with('message', 'Qualifications & Details updated Successfully.');
    }
    public function experiences(Request $request)
    {
        $this->validate($request, [
            'summary' => 'max:500',
            'expertise' => 'max:500',
        ]);

        $experiences = Experience::where('user_id', Auth::user()->id)->get();
        $experience_details = ExperienceDetail::where('user_id', Auth::user()->id)->first();
        if(sizeof($experiences)>0){
            Experience::where('user_id', Auth::user()->id)->delete();
            $total_experiences = 0;
            foreach($request->positions as $key=>$position){
                if($position != ''){
                    Experience::create([
                        'user_id' => Auth::user()->id,
                        'position' => $position,
                        'company' => $request->companies[$key],
                        'joining_date' => date('Y-m-d', strtotime($request->joining_dates[$key])),
                        'leaving_date' => date('Y-m-d', strtotime($request->leaving_date[$key])),
                        'experiences' => $request->experiences[$key],
                    ]);
                }     

                $total_experiences += (float)$request->experiences[$key];
            }
            $experience_details->total_experience = $total_experiences;
            $experience_details->summary = $request->summary;
            $experience_details->expertise = $request->expertise;
            $experience_details->update();

            return redirect()->back()->with('message', 'Experiences & Details updated Successfully.');
        }else{
            $total_experiences = 0;
            foreach($request->positions as $key=>$position){
                if($position != ''){
                    Experience::create([
                        'user_id' => Auth::user()->id,
                        'position' => $position,
                        'company' => $request->companies[$key],
                        'joining_date' => date('Y-m-d', strtotime($request->joining_dates[$key])),
                        'leaving_date' => date('Y-m-d', strtotime($request->leaving_date[$key])),
                        'experiences' => $request->experiences[$key],
                    ]);
                }     

                $total_experiences += (float)$request->experiences[$key];
            }    
            ExperienceDetail::create([
                'user_id' => Auth::user()->id,
                'total_experience' => $total_experiences,
                'summary' => $request->summary,
                'expertise' => $request->expertise,
            ]);

            return redirect()->back()->with('message', 'Experiences & Details added Successfully.');
        }
    }
    public function resume(Request $request)
    {
        $resume = Resume::where('user_id', Auth::user()->id)->first();
        if(!empty($resume)){
            if (isset($request->resume)) {
                $upload_resume = date('d-m-Y-His').'.'.$request->file('resume')->getClientOriginalExtension();
                $request->resume->move(public_path('/web/assets/resumes'), $upload_resume);
                $resume->resume = $upload_resume;
            }
            if (isset($request->introduction_video)) {
                $introduction_video = date('d-m-Y-His').'.'.$request->file('introduction_video')->getClientOriginalExtension();
                $request->introduction_video->move(public_path('/web/assets/resumes'), $introduction_video);
                $resume->introduction_video = $introduction_video;
            }

            $resume->linkedin_url = $request->linkedin_url;
            $resume->update();

            return redirect()->back()->with('message', 'Resume updated Successfully.');        
        }else{
            $resume = new Resume();
            if (isset($request->resume)) {
                $upload_resume = date('d-m-Y-His').'.'.$request->file('resume')->getClientOriginalExtension();
                $request->resume->move(public_path('/web/assets/resumes'), $upload_resume);
                $resume->resume = $upload_resume;
            }
            if (isset($request->introduction_video)) {
                $introduction_video = date('d-m-Y-His').'.'.$request->file('introduction_video')->getClientOriginalExtension();
                $request->introduction_video->move(public_path('/web/assets/resumes'), $introduction_video);
                $resume->introduction_video = $introduction_video;
            }

            $resume->user_id = Auth::user()->id;
            $resume->linkedin_url = $request->linkedin_url;
            $resume->save();

            return redirect()->back()->with('message', 'Resume added Successfully.');            
        }
    }
    public function interview(Request $request)
    {
        $resume = Resume::where('user_id', Auth::user()->id)->first();
        if(!empty($resume)){
            $resume->technical = $request->technical;
            $resume->hr = $request->hr;
            $resume->update();

            return redirect()->back()->with('message', 'Interview Type Updated Successfully.'); 
        }else{
            $model = Resume::create([
                'user_id' => Auth::user()->id,
                'technical' => $request->technical,
                'hr' => $request->hr,
            ]);

            if(!empty($model)){
                return redirect()->back()->with('message', 'Interview Type Added Successfully.');
            }
        }
    }
    public function password(Request $request)
    {
        $this->validate($request, [
            'password' => 'required',
            'new_password' => 'required|max:8|same:confirmed|different:password',
        ]);

        $user = User::where('email', Auth::user()->email)->first();
        
        if (Hash::check($request->password, $user->password)) { 
           $user->fill([
            'password' => Hash::make($request->new_password)
            ])->save();
        
            return redirect()->back()->with('message', 'You have updated your password successfully!');
        
        } else {
            return redirect()->back()->with('error', 'Did not match current password!');
        }
    }
    //my profile

    //Calculating two dates differenct
    public function calculateExperience(Request $request)
    {
        $joining_date = $request->joining_date;
        $leaving_date = $request->leaving_date;
        $joining=new DateTime($leaving_date); 
        $leaving=new DateTime($joining_date);                                  
        $Months = $leaving->diff($joining); 
        return $experience = $Months->y.'.'.$Months->m;
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

        do{
            $user_id = rand(1000, 9999);
        }while(User::where('user_id', $user_id)->first());

        $input = $request->all();
        $input['user_id'] = $user_id;
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
            if(!empty($user->temprary_email)){
                $user->email = $user->temprary_email;
                $user->temprary_email = null;
            }
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
    public function passwordResetLink(Request $request)
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

            $details = [
                'from' => 'password-reset',
                'title' => "Hello!",
                'body' => "You are receiving this email because we recieved a password reset request for your account.",
                'verify_token' => $user->verify_token,
            ];

            \Mail::to($user->email)->send(new \App\Mail\Email($details));

            return redirect()->route('login')->with('message', 'We have emailed your password reset link!');
        }else{
            return redirect()->back()->with('error', 'Your email address is not matched.');
        }
    }
    public function resetPassword($verify_token)
    {
        $page_title = 'Reset Password';
        return view('web-views.login.change-password', compact('page_title', 'verify_token'));
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
    public function sendEmail(Request $request)
    {
        if(!isset($request->type)){
            $this->validate($request, [
                'email' => 'required|email|unique:users,email',
            ]);
        }
        
        $user = User::where('email', Auth::user()->email)->first();

        do{
            $verify_token = uniqid();
        }while(User::where('verify_token', $verify_token)->first());

        $user->temprary_email = $request->email;
        $user->verify_token = $verify_token;
        $user->update();

        $details = [
            'from' => 'verify',
            'title' => "We have recieved update email request. First, you need to confirm your account. Just press the button below.",
            'body' => "If you have any questions, just reply to this email—we're always happy to help out.",
            'verify_token' => $user->verify_token,
        ];

        \Mail::to($request->email)->send(new \App\Mail\Email($details));

        return redirect()->back()->with('message', 'We have sent verification email. Click on link and get activation');
    }
}
