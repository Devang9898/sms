<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    // Show role selection registration form
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    // Handle initial registration (select role and email)
    public function register(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|string|email|max:255|unique:users',
            'role' => 'required|in:admin,student',
        ]);

        // Create user (basic info)
        $user = User::create([
            'email' => $validated['email'],
            'role' => $validated['role'],
        ]);

        // Login user
        Auth::login($user);

        // Redirect based on role
        if ($user->role === 'admin') {
            return redirect()->route('auth.admin_register');
        } elseif ($user->role === 'student') {
            return redirect()->route('auth.student_register');
        }
    }

    // Show the admin details form (after initial email+role)
    public function showAdminRegistrationForm()
    {
        return view('auth.admin_register');
    }

    // Handle admin details submission
    public function registerAdmin(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|exists:users,email',
            'role' => 'required|in:admin',
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'phone_number' => 'required|string|max:15',
        ]);

        $user = Auth::user();

        // Ensure the logged-in user matches the provided email and role
        if ($user->email !== $validated['email'] || $user->role !== $validated['role']) {
            abort(403, 'Unauthorized access.');
        }

        // Create related admin record
        Admin::create([
            'user_id' => $user->id,
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'phone_number' => $validated['phone_number'],
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Admin registered successfully.');
    }
    // Show the student details form
    public function showStudentRegistrationForm()
    {
        return view('auth.student_register');
    }
    
    // Handle student details submission
    public function registerStudent(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|exists:users,email',
            'role' => 'required|in:student',
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'phone_number' => 'required|string|max:15',
            'date_of_birth' => 'required|date',
            'gender' => 'required|in:male,female,other',
            'address' => 'required|string|max:255',
            'course' => 'required|string|max:100',
            'city' => 'required|string|max:100',  // Added validation for city
            'state' => 'required|string|max:100', // Added validation for state
            'registration_number' => 'required|string|max:100|unique:students', // Added validation for registration number
            'class' => 'required|string|max:50',  // Added validation for class
            'division' => 'required|string|max:50', // Added validation for division
        ]);
    
        $user = Auth::user();
    
        if ($user->email !== $validated['email'] || $user->role !== $validated['role']) {
            abort(403, 'Unauthorized access.');
        }
    
        Student::create([
            'user_id' => $user->id,
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'phone_number' => $validated['phone_number'],
            'date_of_birth' => $validated['date_of_birth'],
            'gender' => $validated['gender'],
            'address' => $validated['address'],
            'course' => $validated['course'],
            'city' => $validated['city'],  // Added city
            'state' => $validated['state'], // Added state
            'registration_number' => $validated['registration_number'], // Added registration number
            'class' => $validated['class'], // Added class
            'division' => $validated['division'], // Added division
        ]);
    
        return redirect()->route('student.dashboard')->with('success', 'Student registered successfully.');
    }
    

}
