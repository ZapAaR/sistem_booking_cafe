@extends('layouts.app')

@section('title', 'Dashboard Admin')

@section('content')

    <!-- =========================================
         PAGE: DASHBOARD
    ========================================== -->
    <section id="page-dashboard" class="page active">
      <!-- Welcome -->
      <div class="mb-6">
        <h1 class="text-2xl font-extrabold text-slate-800 dark:text-white">Selamat datang, {{ auth()->user()->name }}! 👋</h1>
        <p class="text-slate-500 dark:text-slate-400 text-sm mt-1">{{ \Carbon\Carbon::now()->format('l, d F Y') }} — Ringkasan aktivitas hari ini.</p>
      </div>

      <!-- Stat Cards -->
      <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4 mb-6">
        <!-- Card 1 -->
        <div class="stat-card bg-white dark:bg-slate-900 rounded-2xl p-5 border border-slate-100 dark:border-slate-800 relative overflow-hidden">
          <div class="absolute -right-4 -top-4 w-20 h-20 rounded-full bg-brand-50 dark:bg-brand-900/20"></div>
          <div class="flex items-start justify-between">
            <div>
              <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Total Booking</p>
              <p class="text-3xl font-extrabold text-slate-800 dark:text-white mt-1">248</p>
              <p class="text-xs text-emerald-500 font-semibold mt-1">▲ 12% dari bulan lalu</p>
            </div>
            <div class="w-11 h-11 rounded-2xl bg-brand-100 dark:bg-brand-900/40 flex items-center justify-center shrink-0 z-10">
              <svg class="w-5 h-5 text-brand-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
            </div>
          </div>
        </div>
        <!-- Card 2 -->
        <div class="stat-card bg-white dark:bg-slate-900 rounded-2xl p-5 border border-slate-100 dark:border-slate-800 relative overflow-hidden">
          <div class="absolute -right-4 -top-4 w-20 h-20 rounded-full bg-emerald-50 dark:bg-emerald-900/20"></div>
          <div class="flex items-start justify-between">
            <div>
              <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Total Layanan</p>
              <p class="text-3xl font-extrabold text-slate-800 dark:text-white mt-1">18</p>
              <p class="text-xs text-emerald-500 font-semibold mt-1">▲ 3 layanan baru</p>
            </div>
            <div class="w-11 h-11 rounded-2xl bg-emerald-100 dark:bg-emerald-900/40 flex items-center justify-center shrink-0 z-10">
              <svg class="w-5 h-5 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
            </div>
          </div>
        </div>
        <!-- Card 3 -->
        <div class="stat-card bg-white dark:bg-slate-900 rounded-2xl p-5 border border-slate-100 dark:border-slate-800 relative overflow-hidden">
          <div class="absolute -right-4 -top-4 w-20 h-20 rounded-full bg-amber-50 dark:bg-amber-900/20"></div>
          <div class="flex items-start justify-between">
            <div>
              <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Pendapatan Bulan Ini</p>
              <p class="text-3xl font-extrabold text-slate-800 dark:text-white mt-1">Rp 48,5M</p>
              <p class="text-xs text-emerald-500 font-semibold mt-1">▲ 8.4% dari bulan lalu</p>
            </div>
            <div class="w-11 h-11 rounded-2xl bg-amber-100 dark:bg-amber-900/40 flex items-center justify-center shrink-0 z-10">
              <svg class="w-5 h-5 text-amber-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
          </div>
        </div>
        <!-- Card 4 -->
        <div class="stat-card bg-white dark:bg-slate-900 rounded-2xl p-5 border border-slate-100 dark:border-slate-800 relative overflow-hidden">
          <div class="absolute -right-4 -top-4 w-20 h-20 rounded-full bg-rose-50 dark:bg-rose-900/20"></div>
          <div class="flex items-start justify-between">
            <div>
              <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider">User Aktif</p>
              <p class="text-3xl font-extrabold text-slate-800 dark:text-white mt-1">1.240</p>
              <p class="text-xs text-rose-500 font-semibold mt-1">▼ 2% minggu ini</p>
            </div>
            <div class="w-11 h-11 rounded-2xl bg-rose-100 dark:bg-rose-900/40 flex items-center justify-center shrink-0 z-10">
              <svg class="w-5 h-5 text-rose-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
            </div>
          </div>
        </div>
      </div>

      <!-- Chart + Recent -->
      <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
        <!-- Line chart -->
        <div class="lg:col-span-2 bg-white dark:bg-slate-900 rounded-2xl p-5 border border-slate-100 dark:border-slate-800">
          <div class="flex items-center justify-between mb-4">
            <div>
              <h2 class="font-bold text-slate-800 dark:text-white">Booking Per Minggu</h2>
              <p class="text-xs text-slate-400">April 2026</p>
            </div>
            <span class="badge bg-brand-50 text-brand-600 dark:bg-brand-900/40 dark:text-brand-300">Bulan Ini</span>
          </div>
          <canvas id="lineChart" height="100"></canvas>
        </div>
        <!-- Recent bookings -->
        <div class="bg-white dark:bg-slate-900 rounded-2xl p-5 border border-slate-100 dark:border-slate-800">
          <h2 class="font-bold text-slate-800 dark:text-white mb-4">Booking Terbaru</h2>
          <div class="space-y-3" id="recent-bookings"></div>
        </div>
      </div>
    </section>

    <!-- =========================================
         PAGE: SERVICES
    ========================================== -->
    <section id="page-services" class="page">
      <div class="flex flex-wrap items-center justify-between gap-3 mb-5">
        <div>
          <h1 class="text-xl font-extrabold text-slate-800 dark:text-white">Kelola Layanan</h1>
          <p class="text-slate-500 text-sm">Tambah, edit, dan hapus layanan yang tersedia.</p>
        </div>
        <button onclick="openModal('add-service')" class="inline-flex items-center gap-2 bg-brand-600 hover:bg-brand-700 text-white text-sm font-semibold px-4 py-2.5 rounded-xl shadow-lg shadow-brand-300/30 transition-all">
          <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
          Tambah Layanan
        </button>
      </div>
      <div class="bg-white dark:bg-slate-900 rounded-2xl border border-slate-100 dark:border-slate-800 overflow-hidden">
        <div class="overflow-x-auto">
          <table class="w-full text-sm">
            <thead>
              <tr class="border-b border-slate-100 dark:border-slate-800 bg-slate-50 dark:bg-slate-800/50">
                <th class="text-left px-4 py-3 font-semibold text-slate-500 dark:text-slate-400 text-xs uppercase tracking-wider">Nama Layanan</th>
                <th class="text-left px-4 py-3 font-semibold text-slate-500 dark:text-slate-400 text-xs uppercase tracking-wider">Harga</th>
                <th class="text-left px-4 py-3 font-semibold text-slate-500 dark:text-slate-400 text-xs uppercase tracking-wider">Durasi</th>
                <th class="text-left px-4 py-3 font-semibold text-slate-500 dark:text-slate-400 text-xs uppercase tracking-wider hidden md:table-cell">Deskripsi</th>
                <th class="text-left px-4 py-3 font-semibold text-slate-500 dark:text-slate-400 text-xs uppercase tracking-wider">Status</th>
                <th class="text-left px-4 py-3 font-semibold text-slate-500 dark:text-slate-400 text-xs uppercase tracking-wider">Aksi</th>
              </tr>
            </thead>
            <tbody id="services-tbody"></tbody>
          </table>
        </div>
      </div>
    </section>

    <!-- =========================================
         PAGE: BOOKING
    ========================================== -->
    <section id="page-booking" class="page">
      <div class="flex flex-wrap items-center justify-between gap-3 mb-5">
        <div>
          <h1 class="text-xl font-extrabold text-slate-800 dark:text-white">Kelola Booking</h1>
          <p class="text-slate-500 text-sm">Semua data booking dan manajemen status.</p>
        </div>
        <!-- Filter tabs -->
        <div class="flex flex-wrap gap-2" id="booking-filter-tabs">
          <button onclick="filterBooking('all')" class="filter-btn active text-xs font-semibold px-3 py-1.5 rounded-lg border transition-all">Semua</button>
          <button onclick="filterBooking('Pending')" class="filter-btn text-xs font-semibold px-3 py-1.5 rounded-lg border transition-all">Pending</button>
          <button onclick="filterBooking('Confirmed')" class="filter-btn text-xs font-semibold px-3 py-1.5 rounded-lg border transition-all">Confirmed</button>
          <button onclick="filterBooking('Completed')" class="filter-btn text-xs font-semibold px-3 py-1.5 rounded-lg border transition-all">Completed</button>
          <button onclick="filterBooking('Cancelled')" class="filter-btn text-xs font-semibold px-3 py-1.5 rounded-lg border transition-all">Cancelled</button>
        </div>
      </div>
      <div class="bg-white dark:bg-slate-900 rounded-2xl border border-slate-100 dark:border-slate-800 overflow-hidden">
        <div class="overflow-x-auto">
          <table class="w-full text-sm min-w-[720px]">
            <thead>
              <tr class="border-b border-slate-100 dark:border-slate-800 bg-slate-50 dark:bg-slate-800/50">
                <th class="text-left px-4 py-3 font-semibold text-slate-500 dark:text-slate-400 text-xs uppercase tracking-wider">ID</th>
                <th class="text-left px-4 py-3 font-semibold text-slate-500 dark:text-slate-400 text-xs uppercase tracking-wider">Nama User</th>
                <th class="text-left px-4 py-3 font-semibold text-slate-500 dark:text-slate-400 text-xs uppercase tracking-wider">Layanan</th>
                <th class="text-left px-4 py-3 font-semibold text-slate-500 dark:text-slate-400 text-xs uppercase tracking-wider">Tanggal &amp; Jam</th>
                <th class="text-left px-4 py-3 font-semibold text-slate-500 dark:text-slate-400 text-xs uppercase tracking-wider">Status</th>
                <th class="text-left px-4 py-3 font-semibold text-slate-500 dark:text-slate-400 text-xs uppercase tracking-wider">Total</th>
                <th class="text-left px-4 py-3 font-semibold text-slate-500 dark:text-slate-400 text-xs uppercase tracking-wider">Aksi</th>
              </tr>
            </thead>
            <tbody id="booking-tbody"></tbody>
          </table>
        </div>
      </div>
    </section>

    <!-- =========================================
         PAGE: USERS
    ========================================== -->
    <section id="page-users" class="page">
      <div class="flex flex-wrap items-center justify-between gap-3 mb-5">
        <div>
          <h1 class="text-xl font-extrabold text-slate-800 dark:text-white">Kelola User</h1>
          <p class="text-slate-500 text-sm">Daftar semua pengguna terdaftar.</p>
        </div>
        <div class="flex items-center gap-2">
          <div class="flex items-center bg-slate-100 dark:bg-slate-800 rounded-xl px-3 py-2 gap-2">
            <svg class="w-4 h-4 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><path stroke-linecap="round" stroke-linejoin="round" d="m21 21-4.35-4.35"/></svg>
            <input id="user-search" oninput="searchUsers()" type="text" placeholder="Cari user..." class="bg-transparent text-sm outline-none w-40 text-slate-700 dark:text-slate-200 placeholder-slate-400"/>
          </div>
          <button onclick="openModal('add-user')" class="inline-flex items-center gap-2 bg-brand-600 hover:bg-brand-700 text-white text-sm font-semibold px-4 py-2.5 rounded-xl shadow-lg shadow-brand-300/30 transition-all">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
            Tambah User
          </button>
        </div>
      </div>
      <div class="bg-white dark:bg-slate-900 rounded-2xl border border-slate-100 dark:border-slate-800 overflow-hidden">
        <div class="overflow-x-auto">
          <table class="w-full text-sm min-w-[640px]">
            <thead>
              <tr class="border-b border-slate-100 dark:border-slate-800 bg-slate-50 dark:bg-slate-800/50">
                <th class="text-left px-4 py-3 font-semibold text-slate-500 dark:text-slate-400 text-xs uppercase tracking-wider">Nama</th>
                <th class="text-left px-4 py-3 font-semibold text-slate-500 dark:text-slate-400 text-xs uppercase tracking-wider">Email</th>
                <th class="text-left px-4 py-3 font-semibold text-slate-500 dark:text-slate-400 text-xs uppercase tracking-wider hidden sm:table-cell">No. HP</th>
                <th class="text-left px-4 py-3 font-semibold text-slate-500 dark:text-slate-400 text-xs uppercase tracking-wider">Role</th>
                <th class="text-left px-4 py-3 font-semibold text-slate-500 dark:text-slate-400 text-xs uppercase tracking-wider hidden md:table-cell">Tgl Daftar</th>
                <th class="text-left px-4 py-3 font-semibold text-slate-500 dark:text-slate-400 text-xs uppercase tracking-wider">Aksi</th>
              </tr>
            </thead>
            <tbody id="users-tbody"></tbody>
          </table>
        </div>
        <!-- Pagination -->
        <div class="flex items-center justify-between px-4 py-3 border-t border-slate-100 dark:border-slate-800">
          <span id="user-pagination-info" class="text-xs text-slate-500"></span>
          <div class="flex gap-1" id="user-pagination-btns"></div>
        </div>
      </div>
    </section>

    <!-- =========================================
         PAGE: REPORTS
    ========================================== -->
    <section id="page-reports" class="page">
      <div class="mb-5">
        <h1 class="text-xl font-extrabold text-slate-800 dark:text-white">Laporan &amp; Statistik</h1>
        <p class="text-slate-500 text-sm">Analisis data booking dan pendapatan.</p>
      </div>
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
        <div class="bg-white dark:bg-slate-900 rounded-2xl p-5 border border-slate-100 dark:border-slate-800">
          <h2 class="font-bold text-slate-800 dark:text-white mb-4">Status Booking (Pie Chart)</h2>
          <canvas id="pieChart" height="180"></canvas>
        </div>
        <div class="bg-white dark:bg-slate-900 rounded-2xl p-5 border border-slate-100 dark:border-slate-800">
          <h2 class="font-bold text-slate-800 dark:text-white mb-4">Pendapatan per Bulan (Bar Chart)</h2>
          <canvas id="barChart" height="180"></canvas>
        </div>
        <div class="bg-white dark:bg-slate-900 rounded-2xl p-5 border border-slate-100 dark:border-slate-800 lg:col-span-2">
          <h2 class="font-bold text-slate-800 dark:text-white mb-4">Layanan Terpopuler</h2>
          <div class="space-y-3" id="popular-services"></div>
        </div>
      </div>
    </section>

    <!-- =========================================
         PAGE: PAYMENT
    ========================================== -->
    <section id="page-payment" class="page">
      <div class="mb-5">
        <h1 class="text-xl font-extrabold text-slate-800 dark:text-white">Konfirmasi Pembayaran</h1>
        <p class="text-slate-500 text-sm">Booking yang menunggu konfirmasi pembayaran.</p>
      </div>
      <div class="bg-white dark:bg-slate-900 rounded-2xl border border-slate-100 dark:border-slate-800 overflow-hidden">
        <div class="overflow-x-auto">
          <table class="w-full text-sm min-w-[640px]">
            <thead>
              <tr class="border-b border-slate-100 dark:border-slate-800 bg-slate-50 dark:bg-slate-800/50">
                <th class="text-left px-4 py-3 font-semibold text-slate-500 dark:text-slate-400 text-xs uppercase tracking-wider">ID Booking</th>
                <th class="text-left px-4 py-3 font-semibold text-slate-500 dark:text-slate-400 text-xs uppercase tracking-wider">Nama User</th>
                <th class="text-left px-4 py-3 font-semibold text-slate-500 dark:text-slate-400 text-xs uppercase tracking-wider">Layanan</th>
                <th class="text-left px-4 py-3 font-semibold text-slate-500 dark:text-slate-400 text-xs uppercase tracking-wider">Total</th>
                <th class="text-left px-4 py-3 font-semibold text-slate-500 dark:text-slate-400 text-xs uppercase tracking-wider">Bukti Transfer</th>
                <th class="text-left px-4 py-3 font-semibold text-slate-500 dark:text-slate-400 text-xs uppercase tracking-wider">Aksi</th>
              </tr>
            </thead>
            <tbody id="payment-tbody"></tbody>
          </table>
        </div>
      </div>
    </section>

    <!-- =========================================
         PAGE: NOTIFICATIONS
    ========================================== -->
    <section id="page-notifications" class="page">
      <div class="flex flex-wrap items-center justify-between gap-3 mb-5">
        <div>
          <h1 class="text-xl font-extrabold text-slate-800 dark:text-white">Notifikasi Email</h1>
          <p class="text-slate-500 text-sm">Riwayat email yang telah dikirim.</p>
        </div>
        <button onclick="openModal('send-email')" class="inline-flex items-center gap-2 bg-brand-600 hover:bg-brand-700 text-white text-sm font-semibold px-4 py-2.5 rounded-xl shadow-lg shadow-brand-300/30 transition-all">
          <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
          Kirim Email Baru
        </button>
      </div>
      <div class="space-y-3" id="notif-list"></div>
    </section>

@endsection
