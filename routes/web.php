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

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/login', 'loginController@index')->name('login')->middleware('guest');
Route::post('/login-create', 'loginController@authenticate');
Route::post('/logout', 'loginController@logout');
Route::get('/register', 'loginController@registerPage')->middleware('guest');
Route::get('/register-employer', 'loginController@registerEmployer')->middleware('guest');
Route::get('/register-jobseeker', 'loginController@registerJobseeker')->middleware('guest');
Route::post('/register-create-employer', 'loginController@createEmployer')->middleware('guest');
Route::post('/register-create-jobseeker', 'loginController@createJobseeker')->middleware('guest');

Route::get('/', 'HomeController@index')->middleware('guest');
Route::get('/home', 'HomeController@index')->middleware('guest');

Route::get('/admin/home', 'adminHomeController@index')->middleware('auth');
Route::post('/admin/reset-user-password', 'adminHomeController@resetPw')->middleware('auth');

Route::get('/jobseeker/home', 'jobseekerHomeController@index')->middleware('auth');
Route::get('/jobseeker/profile', 'jobseekerProfileController@index')->middleware('auth');
Route::get('/jobseeker/search-jobs', 'jobseekerSearchjobsController@index')->middleware('auth');
Route::get('/jobseeker/notif', 'jobseekerNotifController@index')->middleware('auth');

Route::get('/employer/home', 'employerHomeController@index')->middleware('auth');
Route::get('/employer/applicants', 'employerApplicantsController@index')->middleware('auth');
Route::get('/employer/input-jobs', 'employerInputjobsController@index')->middleware('auth');
Route::get('/employer/your-vacancies', 'employerYourvacanciesController@index')->middleware('auth');

Route::post('/employer/input-jobs', 'employerInputjobsController@inputjob')->middleware('auth');
Route::post('/employer/view-applicants', 'employerApplicantsController@applicantsView')->middleware('auth');
Route::post('/employer/proceed', 'employerApplicantsController@proceed')->middleware('auth');
Route::post('/employer/dismiss-process', 'employerApplicantsController@dismissProcess')->middleware('auth');
Route::post('/employer/delete-job', 'employerYourvacanciesController@delete')->middleware('auth');

Route::post('/jobseeker/insert-profile', 'jobseekerProfileController@insert')->middleware('auth');
Route::post('/jobseeker/detail', 'jobseekerSearchJobsController@detail')->middleware('auth');
Route::post('/jobseeker/form-application', 'jobseekerSearchJobsController@form')->middleware('auth');
Route::post('/jobseeker/submit', 'jobseekerSearchJobsController@submit')->middleware('auth');
