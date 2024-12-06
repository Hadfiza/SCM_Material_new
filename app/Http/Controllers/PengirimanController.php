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
        // Mengambil pengiriman beserta order material terkait menggunakan 'orderMaterial'
        $pengiriman = Pengiriman::with('orderMaterial')->get();
        return view('admin.pengiriman.home', compact('pengiriman'));
    }

    public function indexForUser()
{
    // Ambil semua data pengiriman dari database
    $pengiriman = Pengiriman::all();

    // Hitung jumlah pengiriman
    $totalPengiriman = $pengiriman->count(); // Menggunakan count() dari koleksi untuk menghitung jumlah

    // Kirim data pengiriman dan jumlah pengiriman ke view
    return view('user.pengiriman.index', compact('pengiriman', 'totalPengiriman'));
}

    /**
     * Menampilkan form untuk membuat pengiriman baru.
     */
    public function create()
    {
        // Ambil data order material yang belum dibuat pengirimannya
        $orderMaterials = OrderMaterial::whereDoesntHave('pengiriman')->get();
        return view('admin.pengiriman.create', compact('orderMaterials'));
    }


    /**
     * Menyimpan data pengiriman baru.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'order_id' => 'required|integer|exists:order_material,id',
            'tanggal_kirim' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_kirim',
            'status_pengiriman' => 'required|string|max:255',
        ]);

        // Simpan data pengiriman
        Pengiriman::create([
            'order_id' => $validated['order_id'],
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
        $validated = $request->validate([
            'order_id' => 'required|integer|exists:order_material,id',
            'tanggal_kirim' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_kirim',
            'status_pengiriman' => 'required|string|max:255',
        ]);

        $pengiriman = Pengiriman::findOrFail($id);

        // Cek jika status pengiriman diubah menjadi 'selesai'
        $statusSebelumnya = $pengiriman->status_pengiriman;
        $statusBaru = $validated['status_pengiriman'];

        // Jika status baru adalah 'selesai' dan status sebelumnya tidak
        if ($statusBaru == 'selesai' && $statusSebelumnya != 'selesai') {
            // Cari OrderMaterial terkait dan hapus
            $orderMaterial = OrderMaterial::findOrFail($validated['order_id']);
            $orderMaterial->delete(); // Hapus data OrderMaterial
        }

        // Perbarui data pengiriman
        $pengiriman->update([
            'order_id' => $validated['order_id'],
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
