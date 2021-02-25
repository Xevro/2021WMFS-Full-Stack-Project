<?php

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

Route::get('/', function () {
    return redirect('/overview');
});

Route::get('/overview', 'App\Http\Controllers\StageController@overview');
Route::get('/students', 'App\Http\Controllers\StageController@students');

Route::get('/companies', 'App\Http\Controllers\StageController@companies');
Route::get('/company/{id}', 'App\Http\Controllers\StageController@company');

Route::get('/proposal/{id}', 'App\Http\Controllers\StageController@proposal');

