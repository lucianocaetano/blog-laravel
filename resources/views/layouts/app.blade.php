<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My App - @yield("title")</title>
    <script src="//unpkg.com/alpinejs" defer></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <x-notifications/>
    <main class="container mx-auto">
        @yield("content")
    </main>
</body>
</html>
