<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'PopMart' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="bg-slate-200 dark:bg-slate-700">
    @livewire('partials.navbar')
    {{ $slot }}
    @livewire('partials.footer')
    @livewireScripts
</body>
</html>
