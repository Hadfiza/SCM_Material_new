<?php

namespace App\Http\Controllers;

use App\Models\MaterialProyek;
use App\Models\Pengiriman;
use App\Models\OrderMaterial;
use Illuminate\Http\Request;

class MaterialProyekController extends Controller
{
    public function index()
{
    // Ambil data material proyek dengan relasi pengiriman
    $materialProyeks = MaterialProyek::with('pengiriman')->get();
    return view('admin.material.index', compact('materialProyeks'));
}

    /**
     * Store material from order if pengiriman status is selesai
     */
    public function storeFromOrder($orderMaterialId)
    {
        // Cari order material berdasarkan ID
        $orderMaterial = OrderMaterial::findOrFail($orderMaterialId);

        // Cari pengiriman yang berhubungan dengan order material
        $pengiriman = Pengiriman::findOrFail($orderMaterial->pengiriman_id);

        // Cek status pengiriman
        if ($pengiriman->status_pengiriman === 'selesai') {
            // Simpan data ke tabel material_proyek
            MaterialProyek::create([
                'nama_material' => $orderMaterial->nama_material,
                'stok' => $orderMaterial->stok,
                'pengiriman_id' => $orderMaterial->pengiriman_id,
                'material_id' => $orderMaterial->material_id, // Menggunakan material_id yang ada
            ]);

            return redirect()->route('admin.material.index')->with('success', 'Material berhasil ditambahkan ke proyek');
        }

        return redirect()->route('admin.material.index')->with('error', 'Pengiriman belum selesai');
    }
}
