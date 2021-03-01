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
