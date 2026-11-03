<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use App\Models\User;

class AuthController extends Controller
{
    public function login()
    {

        Log::info('Login page accessed');
        // Logic for handling login
        return view('backend.auth.login');
    }

    public function logout()
    {
        Auth::logout();
        session()->forget(['sub_user_id', 'sub_user_email']); // Clear subuser session data
        session()->flash('success', 'Logged out successfully.');
        return redirect()->route('login')->with('success', 'Logged out successfully.');
    }



    public function postlogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $email = $request->input('email');
        $password = $request->input('password');

        // If using 'loginId' instead of default 'email'
        $user = User::where('loginId', $email)->first();


        if (!$user) {
            return back()->with('error', 'User not found.')->withInput();
        }
        Log::info('User login attempt', [
            'email' => $email,
            'user_id' => $user->id,
            'ip_address' => $request->ip(),
        ]);
        if (!Hash::check($password, $user->password)) {
            Log::info('passwords', [
                'input_password' => $password,
                'hashed_password' => $user->password,
                'userPassword' => $user->password,
            ]);

            return back()->with('error', 'Invalid credentials.')->withInput();
        }


        Auth::login($user);

        return redirect()->route('backend.dashboard')->with('success', 'Login successful!');
    }
}