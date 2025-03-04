<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My App - @yield("title")</title>
    <script src="//unpkg.com/alpinejs" defer></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <x-notifications type="error"/>
    <x-notifications type="warning"/>
    <x-notifications type="success"/>
    <x-navbar/> 
    <main class="container mx-auto">
        @yield("content")
    </main>
</body>
</html>
