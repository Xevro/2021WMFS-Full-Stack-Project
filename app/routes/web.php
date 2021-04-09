<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CompanyProposalController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentTaskController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

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

    //add mentor to student
    Route::get('/student/assign', [StudentController::class, 'showAssignMentorToStudent'])->middleware(['auth']);
    Route::post('/student/assign', [StudentController::class, 'assignMentorToStudent'])->middleware(['auth']);

    //view tasks
    Route::get('/student/{id}/tasks', [StudentTaskController::class, 'showStudentTasks'])->where(['id' => '[0-9]+'])->middleware(['auth']);

    //add student to proposal
    Route::get('/proposal/assign', [CompanyProposalController::class, 'showAssignStudentToProposal'])->middleware(['auth']);
    Route::post('/proposal/assign', [CompanyProposalController::class, 'assignStudentToProposal'])->middleware(['auth']);
});

Route::post('/sanctum/login', function (Request $request) {
    $credentials = $request->only('email', 'password');
    $role = User::where('email', $request->email)->firstOrFail()->role;
    if (Str::contains($role, ['student', 'company'])) {
        if (Auth::attempt($credentials)) {
            // $request->session()->regenerate();
            return response(['message' => 'The user has been authenticated successfully'], 200);
        }
        return response(['message' => 'The provided credentials do not match our records.'], 401);
    } else {
        return response(['message' => 'The provided credentials do not match our records.'], 401);
    }
});

Route::post('/sanctum/logout', function (Request $request) {
    Auth::guard('web')->logout();
    $request->session()->invalidate();
    return response(['message' => 'The user has been logged out successfully'], 200);
});

require __DIR__ . '/auth.php';
