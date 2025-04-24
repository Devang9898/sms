<!-- resources/views/auth/student_register.blade.php -->

<form action="{{ route('student.store') }}" method="POST">
    @csrf

    <!-- Hidden inputs for email and role -->
    <input type="hidden" name="email" value="{{ auth()->user()->email }}">
    <input type="hidden" name="role" value="student">

    <!-- Input fields for student details -->
    <input type="text" name="first_name" placeholder="First Name" value="{{ old('first_name') }}" required>
    @error('first_name') <div class="error">{{ $message }}</div> @enderror

    <input type="text" name="last_name" placeholder="Last Name" value="{{ old('last_name') }}" required>
    @error('last_name') <div class="error">{{ $message }}</div> @enderror

    <input type="text" name="phone_number" placeholder="Phone Number" value="{{ old('phone_number') }}" required>
    @error('phone_number') <div class="error">{{ $message }}</div> @enderror

    <input type="date" name="date_of_birth" value="{{ old('date_of_birth') }}" required>
    @error('date_of_birth') <div class="error">{{ $message }}</div> @enderror

    <select name="gender" required>
        <option value="">Select Gender</option>
        <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
        <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
        <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>Other</option>
    </select>
    @error('gender') <div class="error">{{ $message }}</div> @enderror

    <input type="text" name="address" placeholder="Address" value="{{ old('address') }}" required>
    @error('address') <div class="error">{{ $message }}</div> @enderror

    <input type="text" name="city" placeholder="City" value="{{ old('city') }}" required>
    @error('city') <div class="error">{{ $message }}</div> @enderror

    <input type="text" name="state" placeholder="State" value="{{ old('state') }}" required>
    @error('state') <div class="error">{{ $message }}</div> @enderror

    <input type="text" name="registration_number" placeholder="Registration Number" value="{{ old('registration_number') }}" required>
    @error('registration_number') <div class="error">{{ $message }}</div> @enderror

    <input type="text" name="class" placeholder="Class" value="{{ old('class') }}" required>
    @error('class') <div class="error">{{ $message }}</div> @enderror

    <input type="text" name="division" placeholder="Division" value="{{ old('division') }}" required>
    @error('division') <div class="error">{{ $message }}</div> @enderror

    <input type="text" name="course" placeholder="Course" value="{{ old('course') }}" required>
    @error('course') <div class="error">{{ $message }}</div> @enderror

    <button type="submit">Complete Registration</button>
</form>
