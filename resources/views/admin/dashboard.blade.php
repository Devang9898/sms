<h2>Welcome, 
    @if(Auth::user()->role === 'admin')
        {{ Auth::user()->admin->first_name }} {{ Auth::user()->admin->last_name }}
    @else
        Guest
    @endif
!</h2>
<p>This is your dashboard.</p>
