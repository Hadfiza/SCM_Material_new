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
            'order_id' => 'required|integer|exists:order_material,id',
            'tanggal_kirim' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_kirim',
            'status_pengiriman' => 'required|string|max:255',
        ]);

        Pengiriman::create($validated);

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

        // Update data pengiriman
        $pengiriman->update($validated);

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
