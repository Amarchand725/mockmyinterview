<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserDetail;
use App\Models\Qualification;
use App\Models\QualificationDetail;
use Auth;

class CandidateController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:schedule interview-list|report-list|test setup-list|notifications-list', ['only' => ['scheduleInterview','report', 'testSetup', 'notifications']]);
    }
    public function scheduleInterview()
    {
        $page_title = 'Interview Scheduler';
        return view('web-views.candidate.schedule_interview', compact('page_title'));
    }

    public function report()
    {
        $page_title = 'Report';
        return view('web-views.candidate.report', compact('page_title'));
    }
    public function testSetup()
    {
        $page_title = 'Test Setup';
        return view('web-views.candidate.test-setup', compact('page_title'));
    }
    public function notifications()
    {
        $page_title = 'Notifications';
        return view('web-views.candidate.notifications', compact('page_title'));
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

            $qualify_det = QualificationDetail::create([
                'user_id' => Auth::user()->id,
                'achievements' => $request->achievements,
                'awards' => $request->awards,
                'additional_data' => $request->additional_data,
            ]);

            if(!empty($qualify_det)){
                return redirect()->back()->with('message', 'Qualifications & Details added Successfully.');
            }
        }
    }
    public function experiences(Request $request)
    {
        return $request;
    }
}
