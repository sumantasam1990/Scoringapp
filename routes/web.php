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

Route::get('/create-subject', [SubjectController::class, 'index'])->name('create.subject')->middleware('auth');
Route::get('/create-applicant/{id}', [ApplicantController::class, 'index'])->middleware('auth');
Route::get('/create-criteria/{id}', [CriteriaController::class, 'index'])->middleware('auth');
Route::get('/create-scoring-sheet/{id}', [ScoringSheetController::class, 'index'])->middleware('auth');
Route::get('/scoring-sheet/{id}', [ScoringSheetController::class, 'scoring'])->middleware('auth');
Route::get('dashboard', [LoginController::class, 'dashboard'])->middleware('auth');
Route::get('/delete/score/{id}', [ScoringSheetController::class, 'delete'])->middleware('auth');
Route::get('/add-team-member/{id}', [TeamController::class, 'index'])->middleware('auth');
Route::get('remove/note/{id}', [ScoringSheetController::class, 'remove_note'])->middleware('auth');
Route::get('remove/file/{id}', [ScoringSheetController::class, 'remove_file'])->middleware('auth');
Route::get('finalists/{id}', [ScoringSheetController::class, 'finalists'])->middleware('auth');
Route::get('applicant/{id}/{subid}', [ApplicantController::class, 'viewApplicant'])->middleware('auth');



Route::post('store/subject', [SubjectController::class, 'store'])->name('subject.store')->middleware('auth');
Route::post('store/applicant', [ApplicantController::class, 'store'])->name('applicant.store')->middleware('auth');
Route::post('store/criteria', [CriteriaController::class, 'store'])->name('criteria.store')->middleware('auth');
Route::post('store/score', [ScoringSheetController::class, 'store'])->name('score.store')->middleware('auth');
Route::any('edit/score', [ScoringSheetController::class, 'edit'])->name('score.edit')->middleware('auth');
Route::post('store/team', [TeamController::class, 'store'])->name('team.store')->middleware('auth');
Route::post('store/finalist', [ApplicantController::class, 'add_finalist'])->name('finalist.store')->middleware('auth');





// authentications
Route::get('login', [LoginController::class, 'login'])->name('login');
Route::post('custom-login', [LoginController::class, 'authenticate'])->name('login.custom');
Route::get('registration', [LoginController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [LoginController::class, 'customRegistration'])->name('register.custom');
Route::get('signout', [LoginController::class, 'logout'])->name('signout');
