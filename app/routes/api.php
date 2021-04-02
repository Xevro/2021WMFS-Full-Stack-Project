<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CompanyProposalController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentLikeController;
use App\Http\Controllers\StudentTaskController;
use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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

Route::post('/register/companies', function (Request $request) {
    $request->validate([
        'email' => 'required|email|unique:companies',
        'kbo_number' => 'required|unique:companies|numeric',
        'name' => 'required|unique:companies|max:125',
        'password' => 'required|min:8|required_with:password_confirmation|same:password_confirmation',
        'password_confirmation' => 'required|min:8',
        'profile_image' => 'image|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
    ]);
    if (User::create(['email' => $request->email, 'password' => Hash::make($request->password), 'role' => 'company'])) {
        Company::create(['name' => $request->name, 'email' => $request->email, 'kbo_number' => $request->kbo_number,
            'user_id' => User::where('email', $request->email)->first()->id]);
        // add profile image url - name
        if ($request->file('profile_image')) {
            $request->file('profile_image')->store('images');
        }
        return ['message' => 'The company has been created'];
    }
});

// companies
Route::apiResource('companies', CompanyController::class)->middleware('auth:sanctum');
// proposals through company
Route::apiResource('companies.proposals', CompanyProposalController::class)->middleware('auth:sanctum');

// students
Route::apiResource('students', StudentController::class)->middleware('auth:sanctum');

Route::apiResource('students.tasks', StudentTaskController::class)->middleware('auth:sanctum');
Route::apiResource('students.likes', StudentLikeController::class)->middleware('auth:sanctum');
