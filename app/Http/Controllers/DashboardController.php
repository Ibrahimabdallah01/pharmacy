<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Models\User;

class DashboardController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard.list');
    }

    public function my_account(Request $request)
    {
        return view('admin.my_account.update');
    }

    public function updateProfile(Request $request)
{
    // Validate the input data
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users,email,' . Auth::id(),
        'password' => 'nullable|string|min:8|confirmed',
    ]);

    // Fetch the user
    $user = User::find(Auth::id());

    // Check if user exists
    if (!$user) {
        return redirect()->back()->with('error', 'User not found.');
    }

    // Update the user's profile
    $user->name = $request->name;
    $user->email = $request->email;

    // Check if the password field is filled
    if ($request->password) {
        $user->password = Hash::make($request->password);
    }

    try {
        $user->save();
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Failed to update profile: ' . $e->getMessage());
    }

    // Redirect back with a success message
    return redirect()->back()->with('success', 'Profile updated successfully!');
}

}