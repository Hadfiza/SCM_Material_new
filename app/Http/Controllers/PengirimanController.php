<?php

namespace App\Http\Controllers;

use App\Models\Pengiriman;
use App\Models\OrderMaterial;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PengirimanController extends Controller
{
    /**
     * Menampilkan daftar pengiriman.
     */
    public function index()
    {
        $pengiriman = Pengiriman::with('orderMaterial')->get();
        return view('admin.pengiriman.home', compact('pengiriman'));
    }

    /**
     * Menampilkan daftar pengiriman untuk pengguna.
     */
    public function indexForUser()
    {
        $pengiriman = Pengiriman::all();
        $totalPengiriman = $pengiriman->count();
        return view('user.pengiriman.index', compact('pengiriman', 'totalPengiriman'));
    }

    /**
     * Menampilkan form untuk membuat pengiriman baru.
     */
    public function create()
    {
        $orderMaterials = OrderMaterial::whereDoesntHave('pengiriman')->get();
        return view('admin.pengiriman.create', compact('orderMaterials'));
    }

    /**
     * Menyimpan data pengiriman baru.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nomor_order' => 'required|string|exists:order_material,nomor_order', // Ubah dari order_id ke nomor_order
            'tanggal_kirim' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_kirim',
            'status_pengiriman' => 'required|string|max:255',
        ]);

        // Cari OrderMaterial berdasarkan nomor_order
        $orderMaterial = OrderMaterial::where('nomor_order', $validated['nomor_order'])->first();
        if (!$orderMaterial) {
            return redirect()->back()->withErrors(['nomor_order' => 'Nomor order tidak ditemukan.']);
        }

        // Tambahkan data pengiriman
        Pengiriman::create([
            'order_id' => $orderMaterial->id, // Simpan ID order
            'tanggal_kirim' => $validated['tanggal_kirim'],
            'tanggal_selesai' => $validated['tanggal_selesai'],
            'status_pengiriman' => $validated['status_pengiriman'],
        ]);



        return redirect()->route('admin.pengiriman')->with('success', 'Pengiriman berhasil ditambahkan.');
    }

    /**
     * Menampilkan form untuk mengedit data pengiriman.
     */
    public function edit($id)
    {
        $pengiriman = Pengiriman::findOrFail($id);
        $orderMaterials = OrderMaterial::all();
        return view('admin.pengiriman.edit', compact('pengiriman', 'orderMaterials'));
    }

    /**
     * Memperbarui data pengiriman.
     */
    public function update(Request $request, $id)
    {
        // Validasi input
        $validated = $request->validate([
            'nomor_order' => 'required|string|exists:order_material,nomor_order', // Ubah dari order_id ke nomor_order
            'tanggal_kirim' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_kirim',
            'status_pengiriman' => 'required|string|max:255',
        ]);
    
        // Cari pengiriman berdasarkan ID
        $pengiriman = Pengiriman::findOrFail($id);
    
        // Cari OrderMaterial berdasarkan nomor_order
        $orderMaterial = OrderMaterial::where('nomor_order', $validated['nomor_order'])->first();
        if (!$orderMaterial) {
            return redirect()->back()->withErrors(['nomor_order' => 'Nomor order tidak ditemukan.']);
        }
    
        // Update data pengiriman
        $pengiriman->update([
            'order_id' => $orderMaterial->id, // Update ID order berdasarkan nomor_order
            'tanggal_kirim' => $validated['tanggal_kirim'],
            'tanggal_selesai' => $validated['tanggal_selesai'],
            'status_pengiriman' => $validated['status_pengiriman'],
        ]);
    
        return redirect()->route('admin.pengiriman')->with('success', 'Pengiriman berhasil diperbarui.');
    }
    

    /**
     * Menghapus data pengiriman.
     */
    public function destroy($id)
    {
        $pengiriman = Pengiriman::findOrFail($id);
        $pengiriman->delete();

        return redirect()->route('admin.pengiriman')->with('success', 'Pengiriman berhasil dihapus.');
    }

    /**
     * Menghitung sisa hari sebelum tanggal selesai.
     */
    public function hitungSisaHari($id)
    {
        $pengiriman = Pengiriman::findOrFail($id);

        if ($pengiriman->tanggal_selesai) {
            $sisaHari = Carbon::now()->diffInDays(Carbon::parse($pengiriman->tanggal_selesai), false);

            return $sisaHari >= 0
                ? "Sisa waktu: {$sisaHari} hari."
                : "Tanggal selesai sudah terlewati.";
        }

        return "Tanggal selesai belum ditentukan.";
    }
}
