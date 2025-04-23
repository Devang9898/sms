<?php 
namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    // Show the admin registration form
    public function showRegistrationForm()
    {
        return view('admin.register');  // Ensure you have a Blade view for the registration form
    }

    // Handle admin registration form submission
    public function submitAdminRegistration(Request $request)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:15',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',  // Validate image
        ]);

        // Handle file upload for profile picture if exists
        $profilePicturePath = null;
        if ($request->hasFile('profile_picture')) {
            $profilePicturePath = $request->file('profile_picture')->store('profile_pictures', 'public');  // Store image in public disk
        }

        // Create admin user (assuming the user is already authenticated)
        $admin = new Admin();
        $admin->user_id = Auth::id();  // Assuming the user is already authenticated
        $admin->first_name = $validated['first_name'];
        $admin->last_name = $validated['last_name'];
        $admin->phone_number = $validated['phone_number'];
        $admin->profile_picture = $profilePicturePath;  // Store the profile picture path if uploaded
        $admin->save();

        // Redirect to the admin dashboard or another page after successful registration
        return redirect()->route('admin.dashboard');
    }
}
