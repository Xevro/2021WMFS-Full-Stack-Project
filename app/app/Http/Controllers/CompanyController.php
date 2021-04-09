<?php

namespace App\Http\Controllers;

use App\Http\Resources\CompanyResource;
use App\Models\Company;
use App\Models\Proposal;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class CompanyController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index() {
        Gate::authorize('api-view-companies');
        return CompanyResource::collection(Company::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return string[]
     */
    public function store(Request $request) {
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return CompanyResource
     */
    public function show($id) {
        Gate::authorize('api-view-companies-details');
        return new CompanyResource(Company::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return string[]
     */
    public function update(Request $request, $id) {
        // update company information
        Gate::authorize('api-update-company', $id);
        $reqdata = $request->all();
        $reqdata['updated_at'] = date('Y-m-d H:i:s');
        if (Auth::user()->company()->update($reqdata)) {
            Auth::user()->update(['email' => $request->email]);
            return ['message' => 'The company has been updated'];
        } else {
            return ['message' => 'Could not update the company details'];
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        // do not implement (only if needed)
    }

    /* ** WEB controller methodes ** */

    public function companies(Request $request) {
        Gate::authorize('view-companies-page');
        if ($request->has('search')) {
            $companies = Company::where('name', 'like', '%' . $request->search . '%')->paginate(8);
        } else {
            $companies = Company::paginate(8);
        }
        return view('companies', ['companies' => $companies, 'term' => $request->search, 'menuItem' => 'companies', 'pageTitle' => 'Overzicht bedrijven']);
    }

    public function companyDetail($id) {
        Gate::authorize('view-company-details');
        $company = Company::findOrFail($id);
        $proposals = Proposal::where('company_id', $id)->paginate(8);
        return view('company_detail', ['company' => $company, 'proposals' => $proposals, 'menuItem' => 'companies', 'pageTitle' => 'Detail Bedrijf']);
    }

    public function showAddCompany() {
        Gate::authorize('add-company');
        return view('company_add', ['menuItem' => 'addCompany', 'pageTitle' => 'Voeg bedrijf toe']);
    }

    public function addCompany(Request $request) {
        Gate::authorize('add-company');
        $request->validate([
            'email' => 'required|email|unique:users',
            'kbo_number' => 'required|unique:companies|numeric',
            'name' => 'required|unique:companies|max:125',
            'password' => 'required|min:8|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'required|min:8',
            'profile_image' => 'image|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        User::create(['email' => $request->email, 'password' => Hash::make($request->password), 'role' => 'company']);
        Company::create(['name' => $request->name, 'kbo_number' => $request->kbo_number,
            'user_id' => User::where('email', $request->email)->first()->id]);
        // add profile image url - name
        if ($request->file('profile_image')) {
            $request->file('profile_image')->store('images');
        }
        return redirect('dashboard/companies');
    }
}
