<?php

namespace App\Http\Controllers;

use App\Http\Requests\MenuCategorieRequest;
use App\Models\menu_categorie;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class MenuCategorieController extends Controller
{
    public function index(Request $request)
    {
        $categories = menu_categorie::query()
        ->when($request->search, function ($query, $search) {
            $query->where('nama', 'like', "%{$search}%");
        })
        ->orderBy('sort_order', 'asc')->get();

        $total = menu_categorie::count();

        return view('admin.kategori.index', compact('categories', 'total'));
    }

    public function create()
    {
        return view('admin.kategori.create');
    }

    public function store(MenuCategorieRequest $request)
    {
        $slug = Str::slug($request->slug, '-');

        $data = $request->validated();

        if (!isset($data['sort_order'])) {
            $data['sort_order'] = menu_categorie::max('sort_order') + 1 ?? 1;
        }

        $data['slug'] = $slug;

        menu_categorie::create($data);

        return redirect()->route('admin.kategori.index', $slug)->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function edit(menu_categorie $menu_categorie)
    {
        return view('admin.kategori.edit', compact('menu_categorie'));
    }

    public function update(MenuCategorieRequest $request, menu_categorie $menu_categorie)
    {
        $slug = Str::slug($request->slug, '-');
        $data = $request->validated();
        $data['slug'] = $slug;
        $menu_categorie->update($data);
        return redirect()->route('admin.kategori.index', $menu_categorie->slug)->with('success', 'Kategori berhasil diperbarui.');
    }

    public function destroy(menu_categorie $menu_categorie)
    {
        $menu_categorie->delete($menu_categorie);
        return redirect()->route('admin.kategori.index')->with('success', 'Kategori berhasil dihapus.');
    }

    public function show(menu_categorie $menu_categorie)
    {
        return view('admin.kategori.show', compact('menu_categorie'));
    }

    public function exportCsv()
    {
        $data = menu_categorie::all();

        $filename = "kategori_" . date('Ymd_His') . ".csv";

        $headers = [
            'content-type' => 'text/csv',
            'content-disposition' => "attachment; filename={$filename}",
        ];

        $callback = function () use ($data) {
            $file = fopen('php://output', 'w');

            fputcsv($file, ['id', 'nama', 'slug', 'deskripsi', 'sort_order', 'created_at', 'updated_at']);

            foreach ($data as $baris) {
                fputcsv($file, [
                    $baris->id,
                    $baris->nama,
                    $baris->slug,
                    $baris->deskripsi,
                    $baris->sort_order,
                    $baris->created_at,
                    $baris->updated_at
                ]);
            }
            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
        
    }

    public function exportPdf()
    {
        $data = menu_categorie::all();

        return view('admin.kategori.pdf', compact('data'));
    }
}
