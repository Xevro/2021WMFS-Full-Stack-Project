<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CompanyProposalController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentTaskController;
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


/*Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
*/
Route::get('/', function () {
    return redirect('/dashboard');
});

Route::prefix('dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'overview'])->middleware(['auth']);

    Route::get('/students', [StudentController::class, 'students'])->middleware(['auth']);
    Route::get('/student/{id}', [StudentController::class, 'studentDetail'])->where(['id' => '[0-9]+'])->middleware(['auth']);

    Route::get('/companies', [CompanyController::class, 'companies'])->middleware(['auth']);
    Route::get('/company/{id}', [CompanyController::class, 'companyDetail'])->where(['id' => '[0-9]+'])->middleware(['auth']);

    Route::get('/company/proposal/{id}', [CompanyProposalController::class, 'proposalDetail'])->where(['id' => '[0-9]+'])->middleware(['auth']);

    //add company
    Route::get('/company/add', [CompanyController::class, 'showAddCompany'])->middleware(['auth']);
    Route::post('/company/add', [CompanyController::class, 'addCompany'])->middleware(['auth']);

    //add proposal
    Route::get('/proposal/add', [CompanyProposalController::class, 'showAddProposal'])->middleware(['auth']);
    Route::post('/proposal/add', [CompanyProposalController::class, 'addProposal'])->middleware(['auth']);

    //evaluate proposal
    Route::get('/company/proposal/{id}/approve', [CompanyProposalController::class, 'evaluateProposal'])->where(['id' => '[0-9]+'])->middleware(['auth']);
    Route::post('/company/proposal/{id}/approve', [CompanyProposalController::class, 'approveProposal'])->where(['id' => '[0-9]+'])->middleware(['auth']);

    //Delete proposal
    Route::get('/company/proposal/{id}/delete', [CompanyProposalController::class, 'showProposalDelete'])->where(['id' => '[0-9]+'])->middleware(['auth']);
    Route::post('/company/proposal/{id}/delete', [CompanyProposalController::class, 'proposalDelete'])->where(['id' => '[0-9]+'])->middleware(['auth']);

    //add student
    Route::get('/student/add', [StudentController::class, 'showAddStudent'])->middleware(['auth']);
    Route::post('/student/add', [StudentController::class, 'addStudent'])->middleware(['auth']);

    //view tasks
    Route::get('/student/{id}/tasks', [StudentTaskController::class, 'showStudentTasks'])->where(['id' => '[0-9]+'])->middleware(['auth']);

    //add student to proposal
    Route::get('/proposal/assign', [CompanyProposalController::class, 'showAssignStudentToProposal'])->middleware(['auth']);
    Route::post('/proposal/assign', [CompanyProposalController::class, 'assignStudentToProposal'])->middleware(['auth']);
});

require __DIR__ . '/auth.php';
