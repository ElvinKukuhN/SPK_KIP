<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function showLoginForm()
    {
        return view('auth.signin');
    }

    public function login(Request $request)
    {
        Log::info('Attempting login with email: ' . $request->input('email'));

        $credentials = Auth::attempt($request->only('email', 'password'));

        if ($credentials) {
            $user = Auth::user();

            Log::info('Login successful. User role: ' . $user->role);

            if ($user->role == 1) {
                return redirect('Dashboard-Admin');
            } elseif ($user->role == 2) {
                return redirect('Hasil-Data');
            }
        }

        Log::info('Login failed.');


        return back()->withInput()->withErrors(['email' => 'Invalid credentials.']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
