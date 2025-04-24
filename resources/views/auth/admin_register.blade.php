@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto mt-10 bg-white p-6 rounded shadow-md">
    <h2 class="text-2xl font-bold mb-4 text-center">Admin Registration</h2>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <input type="hidden" name="email" value="{{ auth()->user()->email }}">
        <input type="hidden" name="role" value="admin">

        <div class="mb-4">
            <label for="first_name" class="block font-medium">First Name</label>
            <input type="text" name="first_name" id="first_name" value="{{ old('first_name') }}"
                   class="w-full border-gray-300 rounded p-2" required>
            @error('first_name')
                <div class="text-red-600 text-sm">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="last_name" class="block font-medium">Last Name</label>
            <input type="text" name="last_name" id="last_name" value="{{ old('last_name') }}"
                   class="w-full border-gray-300 rounded p-2" required>
            @error('last_name')
                <div class="text-red-600 text-sm">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="phone_number" class="block font-medium">Phone Number</label>
            <input type="text" name="phone_number" id="phone_number" value="{{ old('phone_number') }}"
                   class="w-full border-gray-300 rounded p-2" required>
            @error('phone_number')
                <div class="text-red-600 text-sm">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="profile_picture" class="block font-medium">Profile Picture</label>
            <input type="file" name="profile_picture" id="profile_picture" class="w-full border-gray-300 rounded p-2">
            @error('profile_picture')
                <div class="text-red-600 text-sm">{{ $message }}</div>
            @enderror
        </div>

        <div class="mt-6">
            <button type="submit"
                    class="w-full bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700">
                Complete Registration
            </button>
        </div>
    </form>
</div>
@endsection
