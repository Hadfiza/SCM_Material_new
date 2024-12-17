<?php

namespace App\Http\Controllers;

use App\Models\OrderMaterial;
use Illuminate\Http\Request;

class AlurRantaiController extends Controller
{
    public function index()
    {
        // Ambil data dari tabel ordermaterial
        $dataOrders = OrderMaterial::select('id', 'nama_material', 'nama_pemasok', 'jumlah_order')->get();

        return view('admin.alur_rantai.index', compact('dataOrders'));
    }
}
