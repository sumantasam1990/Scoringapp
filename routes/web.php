<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\CriteriaController;
use App\Http\Controllers\ImageUploadController;
use App\Http\Controllers\ScoringSheetController;

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



Route::post('store/subject', [SubjectController::class, 'store'])->name('subject.store');
Route::post('store/applicant', [ApplicantController::class, 'store'])->name('applicant.store');
Route::post('store/criteria', [CriteriaController::class, 'store'])->name('criteria.store');
Route::post('store/score', [ScoringSheetController::class, 'store'])->name('score.store');
