<?php

namespace App\Http\Controllers;

use App\Models\DetailProyek;
use App\Models\Material;
use App\Models\Pemasok;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $materials = Material::all();
        return view('admin.material.home', compact('materials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pemasok = Pemasok::all(['id', 'nama_pemasok']);
        return view('admin.material.create', compact('pemasok'));
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
            'harga_total' => 'required',
            'jenis_material' => 'required|string',
            'pemasok_id' => 'required|integer',
            'detail_proyek' => 'nullable'
        ]);

        Material::create($request->all());

        return redirect()->route('admin.material')->with('success', 'Material berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Material $material)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Material $material, int $id)
    {
        //
        $material = Material::find($id);
        return view('admin.material.edit', compact('material'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id,  Material $material)
    {
        //
        $validated = $request->validate([
            'nama_material' => 'required|string',
            'stok' => 'required|integer',
            'harga_total' => 'required',
            'jenis_material' => 'required|string',
            'pemasok_id' => 'required|integer',
            'detail_proyek' => 'nullable'
        ]);

        $material = Material::findOrFail($id);
        $material->update($validated);

        return redirect()->route('admin.material')->with('success', 'Material berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Material $material, int $id)
    {
        // Cari berdasarkan ID
        $material = Material::findOrFail($id);

        // Hapus pengiriman
        $material->delete();

        // Redirect kembali ke halaman pengiriman dengan pesan sukses
        return redirect()->route('admin.material')->with('success', 'Material berhasil dihapus!');
    }
}
