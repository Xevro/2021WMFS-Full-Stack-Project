<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Mentor;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'kbo_number' => 'required|int|unique:companies',
           // 'name' => 'required|string',
            'email' => 'required|string|email|max:255|unique:companies',
            'password' => 'required|string|confirmed|min:8',
        ]);

        Auth::login($user = Company::create([
            //'name', $request->email,
            'kbo_number' => $request->kbo_number,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            //'role' => 'company'
        ]));

        event(new Registered($user));

        return redirect(RouteServiceProvider::HOME);
    }
}
