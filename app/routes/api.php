<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CompanyProposalController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentLikesController;
use App\Http\Controllers\StudentTaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// companies
Route::apiResource('companies', CompanyController::class);
// proposals through company
Route::apiResource('companies.proposals', CompanyProposalController::class);

// students
Route::apiResource('students', StudentController::class);

Route::apiResource('students.tasks', StudentTaskController::class);
Route::apiResource('students.likes', StudentLikesController::class);
