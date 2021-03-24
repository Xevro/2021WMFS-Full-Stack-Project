<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProposalController;
use App\Http\Resources\CompanyCollection;
use App\Http\Resources\ProposalCollection;
use App\Http\Resources\ProposalResource;
use App\Models\Company;
use App\Models\Proposal;
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
Route::apiResource('proposal', ProposalController::class);

Route::get('/proposals', function () {
    return new ProposalCollection(Proposal::all()); // or paginate
});

// companies
Route::apiResource('company', CompanyController::class);

Route::get('/companies', function () {
    return new CompanyCollection(Company::all()); // or paginate
});

