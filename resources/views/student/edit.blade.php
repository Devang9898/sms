@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Your Profile</h2>

    <form method="POST" action="{{ route('student.update') }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>First Name</label>
            <input name="first_name" value="{{ old('first_name', $student->first_name) }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Last Name</label>
            <input name="last_name" value="{{ old('last_name', $student->last_name) }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Phone Number</label>
            <input name="phone_number" value="{{ old('phone_number', $student->phone_number) }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Date of Birth</label>
            <input type="date" name="date_of_birth" value="{{ old('date_of_birth', $student->date_of_birth) }}" class="form-control">
        </div>

        <div class="form-group">
            <label>Gender</label>
            <select name="gender" class="form-control">
                <option value="">Select</option>
                <option value="male" {{ old('gender', $student->gender) == 'male' ? 'selected' : '' }}>Male</option>
                <option value="female" {{ old('gender', $student->gender) == 'female' ? 'selected' : '' }}>Female</option>
                <option value="other" {{ old('gender', $student->gender) == 'other' ? 'selected' : '' }}>Other</option>
            </select>
        </div>

        <div class="form-group">
            <label>Address</label>
            <input name="address" value="{{ old('address', $student->address) }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label>City</label>
            <input name="city" value="{{ old('city', $student->city) }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label>State</label>
            <input name="state" value="{{ old('state', $student->state) }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Course</label>
            <input name="course" value="{{ old('course', $student->course) }}" class="form-control">
        </div>

        <div class="form-group">
            <label>Class</label>
            <input name="class" value="{{ old('class', $student->class) }}" class="form-control">
        </div>

        <div class="form-group">
            <label>Division</label>
            <input name="division" value="{{ old('division', $student->division) }}" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Update Profile</button>
    </form>
</div>
@endsection
