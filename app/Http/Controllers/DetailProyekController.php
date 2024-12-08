<?php

namespace App\Http\Controllers;

use App\Models\MaterialProyek;
use App\Models\Kontrak;
use App\Models\DetailProyek;
use Illuminate\Http\Request;

class DetailProyekController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil semua data DetailProyek bersama dengan relasi materialProyek
        $detail_proyek = DetailProyek::with('materialProyek')->get();
        return view('admin.detail_proyek.home', compact('detail_proyek'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Ambil data dari MaterialProyek dan Kontrak
        $material_proyek = MaterialProyek::all(); // Mengambil semua data material_proyek
        $kontrak = Kontrak::all();   // Mengambil semua data kontrak

        // Proyek ID dapat berasal dari session atau database jika diperlukan
        $proyek_id = 1; // Misalnya, id proyek yang sedang aktif. Sesuaikan sesuai kebutuhan.

        return view('admin.detail_proyek.create', compact('material_proyek', 'kontrak', 'proyek_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'material_id' => 'required',
            'proyek_id' => 'required',
            'jumlah_digunakan' => 'required|integer',
            'tanggal_digunakan' => 'required|date',
            'keterangan' => 'required|string',
        ]);

        // Mengambil harga_satuan dari material yang dipilih
        $material = MaterialProyek::findOrFail($request->material_id);

        // Menghitung biaya_penggunaan
        $biaya_penggunaan = $material->harga_satuan * $request->jumlah_digunakan;

        // Menambahkan biaya_penggunaan ke dalam data yang akan disimpan
        $validated['biaya_penggunaan'] = $biaya_penggunaan;

        // Simpan detail proyek dengan data yang divalidasi
        DetailProyek::create($validated);

        return redirect()->route('admin.detail_proyek')->with('success', 'Detail Proyek berhasil ditambahkan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $detail_proyek = DetailProyek::findOrFail($id);
        $material_proyek = MaterialProyek::all();
        $kontrak = Kontrak::all();

        return view('admin.detail_proyek.edit', compact('detail_proyek', 'material_proyek', 'kontrak'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi input
        $validated = $request->validate([
            'material_id' => 'required',
            'proyek_id' => 'required',
            'jumlah_digunakan' => 'required|integer',
            'tanggal_digunakan' => 'required|date',
            'keterangan' => 'required|string',
        ]);

        // Cari berdasarkan ID
        $detail_proyek = DetailProyek::findOrFail($id);

        // Ambil harga_satuan dari material yang dipilih
        $material = MaterialProyek::findOrFail($request->material_id);

        // Hitung biaya_penggunaan baru
       // Menghitung biaya_penggunaan
$biaya_penggunaan = $material->harga_satuan * $request->jumlah_digunakan;

// Menambahkan biaya_penggunaan ke dalam data yang akan disimpan
$validated['biaya_penggunaan'] = $biaya_penggunaan;

        // Update data
        $detail_proyek->update($validated);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('admin.detail_proyek')->with('success', 'Detail Proyek updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Cari berdasarkan ID
        $detail_proyek = DetailProyek::findOrFail($id);

        // Hapus data
        $detail_proyek->delete();

        // Redirect kembali dengan pesan sukses
        return redirect()->route('admin.detail_proyek')->with('success', 'Detail proyek berhasil dihapus!');
    }
}
