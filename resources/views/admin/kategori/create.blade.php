@extends('layouts.app')

@section('title', 'Create Kategori')

@section('content')

    <div class="min-h-screen p-4 md:p-8">

        <!-- HEADER -->
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-[#5C4033]">
                Buat Kategori Baru
            </h1>
            <p class="text-sm text-gray-600 mt-1">
                Dashboard → Kategori → Buat Baru
            </p>
        </div>

        <!-- MAIN GRID -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            <!-- FORM -->
            <div class="lg:col-span-2 bg-white rounded-2xl shadow p-6 md:p-8">

                <form action="{{ route('admin.kategori.store') }}" method="POST" class="space-y-5">
                    @csrf

                    <!-- Nama Kategori -->
                    <div>
                        <label class="block text-sm font-semibold text-[#5C4033]">
                            Nama Kategori *
                        </label>
                        <input type="text" name="nama"
                            class="w-full mt-2 px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-orange-400 focus:outline-none"
                            placeholder="Contoh: Kopi & Minuman">

                        @error('nama')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Slug -->
                    <div>
                        <label class="block text-sm font-semibold text-[#5C4033]">
                            Slug *
                        </label>
                        <input type="text" name="slug"
                            class="w-full mt-2 px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-orange-400 focus:outline-none"
                            placeholder="contoh: kopi-minuman">

                        @error('slug')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Deskripsi -->
                    <div>
                        <label class="block text-sm font-semibold text-[#5C4033]">
                            Deskripsi
                        </label>
                        <textarea name="deskripsi" rows="4"
                            class="w-full mt-2 px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-orange-400 focus:outline-none"
                            placeholder="Deskripsi kategori..."></textarea>

                        @error('deskripsi')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Sort Order -->
                    <div>
                        <label class="block text-sm font-semibold text-[#5C4033]">
                            Sort Order
                        </label>
                        <input type="number" name="sort_order"
                            class="w-full mt-2 px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-orange-400 focus:outline-none"
                            placeholder="Contoh: 1">

                        @error('sort_order')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- BUTTON -->
                    <div class="pt-4">
                        <button type="submit"
                            class="w-full md:w-auto px-6 py-3 bg-[#D97706] text-white rounded-xl font-semibold shadow hover:bg-[#EA580C] transition">
                            Simpan Kategori
                        </button>
                    </div>

                </form>
            </div>

            <!-- SUMMARY -->
            <div class="bg-white rounded-2xl shadow p-6 h-fit">

                <h2 class="text-lg font-semibold text-[#5C4033] mb-4">
                    Preview Data
                </h2>

                <div class="space-y-3 text-sm text-gray-700">

                    <div>
                        <p class="text-gray-500">Nama Kategori</p>
                        <p class="font-semibold" id="preview-name"></p>
                    </div>

                    <div>
                        <p class="text-gray-500">Slug</p>
                        <p class="font-semibold" id="preview-slug"></p>
                    </div>

                    <div>
                        <p class="text-gray-500">Deskripsi</p>
                        <p id="preview-description"></p>
                    </div>

                    <div>
                        <p class="text-gray-500">Urutan</p>
                        <p class="font-semibold" id="preview-order"></p>
                    </div>

                </div>

                <!-- NOTE -->
                <div class="mt-6 p-3 bg-orange-50 rounded-xl text-xs text-orange-700">
                    Pastikan data kategori sudah benar sebelum disimpan.
                </div>

            </div>

        </div>

    </div>

    <script>
        const namaInput = document.querySelector('input[name="nama"]');
        const slugInput = document.querySelector('input[name="slug"]');
        const deskripsiInput = document.querySelector('textarea[name="deskripsi"]');
        const sortOrderInput = document.querySelector('input[name="sort_order"]');

        const previewName = document.getElementById('preview-name');
        const previewSlug = document.getElementById('preview-slug');
        const previewDescription = document.getElementById('preview-description');
        const previewOrder = document.getElementById('preview-order');

        function updatePreview() {
            previewName.textContent = namaInput.value || '-';
            previewSlug.textContent = slugInput.value || '-';
            previewDescription.textContent = deskripsiInput.value || '-';
            previewOrder.textContent = sortOrderInput.value || '-';
        }

        // auto slug
        namaInput.addEventListener('input', () => {
            slugInput.value = namaInput.value
                .toLowerCase()
                .replace(/[^a-z0-9]+/g, '-')
                .replace(/(^-|-$)/g, '');

            updatePreview();
        });

        [namaInput, slugInput, deskripsiInput, sortOrderInput].forEach(el => {
            el.addEventListener('input', updatePreview);
        });

        updatePreview();
    </script>

@endsection
