<?php 
namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    // Show the student registration form
    public function showRegistrationForm()
    {
        return view('student.register');  // Ensure you have a Blade view for the registration form
    }

    // Handle student registration form submission
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

        // Redirect to student dashboard or another page after successful registration
        return redirect()->route('student.dashboard');
    }
}
