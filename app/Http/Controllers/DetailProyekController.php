<?php

namespace App\Http\Controllers;

use App\Models\MaterialProyek;
use App\Models\Kontrak;
use App\Models\DetailProyek;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class DetailProyekController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($proyek_id)
    {
        // Ambil parameter start_date dan end_date dari request
        $start_date = request()->get('start_date', null);
        $end_date = request()->get('end_date', null);

        // Query dasar untuk mengambil data DetailProyek berdasarkan proyek_id
        $query = DetailProyek::where('proyek_id', $proyek_id)
            ->with('materialProyek');

        // Jika start_date dan end_date ada, filter data berdasarkan tanggal
        if ($start_date && $end_date) {
            $query->whereBetween('tanggal_digunakan', [$start_date, $end_date]);
        }

        // Ambil data dengan pagination
        $detail_proyek = $query->paginate(10); // Menambahkan paginate untuk membatasi 10 data per halaman

        // Mengembalikan view dengan data yang diperlukan
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
    // Dapatkan parameter tanggal dan nama file
    $start_date = $request->get('start_date');
    $end_date = $request->get('end_date');
    $pdf_name = $request->get('pdf_name', 'detail_proyek'); // Default name if not provided

    // Filter berdasarkan rentang tanggal jika ada
    $query = DetailProyek::where('proyek_id', $proyek_id)->with('materialProyek');

    if ($start_date && $end_date) {
        $query->whereBetween('tanggal_digunakan', [$start_date, $end_date]);
    }

    $detail_proyek = $query->get(); // Ambil data

    // Tentukan nama file PDF
    $pdf_filename = $pdf_name . '.pdf'; // Gunakan nama yang diberikan oleh pengguna

    // Buat PDF menggunakan view dan data yang ada
    $pdf = Pdf::loadView('admin.detail_proyek.pdf', compact('detail_proyek', 'proyek_id', 'start_date', 'end_date'));

    // Unduh file dengan nama yang diberikan oleh pengguna
    return $pdf->download($pdf_filename);
}


}
