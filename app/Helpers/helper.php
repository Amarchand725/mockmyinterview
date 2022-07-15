<?php 
use App\Models\PageSetting;
use App\Models\Course;
use App\Models\Notification;
use App\Models\Blog;
use App\Models\BookInterview;
use App\Models\AvailableSlot;
use App\Models\InterviewType;
use App\Models\InterviewerInterviewType;
use Illuminate\Support\Facades\DB;

function globalData()
{
    $page_settings = PageSetting::get(['parent_slug', 'key', 'value']);
    $home_page_data = [];
    foreach ($page_settings as $key => $page_setting) {
        $home_page_data[$page_setting->key] = $page_setting->value;
    }
    return $home_page_data;
}

function courses($degree)
{
    return $courses = Course::where('degree_slug', $degree)->get(['degree_slug', 'title', 'slug']);
}

function notification($created_by, $notify_id, $type, $message){
    Notification::create([
        'created_by' => $created_by,
        'notify_id' => $notify_id,
        'notify_type' => $type,
        'message' => $message,
    ]);
}

function getNotifications()
{
    return Notification::with('hasReadNotification')->orderby('id', 'desc')->get();
}

function getNotify($notify_id, $notify_type)
{
    if($notify_type=='blog'){
        return Blog::where('id', $notify_id)->first();
    }elseif($notify_type=='book_interview'){
        return BookInterview::where('id', $notify_id)->first();
    }
}

function getSlot($interviewer_id, $start_time){
    return DB::table('available_slot_dates')
    ->select('available_slots.*')
    ->join('available_slots', 'available_slot_dates.id', '=', 'available_slots.available_slot_date_id')
    ->where('available_slot_dates.interviewer_id', $interviewer_id)
    ->where('available_slots.slot', 'like', date('Y-m-d H', strtotime($start_time)).'%')
    ->first();
}

function getChildInterviewTypes($parent_id){
    return InterviewType::where('parent_id', $parent_id)->get();
}

function getInterviewerChildInterviewTypes($parent_id){
    return InterviewerInterviewType::where('parent_interview_type_id', $parent_id)->get();
}