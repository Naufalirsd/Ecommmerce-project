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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11" defer></script>
    <script src="https://unpkg.com/preline@latest/dist/preline.js" defer></script>
    @livewireScripts
    @livewireAlertScripts

    <script>
    function initPreline() {
        if (window.HSStaticMethods && typeof window.HSStaticMethods.autoInit === 'function') {
            window.HSStaticMethods.autoInit();
        } else {
            console.warn("Preline belum siap!");
        }
    }

    window.addEventListener('DOMContentLoaded', initPreline);

    // Reinit setelah Livewire navigasi
    document.addEventListener('livewire:navigated', () => {
        initPreline();
    });
</script>
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>
</html>
