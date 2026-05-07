<?php

namespace App\Http\Controllers;

use App\Http\Requests\MejaRequest;
use App\Models\meja;
use Illuminate\Http\Request;

class MejaController extends Controller
{
    public function index(Request $request)
    {
        $total_meja = meja::count();

        $meja_tersedia = meja::where('status', 'tersedia')->count();

        $meja_terisi = meja::where('status', 'terisi')->count();

        $meja_maintenance = meja::where('status', 'maintenance')->count();

        $data = meja::query();

        if ($request->search) {
            $data->where('nomor_meja', 'like', "%{$request->search}%");
        }

        if ($request->lokasi) {
            $data->where('lokasi', $request->lokasi);
        }

        if ($request->status) {
            $data->where('status', $request->status);
        }

        $meja = $data->paginate(4)->withQueryString();

        return view('admin.meja.index', compact('meja', 'total_meja', 'meja_tersedia', 'meja_terisi', 'meja_maintenance'));
    }

    public function create()
    {
        return view('admin.meja.create');
    }

    public function store(MejaRequest $request)
    {
        $data = $request->validated();

        meja::create($data);

        return redirect()->route('admin.meja.index');
    }

    public function edit(meja $meja)
    {
        return view('admin.meja.edit', compact('meja'));
    }

    public function update(MejaRequest $request ,meja $meja)
    {
        $data = $request->validated();

        $meja->update($data);

        return redirect()->route('admin.meja.index');
    }

    public function toggle(Request $request , meja $meja)
    {
        $request->validate([
            'status' => 'required|in:tersedia,terisi,maintenance'
        ]);

        $meja->update([
            'status' => $request->status
        ]);

        return back()->with('success', 'Status meja berhasil diubah');
    }

    public function show(meja $meja)
    {
        return view('admin.meja.show', compact('meja'));
    }

    public function exportPdf()
    {
        $data = meja::all();

        return view('admin.meja.pdf', compact('data'));
    }

    public function exportCsv()
    {
        $data = meja::all();

        $filename = "meja_" . date('Ymd_His') . ".csv";

        $headers = [
            'Content-type' => 'text/csv',
            'Content-Disposition' => "attachment; filename={$filename}",
        ];

        $callback = function () use ($data) {
            $file = fopen('php://output', 'w');

            fputcsv($file, ['id', 'nomor_meja', 'kapasitas', 'status', 'lokasi', 'deskripsi', 'created_at', 'updated_at']);
            foreach ($data as $baris) {
                fputcsv($file, [
                    $baris->id,
                    $baris->nomor_meja,
                    $baris->kapasitas,
                    $baris->status,
                    $baris->lokasi,
                    $baris->deskripsi,
                    $baris->created_at,
                    $baris->updated_at
                ]);
            }
            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
