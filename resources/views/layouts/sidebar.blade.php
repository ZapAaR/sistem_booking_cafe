<!-- ===================== SIDEBAR ===================== -->
<aside id="sidebar"
  class="fixed top-0 left-0 h-full w-64 z-40 bg-white dark:bg-slate-900 border-r border-slate-200 dark:border-slate-800 flex flex-col shadow-xl lg:shadow-none -translate-x-full lg:translate-x-0">

    <!-- Logo -->
    <div class="flex items-center gap-3 px-5 py-5 border-b border-slate-100 dark:border-slate-800">
        <div class="w-9 h-9 rounded-xl bg-brand-600 flex items-center justify-center shadow-lg shadow-brand-300/40">
            <svg class="w-5 h-5 text-white" viewBox="0 0 24 24" fill="currentColor">
                <path
                    d="M18 8h1a3 3 0 010 6h-1v1a4 4 0 01-4 4H8a4 4 0 01-4-4V8h14zm0 2H6v5a2 2 0 002 2h6a2 2 0 002-2v-5zm1 0v4a1 1 0 000-4zM9 2a1 1 0 011 1v2H8V3a1 1 0 011-1zm4 0a1 1 0 011 1v2h-2V3a1 1 0 011-1z" />
            </svg>
        </div>
        <div>
            <div class="font-extrabold text-base text-brand-700 dark:text-brand-300 leading-tight">ZafarCafe</div>
            <div class="text-[10px] text-slate-400 font-medium uppercase tracking-widest">Admin Panel</div>
        </div>
        <!-- Close btn mobile -->
        <button onclick="closeSidebar()" class="ml-auto lg:hidden text-slate-400 hover:text-slate-600">
            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>

    <!-- Nav Menu -->
    <nav class="flex-1 overflow-y-auto px-3 py-4 space-y-0.5">
        <p class="text-[10px] uppercase tracking-widest text-slate-400 font-semibold px-3 mb-2">Utama</p>

        <a href="{{ route('admin.dashboard') }}"
            class="nav-item active flex items-center gap-3 px-3 py-2.5 rounded-xl cursor-pointer text-slate-600 dark:text-slate-300 text-sm font-medium"
            data-page="dashboard" onclick="navigate(event, 'dashboard')">
            <svg class="w-4.5 h-4.5 w-5 h-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                stroke-width="2">
                <rect x="3" y="3" width="7" height="7" rx="1.5" />
                <rect x="14" y="3" width="7" height="7" rx="1.5" />
                <rect x="3" y="14" width="7" height="7" rx="1.5" />
                <rect x="14" y="14" width="7" height="7" rx="1.5" />
            </svg>
            Dashboard
        </a>

        <p class="text-[10px] uppercase tracking-widest text-slate-400 font-semibold px-3 mt-4 mb-2">Manajemen</p>

        <a href="#"
            class="nav-item flex items-center gap-3 px-3 py-2.5 rounded-xl cursor-pointer text-slate-600 dark:text-slate-300 text-sm font-medium"
            data-page="services" onclick="navigate(event, 'services')">
            <svg class="w-5 h-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <!-- meja -->
                <rect x="4" y="6" width="16" height="3" rx="1.5" />

                <!-- kaki -->
                <path stroke-linecap="round" stroke-linejoin="round" d="M7 9v7M17 9v7" />

                <!-- detail bawah -->
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 16h14" />
            </svg>
            Kelola Meja
        </a>

        <a href="#"
            class="nav-item flex items-center gap-3 px-3 py-2.5 rounded-xl cursor-pointer text-slate-600 dark:text-slate-300 text-sm font-medium"
            data-page="booking" onclick="navigate(event, 'booking')">
            <svg class="w-5 h-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
            Kelola Booking
            <span
                class="ml-auto bg-brand-100 text-brand-700 dark:bg-brand-900 dark:text-brand-300 text-[10px] font-bold px-2 py-0.5 rounded-full">8</span>
        </a>

        <a href="#"
            class="nav-item flex items-center gap-3 px-3 py-2.5 rounded-xl cursor-pointer text-slate-600 dark:text-slate-300 text-sm font-medium"
            data-page="users" onclick="navigate(event, 'users')">
            <svg class="w-5 h-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <!-- kepala -->
                <circle cx="12" cy="7" r="3" />

                <!-- badan -->
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 20a6 6 0 0112 0" />

                <!-- meja -->
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 14h16" />
            </svg>
            Kelola Pelanggan
        </a>

        <a href="{{ route('admin.kategori.index') }}"
            class="nav-item flex items-center gap-3 px-3 py-2.5 rounded-xl cursor-pointer text-slate-600 dark:text-slate-300 text-sm font-medium"
            data-page="users" onclick="navigate(event, 'users')">
            <svg class="w-5 h-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
  <!-- cangkir -->
  <path stroke-linecap="round" stroke-linejoin="round" d="M3 8h13v8a4 4 0 01-4 4H7a4 4 0 01-4-4V8z"/>
  
  <!-- handle -->
  <path stroke-linecap="round" stroke-linejoin="round" d="M16 10h2a2 2 0 010 4h-2"/>
  
  <!-- steam -->
  <path stroke-linecap="round" stroke-linejoin="round" d="M8 2v2M12 2v2M16 2v2"/>
</svg>
            Kelola Kategori Menu
        </a>

        <p class="text-[10px] uppercase tracking-widest text-slate-400 font-semibold px-3 mt-4 mb-2">Laporan & Tools
        </p>

        <a href="#"
            class="nav-item flex items-center gap-3 px-3 py-2.5 rounded-xl cursor-pointer text-slate-600 dark:text-slate-300 text-sm font-medium"
            data-page="reports" onclick="navigate(event, 'reports')">
            <svg class="w-5 h-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
            </svg>
            Laporan & Statistik
        </a>

        <a href="#"
            class="nav-item flex items-center gap-3 px-3 py-2.5 rounded-xl cursor-pointer text-slate-600 dark:text-slate-300 text-sm font-medium"
            data-page="payment" onclick="navigate(event, 'payment')">
            <svg class="w-5 h-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
            </svg>
            Konfirmasi Pembayaran
            <span
                class="ml-auto bg-amber-100 text-amber-700 dark:bg-amber-900/50 dark:text-amber-300 text-[10px] font-bold px-2 py-0.5 rounded-full">3</span>
        </a>

        <a href="#"
            class="nav-item flex items-center gap-3 px-3 py-2.5 rounded-xl cursor-pointer text-slate-600 dark:text-slate-300 text-sm font-medium"
            data-page="notifications" onclick="navigate(event, 'notifications')">
            <svg class="w-5 h-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
            </svg>
            Notifikasi Email
        </a>
    </nav>

    <!-- Admin Profile footer -->
    <div class="px-4 py-4 border-t border-slate-100 dark:border-slate-800">
        <div class="flex items-center gap-3">
            <div
                class="w-8 h-8 rounded-full bg-gradient-to-br from-brand-400 to-brand-700 flex items-center justify-center text-white text-xs font-bold shrink-0">
                A</div>
            <div class="flex-1 min-w-0">
                <div class="text-sm font-semibold truncate">Admin Utama</div>
                <div class="text-[11px] text-slate-400 truncate">admin@servicehub.id</div>
            </div>
            <svg class="w-4 h-4 text-slate-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
            </svg>
        </div>
    </div>
</aside>
