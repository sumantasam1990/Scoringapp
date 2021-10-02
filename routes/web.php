<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\CriteriaController;
use App\Http\Controllers\ImageUploadController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ScoringSheetController;
use App\Http\Controllers\TeamController;

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

Route::get('/create-subject', [SubjectController::class, 'index'])->name('create.subject');
Route::get('/create-applicant', [ApplicantController::class, 'index']);
Route::get('/create-criteria', [CriteriaController::class, 'index']);
Route::get('/create-scoring-sheet/{id}', [ScoringSheetController::class, 'index']);
Route::get('/scoring-sheet/{id}', [ScoringSheetController::class, 'scoring']);
Route::get('dashboard', [LoginController::class, 'dashboard']);
Route::get('/delete/score/{id}', [ScoringSheetController::class, 'delete']);
Route::get('/add-team-member/{id}', [TeamController::class, 'index']);


Route::post('store/subject', [SubjectController::class, 'store'])->name('subject.store');
Route::post('store/applicant', [ApplicantController::class, 'store'])->name('applicant.store');
Route::post('store/criteria', [CriteriaController::class, 'store'])->name('criteria.store');
Route::post('store/score', [ScoringSheetController::class, 'store'])->name('score.store');
Route::any('edit/score', [ScoringSheetController::class, 'edit'])->name('score.edit');
Route::post('store/team', [TeamController::class, 'store'])->name('team.store');





// authentications
Route::get('login', [LoginController::class, 'login']);
Route::post('custom-login', [LoginController::class, 'authenticate'])->name('login.custom');
Route::get('registration', [LoginController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [LoginController::class, 'customRegistration'])->name('register.custom');
Route::get('signout', [LoginController::class, 'logout'])->name('signout');
