<form method="POST" action="{{ route('login') }}">
    @csrf
    <label for="email">Email:</label>
    <input type="email" name="email" required>

    <button type="submit">Login</button>
</form>
