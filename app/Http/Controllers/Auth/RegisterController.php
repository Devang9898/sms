<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;

// No changes in namespace or use statements

class RegisterController extends Controller
{
    // Show initial registration form (email + role)
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|string|email|max:255|unique:users',
            'role' => 'required|in:admin,student',
        ]);

        User::create([
            'email' => $validated['email'],
            'role' => $validated['role'],
        ]);

        // Redirect to login
        return redirect()->route('login')->with('success', 'Registered successfully. Please login to continue.');
    }
}
