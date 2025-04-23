<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Override the authenticated method to redirect based on user role
    public function authenticated(Request $request, $user)
    {
        if ($user->role == 'admin') {
            return redirect()->route('admin.register');
        }

        return redirect()->route('student.register');
    }

    // Show the login form
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Handle the login logic
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return $this->authenticated($request, Auth::user());
        }

        return redirect()->back()->withErrors(['email' => 'Invalid credentials.']);
    }
}

// namespace App\Http\Controllers\Auth;

// use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;

// class LoginController extends Controller
// {
//     // Override the authenticated method to redirect based on user role
//     public function authenticated(Request $request, $user)
//     {
//         if ($user->role == 'admin') {
//             return redirect()->route('admin.register');
//         }

//         return redirect()->route('student.register');
//     }

//     // Show the login form
//     public function showLoginForm()
//     {
//         return view('auth.login');
//     }

//     // Handle the login logic
//     public function login(Request $request)
//     {
//         $credentials = $request->only('email', 'password');

//         if (Auth::attempt($credentials)) {
//             return $this->authenticated($request, Auth::user());
//         }

//         return redirect()->back()->withErrors(['email' => 'Invalid credentials.']);
//     }

//     // Show the admin registration form
//     public function showAdminRegistrationForm()
//     {
//         return view('auth.admin_register');
//     }

//     // Show the student registration form
//     public function showStudentRegistrationForm()
//     {
//         return view('auth.student_register');
//     }
// }
