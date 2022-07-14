<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InterviewerInterviewType;
use Auth;

class InterviewerInterviewTypeController extends Controller
{
    public function store(Request $request)
    {
        $validator = $request->validate([
            'parent_ids' => 'required',
            'parent_ids.*' => 'required',
            'child_interview_types' => 'required',
            'child_interview_types.*' => 'required',
        ]);

        try{
            foreach($request->child_interview_types as $parent_id=>$interview_type){
                foreach($interview_type as $child_type_id){
                    InterviewerInterviewType::create([
                        'interviewer_id' => Auth::user()->id,
                        'parent_interview_type_id' => $parent_id,
                        'child__interview_type_id' => $child_type_id,
                    ]);
                }
            }

            return redirect()->back()->with('message', 'You have saved avialable slots successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('Something went wrong '.$e->getMessage());
        }
    }
}
