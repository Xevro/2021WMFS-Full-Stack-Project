<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StageController;

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

Route::get('/', function () {
    return redirect('/dashboard');
});

Route::prefix('dashboard')->group(function () {
    Route::get('/', [StageController::class, 'overview']);

    Route::get('/students', [StageController::class, 'students']);
    Route::get('/student/{id}', [StageController::class, 'studentDetail'])->where(['id' => '[0-9]+']);

    Route::get('/companies', [StageController::class, 'companies']);
    Route::get('/company/{id}', [StageController::class, 'companyDetail'])->where(['id' => '[0-9]+']);

    Route::get('/company/proposal/{id}', [StageController::class, 'proposalDetail'])->where(['id' => '[0-9]+']);

    Route::get('/company/proposal/{id}/delete', [StageController::class, 'proposalDelete'])->where(['id' => '[0-9]+']);

    //add proposal
    Route::get('/proposal/add', [StageController::class, 'showAddProposal']);
    Route::post('/proposal/add', [StageController::class, 'addProposal']);
    //add student
    Route::get('/student/add', [StageController::class, 'showAddStudent']);
    Route::post('/student/add', [StageController::class, 'addStudent']);
    //add student to proposal
    Route::get('/company/proposal/{id}/assign', [StageController::class, 'showAssignStudentToProposal'])->where(['id' => '[0-9]+']);
    Route::post('/company/proposal/{id}/assign', [StageController::class, 'assignStudentToProposal'])->where(['id' => '[0-9]+']);
    //Accept proposal on other page
    Route::get('/company/proposal/{id}/validate', [StageController::class, 'showValidateProposal'])->where(['id' => '[0-9]+']);
    Route::post('/company/proposal/{id}/validate', [StageController::class, 'validateProposal'])->where(['id' => '[0-9]+']);


});
