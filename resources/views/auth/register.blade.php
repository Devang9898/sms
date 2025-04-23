<!-- resources/views/auth/register.blade.php -->
<form action="{{ route('register') }}" method="POST">
    @csrf

    <!-- Email field -->
    <div>
        <label for="email">Email</label>
        <input type="email" name="email" id="email" value="{{ old('email') }}" required>
        @error('email')
            <div>{{ $message }}</div>
        @enderror
    </div>

    <!-- Role selection (Radio buttons for Admin or Student) -->
    <div>
        <label>Role</label><br>
        <label for="role_admin">
            <input type="radio" name="role" id="role_admin" value="admin" {{ old('role') == 'admin' ? 'checked' : '' }} required> Admin
        </label>
        <label for="role_student">
            <input type="radio" name="role" id="role_student" value="student" {{ old('role') == 'student' ? 'checked' : '' }} required> Student
        </label>
        @error('role')
            <div>{{ $message }}</div>
        @enderror
    </div>

    <!-- Submit button -->
    <button type="submit">Register</button>
</form>
