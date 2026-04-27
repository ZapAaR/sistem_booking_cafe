<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="light">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', config('app.name', 'Laravel'))</title>

    <!-- Fonts & Styles -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=DM+Mono:wght@400;500&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.2/dist/chart.umd.min.js"></script>

    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'sans-serif'],
                        mono: ['DM Mono', 'monospace'],
                    },
                    colors: {
                        brand: {
                            50: '#eef2ff', 100: '#e0e7ff', 200: '#c7d2fe',
                            300: '#a5b4fc', 400: '#818cf8', 500: '#6366f1',
                            600: '#4f46e5', 700: '#4338ca', 800: '#3730a3', 900: '#312e81',
                        }
                    }
                }
            }
        }
    </script>

    <style>
        * { box-sizing: border-box; }
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        ::-webkit-scrollbar { width: 5px; height: 5px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: #c7d2fe; border-radius: 99px; }
        .dark ::-webkit-scrollbar-thumb { background: #3730a3; }

        #sidebar { transition: transform 0.28s cubic-bezier(.4,0,.2,1); }

        .nav-item.active {
            background: linear-gradient(90deg, #4f46e5 0%, #6366f1 100%);
            color: #fff !important;
            box-shadow: 0 4px 14px rgba(79,70,229,.35);
        }
        .nav-item.active svg { color: #fff !important; }
        .nav-item { transition: all .18s; }
        .nav-item:not(.active):hover { background: rgba(99,102,241,.1); }
        .dark .nav-item:not(.active):hover { background: rgba(99,102,241,.18); }

        .page { display: none; }
        .page.active { display: block; }

        .stat-card { transition: transform .2s, box-shadow .2s; }
        .stat-card:hover { transform: translateY(-3px); box-shadow: 0 12px 28px rgba(0,0,0,.1); }
        .dark .stat-card:hover { box-shadow: 0 12px 28px rgba(0,0,0,.4); }

        #modal-overlay { transition: opacity .2s; }
        #modal-box { transition: transform .22s cubic-bezier(.4,0,.2,1), opacity .22s; }
        #modal-overlay.hidden { pointer-events: none; }

        .badge { display:inline-flex; align-items:center; padding:2px 10px; border-radius:99px; font-size:.72rem; font-weight:600; }

        tbody tr:nth-child(even) { background: rgba(238,242,255,.5); }
        .dark tbody tr:nth-child(even) { background: rgba(49,46,129,.12); }
        tbody tr { transition: background .15s; }
        tbody tr:hover { background: rgba(99,102,241,.08) !important; }
        .dark tbody tr:hover { background: rgba(99,102,241,.18) !important; }

        #toast { transition: opacity .3s, transform .3s; }
        #toast.show { opacity:1 !important; transform: translateY(0) !important; }

        @keyframes pulse-dot {
            0%,100% { transform: scale(1); opacity:1; }
            50% { transform: scale(1.4); opacity:.7; }
        }
        .pulse-dot { animation: pulse-dot 1.8s infinite; }
    </style>

    @stack('styles')
</head>

<body class="bg-slate-100 dark:bg-slate-950 text-slate-800 dark:text-slate-100 min-h-screen">

    <div id="overlay"
     onclick="closeSidebar()"
     class="fixed inset-0 bg-black/40 z-30 hidden">
</div>

    @include('layouts.sidebar')

    <div class="lg:pl-64 min-h-screen flex flex-col">
        @include('layouts.navigation')

        <main class="flex-1 p-4 md:p-6 space-y-6">
            @yield('content')
        </main>
    </div>

    @include('layouts.modal')
    @include('layouts.toast')

    @stack('scripts')

    <script src="//unpkg.com/alpinejs" defer></script>
    <script>
function toggleDark() {
    const html = document.documentElement;

    // toggle class dark
    html.classList.toggle('dark');

    // toggle icon
    document.getElementById('icon-moon').classList.toggle('hidden');
    document.getElementById('icon-sun').classList.toggle('hidden');

    // simpan ke localStorage
    if (html.classList.contains('dark')) {
        localStorage.setItem('theme', 'dark');
    } else {
        localStorage.setItem('theme', 'light');
    }
}

// load theme saat refresh
document.addEventListener('DOMContentLoaded', () => {
    const theme = localStorage.getItem('theme');

    if (theme === 'dark') {
        document.documentElement.classList.add('dark');
        document.getElementById('icon-moon').classList.add('hidden');
        document.getElementById('icon-sun').classList.remove('hidden');
    }
});

function openSidebar() {
    document.getElementById('sidebar').classList.remove('-translate-x-full');
    document.getElementById('overlay').classList.remove('hidden');
}

function closeSidebar() {
    document.getElementById('sidebar').classList.add('-translate-x-full');
    document.getElementById('overlay').classList.add('hidden');
}
</script>
</body>
</html>
