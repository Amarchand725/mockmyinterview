<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use App\Models\BookInterview;
use App\Models\BookingPriority;
use App\Models\InterviewerWallet;
use App\Models\Log;
use Illuminate\Http\Request;
use Auth;

class RatingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'title' => 'required',
            'review' => 'required',
        ]);

        try{
            $model = Rating::create([
                'interview_id' => $request->interview_id,
                'title' => $request->title,
                'course_id' => $request->course_id,
                'description' => $request->review,
            ]);

            if($model){
                $interview = BookInterview::where('id', $request->interview_id)->first();

                //booking priority credits
                $credits = BookingPriority::where('slug', $interview->booking_type_slug)->first();
                //transfer credits to interviewer wallet.
                $interviewer_wallet = InterviewerWallet::where('interviewer_id', $interview->interviewer_id)->first();
                if(empty($interviewer_wallet)){
                    $interviewer_wallet = new InterviewerWallet();
                    $interviewer_wallet->interviewer_id = $interview->interviewer_id;
                    $interviewer_wallet->booking_id = $interview->id;
                    $interviewer_wallet->last_balance_credits = 0;
                    $interviewer_wallet->total_credits = $credits->credits;
                    $interviewer_wallet->save();
                }else{
                    $interviewer_wallet->booking_id = $interview->id;
                    $interviewer_wallet->last_balance_credits = $interviewer_wallet->total_credits;
                    $interviewer_wallet->total_credits = $interviewer_wallet->total_credits+$credits->credits;
                    $interviewer_wallet->save();
                }

                if($interviewer_wallet){
                    Log::create([
                        'booked_interview_id' => $interview->id,
                        'interviewer_id' => $interview->interviewer_id,
                        'candidate_id' => Auth::user()->id,
                        'credits' => $credits->credits,
                        'type' => 'returned',
                        'description' => 'Return credits due to rejection.',
                    ]);

                    // $message = 'Scheduled interview has been completed & closed.';
                    // notification(Auth::user()->id, $booked_interview->id, 'book_interview', $message);
                }

                return 'success';
            }else{
                return 'failed';
            }
        } catch (\Exception $e) {
            return 'failed';
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function show($interview_id)
    {
        $model = Rating::where('interview_id', $interview_id)->first();
        return (string) view('web-views.candidate.rating-show', compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function edit(Rating $rating)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rating $rating)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rating $rating)
    {
        //
    }
}
