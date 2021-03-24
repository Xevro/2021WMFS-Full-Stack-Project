<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProposalController;
use App\Http\Controllers\StudentController;
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

// proposals
Route::apiResource('proposals', ProposalController::class);

// companies
Route::apiResource('companies', CompanyController::class);

// students
Route::apiResource('students', StudentController::class);

//Route::resource('students.tasks', StudentController::class);
