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

Route::get('/', 'WebController@index');

Route::get('login', 'WebController@login')->name('login');
Route::post('user-authenticate', 'WebController@authenticate')->name('user-authenticate');
Route::get('signup', 'WebController@signUp')->name('signup');
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
// Route::get('book-interview', 'CandidateController@bookInterview')->name('book-interview');
Route::get('report', 'CandidateController@report')->name('report');
Route::get('test_setup', 'CandidateController@testSetup')->name('test_setup');
Route::get('test_webcam', 'CandidateController@testWebcam')->name('test_webcam');
Route::get('notifications', 'CandidateController@notifications')->name('notifications');
Route::get('next_pre_date', 'BookInterviewController@nextPreDate')->name('next_pre_date');
Route::get('get_booked_interview_ids', 'BookInterviewController@getBookedInterviewIds')->name('get_booked_interview_ids');
//Candidate

//Interviewers
Route::get('schedule-interview', 'InterviewerController@scheduleInterview')->name('schedule-interview');
Route::get('blog-resources', 'InterviewerController@resources')->name('blog-resources');
Route::get('blog/single/{slug}', 'InterviewerController@singleBlog')->name('blog.single');
Route::get('buy-credits', 'InterviewerController@buyCredits')->name('buy-credits');
Route::get('refer_and_earn', 'InterviewerController@referAndEarn')->name('refer_and_earn');
//Interviewer

//availableslots
Route::post('available_slot.store', 'AvailableSlotDateController@store')->name('available_slot.store');
Route::get('get-slots', 'AvailableSlotDateController@getSlots')->name('get-slots');
//availableslots

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
