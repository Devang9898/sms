<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Admin;
use App\Models\Student;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate(['email' => 'required|email']);
        $user = User::where('email', $request->email)->first();

        if ($user) {
            Auth::login($user);
            return $this->authenticated($request, $user);
        }

        return redirect()->back()->withErrors(['email' => 'Email not found.']);
    }

    protected function authenticated(Request $request, $user)
    {
        // Check if already registered
        if ($user->role == 'admin' && Admin::where('user_id', $user->id)->exists()) {
            return redirect()->route('admin.dashboard')->with('info', 'You are already registered as an Admin.');
        }

        if ($user->role == 'student' && Student::where('user_id', $user->id)->exists()) {
            return redirect()->route('student.dashboard')->with('info', 'You are already registered as a Student.');//needs to change to index if needed 
        }

        // If not registered, redirect to registration form
        if ($user->role == 'admin') {
            return redirect()->route('admin.register');
        }

        return redirect()->route('student.register');
    }

    // ADMIN registration form
    public function showAdminRegistrationForm()
    {
        $user = Auth::user();
        if (Admin::where('user_id', $user->id)->exists()) {
            return redirect()->route('admin.dashboard')->with('info', 'You are already registered as an Admin.');
        }

        return view('auth.admin_register');
    }

    public function registerAdmin(Request $request)
    {
        $user = Auth::user();

        if (Admin::where('user_id', $user->id)->exists()) {
            return redirect()->route('admin.dashboard')->with('info', 'You are already registered as an Admin.');
        }

        $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'phone_number' => 'required|string|max:15',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $profilePath = null;
        if ($request->hasFile('profile_picture')) {
            $profilePath = $request->file('profile_picture')->store('profile_pictures', 'public');
        }

        Admin::create([
            'user_id' => $user->id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone_number' => $request->phone_number,
            'profile_picture' => $profilePath,
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Admin registered successfully.');
    }

    // STUDENT registration form
    public function showStudentRegistrationForm()
    {
        $user = Auth::user();
        if (Student::where('user_id', $user->id)->exists()) {
            return redirect()->route('student.dashboard')->with('info', 'You are already registered as a Student.');
        }

        return view('auth.student_register');
    }

    public function registerStudent(Request $request)
    {
        $user = Auth::user();

        if (Student::where('user_id', $user->id)->exists()) {
            return redirect()->route('student.dashboard')->with('info', 'You are already registered as a Student.');
        }

        $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'phone_number' => 'required|string|max:15',
            'date_of_birth' => 'required|date',
            'gender' => 'required|in:male,female,other',
            'address' => 'required|string|max:255',
            'course' => 'required|string|max:100',
            'city' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'registration_number' => 'required|string|max:100|unique:students',
            'class' => 'required|string|max:50',
            'division' => 'required|string|max:50',
        ]);

        Student::create([
            'user_id' => $user->id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone_number' => $request->phone_number,
            'date_of_birth' => $request->date_of_birth,
            'gender' => $request->gender,
            'address' => $request->address,
            'course' => $request->course,
            'city' => $request->city,
            'state' => $request->state,
            'registration_number' => $request->registration_number,
            'class' => $request->class,
            'division' => $request->division,
        ]);

        return redirect()->route('student.dashboard')->with('success', 'Student registered successfully.');
    }
}


//modified code
// namespace App\Http\Controllers\Auth;

// use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
// use App\Models\User;

// class LoginController extends Controller
// {
//     // Show the login form
//     public function showLoginForm()
//     {
//         return view('auth.login');
//     }

//     // Handle the login logic using email only
//     public function login(Request $request)
//     {
//         $request->validate([
//             'email' => 'required|email',
//         ]);

//         $user = User::where('email', $request->email)->first();

//         if ($user) {
//             Auth::login($user); // Logs in the user without password
//             return $this->authenticated($request, $user);
//         }

//         return redirect()->back()->withErrors(['email' => 'Email not found.']);
//     }

//     // Redirect user based on role
//     protected function authenticated(Request $request, $user)
//     {
//         if ($user->role == 'admin') {
//             return redirect()->route('admin.register');
//         }

//         return redirect()->route('student.register');
//     }
// }

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
//         $credentials = $request->only('email');

//         if (Auth::attempt($credentials)) {
//             return $this->authenticated($request, Auth::user());
//         }

//         return redirect()->back()->withErrors(['email' => 'Invalid credentials.']);
//     }
// }

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
