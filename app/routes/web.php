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
Route::get('/dashboard/student/{id}', [StageController::class, 'studentDetail']);

Route::get('/dashboard/companies', [StageController::class, 'companies']);
Route::get('/dashboard/company/{id}', [StageController::class, 'companyDetail']);

Route::get('/dashboard/company/proposal/{id}', [StageController::class, 'proposalDetail']);

//add company
Route::get('/dashboard/company/add', [StageController::class, 'addCompany']);

//add student
Route::get('/dashboard/students/add', [StageController::class, 'addStudent']);

//add student to proposal
Route::get('/dashboard/company/proposal/{id}/assign', [StageController::class, 'assignStudentToProposal']);

//Accept proposal on other page
Route::get('/dashboard/company/proposal/{id}/validate', [StageController::class, 'validateProposal']);
