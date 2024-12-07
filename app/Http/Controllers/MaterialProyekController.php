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
        // Ambil data material proyek
        $materialProyek = MaterialProyek::all();
        $orderMaterials = OrderMaterial::all(); // Pastikan ini sesuai dengan yang dibutuhkan

        // Kirimkan data ke tampilan
        return view('admin.material_proyek.index', compact('materialProyeks','orderMaterials'));
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
    public function storeFromOrder($orderMaterialId)
    {
        // Pastikan order material ada
        $orderMaterial = OrderMaterial::findOrFail($orderMaterialId);  // ID yang diteruskan harus valid

        // Ambil pengiriman terkait dengan order material
        $pengiriman = $orderMaterial->pengiriman;

        // Pastikan pengiriman sudah selesai
        if ($pengiriman->status !== 'selesai') {
            return back()->with('error', 'Pengiriman belum selesai.');
        }

        // Simpan material ke proyek menggunakan data order material
        MaterialProyek::create([
            'nama_material' => $orderMaterial->material->nama_material,
            'stok' => $orderMaterial->jumlah_order,
            'harga_satuan' => $orderMaterial->material->harga_satuan,
            'jenis_material' => $orderMaterial->material->jenis_material,
            'pengiriman_id' => $pengiriman->id,
        ]);

        return redirect()->route('admin.material.index')->with('success', 'Material Proyek berhasil ditambahkan.');
    }


}
