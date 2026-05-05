@extends('layouts.app')

@section('title', 'Buat Menu')

@section('content')

    <div class="min-h-screen p-4 md:p-8">

        <!-- HEADER -->
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-[#5C4033]">
                Buat Menu Baru
            </h1>
            <p class="text-sm text-gray-600 mt-1">
                Dashboard → Menu → Buat Baru
            </p>
        </div>

        <!-- MAIN GRID -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            <!-- FORM -->
            <div class="lg:col-span-2 bg-white rounded-2xl shadow p-6 md:p-8">

                <form action="{{ route('admin.menu.store') }}" method="POST" class="space-y-5" enctype="multipart/form-data">
                    @csrf

                    <!-- Nama Menu -->
                    <div>
                        <label class="block text-sm font-semibold text-[#5C4033]">
                            Nama Menu *
                        </label>
                        <input type="text" name="nama"
                            class="w-full mt-2 px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-orange-400 focus:outline-none"
                            placeholder="Contoh: Kopi Hitam">

                        @error('nama')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Kategori -->
                    <div>
                        <label class="block text-sm font-semibold text-[#5C4033]">
                            Nama Kategori *
                        </label>
                        <select name="kategori_id"
                            class="w-full px-4 py-3 rounded-xl border border-gray-300
                                    bg-white text-gray-700
                                    focus:ring-2 focus:ring-[#D97706] focus:outline-none">

                            <option value="">Pilih Kategori</option>

                            @foreach ($kategori as $item)
                                <option value="{{ $item->id }}" {{ old('kategori_id') == $item->id ? 'selected' : '' }}>
                                    {{ $item->nama }}
                                </option>
                            @endforeach

                        </select>

                        @error('kategori_id')
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

                    <!-- Harga -->
                    <div>
                        <label class="block text-sm font-semibold text-[#5C4033]">
                            Harga *
                        </label>
                        <input type="number" name="harga"
                            class="w-full mt-2 px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-orange-400 focus:outline-none"
                            placeholder="Contoh: 15000" min="0">

                        @error('harga')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Gambar -->
                    <div>
                        <label class="block text-sm font-semibold text-[#5C4033] mb-2">
                            Gambar Menu
                        </label>

                        <input type="file" name="gambar" id="gambar"
                            src="https://via.placeholder.com/150?text=Preview"
                            class="w-full px-4 py-2 border rounded-xl file:bg-[#D97706] file:text-white file:px-4 file:py-2 file:rounded-lg file:border-0 file:mr-3">

                        @error('gambar')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Tersedia -->
                    <div>
                        <label class="block text-sm font-semibold text-[#5C4033]">
                            Tersedia *
                        </label>
                        <input type="radio" name="tersedia" value="1" class="mr-2">
                        <label class="mr-4">Ya</label>
                        <input type="radio" name="tersedia" value="0" class="mr-2">
                        <label>Tidak</label>

                        @error('tersedia')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- BUTTON -->
                    <div class="pt-4">
                        <button type="submit"
                            class="w-full md:w-auto px-6 py-3 bg-[#D97706] text-white rounded-xl font-semibold shadow hover:bg-[#EA580C] transition">
                            Simpan Menu
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
                        <p class="text-gray-500">Nama Menu</p>
                        <p class="font-semibold" id="preview-name"></p>
                    </div>

                    <div>
                        <p class="text-gray-500">Nama Kategori</p>
                        <p class="font-semibold" id="preview-category"></p>
                    </div>

                    <div>
                        <p class="text-gray-500">Deskripsi</p>
                        <p id="preview-description"></p>
                    </div>

                    <div>
                        <p class="text-gray-500">Harga</p>
                        <p class="font-semibold" id="preview-harga"></p>
                    </div>

                    <div>
                        <p class="text-gray-500">Gambar</p>
                        <img id="preview-gambar" src="https://via.placeholder.com/150?text=Preview"
                            class="w-24 h-24 object-cover rounded-lg mt-2">
                    </div>

                    <div>
                        <p class="text-gray-500">Tersedia</p>
                        <p class="font-semibold" id="preview-tersedia"></p>
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
        const kategoriSelect = document.querySelector('select[name="kategori_id"]');
        const deskripsiInput = document.querySelector('textarea[name="deskripsi"]');
        const hargaInput = document.querySelector('input[name="harga"]');
        const gambarInput = document.querySelector('input[name="gambar"]');
        const tersediaInput = document.querySelectorAll('input[name="tersedia"]');

        const previewName = document.getElementById('preview-name');
        const previewCategory = document.getElementById('preview-category');
        const previewDescription = document.getElementById('preview-description');
        const previewHarga = document.getElementById('preview-harga');
        const previewGambar = document.getElementById('preview-gambar');
        const previewTersedia = document.getElementById('preview-tersedia');

        function updatePreview() {
            previewName.textContent = namaInput.value || '-';

            const selectedOption = kategoriSelect.options[kategoriSelect.selectedIndex]?.text;
            previewCategory.textContent = selectedOption || '-';

            previewDescription.textContent = deskripsiInput.value || '-';
            previewHarga.textContent = hargaInput.value ? 'Rp ' + Number(hargaInput.value).toLocaleString('id-ID') : '-';
            const tersedia = [...tersediaInput].find(r => r.checked)?.value;
            previewTersedia.textContent = tersedia ? (tersedia == 1 ? 'Ya' : 'Tidak') : '-';
        }

        gambarInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                previewGambar.src = URL.createObjectURL(file);
            }
        });

        [namaInput, kategoriSelect, deskripsiInput, hargaInput, gambarInput, ...tersediaInput].forEach(el => {
            el.addEventListener('input', updatePreview);
        });

        updatePreview();
    </script>

@endsection
