<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'CMS Admin Panel')</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <nav class="bg-blue-600 text-white p-4">
        <div class="container mx-auto flex justify-between">
            <h1 class="text-2xl font-bold">CMS Admin Panel</h1>
            <div>
                <a href="{{ route('smart_picks.index') }}" class="text-white hover:underline mx-2">Smart Picks</a>
                <a href="{{ route('admin.logout') }}" class="text-white hover:underline">Logout</a>
            </div>
        </div>
    </nav>
    @yield('content')
</body>
</html>