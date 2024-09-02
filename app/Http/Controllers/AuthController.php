<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\ForgotPasswordMail;
use App\Models\User;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function login()
    {
        // If the user is already logged in and is an admin, redirect to the dashboard
        if (Auth::check() && Auth::user()->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        // Show the login form
        return view('auth.login');
    }

    public function login_post(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $remember = $request->has('remember');

        // Attempt to log the user in
        if (Auth::attempt($credentials, $remember)) {
            // Check if the authenticated user is an admin
            if (Auth::user()->role === 'admin') {
                return redirect()->route('admin.dashboard')->with('success', 'Successfully logged in');
            } else {
                Auth::logout();
                return redirect()->route('login')->with('error', 'You are not authorized to access this page');
            }
        } else {
            return redirect()->back()->with('error', 'Invalid email or password');
        }
    }

    public function forgot()
    {
        return view('auth.forgot');
    }

    public function forgot_post(Request $request)
    {
    $count = User::where('email', '=', $request->email)->count();
    if ($count > 0) {
        $user = User::where('email', '=', $request->email)->first();
        $user->remember_token = Str::random(50);
        $user->save();

        // Pass the entire $user object to the Mailable
        Mail::to($user->email)->send(new ForgotPasswordMail($user));

        return redirect()->back()->with('success', 'Password reset link has been sent to your email.');
    } else {
        return redirect()->back()->withInput()->with('error', 'Email not found in the system');
    }
    }

    public function getReset($token)
    {
        $user = User::where('remember_token', $token)->first();
        if (!$user) {
            abort(403);
        }

        return view('auth.reset', ['token' => $token, 'email' => $user->email]);
    }

    public function postReset(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
            'token' => 'required',
        ]);

        $user = User::where('remember_token', $request->token)
                    ->where('email', $request->email)
                    ->first();

        if (!$user) {
            return redirect()->back()->withErrors(['email' => 'Invalid token or email.']);
        }

        $user->password = Hash::make($request->password);
        $user->remember_token = null;
        $user->save();

        return redirect()->route('login')->with('success', 'Password reset successfully.');
    }

public function resetPassword(Request $request)
{
    $request->validate([
        'email' => 'required|email|exists:users,email',
        'password' => 'required|confirmed|min:8',
        'token' => 'required',
    ]);

    $user = User::where('email', $request->email)
                ->where('remember_token', $request->token)
                ->first();

    if (!$user) {
        return redirect()->route('reset.password.form', ['token' => $request->token, 'email' => $request->email])
                         ->withErrors(['email' => 'Invalid token or email.']);
    }

    $user->password = bcrypt($request->password);
    $user->remember_token = null;
    $user->save();

    return redirect()->route('login')->with('success', 'Password successfully reset. You can now log in.');
    }


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}