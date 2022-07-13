<?php

use Illuminate\Support\Facades\Route;

/*

|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/route-clear', function() {
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    $cache = 'Route cache cleared <br /> View cache cleared <br /> Cache cleared <br /> Config cleared <br /> Config cache cleared';
    return $cache;
});

Route::get('/', 'WebController@index');

Route::get('login', 'WebController@login')->name('login');
Route::post('user-authenticate', 'WebController@authenticate')->name('user-authenticate');
Route::get('signup', 'WebController@signUp')->name('signup');
Route::get('invite/signup/{referral_id}/{invited_user_token?}', 'WebController@inviteSignUp')->name('invite.signup');
Route::post('register/store', 'WebController@store')->name('register.store');
Route::get('email-verification/{token}', 'WebController@verifyEmail')->name('email-verification');

//my profile
Route::get('my_profile', 'WebController@myProfile')->name('my_profile');
Route::post('my_profile/personal_details', 'WebController@personalDetails')->name('my_profile.personal_details');
Route::post('my_profile/qualifications', 'WebController@qualifications')->name('my_profile.qualifications');
Route::post('my_profile/experience', 'WebController@experiences')->name('my_profile.experience');
Route::post('my_profile/resume', 'WebController@resume')->name('my_profile.resume');
Route::post('my_profile/interview', 'WebController@interview')->name('my_profile.interview');
Route::post('my_profile/password', 'WebController@password')->name('my_profile.password');

Route::get('get-child-interview-types', 'WebController@getChildInterviewTypes')->name('get-child-interview-types');
Route::get('get-interviewers', 'WebController@getInterviewers')->name('get-interviewers');
Route::get('get-interviewer-details', 'WebController@getInterviewerDetails')->name('get-interviewer-details');
Route::get('get-interviewer-slots', 'WebController@getInterviewerSlots')->name('get-interviewer-slots');

//change email with verify
Route::post('send_email', 'WebController@sendEmail')->name('send_email');

//dates different calculation
Route::get('calculate-experience', 'WebController@calculateExperience')->name('calculate-experience');

//forgot password
Route::get('forgot-password', 'WebController@forgotPassword')->name('forgot-password');
Route::get('send-password-reset-link', 'WebController@passwordResetLink')->name('send-password-reset-link');
Route::get('reset-password/{token}', 'WebController@resetPassword')->name('reset-password');
Route::post('change-password', 'WebController@changePassword')->name('change-password');

//admin reset password
Route::get('admin/forgot_password', 'admin\AdminController@forgotPassword')->name('admin.forgot_password');
Route::get('admin/send-password-reset-link', 'admin\AdminController@passwordResetLink')->name('admin.send-password-reset-link');
Route::get('admin/reset-password/{token}', 'admin\AdminController@resetPassword')->name('admin.reset-password');
Route::post('admin/change_password', 'admin\AdminController@changePassword')->name('admin.change_password');

//Admin Panel
Route::get('/dashboard', 'admin\HomeController@index')->name('dashboard');
Route::get('/admin/profile/edit', 'admin\AdminController@editProfile')->name('admin.profile.edit');
Route::post('/admin/profile/update', 'admin\AdminController@updateProfile')->name('admin.profile.update');
Route::post('admin/logout', 'admin\AdminController@logOut')->name('admin.logout');

Route::get('get_courses/{slug}', 'admin\CourseController@getCourses')->name('get_courses');
//Admin Panel

//Candidate
Route::get('test_setup', 'CandidateController@testSetup')->name('test_setup');
Route::get('test_webcam', 'CandidateController@testWebcam')->name('test_webcam');
Route::get('notifications', 'CandidateController@notifications')->name('notifications');
Route::get('refer_and_earn', 'CandidateController@referAndEarn')->name('refer_and_earn');
Route::post('invite/store', 'CandidateController@inviteStore')->name('invite.store');

Route::get('next_pre_date', 'BookInterviewController@nextPreDate')->name('next_pre_date');
Route::get('get_booked_interview_ids', 'BookInterviewController@getBookedInterviewIds')->name('get_booked_interview_ids');
Route::get('book_interview/status', 'BookInterviewController@status')->name('book_interview.status');
Route::get('book_interview/review', 'BookInterviewController@review')->name('book_interview.review');
//Candidate

//Interviewers
Route::get('schedule-interview', 'InterviewerController@scheduleInterview')->name('schedule-interview');
Route::get('report', 'InterviewerController@report')->name('report');
Route::get('report/search', 'InterviewerController@reportSearch')->name('report.search');
Route::get('create-slots', 'InterviewerController@createSlot')->name('create-slots');
//Interviewer

//availableslots
Route::post('available_slot.store', 'AvailableSlotDateController@store')->name('available_slot.store');
Route::get('get-slots', 'AvailableSlotDateController@getSlots')->name('get-slots');
Route::get('get_coupon', 'admin\CouponController@getCoupon')->name('get_coupon');
Route::get('remove-coupon', 'admin\CouponController@removeCoupon')->name('remove-coupon');
//availableslots

Route::get('/pay','PaymentLogController@pay')->name('pay');
Route::post('/dopay/online', 'PaymentLogController@handleonlinepay')->name('dopay.online');

//Roles
Route::resource('role', 'admin\RoleController');

//users
Route::resource('user', 'admin\UserController');

//permissions
Route::resource('permission', 'admin\PermissionController');

//setting
Route::resource('setting', 'admin\SettingController');

//sliders
Route::resource('slider', 'admin\SliderController');

//testimonial
Route::resource('testimonial', 'admin\TestimonialController');

//service
Route::resource('service', 'admin\ServiceController');

//category
Route::resource('category', 'admin\CategoryController');

//blog
Route::resource('blog', 'admin\BlogController');

//why_choose
Route::resource('why_choose', 'admin\WhychooseController');

//social media
Route::resource('social_media', 'admin\SocialmediaController');

//pages settings
Route::resource('page', 'admin\PageController');
Route::resource('page_setting', 'admin\PageSettingController');

//advantage
Route::resource('advantage', 'admin\AdvantageMockController');

//how_work
Route::resource('how_work', 'admin\HowWorkController');

//package
Route::resource('package', 'admin\PackageController');

//team
Route::resource('team', 'admin\TeamController');

//Help & Hire
Route::resource('help', 'admin\HelpHireController');

//language
Route::resource('language', 'admin\LanguageController');

//degree
Route::resource('degree', 'admin\DegreeController');

//course
Route::resource('course', 'admin\CourseController');

//Booking Priority
Route::resource('booking_priority', 'admin\BookingPriorityController');

//Interview type
Route::resource('interview_type', 'admin\InterviewTypeController');

//Book interview
Route::resource('book_interview', 'BookInterviewController');

//Book interview
Route::resource('wallet', 'WalletController');

//Coupons
Route::resource('coupon', 'admin\CouponController');

//refferals
Route::resource('referral', 'admin\ReferralController');

//Interview Category
Route::resource('interview_category', 'admin\InterviewCategoryController');