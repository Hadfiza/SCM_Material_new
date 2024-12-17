<?php

namespace App\Http\Controllers;

use App\Models\MaterialProyek;
use App\Models\Kontrak;
use App\Models\DetailProyek;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Proyek;

class DetailProyekController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($proyek_id)
    {
        $start_date = request()->get('start_date', null);
        $end_date = request()->get('end_date', null);

        $query = DetailProyek::where('proyek_id', $proyek_id)->with('materialProyek');

        if ($start_date && $end_date) {
            $query->whereBetween('tanggal_digunakan', [$start_date, $end_date]);
        }

        $detail_proyek = $query->paginate(10);

        return view('admin.detail_proyek.home', compact('detail_proyek', 'proyek_id', 'start_date', 'end_date'));
    }





    /**
     * Show the form for creating a new resource.
     */
    public function create($proyek_id)
    {
        $material_proyek = MaterialProyek::all();
        $kontrak = Kontrak::all();

        return view('admin.detail_proyek.create', compact('material_proyek', 'kontrak', 'proyek_id'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $proyek_id)
    {
        // Validasi input
        $validated = $request->validate([
            'material_id' => 'required',
            'jumlah_digunakan' => 'required|integer',
            'tanggal_digunakan' => 'required|date',
            'keterangan' => 'required|string',
        ]);

        $material = MaterialProyek::findOrFail($request->material_id);

        if ($material->stok < $request->jumlah_digunakan) {
            return redirect()->back()->with('error', 'Stok tidak mencukupi!');
        }

        $biaya_penggunaan = $material->harga_satuan * $request->jumlah_digunakan;

        // Tambahkan proyek_id ke dalam data yang akan disimpan
        $validated['proyek_id'] = $proyek_id;
        $validated['biaya_penggunaan'] = $biaya_penggunaan;
        $validated['nama_material'] = $material->nama_material;

        DetailProyek::create($validated);

        // Kurangi stok setelah penyimpanan detail proyek
        $material->stok -= $request->jumlah_digunakan;
        $material->save();

        return redirect()->route('admin.detail_proyek.index', $proyek_id)->with('success', 'Detail Proyek berhasil ditambahkan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($proyek_id, $id)
    {
        $detail_proyek = DetailProyek::where('proyek_id', $proyek_id)->findOrFail($id);
        $material_proyek = MaterialProyek::all();
        $kontrak = Kontrak::all();

        return view('admin.detail_proyek.edit', compact('detail_proyek', 'material_proyek', 'kontrak', 'proyek_id'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $proyek_id, $id)
    {
        // Validasi input
        $validated = $request->validate([
            'material_id' => 'required',
            'jumlah_digunakan' => 'required|integer',
            'tanggal_digunakan' => 'required|date',
            'keterangan' => 'required|string',
        ]);

        $detail_proyek = DetailProyek::where('proyek_id', $proyek_id)->findOrFail($id);
        $material = MaterialProyek::findOrFail($request->material_id);

        $biaya_penggunaan = $material->harga_satuan * $request->jumlah_digunakan;

        $validated['biaya_penggunaan'] = $biaya_penggunaan;
        $validated['nama_material'] = $material->nama_material;

        $detail_proyek->update($validated);

        return redirect()->route('admin.detail_proyek.index', $proyek_id)->with('success', 'Detail Proyek updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($proyek_id, $id)
    {
        $detail_proyek = DetailProyek::where('proyek_id', $proyek_id)->findOrFail($id);
        $detail_proyek->delete();

        return redirect()->route('admin.detail_proyek.index', $proyek_id)->with('success', 'Detail proyek berhasil dihapus!');
    }


// Method untuk ekspor ke PDF
public function exportPDF($proyek_id, Request $request)
{
    $start_date = $request->get('start_date');
    $end_date = $request->get('end_date');

    // Validasi input tanggal
    if (($start_date && !$end_date) || (!$start_date && $end_date)) {
        return redirect()->back()->with('error', 'Harap isi kedua tanggal (start_date dan end_date) untuk filter.');
    }

    $query = DetailProyek::where('proyek_id', $proyek_id)->with('materialProyek');

    // Filter berdasarkan tanggal jika tersedia
    if ($start_date && $end_date) {
        $query->whereBetween('tanggal_digunakan', [$start_date, $end_date]);
    }

    $detail_proyek = $query->get();

    // Cek jika data kosong
    if ($detail_proyek->isEmpty()) {
        return redirect()->back()->with('error', 'Tidak ada data untuk rentang tanggal yang dipilih.');
    }

    // Ambil nama proyek dari database
    $proyek = Proyek::find($proyek_id);

    if (!$proyek) {
        return redirect()->back()->with('error', 'Proyek tidak ditemukan.');
    }

    // Buat nama file PDF berdasarkan nama proyek
    $pdf_filename = Str::slug($proyek->nama_proyek, '_') . '.pdf';

    // Generate PDF menggunakan view
    $pdf = Pdf::loadView('admin.detail_proyek.pdf', [
        'detail_proyek' => $detail_proyek,
        'proyek_id' => $proyek_id,
        'start_date' => $start_date,
        'end_date' => $end_date,
        'proyek' => $proyek
    ]);

    // Return file PDF untuk diunduh
    return $pdf->download($pdf_filename);
}



}
