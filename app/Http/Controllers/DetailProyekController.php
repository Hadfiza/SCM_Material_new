<?php

namespace App\Http\Controllers;

use App\Models\Material;
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
        $detail_proyek = DetailProyek::all();
        return view('admin.detail_proyek.home', compact('detail_proyek'));
    }

    // public function indekForUser(){
    //     $detail_proyek = DetailProyek::all();
    //     return view('user.detail_proyek.index', compact('detail_proyek'));
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $material = Material::all(); // Mengambil semua data dari tabel 'materials'
        $kontrak = Kontrak::all();   // Mengambil semua data dari tabel 'kontraks'
    
        return view('admin.detail_proyek.create', compact('material', 'kontrak'));
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'material_id' => 'required',
            'proyek_id' => 'required',
            'jumlah_digunakan' => 'required|integer',
            'tanggal_digunakan' => 'required|date',
            'keterangan' => 'required|string',
            'biaya_penggunaan' => 'required', 
        ]);
    

        DetailProyek::create($request->all());

        return redirect()->route('admin.detail_proyek')->with('success', 'Detail Proyek berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(DetailProyek $detailProyek)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $detail_proyek = DetailProyek::findOrFail($id);
        return view('admin.detail_proyek.edit', compact('detail_proyek'));
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
            'jumlah_digunakan' => 'required|intiger',
            'tanggal_digunakan' => 'required|date',
            'keterangan' => 'required|string',
            'biaya_penggunaan' => 'required', 
        ]);

    // Cari berdasarkan ID
    $detail_proyek = DetailProyek::findOrFail($id);

    // Update data 
    $detail_proyek->update([
        'material_id' => $validated['material_id'],
        'proyek_id' => $validated['proyek_id'],
        'jumlah_digunakan' => $validated['jumlah_digunakan'],
        'tanggal_digunakan' => $validated['tanggal_digunakan'],
        'keterangan' => $validated['keterangan'],
        'biaya_penggunaan' => $validated['biaya_penggunaan'],
    ]);

    // Redirect ke halaman index dengan pesan sukses
    return redirect()->route('admin.detail_proyek')->with('success', 'Detail Proyek updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DetailProyek $detailProyek)
    {
    // Cari berdasarkan ID
    $detail_proyek = DetailProyek::findOrFail($id);

    // Hapus pengiriman
    $detail_proyek->delete();

    // Redirect kembali ke halaman pengiriman dengan pesan sukses
    return redirect()->route('admin.detail_proyek')->with('success', 'Detail proyek berhasil dihapus!');
    }
}
