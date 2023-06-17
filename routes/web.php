<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\NurseController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VacantController;
use App\Http\Controllers\VacantQuizController;
use App\Http\Controllers\VacantSubjectController;
use App\Http\Middleware\AuthNurse;
use App\Http\Middleware\AuthVacant;
use App\Http\Middleware\UserAuth;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminAuth;
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

//ADMIN ROUTES
Route::get('/admin', function () {
    return view('admin.login');
})->name('admin_login');
Route::post('/admin-auth', [AdminController::class, 'login'])->name('admin_auth');
//---------------


//USER ROUTES
Route::get('/', function () {
    return view('login');
})->name('login');
Route::post('/user-auth', [UserController::class, 'login'])->name('user_auth');


Route::middleware([UserAuth::class])->group(function () {
    Route::get('/get_nurses', [NurseController::class, 'get_nurses'])->name('get_nurses');
    Route::get('/get_vacants', [VacantController::class, 'get_vacants'])->name('get_vacants');
    Route::post('/select_nurse', [NurseController::class, 'select_nurse'])->name('select_nurse');
    Route::post('/select_vacant', [VacantController::class, 'select_vacant'])->name('select_vacant');
    Route::get('/user-logout', [UserController::class, 'user_logout'])->name('user_logout');
});
//---------------------




Route::middleware([AdminAuth::class])->group(function () {
    Route::get('/admin-home', [AdminController::class, 'Home'])->name('admin_home');
    Route::get('/admin-settings', [AdminController::class, 'settings'])->name('settings');
    Route::get('/nurses', [NurseController::class, 'nurses'])->name('nurses');
    Route::get('/exam-results', [AdminController::class, 'exam_results'])->name('exam_results');
    Route::get('/exam-results-by-subject/{id}', [AdminController::class, 'exam_result'])->name('subject_results');
    Route::get('/exportExcel/{id}', [AdminController::class,'exportExcel'])->name('exportExcel');
    Route::get('/delete_data/{id}', [AdminController::class,'delete_data'])->name('delete_data');
    Route::post('/new_nurse_reg', [NurseController::class, 'new_nurse_reg'])->name('new_nurse_reg');
    Route::post('/delete_nurse', [NurseController::class, 'delete_nurse'])->name('delete_nurse');



    Route::post('new-subect-reg', [SubjectController::class, 'new'])->name('new_sb_reg');
    Route::get('/subject_detail/{id}', [SubjectController::class, 'subject_detail'])->name('subject_detail');
    Route::post('/subject_update', [SubjectController::class, 'subject_update'])->name('subject_update');
    Route::post('/delete_subject', [SubjectController::class, 'delete_subject'])->name('delete_subject');

    Route::get('/edit_quiz/{id}', [QuizController::class, 'edit_quiz'])->name('quiz_edit');
    Route::post('/quiz_update', [QuizController::class, 'quiz_update'])->name('quiz_update');
    Route::post('/new-quiz-reg', [QuizController::class, 'new_quiz_reg'])->name('new_quiz_reg');
    Route::post('/delete_quiz', [QuizController::class, 'delete_quiz'])->name('delete_quiz');


    Route::get('/vacants', [VacantController::class, 'vacants'])->name('vacants');
    Route::post('/new_vacant_reg', [VacantController::class, 'new_vacant_reg'])->name('new_vacant_reg');
    Route::get('/vacant_subjects', [VacantSubjectController::class, 'vacant_subjects'])->name('vacant_subjects');
    Route::post('/vacant_sb_reg', [VacantSubjectController::class, 'vacant_sb_reg'])->name('vacant_sb_reg');
    Route::get('/vacant_subject/{id}', [VacantSubjectController::class, 'subject_detail'])->name('vacant_subject');
    Route::post('/vacant-subject_update', [VacantSubjectController::class, 'subject_update'])->name('vacant_subject_update');
    Route::post('/vacant-delete_subject', [VacantSubjectController::class, 'delete_subject'])->name('vacant_delete_subject');
    Route::get('/vacant_results', [AdminController::class, 'vacant_results'])->name('vacant_results');


    Route::post('/new-vc-quiz-reg', [VacantQuizController::class, 'new_quiz_reg'])->name('vacant_quiz_reg');
    Route::get('/edit_vc_quiz/{id}', [VacantQuizController::class, 'edit_quiz'])->name('edit_vc_quiz');
    Route::post('/vc_quiz_update', [VacantQuizController::class, 'quiz_update'])->name('vc_quiz_update');
    Route::post('/delete_vc_quiz', [VacantQuizController::class, 'delete_quiz'])->name('delete_vc_quiz');
});

Route::middleware([AuthVacant::class])->group(function () {
    Route::get('/vacant-home', [VacantController::class, 'Home'])->name('vacant_home');
//    Route::get('/vacant-vacant_logout', [VacantController::class, 'vacant_logout'])->name('vacant_logout');
    Route::get('/start_vacant/{id}', [VacantController::class, 'start_vacant'])->name('start_vacant');
    Route::post('/vacant_test_check', [VacantController::class, 'vacant_test_check'])->name('vacant_test_check');
});

Route::get('generate-pdf/{id}', [PdfController::class, 'generatePDF'])->name('generatePDF');

Route::middleware([AuthNurse::class])->group(function () {
    Route::get('/user-home', [NurseController::class, 'Home'])->name('nurse_home');
    Route::get('/start_nurse/{id}', [NurseController::class, 'start_test'])->name('start_test');
    Route::get('/my_results/{id}', [NurseController::class, 'my_results'])->name('my_results');
    Route::post('/test_check', [NurseController::class, 'test_check'])->name('test_check');
});




