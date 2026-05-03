@extends('layouts.app')

@section('title', 'Edit Kategori')

@section('content')

<div class="min-h-screen p-4 md:p-8">

    <!-- HEADER -->
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-[#5C4033]">
            Edit Kategori
        </h1>
        <p class="text-sm text-gray-600 mt-1">
            Dashboard → Kategori → Edit
        </p>
    </div>

    <!-- GRID -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        <!-- FORM -->
        <div class="lg:col-span-2 bg-white rounded-2xl shadow p-6 md:p-8">

            <form action="{{ route('admin.kategori.update', $menu_categorie->slug) }}" method="POST" class="space-y-5">
                @csrf
                @method('PUT')

                <!-- Nama -->
                <div>
                    <label class="block text-sm font-semibold text-[#5C4033]">
                        Nama Kategori *
                    </label>
                    <input type="text" name="nama"
                        value="{{ old('nama', $menu_categorie->nama) }}"
                        class="w-full mt-2 px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-orange-400"
                        placeholder="Contoh: Kopi & Minuman">

                    @error('nama')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Slug -->
                <div>
                    <label class="block text-sm font-semibold text-[#5C4033]">
                        Slug 
                    </label>
                    <input type="text" name="slug"
                        value="{{ old('slug', $menu_categorie->slug) }}"
                        class="w-full mt-2 px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-orange-400"
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
                        class="w-full mt-2 px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-orange-400"
                        placeholder="Deskripsi kategori...">{{ old('deskripsi', $menu_categorie->deskripsi) }}</textarea>

                    @error('deskripsi')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Order -->
                <div>
                    <label class="block text-sm font-semibold text-[#5C4033]">
                        Sort Order
                    </label>
                    <input type="number" name="sort_order"
                        value="{{ old('sort_order', $menu_categorie->sort_order) }}"
                        class="w-full mt-2 px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-orange-400"
                        placeholder="Contoh: 1">

                    @error('sort_order')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- BUTTON -->
                <div class="pt-4 flex gap-2">
                    <button type="submit"
                        class="px-6 py-3 bg-[#D97706] text-white rounded-xl font-semibold shadow hover:bg-[#EA580C] transition">
                        Update Data
                    </button>

                    <a href="{{ route('admin.kategori.index') }}"
                        class="px-6 py-3 bg-gray-500 text-white rounded-xl hover:bg-gray-600">
                        Batal
                    </a>
                </div>

            </form>
        </div>

        <!-- PREVIEW -->
        <div class="bg-white rounded-2xl shadow p-6 h-fit">

            <h2 class="text-lg font-semibold text-[#5C4033] mb-4">
                Preview Data
            </h2>

            <div class="space-y-3 text-sm text-gray-700">

                <div>
                    <p class="text-gray-500">Nama</p>
                    <p id="preview-name" class="font-semibold">
                        {{ $menu_categorie->nama }}
                    </p>
                </div>

                <div>
                    <p class="text-gray-500">Slug</p>
                    <p id="preview-slug" class="font-semibold">
                        {{ $menu_categorie->slug }}
                    </p>
                </div>

                <div>
                    <p class="text-gray-500">Deskripsi</p>
                    <p id="preview-description">
                        {{ $menu_categorie->deskripsi ?? '-' }}
                    </p>
                </div>

                <div>
                    <p class="text-gray-500">Urutan</p>
                    <p id="preview-order" class="font-semibold">
                        {{ $menu_categorie->sort_order }}
                    </p>
                </div>

            </div>

            <div class="mt-6 p-3 bg-orange-50 rounded-xl text-xs text-orange-700">
                Perubahan akan langsung terlihat di sistem setelah update.
            </div>

        </div>

    </div>

</div>

<!-- SCRIPT -->
<script>
const nameInput = document.querySelector('input[name="nama"]');
const slugInput = document.querySelector('input[name="slug"]');
const descInput = document.querySelector('textarea[name="deskripsi"]');
const orderInput = document.querySelector('input[name="sort_order"]');

const previewName = document.getElementById('preview-name');
const previewSlug = document.getElementById('preview-slug');
const previewDesc = document.getElementById('preview-deskripsi');
const previewOrder = document.getElementById('preview-sort_order');

// update preview
function updatePreview() {
    previewName.textContent = nameInput.value || '-';
    previewSlug.textContent = slugInput.value || '-';
    previewDesc.textContent = descInput.value || '-';
    previewOrder.textContent = orderInput.value || '-';
}

// auto slug
nameInput.addEventListener('input', () => {
    slugInput.value = nameInput.value
        .toLowerCase()
        .replace(/[^a-z0-9]+/g, '-')
        .replace(/(^-|-$)/g, '');

    updatePreview();
});

// listener
[nameInput, slugInput, descInput, orderInput].forEach(el => {
    el.addEventListener('input', updatePreview);
});

// init
updatePreview();
</script>

@endsection
