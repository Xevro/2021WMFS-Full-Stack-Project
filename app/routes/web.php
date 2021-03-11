<?php

use App\Http\Controllers\StageController;
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
    Route::get('/', [StageController::class, 'overview'])->middleware(['auth']);

    Route::get('/students', [StageController::class, 'students'])->middleware(['auth']);
    Route::get('/student/{id}', [StageController::class, 'studentDetail'])->where(['id' => '[0-9]+'])->middleware(['auth']);

    Route::get('/companies', [StageController::class, 'companies'])->middleware(['auth']);
    Route::get('/company/{id}', [StageController::class, 'companyDetail'])->where(['id' => '[0-9]+'])->middleware(['auth']);

    Route::get('/company/proposal/{id}', [StageController::class, 'proposalDetail'])->where(['id' => '[0-9]+'])->middleware(['auth']);

    //add company
    Route::get('/company/add', [StageController::class, 'showAddCompany'])->middleware(['auth']);
    Route::post('/company/add', [StageController::class, 'addCompany'])->middleware(['auth']);

    //add proposal
    Route::get('/proposal/add', [StageController::class, 'showAddProposal'])->middleware(['auth']);
    Route::post('/proposal/add', [StageController::class, 'addProposal'])->middleware(['auth']);

    //Delete proposal
    Route::get('/company/proposal/{id}/delete', [StageController::class, 'showProposalDelete'])->where(['id' => '[0-9]+'])->middleware(['auth']);
    Route::post('/company/proposal/{id}/delete', [StageController::class, 'proposalDelete'])->where(['id' => '[0-9]+'])->middleware(['auth']);

    //add student
    Route::get('/student/add', [StageController::class, 'showAddStudent'])->middleware(['auth']);
    Route::post('/student/add', [StageController::class, 'addStudent'])->middleware(['auth']);

    //add student to proposal
    Route::get('/company/proposal/{id}/assign', [StageController::class, 'showAssignStudentToProposal'])->where(['id' => '[0-9]+'])->middleware(['auth']);
    Route::post('/company/proposal/{id}/assign', [StageController::class, 'assignStudentToProposal'])->where(['id' => '[0-9]+'])->middleware(['auth']);

    //Accept proposal on other page
    Route::get('/company/proposal/{id}/validate', [StageController::class, 'showValidateProposal'])->where(['id' => '[0-9]+'])->middleware(['auth']);
    Route::post('/company/proposal/{id}/validate', [StageController::class, 'validateProposal'])->where(['id' => '[0-9]+'])->middleware(['auth']);
});

require __DIR__ . '/auth.php';
