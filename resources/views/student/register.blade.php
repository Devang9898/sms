<!-- resources/views/student/register.blade.php -->

<form action="{{ route('student.register.submit') }}" method="POST">
    @csrf
    <div>
        <label for="first_name">First Name</label>
        <input type="text" id="first_name" name="first_name" value="{{ old('first_name') }}" required>
        @error('first_name')
            <div>{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label for="last_name">Last Name</label>
        <input type="text" id="last_name" name="last_name" value="{{ old('last_name') }}" required>
        @error('last_name')
            <div>{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label for="phone_number">Phone Number</label>
        <input type="text" id="phone_number" name="phone_number" value="{{ old('phone_number') }}" required>
        @error('phone_number')
            <div>{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label for="address">Address</label>
        <input type="text" id="address" name="address" value="{{ old('address') }}" required>
        @error('address')
            <div>{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label for="city">City</label>
        <input type="text" id="city" name="city" value="{{ old('city') }}" required>
        @error('city')
            <div>{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label for="state">State</label>
        <input type="text" id="state" name="state" value="{{ old('state') }}" required>
        @error('state')
            <div>{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label for="date_of_birth">Date of Birth</label>
        <input type="date" id="date_of_birth" name="date_of_birth" value="{{ old('date_of_birth') }}" required>
        @error('date_of_birth')
            <div>{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label for="gender">Gender</label>
        <select id="gender" name="gender" required>
            <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
            <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
            <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>Other</option>
        </select>
        @error('gender')
            <div>{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label for="course">Course</label>
        <input type="text" id="course" name="course" value="{{ old('course') }}" required>
        @error('course')
            <div>{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label for="registration_number">Registration Number</label>
        <input type="text" id="registration_number" name="registration_number" value="{{ old('registration_number') }}" required>
        @error('registration_number')
            <div>{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label for="class">Class</label>
        <input type="text" id="class" name="class" value="{{ old('class') }}" required>
        @error('class')
            <div>{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label for="division">Division</label>
        <input type="text" id="division" name="division" value="{{ old('division') }}" required>
        @error('division')
            <div>{{ $message }}</div>
        @enderror
    </div>

    <button type="submit">Register</button>
</form>
