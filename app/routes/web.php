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

Route::get('/dashboard', [StageController::class, 'overview']);

Route::get('/dashboard/students', [StageController::class, 'students']);
Route::get('/dashboard/student/{id}', [StageController::class, 'studentDetail'])->where(['id' => '[0-9]+']);

Route::get('/dashboard/companies', [StageController::class, 'companies']);
Route::get('/dashboard/company/{id}', [StageController::class, 'companyDetail'])->where(['id' => '[0-9]+']);

Route::get('/dashboard/company/proposal/{id}', [StageController::class, 'proposalDetail'])->where(['id' => '[0-9]+']);

//add company
Route::get('/dashboard/company/add', [StageController::class, 'showAddCompany']);
Route::post('/dashboard/company/add', [StageController::class, 'addCompany']);
//add student
Route::get('/dashboard/student/add', [StageController::class, 'showAddStudent']);
Route::post('/dashboard/student/add', [StageController::class, 'addStudent']);
//add student to proposal
Route::get('/dashboard/company/proposal/{id}/assign', [StageController::class, 'showAssignStudentToProposal'])->where(['id' => '[0-9]+']);
Route::post('/dashboard/company/proposal/{id}/assign', [StageController::class, 'assignStudentToProposal'])->where(['id' => '[0-9]+']);
//Accept proposal on other page
Route::get('/dashboard/company/proposal/{id}/validate', [StageController::class, 'showValidateProposal'])->where(['id' => '[0-9]+']);
Route::post('/dashboard/company/proposal/{id}/validate', [StageController::class, 'validateProposal'])->where(['id' => '[0-9]+']);

