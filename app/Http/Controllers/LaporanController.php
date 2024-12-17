<?php



namespace App\Http\Controllers;

use App\Models\Laporan;

class LaporanController extends Controller
{
    public function index()
    {
        // Mengambil laporan dengan proyek dan detail proyek terkait
        $laporans = Laporan::with(['proyek', 'detailProyek'])->get();

        return view('admin.laporan.index', compact('laporans'));
    }
}
