<?php
namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    // View own profile + classmates
    public function index()
    {
        $student = Student::where('user_id', Auth::id())->firstOrFail();

        $classmates = Student::where('class', $student->class)
            ->where('division', $student->division)
            ->where('id', '!=', $student->id)
            ->get();

        return view('student.index', compact('student', 'classmates'));
    }
    public function submitStudentRegistration(Request $request)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:15',
            'address' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'date_of_birth' => 'required|date',
            'gender' => 'required|in:male,female,other',
            'course' => 'required|string',
            'registration_number' => 'required|string|unique:students',
            'class' => 'required|string',
            'division' => 'required|string',
        ]);

        // Create a new student record with validated data
        $student = new Student();
        $student->user_id = Auth::id();  // Assuming the user is already authenticated
        $student->first_name = $validated['first_name'];
        $student->last_name = $validated['last_name'];
        $student->phone_number = $validated['phone_number'];
        $student->address = $validated['address'];
        $student->city = $validated['city'];
        $student->state = $validated['state'];
        $student->date_of_birth = $validated['date_of_birth'];
        $student->gender = $validated['gender'];
        $student->course = $validated['course'];
        $student->registration_number = $validated['registration_number'];
        $student->class = $validated['class'];
        $student->division = $validated['division'];
        $student->save();

        // Redirect to the student dashboard after successful registration
        return redirect()->route('student.dashboard');
    }

    // Show form to edit own profile
    public function edit()
    {
        $student = Student::where('user_id', Auth::id())->firstOrFail();
        return view('student.edit', compact('student'));
    }

    // Update own profile
    public function update(Request $request)
    {
        $student = Student::where('user_id', Auth::id())->firstOrFail();

        $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'phone_number' => 'required|string|max:15',
            'date_of_birth' => 'nullable|date',
            'gender' => 'nullable|in:male,female,other',
            'address' => 'required|string|max:255',
            'course' => 'nullable|string|max:100',
            'city' => 'required|string|max:100',
            'state' => 'required|string|max:100',
        ]);

        $student->update($request->only([
            'first_name', 'last_name', 'phone_number', 'date_of_birth', 
            'gender', 'address', 'course', 'city', 'state'
        ]));

        return redirect()->route('student.dashboard')->with('success', 'Profile updated successfully.');
    }

    // View classmate details (read-only)
    public function show($id)
    {
        $currentStudent = Student::where('user_id', Auth::id())->firstOrFail();
        $student = Student::where('id', $id)
            ->where('class', $currentStudent->class)
            ->where('division', $currentStudent->division)
            ->firstOrFail();

        return view('student.show', compact('student'));
    }
}
