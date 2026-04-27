  <!-- ===== TOP NAVBAR ===== -->
  <header class="sticky top-0 z-20 bg-white/90 dark:bg-slate-900/90 backdrop-blur border-b border-slate-200 dark:border-slate-800 h-16 flex items-center px-4 gap-3">
    <!-- Hamburger -->
    <button onclick="openSidebar()" class="lg:hidden p-2 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-800 text-slate-500">
      <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/></svg>
    </button>

    <!-- Page title -->
    <div id="navbar-title" class="text-base font-bold text-slate-800 dark:text-white">Dashboard</div>

    <!-- Spacer -->
    <div class="flex-1"></div>

    <!-- Search -->
    <div class="hidden sm:flex items-center bg-slate-100 dark:bg-slate-800 rounded-xl px-3 py-2 gap-2 w-52">
      <svg class="w-4 h-4 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><path stroke-linecap="round" stroke-linejoin="round" d="m21 21-4.35-4.35"/></svg>
      <input type="text" placeholder="Cari..." class="bg-transparent text-sm outline-none text-slate-700 dark:text-slate-200 placeholder-slate-400 w-full"/>
    </div>

    <!-- Dark mode toggle -->
    <button id="dark-toggle" onclick="toggleDark()" class="p-2 rounded-xl hover:bg-slate-100 dark:hover:bg-slate-800 text-slate-500 dark:text-slate-400">
      <svg id="icon-moon" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"/></svg>
      <svg id="icon-sun" class="w-5 h-5 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="5"/><path stroke-linecap="round" stroke-linejoin="round" d="M12 1v2M12 21v2M4.22 4.22l1.42 1.42M18.36 18.36l1.42 1.42M1 12h2M21 12h2M4.22 19.78l1.42-1.42M18.36 5.64l1.42-1.42"/></svg>
    </button>

    <!-- Notification bell -->
    <div class="relative">
      <button class="p-2 rounded-xl hover:bg-slate-100 dark:hover:bg-slate-800 text-slate-500 dark:text-slate-400">
        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/></svg>
        <span class="absolute top-1.5 right-1.5 w-2 h-2 bg-red-500 rounded-full pulse-dot"></span>
      </button>
    </div>

    <!-- User menu -->
    <div class="relative" x-data="{ open: false }">
        {{-- Avatar --}}
        <div @click="open = !open" class="w-8 h-8 rounded-full bg-gradient-to-br from-blue-400 to-blue-700 flex items-center justify-center text-white text-xs font-bold cursor-pointer">
            {{ strtoupper(substr(auth()->user()->name ?? '', 0, 1)) }}
        </div>

        {{-- Dropdown --}}
        <div x-show="open" class="absolute right-0 mt-2 w-40 bg-white rounded-lg shadow-lg z-50">
            <a href="{{ route('profile.edit') }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-slate-700">Profile</a>

            {{-- Logout --}}
        <form action="{{ route('logout') }}" method="post" >
            @csrf
            <button type="submit" class="block w-full text-left px-4 py-2 hover:bg-gray-100 dark:hover:bg-slate-700">Logout</button>
        </form>
        </div>

    </div>
  </header>
