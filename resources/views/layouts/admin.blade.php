<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>
    @vite('resources/css/app.css') {{-- Tailwind CSS --}}
</head>
<body class="bg-gray-100">
    <header class="bg-green-800 text-white p-4">
        <h1 class="text-xl font-bold">Admin Panel</h1>
    </header>

    <main class="p-4">
        @yield('content')
    </main>

    <footer class="bg-green-900 text-white p-4 mt-8 text-center">
        &copy; {{ date('Y') }} Al Maslaha
    </footer>
</body>
</html>