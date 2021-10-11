<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\CriteriaController;
use App\Http\Controllers\ImageUploadController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ScoringSheetController;
use App\Http\Controllers\TeamController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

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

Route::get('/', [LoginController::class, 'dashboard'])->middleware(['auth', 'verified']);


Route::get('/create-subject', [SubjectController::class, 'index'])->name('create.subject')->middleware(['auth', 'verified']);
Route::get('/create-applicant/{id}', [ApplicantController::class, 'index'])->middleware(['auth', 'verified']);
Route::get('/create-criteria/{id}', [CriteriaController::class, 'index'])->middleware(['auth', 'verified']);
Route::get('/create-scoring-sheet/{id}', [ScoringSheetController::class, 'index'])->middleware(['auth', 'verified']);
Route::get('/scoring-sheet/{id}', [ScoringSheetController::class, 'scoring'])->middleware(['auth', 'verified']);
Route::get('dashboard', [LoginController::class, 'dashboard'])->middleware(['auth', 'verified']);
Route::get('/delete/score/{id}', [ScoringSheetController::class, 'delete'])->middleware(['auth', 'verified']);
Route::get('/add-team-member/{id}', [TeamController::class, 'index'])->middleware(['auth', 'verified']);
Route::get('remove/note/{id}', [ScoringSheetController::class, 'remove_note'])->middleware(['auth', 'verified']);
Route::get('remove/file/{id}', [ScoringSheetController::class, 'remove_file'])->middleware(['auth', 'verified']);
Route::get('finalists/{id}', [ScoringSheetController::class, 'finalists'])->middleware(['auth', 'verified']);
Route::get('applicant/{id}/{subid}', [ApplicantController::class, 'viewApplicant'])->middleware(['auth', 'verified']);
Route::get('/bulkemaillist/{id}', [ApplicantController::class, 'bulkEmails'])->middleware(['auth', 'verified']);
Route::get('/message-room/{id}/{room}', [\App\Http\Controllers\MessageController::class, 'index'])->middleware(['auth', 'verified']);
Route::get('/scorecard/{id}/{appl_id}', [ScoringSheetController::class, 'scorecard'])->middleware(['auth', 'verified']);
Route::get('/rooms/{id}', [\App\Http\Controllers\MessageController::class, 'message_rooms'])->middleware(['auth', 'verified']);




Route::post('store/mainsubject', [SubjectController::class, 'mainstore'])->name('mainsubject.store')->middleware(['auth', 'verified']);
Route::post('store/subject', [SubjectController::class, 'store'])->name('subject.store')->middleware(['auth', 'verified']);
Route::post('store/applicant', [ApplicantController::class, 'store'])->name('applicant.store')->middleware(['auth', 'verified']);
Route::post('store/maincriteria', [CriteriaController::class, 'mainstore'])->name('maincriteria.store')->middleware(['auth', 'verified']);
Route::post('store/criteria', [CriteriaController::class, 'store'])->name('criteria.store')->middleware(['auth', 'verified']);
Route::post('store/score', [ScoringSheetController::class, 'store'])->name('score.store')->middleware(['auth', 'verified']);
Route::any('edit/score', [ScoringSheetController::class, 'edit'])->name('score.edit')->middleware(['auth', 'verified']);
Route::post('store/team', [TeamController::class, 'store'])->name('team.store')->middleware(['auth', 'verified']);
Route::post('store/finalist', [ApplicantController::class, 'add_finalist'])->name('finalist.store')->middleware(['auth', 'verified']);
Route::post('export-emails', [ApplicantController::class, 'downloadEmailListAsCSV'])->name('export-emails')->middleware(['auth', 'verified']);
Route::post('remove/bulkemail', [ApplicantController::class, 'removeBulkEmail'])->name('remove.bulk')->middleware(['auth', 'verified']);
Route::post('add/emaillist', [ApplicantController::class, 'addEmailList'])->name('add-emaillist')->middleware(['auth', 'verified']);
Route::post('remove/applicant', [ApplicantController::class, 'removeApplicant'])->name('remove-applicant')->middleware(['auth', 'verified']);
Route::post('remove/page', [ScoringSheetController::class, 'deletePage'])->name('remove-page')->middleware(['auth', 'verified']);
Route::post('message/reply', [\App\Http\Controllers\MessageController::class, 'reply'])->name('reply')->middleware(['auth', 'verified']);
Route::post('message/create', [\App\Http\Controllers\MessageController::class, 'create'])->name('create')->middleware(['auth', 'verified']);
Route::post('store/roomname', [\App\Http\Controllers\MessageController::class, 'store'])->name('roomname.store')->middleware(['auth', 'verified']);




// authentications
Route::get('login', [LoginController::class, 'login'])->name('login');
Route::post('custom-login', [LoginController::class, 'authenticate'])->name('login.custom');
Route::get('registration', [LoginController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [LoginController::class, 'customRegistration'])->name('register.custom');
Route::get('signout', [LoginController::class, 'logout'])->name('signout');


// email verification routes
Route::get('/email/verify', function () {
    //return view('auth.verify-email');
    return redirect('/signout');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');
