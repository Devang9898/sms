<h2>Welcome, 
    @if(Auth::user()->role === 'student')
        {{ Auth::user()->student->first_name }} {{ Auth::user()->student->last_name }} {{ Auth::user()->email }}
    @else
        Guest
    @endif
!</h2>
<p>This is your dashboard.</p>
