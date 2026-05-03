@extends('layouts.app')

@section('title', 'Menu Kategori')

@section('content')

<div class="min-h-screen p-4 md:p-6">

    <!-- HEADER -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
        <div>
            <h1 class="text-2xl font-bold text-[#4A2C1F]">
                ZafarCafe | Sistem Booking Kafe
            </h1>
            <p class="text-sm text-gray-600">Kelola kategori menu dengan mudah</p>
        </div>

        <div class="flex gap-2 mt-4 md:mt-0">
            <a href="{{ route('admin.kategori.export.csv') }}" class="px-4 py-2 bg-green-600 text-white rounded-xl shadow hover:bg-green-700 text-sm">
                Export Excel
            </a>
            <a href="{{ route('admin.kategori.export.pdf') }}" class="px-4 py-2 bg-red-500 text-white rounded-xl shadow hover:bg-red-600 text-sm">
                Export PDF
            </a>
        </div>
    </div>

    <!-- STATISTICS -->
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
        <div class="bg-white p-4 rounded-xl shadow">
            <p class="text-sm text-gray-500">Total Kategori</p>
            <h2 class="text-xl font-bold text-[#4A2C1F]">{{ $total }}</h2>
        </div>
    </div>

    <!-- SEARCH -->
    <div class="bg-white p-4 rounded-xl shadow mb-6">
        <form method="GET" class="grid md:grid-cols-5 gap-3" action="{{ route('admin.kategori.index') }}">

            <!-- Search -->
            <input type="text" name="search" placeholder="Cari nama kategori..."
                class="col-span-2 px-4 py-2 rounded-xl border focus:ring-2 focus:ring-orange-400 focus:outline-none" value="{{ request('search') }}">

        </form>
    </div>

    <!-- TABLE / LIST -->
    <div class="bg-white rounded-xl shadow overflow-hidden">

        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-[#4A2C1F] text-white">
                    <tr>
                        <th class="px-4 py-3 text-left">No</th>
                        <th class="px-4 py-3 text-left">Nama Kategori</th>
                        <th class="px-4 py-3 text-left">Slug</th>
                        <th class="px-4 py-3 text-left">Deskripsi</th>
                        <th class="px-4 py-3 text-left">Urutan</th>
                        <th class="px-4 py-3 text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y">
                    @forelse ($categories as $item)
                    <tr class="hover:bg-orange-50">
                        <td class="px-4 py-3">
                            {{ $loop->iteration }}
                        </td>
                        <td class="px-4 py-3 font-semibold text-[#4A2C1F]">
                            {{ $item->nama }}
                        </td>
                        <td class="px-4 py-3 text-gray-600">
                            {{ $item->slug }}
                        </td>
                        <td class="px-4 py-3 text-gray-600">
                            {{ $item->deskripsi ?? '-' }}
                        </td>
                        <td class="px-4 py-3">
                            {{ $item->sort_order }}
                        </td>
                        <td class="px-4 py-3 text-center space-x-2">
                            <a href="{{ route('admin.kategori.show', $item) }}" class="text-blue-500 hover:underline">Detail</a>
                            <a href="{{ route('admin.kategori.edit', $item) }}" class="text-yellow-500 hover:underline">Edit</a>
                            <form action="{{ route('admin.kategori.destroy', $item) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-500 hover:underline">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-10 text-gray-500">
                            Tidak ada data Kategori 😢
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- PAGINATION -->
        <div class="p-4">
            {{-- {{ $categories->links() }} --}}
        </div>

    </div>

    <!-- FLOATING BUTTON -->
    <a href="{{ route('admin.kategori.create') }}"
        class="fixed bottom-6 right-6 bg-[#D97706] hover:bg-[#EA580C] text-white px-5 py-3 rounded-full shadow-lg text-sm font-semibold">
        + Kategori Baru
    </a>

</div>

@endsection
