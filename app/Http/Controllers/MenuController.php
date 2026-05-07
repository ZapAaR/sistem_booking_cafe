<?php

namespace App\Http\Controllers;

use App\Http\Requests\MenuRequest;
use App\Models\menu;
use App\Models\menu_categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    public function index(Request $request)
    {
        $kategori = menu_categorie::all();

        $totalKategori = menu_categorie::count();

        $totalMenu = menu::count();

        $tidakTersedia = menu::where('tersedia', false)->count();

        $tersedia = menu::where('tersedia', true)->count();

        $menu = menu::query()
        ->when($request->search, function ($query, $search) {
            $query->where('nama', 'like', "%{$search}%")
                  ->orWhere('kategori_id', 'like', "%{$search}%");
        })->orderBy('nama', 'asc')->paginate(3)->withQueryString();

        return view('admin.menu.index', compact('menu', 'kategori', 'totalKategori', 'totalMenu' , 'tidakTersedia', 'tersedia'));
    }

    public function create()
    {
        $kategori = menu_categorie::all();
        return response()->view('admin.menu.create', compact('kategori'));
    }

    public function store(MenuRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('menu', 'public');
        }

        menu::create($data);

        return redirect()->route('admin.menu.index')->with('success', 'Menu berhasil ditambahkan.');
    }

    public function edit(menu $menu)
    {
        $kategori = menu_categorie::all();

        return view('admin.menu.edit', compact('menu', 'kategori'));
    }

    public function update(MenuRequest $request, menu $menu)
    {
        $data = $request->validated();

        if ($request->hasFile('gambar')) {
            if ($menu->gambar) {
                Storage::disk('public')->delete($menu->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('menu', 'public');
        }

        $menu->update($data);

        return redirect()->route('admin.menu.index')->with('success', 'Menu berhasil diperbarui.');

    }

    public function destroy(menu $menu)
    {
        if ($menu->gambar)
            {
                Storage::disk('public')->delete($menu->gambar);
            }

        $menu->delete();

        return redirect()->route('admin.menu.index')->with('success', 'Menu berhasil dihapus.');
    }

    public function show(menu $menu)
    {
        return view('admin.menu.show', compact('menu'));
    }

    public function exportPdf()
    {
        $data = menu::all();

        $kategori = menu_categorie::all();

        return view('admin.menu.pdf', compact('data'));
    }

    public function exportCsv()
    {
        $data = menu::all();

        $filename = "menu_" . date('Ymd_His') . ".csv";

        $headers = [
            'Content-type' => 'text/csv',
            'Content-Disposition' => "attachment; filename={$filename}",
        ];

        $callback = function () use ($data) {
            $file = fopen('php://output', 'w');

            fputcsv($file, ['id', 'kategori_id', 'nama', 'deskripsi', 'harga', 'gambar', 'tersedia', 'created_at', 'updated_at']);
            foreach ($data as $baris) {
                fputcsv($file, [
                    $baris->id,
                    $baris->kategori_id,
                    $baris->nama,
                    $baris->deskripsi,
                    $baris->harga,
                    $baris->gambar,
                    $baris->tersedia,
                    $baris->created_at,
                    $baris->updated_at
                ]);
            }
            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
