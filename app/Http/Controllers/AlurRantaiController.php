<?php

namespace App\Http\Controllers;

use App\Models\OrderMaterial;
use Illuminate\Http\Request;

class AlurRantaiController extends Controller
{
    public function index(Request $request)
    {
        // Ambil data dari tabel ordermaterial dengan filter bulan jika ada
        $query = OrderMaterial::select('id', 'nama_material', 'nama_pemasok', 'jumlah_order', 'tanggal_order');

        // Filter berdasarkan bulan jika ada parameter bulan
        if ($request->has('bulan')) {
            $bulan = $request->input('bulan');
            // Menggunakan bulan dari parameter dan tahun sekarang jika bulan tidak ditentukan
            $query->whereMonth('tanggal_order', $bulan);
        }

        // Ambil data yang sudah difilter
        $dataOrders = $query->get();

        return view('admin.alur_rantai.index', compact('dataOrders'));
    }
}
