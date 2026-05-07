@extends('layouts.app')

@section('title', 'Meja Cafe')

@section('content')

<div class="min-h-screen p-4 md:p-6">

    <!-- HEADER -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
        <div>
            <h1 class="text-2xl font-bold">
                ZafarCafe | Sistem Booking Kafe
            </h1>
            <p class="text-sm ">Kelola meja dengan mudah</p>
        </div>

        <div class="flex gap-2 mt-4 md:mt-0">
            <a href="{{ route('admin.meja.export.csv') }}" class="px-4 py-2 bg-green-600 text-white rounded-xl shadow hover:bg-green-700 text-sm">
                Export Excel
            </a>
            <a href="{{ route('admin.meja.export.pdf') }}" target="_blank" class="px-4 py-2 bg-red-500 text-white rounded-xl shadow hover:bg-red-600 text-sm">
                Export PDF
            </a>
        </div>
    </div>

    <!-- STATISTICS -->
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
        <div class="bg-white p-4 rounded-xl shadow bg-white dark:bg-slate-900">
            <p class="text-sm">Total meja</p>
            <h2 class="text-xl font-bold">{{ $total_meja }}</h2>
        </div>

        <div class="bg-white p-4 rounded-xl shadow bg-white dark:bg-slate-900">
            <p class="text-sm">Meja Maintenance</p>
            <h2 class="text-xl font-bold">{{ $meja_maintenance }}</h2>
        </div>

        <div class="bg-white p-4 rounded-xl shadow bg-white dark:bg-slate-900">
            <p class="text-sm">meja Tersedia</p>
            <h2 class="text-xl font-bold">{{ $meja_tersedia }}</h2>
        </div>

        <div class="bg-white p-4 rounded-xl shadow bg-white dark:bg-slate-900">
            <p class="text-sm">meja Tidak Tersedia</p>
            <h2 class="text-xl font-bold">{{ $meja_terisi }}</h2>
        </div>
    </div>

    <!-- SEARCH -->
    <div class="bg-white p-4 rounded-xl shadow mb-6 bg-white dark:bg-slate-900">
        <form method="GET" class="grid md:grid-cols-5 gap-3 mb-3" action="{{ route('admin.meja.index') }}">

            <!-- Search -->
            <input type="text" name="search" placeholder="Cari nama meja..."
                class="col-span-2 px-4 py-2 rounded-xl border focus:ring-2 focus:ring-orange-400 focus:outline-none bg-white dark:bg-slate-800 dark:text-white" value="{{ request('search') }}">

                <!-- 📊 Status -->
        <select name="status"
            class="px-4 py-2 rounded-xl border
                   bg-white dark:bg-slate-800 dark:text-white
                   focus:ring-2 focus:ring-orange-400">

            <option value="">Semua Status</option>
            <option value="tersedia" {{ request('status') == 'tersedia' ? 'selected' : '' }}>Tersedia</option>
            <option value="terisi" {{ request('status') == 'terisi' ? 'selected' : '' }}>Terisi</option>
            <option value="maintenance" {{ request('status') == 'maintenance' ? 'selected' : '' }}>Maintenance</option>
        </select>

        <!-- 📍 Lokasi -->
        <select name="lokasi"
            class="px-4 py-2 rounded-xl border
                   bg-white dark:bg-slate-800 dark:text-white
                   focus:ring-2 focus:ring-orange-400">

            <option value="">Semua Lokasi</option>
            <option value="indoor" {{ request('lokasi') == 'indoor' ? 'selected' : '' }}>Indoor</option>
            <option value="outdoor" {{ request('lokasi') == 'outdoor' ? 'selected' : '' }}>Outdoor</option>
            <option value="rooftop" {{ request('lokasi') == 'rooftop' ? 'selected' : '' }}>Rooftop</option>
        </select>

        <!-- 🔘 Action -->
        <div class="flex gap-2">
            <button type="submit"
                class="w-full px-4 py-2 bg-[#D97706] text-white rounded-xl hover:bg-[#EA580C]">
                Filter
            </button>

            <a href="{{ route('admin.meja.index') }}"
                class="w-full px-4 py-2 bg-gray-500 text-white rounded-xl text-center hover:bg-gray-600">
                Reset
            </a>
        </div>

        </form>

    </div>

    <!-- TABLE / LIST -->
    <div class="bg-white rounded-xl shadow overflow-hidden">

        <div class="overflow-x-auto">
            <table class="w-full text-sm bg-white dark:bg-slate-900">
                <thead class="bg-[#4A2C1F] text-white">
                    <tr>
                        <th class="px-4 py-3 text-left">No</th>
                        <th class="px-4 py-3 text-left">No Meja</th>
                        <th class="px-4 py-3 text-left">Kapasitas</th>
                        <th class="px-4 py-3 text-left">Status</th>
                        <th class="px-4 py-3 text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y">
                    @forelse ($meja as $item)
                    <tr class="hover:bg-orange-50">
                        <td class="px-4 py-3">
                            {{ $loop->iteration }}
                        </td>
                        <td class="px-4 py-3 font-semibold text-[#4A2C1F] dark:text-white">
                            {{ $item->nomor_meja }}
                        </td>
                        <td class="px-4 py-3 text-gray-600 dark:text-white">
                            {{ $item->kapasitas }}
                        </td>
                        <td class="px-4 py-3">
                            <form action="{{ route('admin.meja.toggle', $item->id) }}" method="post" class="px-3 py-2 rounded-xl text-sm border">
                                @csrf
                                @method('PATCH')
                                <span class="px-3 py-1 rounded-full text-xs font-semibold
                                @if ($item->status == 'tersedia')
                                    bg-green-100 text-green-700 border-green-300
                                @elseif ($item->status == 'terisi')
                                    bg-red-100 text-red-700 border-red-300
                                @else
                                    bg-yellow-100 text-yellow-700 border-yellow-300
                                @endif">
                                {{ ucfirst($item->status) }}
                                </span>
                                <select name="status" onchange="this.form.submit()" class="px-4 py-3 rounded-xl border bg-white text-gray-700 border-gray-300">
                                    <option value="tersedia" {{ $item->status == 'tersedia' ? 'selected' : '' }}>Tersedia</option>
                                    <option value="terisi" {{ $item->status == 'terisi' ? 'selected' : '' }}>Terisi</option>
                                    <option value="maintenance" {{ $item->status == 'maintenance' ? 'selected' : '' }}>Maintenance</option>
                                </select>
                            </form>
                        </td>
                        <td class="px-4 py-3 text-center space-x-2">
                            <a href="{{ route('admin.meja.show', $item) }}" class="text-blue-500 hover:underline">Detail</a>
                            <a href="{{ route('admin.meja.edit', $item) }}" class="text-yellow-500 hover:underline">Edit</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-10 text-gray-500">
                            Tidak ada data meja 😢
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- PAGINATION -->
        <div class="p-4 bg-white dark:bg-slate-900">
            {{ $meja->links() }}
        </div>

    </div>

    <!-- FLOATING BUTTON -->
    <a href="{{ route('admin.meja.create') }}"
        class="fixed bottom-6 right-6 bg-[#D97706] hover:bg-[#EA580C] text-white px-5 py-3 rounded-full shadow-lg text-sm font-semibold">
        + meja Baru
    </a>

</div>

@endsection
