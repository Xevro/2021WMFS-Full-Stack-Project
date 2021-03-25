<?php

namespace App\Http\Controllers;

use App\Http\Resources\CompanyResource;
use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CompanyController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index() {
        return CompanyResource::collection(Company::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return string[]
     */
    public function store(Request $request) {
        // add a company (register)
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
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return CompanyResource
     */
    public function show($id) {
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
        $reqdata = $request->all();
        $reqdata['updated_at'] = date('Y-m-d H:i:s');
        if (Company::where('id', $id)->update($reqdata)) {
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
}
