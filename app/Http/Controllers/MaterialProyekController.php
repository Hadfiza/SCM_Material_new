<?php

namespace App\Http\Controllers;

use App\Models\MaterialProyek;
use App\Models\Pengiriman;
use App\Models\MaterialPemasok;
use Illuminate\Http\Request;

class MaterialProyekController extends Controller
{
    public function index()
    {
        // Ambil data material proyek
        $materialProyeks = MaterialProyek::all();

        return view('admin.material_proyek.index', compact('materialProyeks'));
    }

    public function show($id)
    {
        // Ambil detail material proyek berdasarkan ID
        $materialProyek = MaterialProyek::findOrFail($id);

        return view('admin.material_proyek.show', compact('materialProyek'));
    }
    /**
     * Simpan material proyek setelah pengiriman selesai
     */
    public function storeFromPengiriman($pengirimanId)
    {
        // Ambil pengiriman berdasarkan ID
        $pengiriman = Pengiriman::findOrFail($pengirimanId);

        // Pastikan pengiriman sudah selesai
        if ($pengiriman->status !== 'selesai') {
            return back()->with('error', 'Pengiriman belum selesai.');
        }

        // Ambil material dari pemasok yang terkait dengan pengiriman
        $materialPemasok = $pengiriman->materialPemasok;

        // Simpan material ke proyek
        $materialProyek = MaterialProyek::create([
            'nama_material' => $materialPemasok->nama_material,
            'stok' => $materialPemasok->stok,
            'harga_satuan' => $materialPemasok->harga_satuan,
            'jenis_material' => $materialPemasok->jenis_material,
            'pengiriman_id' => $pengiriman->id,
        ]);

        return redirect()->route('admin.material.index')->with('success', 'Material Proyek berhasil ditambahkan.');
    }
}
