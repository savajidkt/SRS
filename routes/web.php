<?php

use App\Http\Controllers\Admin\Dashboard\DashboardController;
use App\Http\Controllers\Admin\User\UsersController;
use App\Http\Controllers\Admin\Admin\AdminsController;
use App\Http\Controllers\Admin\Profile\ProfileController;
use App\Http\Controllers\Admin\Client\ClientController;
use App\Http\Controllers\Admin\Attendee\AttendeequestionsController;
use App\Http\Controllers\Admin\Questions\QuestionsController;
use App\Http\Controllers\Admin\Companyorganizer\CompanyOrganizerController;
use App\Http\Controllers\Admin\CourseAttendees\CourseAttendeesController;
use App\Http\Controllers\Admin\Contacte\FeedbackContacteController;
use App\Http\Controllers\Admin\CourseAttendee\CourseAttendeeController;
use App\Http\Controllers\Admin\Course\CourseController;
use App\Http\Controllers\Admin\TemplateManager\TemplateManagersController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
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


Route::post('forgot-password', [ForgotPasswordController::class, 'forgotPassword'])->name('forgot-password');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');
Route::get('course-attendees/{id}', [CourseAttendeeController::class, 'index'])->name('add-course-attendees');
Route::post('store-attendees', [CourseAttendeeController::class, 'store'])->name('store-attendees');

Route::get('feedback-contacte/{id}/{parameter?}', [FeedbackContacteController::class, 'index'])->name('feedback-contacte');
Route::post('store-contacte', [FeedbackContacteController::class, 'store'])->name('store-contacte');

Route::get('attendees-questionnaire/{id}/{parameter?}', [FeedbackContacteController::class, 'attendeesquestion'])->name('attendees-questionnaire');
Route::post('store-attendeesquestion', [FeedbackContacteController::class, 'StoreAttendeesquestion'])->name('store-attendeesquestion');

Route::get('question/{id}/{parameter?}', [FeedbackContacteController::class, 'question'])->name('question');
Route::post('store-question', [FeedbackContacteController::class, 'storequestion'])->name('store-question');

Route::get('chase-email-attendees/{id}', [CourseAttendeeController::class, 'chaseEmailAttendees'])->name('chase-email-attendees');
Route::get('chase-email-feedback/{id}', [FeedbackContacteController::class, 'chaseEmailFeedback'])->name('chase-email-feedback');
//Route::post('first-password-change', [UserController::class, 'changePassword'])->name('first.password.change');



// Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function () {

//     Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
//     //Route::get('profile', [ProfileController::class, 'profile'])->name('profile');
//     Route::resource('/profile', ProfileController::class);
//     Route::resource('/client', ClientController::class);
//     Route::post('get-dashboard', [DashboardController::class, 'getDashboardData'])->name('get-dashboard');
//     Route::resource('/users', UsersController::class);
//     Route::resource('/admins', AdminsController::class)->middleware('checkRole');
//     Route::get('/generate-pdf/{id}', [UsersController::class, 'generatePDF'])->name('generate-pdf');
//     Route::get('/chart-image/{id}', [UsersController::class, 'generateChartImage'])->name('chart-image');
//     Route::post('/user/change-status', [UsersController::class, 'changeStatus'])->name('change-user-status');
//     Route::post('/admin/change-status', [AdminsController::clas, s'changeStatus'])->name('change-admin-status');
//     Route::post('/user/reset-survey-time', [UsersController::class, 'resetSurveyTime'])->name('reset-survey-time');
//     Route::resource('/question', SurveyQuestionController::class);
//     Route::resource('/survey', SurveyController::class);
//     Route::resource('/company', CompanyController::class);
//     Route::resource('/project', ProjectController::class);

//     Route::get('/export/{user}',[UsersController::class, 'reportExcelExport'])->name('export');
//     Route::post('/save-chart-image', [UsersController::class, 'saveChartImage'])->name('save-chart-image');

// });

Auth::routes();

Route::post('/check-name', [ClientController::class, 'checkName'])->name('check-name');
# Front Routes
Route::group(['authGrouping' => 'users.auth', 'middleware' => 'auth:web'], function () {

    Route::get('/', [DashboardController::class, 'index']);
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('/profile', ProfileController::class);
    Route::resource('/client', ClientController::class);
    Route::resource('/course', CourseController::class);
    Route::resource('/attendee', AttendeequestionsController::class);
    Route::resource('/questions', QuestionsController::class);
    Route::resource('/companyorganizer', CompanyOrganizerController::class);
    Route::resource('/courseattendees', CourseAttendeesController::class);

    Route::resource('/templatemanager', TemplateManagersController::class);

    Route::get('/templatemanager-help/', [TemplateManagersController::class, 'help'])->name('templatemanager-help');
    Route::get('/templatemanager-edit-help/{templatemanager}/edit', [TemplateManagersController::class, 'editHelp'])->name('templatemanager-edit-help');
    Route::post('/templatemanager-edit-help/{templatemanager}/update', [TemplateManagersController::class, 'updateHelp'])->name('templatemanager-update-help');

    Route::get('/templatemanager-template/', [TemplateManagersController::class, 'common'])->name('templatemanager-common');
    Route::get('/templatemanager-edit-template/{templatemanager}/edit', [TemplateManagersController::class, 'editTemplate'])->name('templatemanager-edit-template');
    Route::post('/templatemanager-edit-template/{templatemanager}/update', [TemplateManagersController::class, 'updateTemplate'])->name('templatemanager-update-template');

    Route::get('/templatemanager-message/', [TemplateManagersController::class, 'customize'])->name('templatemanager-customize');
    Route::get('/templatemanager-edit-message/{templatemanager}/edit', [TemplateManagersController::class, 'editMessage'])->name('templatemanager-edit-message');
    Route::post('/templatemanager-edit-message/{templatemanager}/update', [TemplateManagersController::class, 'updateMessage'])->name('templatemanager-update-message');

    Route::get('editcourse-attendees/{id}', [CourseAttendeeController::class, 'editattendees'])->name('editcourse-attendees');
    /*Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('checkSurveyStatus');
    Route::get('/change-password', [ResetPasswordController::class, 'firstTimePasswordChange'])->name('change-password');
    //Route::resource('/survey', SurveyController::class);
    Route::get('/thank-you', [App\Http\Controllers\SurveyController::class, 'thankYou'])->name('thank-you')->middleware('checkSurveyStatus');
    Route::get('/time-out', [App\Http\Controllers\SurveyController::class, 'timeOut'])->name('time-out')->middleware('checkSurveyStatus');
    Route::get('/take-survey', [App\Http\Controllers\SurveyController::class, 'index'])->name('take-survey')->middleware('checkSurveyStatus');
    Route::post('/take-survey/store', [App\Http\Controllers\SurveyController::class, 'store'])->name('take-survey-store');
    Route::post('/get-question', [App\Http\Controllers\SurveyController::class, 'getQuestion'])->name('get-question');
    Route::get('/demographic', [App\Http\Controllers\SurveyController::class, 'demographic'])->name('demographic');

    Route::post('/update-survey-time', [App\Http\Controllers\SurveyController::class, 'updateSurveyTime'])->name('update-survey-time');
    Route::post('/demographic-save', [App\Http\Controllers\UserController::class, 'demoGraphicSave'])->name('demographic-save');

    //Route::get('/export/{id}',[UsersController::class, 'reportExcelExport'])->name('survey-export');
    Route::get('/user/survey-export/{id}', [App\Http\Controllers\UserController::class, 'reportExcelExport'])->name('survey-export');
    Route::get('/demo-survey', [App\Http\Controllers\SurveyController::class, 'demoSurvey'])->name('demo-survey');*/
});

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
