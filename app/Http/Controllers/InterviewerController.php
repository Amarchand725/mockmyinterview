<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InterviewerController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:booked interviews-list|resources-list|buy & credits-list|refer & earn-list', ['only' => ['bookedInterviews','resources','buyCredits','referAndEarn']]);
    }
    public function bookedInterviews()
    {
        $page_title = 'Booked Interviews';
        return view('web-views.interviewer.booked-interviews', compact('page_title'));
    }
    public function resources()
    {
        $page_title = 'Resources';
        return view('web-views.interviewer.resources', compact('page_title'));
    }
    public function buyCredits()
    {
        $page_title = 'Buy & Credits';
        return view('web-views.interviewer.buy_credits', compact('page_title'));
    }
    public function referAndEarn()
    {
        $page_title = 'Refer & Earn';
        return view('web-views.interviewer.refer_earn', compact('page_title'));
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
        $user->name = $request->name;
        $user->last_name = $request->last_name;
        $user->phone = $request->phone;
        $user->update();

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
        ]);

        $qualifications = Qualification::where('user_id', Auth::user()->id)->get();
        $qualify_det = QualificationDetail::where('user_id', Auth::user()->id)->first();
        if(!empty($qualifications) || !empty($qualify_det)){
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
            
            if(!empty($qualify_det)){
                $qualify_det->achievements = $request->achievements;
                $qualify_det->awards = $request->awards;
                $qualify_det->additional_data = $request->additional_data;
                $qualify_det->update();
            }else{
                $qualify_det = QualificationDetail::create([
                    'user_id' => Auth::user()->id,
                    'achievements' => $request->achievements,
                    'awards' => $request->awards,
                    'additional_data' => $request->additional_data,
                ]);
            }

            if(!empty($qualify_det)){
                return redirect()->back()->with('message', 'Qualifications & Details updated Successfully.');
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

            QualificationDetail::create([
                'user_id' => Auth::user()->id,
                'achievements' => $request->achievements,
                'awards' => $request->awards,
                'additional_data' => $request->additional_data,
            ]);

            return redirect()->back()->with('message', 'Qualifications & Details added Successfully.');
        }
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
                $upload_resume = $request->file('resume')->getClientOriginalName();
                $request->resume->move(public_path('/web/assets/resumes'), $upload_resume);
                $resume->resume = $upload_resume;
            }
            if (isset($request->introduction_video)) {
                $introduction_video = $request->file('introduction_video')->getClientOriginalName();
                $request->introduction_video->move(public_path('/web/assets/resumes'), $introduction_video);
                $resume->introduction_video = $introduction_video;
            }

            $resume->linkedin_url = $request->linkedin_url;
            $resume->update();

            return redirect()->back()->with('message', 'Resume updated Successfully.');        
        }else{
            $resume = new Resume();
            if (isset($request->resume)) {
                $upload_resume = $request->file('resume')->getClientOriginalName();
                $request->resume->move(public_path('/web/assets/resumes'), $upload_resume);
                $resume->resume = $upload_resume;
            }
            if (isset($request->introduction_video)) {
                $introduction_video = $request->file('introduction_video')->getClientOriginalName();
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
            'current_password' => 'required',
            'password' => 'required|min:8|same:confirm-password',
        ]);

        $user = User::where('email', Auth::user()->email)->first();
        if(!empty($user)){
            $user->password = Hash::make($request->password);
            $user->update();
            
            return redirect()->back()->with('message', 'You have updated your password successfully!');
        }else{
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }
    public function calculateExperience(Request $request)
    {
        $joining_date = $request->joining_date;
        $leaving_date = $request->leaving_date;
        $joining=new DateTime($leaving_date); 
        $leaving=new DateTime($joining_date);                                  
        $Months = $leaving->diff($joining); 
        return $experience = $Months->y.'.'.$Months->m;
    }
}
