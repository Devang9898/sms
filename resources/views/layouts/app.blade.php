<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel App</title>
    <!-- Add your CSS or links to any CSS files here -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"> <!-- Optional: Link to your compiled CSS -->
</head>
<body class="bg-gray-100 font-roboto">

    <!-- Main Navigation (optional) -->
    <header>
        <nav class="bg-blue-600 text-white py-3">
            <div class="container mx-auto">
                <a href="{{ url('/') }}" class="text-lg font-semibold">Laravel App</a>
            </div>
        </nav>
    </header>

    <!-- Main Content Section -->
    <main class="py-8">
        @yield('content') <!-- Content of specific pages will be injected here -->
    </main>

    <!-- Footer (optional) -->
    <footer class="bg-gray-800 text-white py-4 mt-8">
        <div class="container mx-auto text-center">
            <p>&copy; {{ date('Y') }} Laravel App</p>
        </div>
    </footer>

</body>
</html>
