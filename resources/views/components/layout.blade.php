<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Tailwind CSS Home Page</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans">

    <header class="bg-white shadow-md">
        <nav class="container mx-auto px-6 py-4 flex justify-between items-center">
            <a href="#" class="text-2xl font-bold text-gray-800">My Website</a>
            <div class="hidden md:block">
                <div class="ml-10 flex items-baseline space-x-4">
                    <x-nav-link href="/" :active="request()->is('/')">Home</x-nav-link>
                    <x-nav-link href="/about" :active="request()->is('about')">About</x-nav-link>
                    <x-nav-link href="/contact" :active="request()->is('contact')">Contact</x-nav-link>
                </div>
            </div>
        </nav>
    </header>
    <main class="container mx-auto mt-10 px-6 py-8">
        <div class="bg-white p-8 rounded-lg shadow-md">
            <h1 class="text-4xl font-bold text-gray-800 mb-4">{{ $heading }}</h1>
            {{ $slot }}
        </div>
    </main>

    <footer class="mt-10 py-4 text-center text-gray-500 text-sm">
        <p>&copy; 2025 My Website. All rights reserved.</p>
    </footer>

</body>
</html>