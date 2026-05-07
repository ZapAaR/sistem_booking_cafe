@extends('layouts.app')

@section('title', 'Edit Meja')

@section('content')

<div class="min-h-screen p-4 md:p-8">

    <!-- HEADER -->
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-[#5C4033]">
            Edit Meja Baru
        </h1>
        <p class="text-sm text-gray-600 mt-1">
            Dashboard → Meja → Ubah
        </p>
    </div>

    <!-- GRID -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        <!-- FORM -->
        <div class="lg:col-span-2 bg-white rounded-2xl shadow p-6 md:p-8">

            <form action="{{ route('admin.meja.update', $meja->id) }}" method="POST" class="space-y-5">
                @csrf
                @method('PUT')

                <!-- Nomor Meja -->
                <div>
                    <label class="block text-sm font-semibold text-[#5C4033]">
                        Nomor Meja *
                    </label>
                    <input type="text" name="nomor_meja"
                        value="{{ old('nomor_meja', $meja->nomor_meja) }}"
                        class="w-full mt-2 px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#D97706]"
                        placeholder="Contoh: A1 / 01">

                    @error('nomor_meja')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Kapasitas -->
                <div>
                    <label class="block text-sm font-semibold text-[#5C4033]">
                        Kapasitas *
                    </label>
                    <input type="number" name="kapasitas"
                        value="{{ old('kapasitas', $meja->kapasitas) }}"
                        class="w-full mt-2 px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#D97706]"
                        placeholder="Contoh: 4 orang">

                    @error('kapasitas')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Status -->
                <div>
                    <label class="block text-sm font-semibold text-[#5C4033]">
                        Status *
                    </label>

                    <select name="status"
                        class="w-full mt-2 px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#D97706]">

                        <option value="">Pilih Status</option>
                        <option value="tersedia" {{ old('status', $meja->status) == 'tersedia' ? 'selected' : '' }}>Tersedia</option>
                        <option value="terisi" {{ old('status', $meja->status) == 'terisi' ? 'selected' : '' }}>Terisi</option>
                        <option value="maintenance" {{ old('status', $meja->status) == 'maintenance' ? 'selected' : '' }}>Maintenance</option>

                    </select>

                    @error('status')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Lokasi -->
                <div>
                    <label class="block text-sm font-semibold text-[#5C4033]">
                        Lokasi
                    </label>
                    <select name="lokasi"
                        class="w-full mt-2 px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#D97706]">

                        <option value="">Pilih Lokasi</option>
                        <option value="indoor" {{ old('lokasi', $meja->lokasi) == 'indoor' ? 'selected' : ''}}>Indoor</option>
                        <option value="outdoor" {{ old('lokasi', $meja->lokasi) == 'outdoor' ? 'selected' : ''}}>Outdoor</option>
                        <option value="rooftop" {{ old('lokasi', $meja->lokasi) == 'rooftop' ? 'selected' : ''}}>Rooftop</option>

                    </select>

                    @error('lokasi')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Deskripsi -->
                <div>
                    <label class="block text-sm font-semibold text-[#5C4033]">
                        Deskripsi
                    </label>
                    <textarea name="deskripsi" rows="4"
                        class="w-full mt-2 px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#D97706]"
                        placeholder="Catatan tambahan tentang meja...">{{ old('deskripsi', $meja->deskripsi) }}</textarea>

                    @error('deskripsi')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- BUTTON -->
                <div class="pt-4 flex gap-2">
                    <button type="submit"
                        class="px-6 py-3 bg-[#D97706] text-white rounded-xl font-semibold shadow hover:bg-[#EA580C]">
                        Simpan Meja
                    </button>

                    <a href="{{ route('admin.meja.index') }}"
                        class="px-6 py-3 bg-gray-500 text-white rounded-xl hover:bg-gray-600">
                        Batal
                    </a>
                </div>

            </form>
        </div>

        <!-- PREVIEW -->
        <div class="bg-white rounded-2xl shadow p-6 h-fit">

            <h2 class="text-lg font-semibold text-[#5C4033] mb-4">
                Preview Meja
            </h2>

            <div class="space-y-3 text-sm text-gray-700">

                <div>
                    <p class="text-gray-500">Nomor Meja</p>
                    <p id="preview-nomor" class="font-semibold">-</p>
                </div>

                <div>
                    <p class="text-gray-500">Kapasitas</p>
                    <p id="preview-kapasitas" class="font-semibold">-</p>
                </div>

                <div>
                    <p class="text-gray-500">Status</p>
                    <p id="preview-status" class="font-semibold">-</p>
                </div>

                <div>
                    <p class="text-gray-500">Lokasi</p>
                    <p id="preview-lokasi">-</p>
                </div>

                <div>
                    <p class="text-gray-500">Deskripsi</p>
                    <p id="preview-deskripsi">-</p>
                </div>

            </div>

        </div>

    </div>

</div>

<!-- SCRIPT -->
<script>
const nomor = document.querySelector('input[name="nomor_meja"]');
const kapasitas = document.querySelector('input[name="kapasitas"]');
const status = document.querySelector('select[name="status"]');
const lokasi = document.querySelector('select[name="lokasi"]');
const deskripsi = document.querySelector('textarea[name="deskripsi"]');

const pNomor = document.getElementById('preview-nomor');
const pKapasitas = document.getElementById('preview-kapasitas');
const pStatus = document.getElementById('preview-status');
const pLokasi = document.getElementById('preview-lokasi');
const pDeskripsi = document.getElementById('preview-deskripsi');

function updatePreview() {
    pNomor.textContent = nomor.value || '-';
    pKapasitas.textContent = kapasitas.value ? kapasitas.value + ' orang' : '-';
    pStatus.textContent = status.value || '-';
    pLokasi.textContent = lokasi.value || '-';
    pDeskripsi.textContent = deskripsi.value || '-';
}

[nomor, kapasitas, status, lokasi, deskripsi].forEach(el => {
    el.addEventListener('input', updatePreview);
});

updatePreview();
</script>

@endsection
