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

/*Route::get('/', function () {
    return view('welcome');
});*/

// example Laravel 8.^ (ignore)
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('/','OutplacementherosController@index');
Route::get('/', [App\Http\Controllers\OutplacementherosController::class, 'index']);
//Route::view('/','welcome');


Auth::routes();
// Auth::routes(['verify' => true]);

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/mymessages', 'HomeController@inbox')->name('my.messages');
Route::get('/mymessages', [App\Http\Controllers\HomeController::class, 'inbox'])->name('my.messages');
// Route::get('/message/{id}', 'HomeController@getMessage')->name('message');
Route::get('/message/{id}', [App\Http\Controllers\HomeController::class, 'getMessage'])->name('message');
// Route::post('message', 'HomeController@sendMessage');
Route::post('message', [App\Http\Controllers\HomeController::class, 'sendMessage']);

//Route::get('/','JobController@index');
// Route::get('/jobs/create','JobController@create')->name('job.create');
Route::get('/jobs/create', [App\Http\Controllers\HomeController::class, 'sendMessage']);
// Route::post('/jobs/create','JobController@store')->name('job.store');
Route::post('/jobs/create', [App\Http\Controllers\HomeController::class, 'sendMessage']);
// Route::get('/jobs/my-job','JobController@myjob')->name('my.job');
Route::get('/jobs/my-job', [App\Http\Controllers\HomeController::class, 'sendMessage']);
// Route::get('/jobs/my-job/{id}/toggle','JobController@toggle')->name('job.toggle');//change job status in an instant!
Route::get('/jobs/my-job/{id}/toggle', [App\Http\Controllers\HomeController::class, 'sendMessage']);

// Route::get('/jobs/my-job/{id}/edit','JobController@edit')->name('job.edit');//checked
Route::get('/jobs/my-job/{id}/edit', [App\Http\Controllers\JobController::class, 'edit'])->name('job.edit');
// Route::post('/jobs/my-job/{id}/edit','JobController@update')->name('job.update');
Route::post('/jobs/my-job/{id}/edit', [App\Http\Controllers\JobController::class, 'update'])->name('job.update');
// Route::post('/jobs/my-job/{id}/delete','JobController@destroy')->name('job.destroy');
Route::post('/jobs/my-job/{id}/delete', [App\Http\Controllers\JobController::class, 'destroy'])->name('job.destroy');
// Route::get('/jobs/my-job/applications','JobController@applicant')->name('applicant');//list all applicants of company
Route::get('/jobs/my-job/applications', [App\Http\Controllers\JobController::class, 'applicant'])->name('applicant');
// Route::get('/jobs/my-job/{id}/{job}','JobController@showApplicants')->name('jobs.applicant');//list applicants of A job//checked
Route::get('/jobs/my-job/{id}/{job}', [App\Http\Controllers\JobController::class, 'showApplicants'])->name('jobs.applicant');
// Route::get('/jobs/alljobs','JobController@allJobs')->name('alljobs'); //experimental, but works!!! for job-search support volunteer?
Route::get('/jobs/alljobs', [App\Http\Controllers\JobController::class, 'allJobs'])->name('alljobs');
// Route::get('/jobs/{id}/{job}','JobController@show')->name('jobs.show'); //Apply at this JD link
Route::get('/{id}/{job}', [App\Http\Controllers\JobController::class, 'show'])->name('jobs.show');
// Route::post('/applications/{id}','JobController@apply')->name('apply');
//save and unsave job (seeker)
Route::get('/applications/{id}', [App\Http\Controllers\JobController::class, 'apply'])->name('apply');
// Route::post('/save/{id}','FavouriteController@saveJob');
Route::get('/save/{id}', [App\Http\Controllers\JobController::class, 'saveJob']);
// Route::post('/unsave/{id}','FavouriteController@unSaveJob');
Route::get('/unsave/{id}', [App\Http\Controllers\JobController::class, 'unSaveJob']);


//hiring employer register
Route::view('employer-register','auth.employer-register')->name('employer.register');

Route::post('employer-register', [App\Http\Controllers\EmployerRegisterController::class,'employerRegister'])->name('emp.register');

//HIRING EMPLOYER from a COMPANY
Route::get('/company/{id}/{company}', [App\Http\Controllers\CompanyController::class, 'index'])->name('company.index');
Route::get('company/create',[App\Http\Controllers\CompanyController::class,'create'])->name('company.view');
Route::post('company/create',[App\Http\Controllers\CompanyController::class,'store'])->name('company.store');
Route::post('company/logo',[App\Http\Controllers\CompanyController::class,'companyLogo'])->name('company.logo');
Route::post('company/coverphoto',[App\Http\Controllers\CompanyController::class,'coverPhoto'])->name('cover.photo');
Route::post('user/logo/delete',[App\Http\Controllers\CompanyController::class,'delete_elogo'])->name('elogo.delete');
Route::post('user/coverphoto/delete',[App\Http\Controllers\CompanyController::class,'delete_ecover'])->name('ecover.delete');

//See all companies
Route::get('/companies',[App\Http\Controllers\CompanyController::class,'company'])->name('company');

//SEEKER
Route::get('user/profile/{id}/edit',[App\Http\Controllers\UserController::class,'index'])->name('user.profile');
Route::post('user/profile/create',[App\Http\Controllers\UserController::class,'store'])->name('profile.create');
//Route::post('user/coverletter','UserController@coverletter')->name('cover.letter');
Route::post('user/resume',[App\Http\Controllers\UserController::class,'resume'])->name('resume');
Route::post('user/profile_pic',[App\Http\Controllers\UserController::class,'profile_pic'])->name('profile_pic');
Route::post('user/profile_pic/delete',[App\Http\Controllers\UserController::class,'delete_spic'])->name('spic.delete');
Route::post('user/resume/delete',[App\Http\Controllers\UserController::class,'delete_resume'])->name('resume.delete');
Route::get('/user/profile/{id}',[App\Http\Controllers\UserController::class,'show_profile'])->name('user.show'); //checked
Route::get('/mydashboard',[App\Http\Controllers\UserController::class,'show'])->name('user.dashboard');
Route::get('/mysavedjobs',[App\Http\Controllers\UserController::class,'saved'])->name('user.saved');
//user work,education history
Route::get('user/profile/history',[App\Http\Controllers\UserController::class,'history'])->name('user.history');

// Education Controller
Route::post('/profile/education/store',[App\Http\Controllers\EducationController::class, 'storeEducation']);
Route::post('/profile/education/update',[App\Http\Controllers\EducationController::class, 'updateEducation']);
Route::post('/profile/education/delete',[App\Http\Controllers\EducationController::class, 'deleteEducation']);

// Work Controller
Route::post('/profile/work/store',[App\Http\Controllers\WorkController::class, 'storeWork']);
Route::post('/profile/work/update',[App\Http\Controllers\WorkController::class, 'updateWork']);
Route::post('/profile/work/delete',[App\Http\Controllers\WorkController::class, 'deleteWork']);

//LOCATION controller
Route::get('/getStates/{id}',[App\Http\Controllers\LocationController::class, 'getStates']);
Route::get('/getCities/{id}',[App\Http\Controllers\LocationController::class, 'getCities']);

//SKILL Controller
Route::post('/profile/skills/store',[App\Http\Controllers\SkillController::class, 'storeSkill']);
Route::post('/profile/skills/edit',[App\Http\Controllers\SkillController::class, 'editSkill']);

//admin (Can Only post something now! Will add more)
Route::get('/dashboard',[App\Http\Controllers\DashboardController::class,'index'])->middleware('admin');
Route::get('/dashboard/create',[App\Http\Controllers\DashboardController::class,'create'])->middleware('admin');
Route::post('/dashboard/create',[App\Http\Controllers\DashboardController::class,'store'])->name('post.store')->middleware('admin');
Route::post('/dashboard/destroy',[App\Http\Controllers\DashboardController::class,'destroy'])->name('post.delete')->middleware('admin');
Route::get('/dashboard/{id}/edit',[App\Http\Controllers\DashboardController::class,'edit'])->name('post.edit')->middleware('admin');
Route::post('/dashboard/{id}/update',[App\Http\Controllers\DashboardController::class,'update'])->name('post.update')->middleware('admin');
Route::get('/dashboard/trash',[App\Http\Controllers\DashboardController::class,'trash'])->middleware('admin');
Route::get('/dashboard/{id}/trash',[App\Http\Controllers\DashboardController::class,'restore'])->name('post.restore')->middleware('admin');
Route::get('/dashboard/{id}/toggle',[App\Http\Controllers\DashboardController::class,'toggle'])->name('post.toggle')->middleware('admin');
Route::get('/posts/{id}/{slug}',[App\Http\Controllers\DashboardController::class,'show'])->name('post.show');
Route::get('/show_All',[App\Http\Controllers\DashboardController::class,'show_All'])->name('post.show_All');

Route::get('/dashboard/jobs',[App\Http\Controllers\DashboardController::class,'getAllJobs'])->middleware('admin');
//Route::get('/dashboard/{id}/jobs','DashboardController@changeJobStatus')->name('job.status')->middleware('admin');
Route::get('/dashboard/users',[App\Http\Controllers\DashboardController::class,'getAllUsers'])->name('allusers')->middleware('admin'); //Show USERS

Route::post('/dashboard/jobs/{id}/delete',[App\Http\Controllers\DashboardController::class,'jobDestroy'])->name('j.destroy')->middleware('admin');
Route::post('/dashboard/user/{id}/delete',[App\Http\Controllers\DashboardController::class,'userDestroy'])->name('u.destroy')->middleware('admin');

Route::get('/dashboard/mentors/{id}',[App\Http\Controllers\DashboardController::class,'show_mentor'])->name('mentor.show')->middleware('admin');
Route::get('/dashboard/mentors-job-support/{id}',[App\Http\Controllers\DashboardController::class,'show_jmentor'])->name('jmentor.show')->middleware('admin');


//display all seekers
Route::group(['middleware' => 'check_role:admin,employer' ], function() {
    Route::get('/seekers',[App\Http\Controllers\SeekerController::class,'index'])->name('seeker.index');
    Route::get('/seeker/{id}',[App\Http\Controllers\SeekerController::class,'show_profile'])->name('seeker.show');
});

//Mentor Support VOLUNTEER
Route::view('volunteer-register','auth.volunteer-register')->name('volunteer.register');

Route::post('volunteer-register',[App\Http\Controllers\VolunteerRegisterController::class,'volunteerRegister'])->name('vol.register');

Route::get('volunteer/profile',[App\Http\Controllers\VolunteerController::class,'index'])->name('volunteer.profile');
Route::post('user/volunteer/create',[App\Http\Controllers\VolunteerController::class,'store'])->name('volunteer.store');
Route::post('volunteer/profile_pic',[App\Http\Controllers\VolunteerController::class,'vprofile_pic'])->name('vprofile_pic');
Route::post('volunteer/profile_pic/delete',[App\Http\Controllers\VolunteerController::class,'delete_vpic'])->name('vpic.delete');
Route::get('volunteer/{id}',[App\Http\Controllers\VolunteerController::class,'show'])->name('volunteer.show'); //checked

Route::get('/vseekers',[App\Http\Controllers\VolunteerController::class,'listseekers'])->name('vseeker.index');
Route::get('/vseeker/{id}',[App\Http\Controllers\VolunteerController::class,'show_profile'])->name('vseeker.show');


//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');