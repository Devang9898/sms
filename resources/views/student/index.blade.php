@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Welcome, {{ $student->first_name }} {{ $student->last_name }}</h2>

    <h4>Your Profile</h4>
    <ul>
        <li><strong>Phone:</strong> {{ $student->phone_number }}</li>
        <li><strong>Date of Birth:</strong> {{ $student->date_of_birth }}</li>
        <li><strong>Gender:</strong> {{ ucfirst($student->gender) }}</li>
        <li><strong>Address:</strong> {{ $student->address }}</li>
        <li><strong>City:</strong> {{ $student->city }}</li>
        <li><strong>State:</strong> {{ $student->state }}</li>
        <li><strong>Class:</strong> {{ $student->class }}</li>
        <li><strong>Division:</strong> {{ $student->division }}</li>
    </ul>

    <a href="{{ route('student.edit') }}" class="btn btn-primary mb-4">Edit Your Details</a>

    <h4>Classmates ({{ $student->class }} - {{ $student->division }})</h4>
    @if($classmates->isEmpty())
        <p>No classmates found.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Registration No.</th>
                    <th>Phone</th>
                    <th>City</th>
                    <th>Course</th>
                </tr>
            </thead>
            <tbody>
                @foreach($classmates as $mate)
                    <tr>
                        <td>{{ $mate->first_name }} {{ $mate->last_name }}</td>
                        <td>{{ $mate->registration_number }}</td>
                        <td>{{ $mate->phone_number }}</td>
                        <td>{{ $mate->city }}</td>
                        <td>{{ $mate->course }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
