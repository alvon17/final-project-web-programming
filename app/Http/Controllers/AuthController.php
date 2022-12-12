<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\Country;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function registration()
    {
        $countries = Country::all();
        return view('auth.registration', ['countries' => $countries]);
    }

    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            if ($request->has('remember')) {
                Cookie::queue(Cookie::make('username', $credentials['email'], 120));
                Cookie::queue(Cookie::make('password', $credentials['password'], 120));
            }

            return redirect()->intended('dashboard')
                ->withSuccess('Signed in');
        }

        $errors = new MessageBag(['password' => ['Wrong Password']]);

        return Redirect::back()->withErrors($errors);
    }


    public function customRegistration(Request $request)
    {
        $request->validate([
            'name' => 'required|min:5',
            'email' => 'required|email|unique:users|regex:/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/',
            'passwords' => 'required|min:8',
            'confirm_password' => 'required|same:passwords',
            'gender' => 'required',
            'date_of_birth' => 'required|date|after:01/01/1900|before:today',
            'country_id' => 'required',
        ]);

        $data = $request->all();
        // $check = $this->create($data);
        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['passwords']),
            'gender' => $data['gender'],
            'date_of_birth' => $data['date_of_birth'],
            'country_id' => $data['country_id'],
        ]);

        return redirect('login');
    }

    public function dashboard()
    {
        // if (Auth::check()) {
        //     return view('index');
        // }

        // return redirect('login')->withSuccess('You are not allowed to access');
        return view('index');
    }

    public function logout()
    {
        Cookie::queue(Cookie::forget('username'));
        Cookie::queue(Cookie::forget('password'));

        Session::flush();
        Auth::logout();

        return redirect('login');
    }
}