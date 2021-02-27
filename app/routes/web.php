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
    return redirect('/overview');
});


Route::get('/tasks', [StageController::class, 'index']);

Route::get('/overview', [StageController::class, 'overview']);

Route::get('/students', [StageController::class, 'students']);
Route::get('/student/{id}', [StageController::class, 'studentDetail']);

Route::get('/companies', [StageController::class, 'companies']);
Route::get('/company/{id}', [StageController::class, 'companyDetail']);

Route::get('/company/proposal/{id}', [StageController::class, 'proposalDetail']);

