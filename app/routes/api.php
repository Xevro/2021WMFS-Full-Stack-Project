<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CompanyProposalController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentLikeController;
use App\Http\Controllers\StudentTaskController;
use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

Route::get('/user', function (Request $request) {
    return Auth::user();
});

Route::post('/register/companies', function (Request $request) {
    $request->validate([
        'email' => 'required|email|unique:users',
        'kbo_number' => 'required|unique:companies',
        'name' => 'required|unique:companies|max:125',
        'password' => 'required|min:8|required_with:password_confirmation|same:password_confirmation',
        'password_confirmation' => 'required|min:8',
        'profile_image' => 'image|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
    ]);
    if (User::create(['email' => $request->email, 'password' => Hash::make($request->password), 'role' => 'company'])) {
        Company::create(['name' => $request->name, 'kbo_number' => $request->kbo_number,
            'user_id' => User::where('email', $request->email)->first()->id]);
        // add profile image url - name
        if ($request->file('profile_image')) {
            $request->file('profile_image')->store('images');
        }
        $user = User::where('email', $request->email)->firstOrFail();
        if (Str::contains($user->role, ['student', 'company'])) {
            if (Auth::attempt($request->only('email', 'password'))) {
                //$request->session()->regenerate();
                if ($user->role === 'company') {
                    return User::where('email', $request->email)->with('company')->get();
                }
            }
        }
        // return ['message' => 'The company has been created'];
    }
});

Route::post('/client/login', function (Request $request) {
    $user = User::where('email', $request->email)->firstOrFail();
    if (Str::contains($user->role, ['student', 'company'])) {
        if (Auth::attempt($request->only('email', 'password'))) {
            //$request->session()->regenerate();
            if ($user->role === 'student') {
                return User::where('email', $request->email)->with('student')->get();
            } else if ($user->role === 'company') {
                return User::where('email', $request->email)->with('company')->get();
            }
        }
    }
    return response(['message' => 'The provided credentials do not match our records.'], 401);
});

Route::post('/client/logout', function (Request $request) {
    Auth::guard('web')->logout();
    $request->session()->invalidate();
    return response(['message' => 'The user has been logged out successfully']);
});

// companies
Route::apiResource('companies', CompanyController::class)->middleware('auth:sanctum');
// proposals through company
Route::apiResource('companies.proposals', CompanyProposalController::class)->middleware('auth:sanctum');

Route::get('/proposals', [CompanyProposalController::class, 'proposals']);

// students
Route::apiResource('students', StudentController::class)->middleware('auth:sanctum');
Route::get('/students/{student}/contract', [StudentController::class, 'contract']);

Route::apiResource('students.tasks', StudentTaskController::class)->middleware('auth:sanctum');
Route::apiResource('students.likes', StudentLikeController::class)->middleware('auth:sanctum');
