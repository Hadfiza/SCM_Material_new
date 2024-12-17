<?php

namespace App\Http\Controllers;

use App\Models\Proyek;
use Illuminate\Http\Request;

class ProyekController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $proyek = Proyek::all();
        return view('admin.proyek.home', compact('proyek'));
    }

    /**
     * Display proyek for users.
     */
    public function indexForUser()
    {
        $proyek = Proyek::all();
        return view('proyek.index', compact('proyek'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.proyek.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_proyek' => 'required|string',
            'status' => 'required',
            'lokasi' => 'required',
        ]);

        Proyek::create($request->all());

        return redirect()->route('admin.proyek')->with('success', 'Proyek berhasil ditambahkan');
    }


    /**
     * Display the specified resource.
     */
    public function show(Proyek $proyek)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $proyek = Proyek::findOrFail($id);
        return view('admin.proyek.edit', compact('proyek'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_proyek' => 'required|string',
            'status' => 'required',
            'lokasi' => 'required',
        ]);

        $proyek = Proyek::findOrFail($id);
        $proyek->update($validated);

        // Pastikan redirect ke rute yang benar
        return redirect()->route('admin.proyek')->with('success', 'Update proyek sukses');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $proyek = Proyek::findOrFail($id);
        $proyek->delete();

        return redirect()->route('admin.proyek')->with('success', 'Proyek berhasil dihapus');
    }
}
