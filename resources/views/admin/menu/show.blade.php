@extends('layouts.app')

@section('title', 'Detail Menu')

@section('content')

<div class="min-h-screen p-4 md:p-8">

    <!-- HEADER -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">

        <div>
            <h1 class="text-2xl font-bold text-[#5C4033]">
                Detail Menu: {{ $menu->nama }}
            </h1>
            <p class="text-sm text-gray-600 mt-1">
                Dashboard → Menu: {{ $menu->nama }} → Detail
            </p>
        </div>

        <!-- ACTION BUTTON -->
        <div class="flex flex-wrap gap-2 mt-4 md:mt-0">
            <a href="{{ route('admin.menu.edit', $menu->id) }}"
                class="px-4 py-2 bg-yellow-500 text-white rounded-xl shadow hover:bg-yellow-600 text-sm">
                Edit
            </a>

            <form action="{{ route('admin.menu.destroy', $menu->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="px-4 py-2 bg-red-500 text-white rounded-xl shadow hover:bg-red-600 text-sm">
                    Hapus
                </button>
            </form>

            <a href="{{ route('admin.menu.export.pdf') }}" target="_blank" class="px-4 py-2 bg-green-600 text-white rounded-xl shadow hover:bg-green-700 text-sm">
                Cetak PDF
            </a>

            <a href="{{ route('admin.menu.index') }}"
                class="px-4 py-2 bg-gray-500 text-white rounded-xl shadow hover:bg-gray-600 text-sm">
                Kembali
            </a>
        </div>

    </div>

    <!-- MAIN GRID -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        <!-- LEFT CONTENT -->
        <div class="lg:col-span-2 space-y-6">

            <!-- CARD INFO -->
            <div class="bg-white rounded-3xl shadow p-6">

                <h2 class="text-lg font-semibold text-[#5C4033] mb-4">
                    Informasi menu
                </h2>

                <div class="space-y-4 text-sm">

                    <div>
                        <img src="{{ asset('storage/' . $menu->gambar) }}" alt="Gambar Menu" class="w-48 h-48 object-cover rounded-lg">
                    </div>

                    <div>
                        <p class="text-gray-500">Nama menu</p>
                        <p class="font-semibold text-[#5C4033] text-base">
                            {{ $menu->nama }}
                        </p>
                    </div>

                    <div>
                        <p class="text-gray-500">Tersedia</p>
                        <p class="font-semibold text-[#5C4033] text-base">
                            {{ $menu->tersedia ? 'Ya' : 'Tidak' }}
                        </p>
                    </div>

                    <div>
                        <p class="text-gray-500">Kategori</p>
                        <p class="font-medium text-gray-700">
                            {{ $menu->kategori->nama }}
                        </p>
                    </div>

                    <div>
                        <p class="text-gray-500">Deskripsi</p>
                        <p class="text-gray-700">
                            {{ $menu->deskripsi ?? '-' }}
                        </p>
                    </div>

                    <div>
                        <p class="text-gray-500">Harga</p>
                        <p class="font-semibold">
                            Rp {{ number_format($menu->harga, 0, ',', '.') }}
                        </p>
                    </div>

                </div>
            </div>

            <!-- META INFO -->
            <div class="bg-white rounded-3xl shadow p-6">

                <h2 class="text-lg font-semibold text-[#5C4033] mb-4">
                    Informasi Sistem
                </h2>

                <div class="space-y-3 text-sm text-gray-700">
                    <div>
                        <p class="text-gray-500">Dibuat Pada</p>
                        <p>{{ $menu->created_at->format('d M Y H:i') }}</p>
                    </div>

                    <div>
                        <p class="text-gray-500">Terakhir Diupdate</p>
                        <p>{{ $menu->updated_at->format('d M Y H:i') }}</p>
                    </div>
                </div>

            </div>

        </div>

        <!-- RIGHT SIDEBAR -->
        <div class="space-y-6">

            <!-- QUICK ACTION -->
            <div class="bg-white rounded-3xl shadow p-6">

                <h2 class="text-lg font-semibold text-[#5C4033] mb-4">
                    Aksi Cepat
                </h2>

                <div class="space-y-2">

                    <a href="{{ route('admin.menu.edit', $menu->id) }}"
                        class="block w-full text-center px-4 py-2 bg-yellow-500 text-white rounded-xl hover:bg-yellow-600 text-sm">
                        Edit Data
                    </a>

                    <a href="{{ route('admin.menu.index') }}"
                        class="block w-full text-center px-4 py-2 bg-gray-500 text-white rounded-xl hover:bg-gray-600 text-sm">
                        Kembali ke List
                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection
