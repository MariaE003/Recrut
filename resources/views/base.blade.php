<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recrut</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .glass { background: rgba(255, 255, 255, 0.7); backdrop-filter: blur(12px); }
    </style>
</head>
<body class="bg-[#F8FAFC] antialiased">

<header class="fixed w-full top-0 z-50 px-6 py-4">
    <nav class="max-w-7xl mx-auto glass border border-white/40 shadow-lg shadow-indigo-100/20 rounded-[24px] px-8 py-3 flex justify-between items-center">
        <!-- Logo -->
        <a href="{{route('home')}}" class="flex items-center gap-3 group cursor-pointer">
            <div class="bg-indigo-600 p-2 rounded-xl group-hover:rotate-12 transition-transform duration-300">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
            </div>
            <span class="text-2xl font-extrabold tracking-tighter text-slate-800 tracking-tight">Recrut</span>
        </a>

        <!-- Links -->
        <div class="hidden md:flex items-center gap-8">
            <a href="{{route('home')}}" class="text-sm font-semibold text-slate-600 hover:text-indigo-600 transition-colors">Accueil</a>
            <a href="#" class="text-sm font-semibold text-slate-600 hover:text-indigo-600 transition-colors">Rechercher</a>
        </div>
        <!-- login signup -->
                <nav class="flex items-center justify-end gap-4">
                        @guest
                        <a
                            href="{{ route('login') }}"
                            class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] text-[#1b1b18] border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal"
                        >
                        Log in
                        </a>
                            <a
                                href="{{ route('register') }}"
                                class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
                                Register
                            </a>
                        @endguest
                </nav>

        <!-- User -->
        <div class="flex items-center gap-4 pl-6 border-l border-slate-200">
            <div class="text-right hidden sm:block">
                <p class="text-sm font-bold text-slate-900 leading-none">
                    @if(auth()->user()) {{ Auth::user()->name }} @endif</p>
            </div>

            @if(auth()->user())
                <a href="{{route('profile.edit')}}" class="h-10 w-10 rounded-full ring-2 ring-indigo-50 ring-offset-2 overflow-hidden cursor-pointer hover:opacity-80 transition">
                    <img src="https://ui-avatars.com/api/?name={{Auth::user()->name}}&background=6366f1&color=fff" alt="Avatar">
                </a>
            @endif

        </div>
    </nav>
</header>

<main class="min-h-screen pt-32 pb-20">
    @yield('contenu')
</main>

<footer class="text-center py-10">
    <p class="text-slate-400 text-sm font-medium">© 2026 Talentia Inc. — <span class="text-slate-900">Designed for Excellence.</span></p>
</footer>

</body>
</html>