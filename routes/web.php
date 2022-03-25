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
Route::get('my_profile', 'WebController@myProfile')->name('my_profile');
Route::get('login', 'WebController@login')->name('login');
Route::post('user-authenticate', 'WebController@authenticate')->name('user-authenticate');
Route::get('signup', 'WebController@signUp')->name('signup');
Route::post('register/store', 'WebController@store')->name('register.store');
Route::get('email-verification/{token}', 'WebController@verifyEmail')->name('email-verification');

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
//Admin Panel

//Candidate
Route::get('schedule-interview', 'CandidateController@scheduleInterview')->name('schedule-interview');
Route::get('report', 'CandidateController@report')->name('report');
Route::get('test_setup', 'CandidateController@testSetup')->name('test_setup');
Route::get('notifications', 'CandidateController@notifications')->name('notifications');
//Candidate

//Interviewer
Route::get('booked-interviews', 'InterviewerController@bookedInterviews')->name('booked-interviews');
Route::get('blog-resources', 'InterviewerController@resources')->name('blog-resources');
Route::get('buy-credits', 'InterviewerController@buyCredits')->name('buy-credits');
Route::get('refer_and_earn', 'InterviewerController@referAndEarn')->name('refer_and_earn');
//Interviewer

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

//work process
Route::resource('work-process', 'admin\WorkProcessController');

//package
Route::resource('package', 'admin\PackageController');

//team
Route::resource('team', 'admin\TeamController');

//Help & Hire
Route::resource('help', 'admin\HelpHireController');
