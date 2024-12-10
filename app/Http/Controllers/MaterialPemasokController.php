<?php

namespace App\Http\Controllers;

use App\Models\DetailProyek;
use App\Models\MaterialPemasok;
use App\Models\Pemasok;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MaterialPemasokController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $materials = MaterialPemasok::all();
        return view('user.material.home', compact('materials'));
    }

    public function indexForAdmin()
    {
        $materials = MaterialPemasok::all();
        return view('admin.material.home', compact('materials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pemasok = Pemasok::all(['id', 'nama_pemasok']);
        return view('user.material.create', compact('pemasok'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'nama_material' => 'required|string',
            'stok' => 'required|integer',
            'harga_satuan' => 'required',
            'jenis_material' => 'required|string',
            'pemasok_id' => 'required|integer',
            'detail_proyek' => 'nullable'
        ]);

        MaterialPemasok::create($request->all());

        return redirect()->route('user.material')->with('success', 'Material berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(MaterialPemasok $material)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MaterialPemasok $material, int $id)
    {
        //
        $material = MaterialPemasok::find($id);
        return view('user.material.edit', compact('material'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id, MaterialPemasok $material)
    {
        // Validasi data
        $validated = $request->validate([
            'nama_material' => 'required|string',
            'stok' => 'required|integer',
            'harga_satuan' => 'required',
            'jenis_material' => 'required|string',
            'pemasok_id' => 'required|integer',
            'detail_proyek' => 'nullable'
        ]);
    
        // Cari material berdasarkan ID dan update
        $material = MaterialPemasok::findOrFail($id);
        $material->update($validated);
    
        // Redirect ke halaman daftar material dengan pesan sukses
        return redirect()->route('user.material')->with('success', 'Material berhasil diupdate');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MaterialPemasok $material, int $id)
    {
        // Cari berdasarkan ID
        $material = MaterialPemasok::findOrFail($id);

        // Hapus pengiriman
        $material->delete();

        // Redirect kembali ke halaman pengiriman dengan pesan sukses
        return redirect()->route('user.material')->with('success', 'Material berhasil dihapus!');
    }
}
