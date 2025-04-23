<!-- resources/views/admin/register.blade.php -->

<form action="{{ route('admin.register.submit') }}" method="POST" enctype="multipart/form-data">
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
        <label for="profile_picture">Profile Picture</label>
        <input type="file" id="profile_picture" name="profile_picture">
        @error('profile_picture')
            <div>{{ $message }}</div>
        @enderror
    </div>

    <button type="submit">Register</button>
</form>
