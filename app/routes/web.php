<?php

use App\Http\Controllers\DashboardController;
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

    Route::get('/students', [DashboardController::class, 'students'])->middleware(['auth']);
    Route::get('/student/{id}', [DashboardController::class, 'studentDetail'])->where(['id' => '[0-9]+'])->middleware(['auth']);

    Route::get('/companies', [DashboardController::class, 'companies'])->middleware(['auth']);
    Route::get('/company/{id}', [DashboardController::class, 'companyDetail'])->where(['id' => '[0-9]+'])->middleware(['auth']);

    Route::get('/company/proposal/{id}', [DashboardController::class, 'proposalDetail'])->where(['id' => '[0-9]+'])->middleware(['auth']);

    //add company
    Route::get('/company/add', [DashboardController::class, 'showAddCompany'])->middleware(['auth']);
    Route::post('/company/add', [DashboardController::class, 'addCompany'])->middleware(['auth']);

    //add proposal
    Route::get('/proposal/add', [DashboardController::class, 'showAddProposal'])->middleware(['auth']);
    Route::post('/proposal/add', [DashboardController::class, 'addProposal'])->middleware(['auth']);

    //evaluate proposal
    Route::get('/company/proposal/{id}/approve', [DashboardController::class, 'evaluateProposal'])->where(['id' => '[0-9]+'])->middleware(['auth']);
    Route::post('/company/proposal/{id}/approve', [DashboardController::class, 'approveProposal'])->where(['id' => '[0-9]+'])->middleware(['auth']);

    //Delete proposal
    Route::get('/company/proposal/{id}/delete', [DashboardController::class, 'showProposalDelete'])->where(['id' => '[0-9]+'])->middleware(['auth']);
    Route::post('/company/proposal/{id}/delete', [DashboardController::class, 'proposalDelete'])->where(['id' => '[0-9]+'])->middleware(['auth']);

    //add student
    Route::get('/student/add', [DashboardController::class, 'showAddStudent'])->middleware(['auth']);
    Route::post('/student/add', [DashboardController::class, 'addStudent'])->middleware(['auth']);

    //view tasks
    Route::get('/student/{id}/tasks', [DashboardController::class, 'showStudentTasks'])->where(['id' => '[0-9]+'])->middleware(['auth']);

    //add student to proposal
    Route::get('/proposal/assign', [DashboardController::class, 'showAssignStudentToProposal'])->middleware(['auth']);
    Route::post('/proposal/assign', [DashboardController::class, 'assignStudentToProposal'])->middleware(['auth']);
});

require __DIR__ . '/auth.php';
