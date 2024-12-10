<?php

namespace App\Http\Controllers;

use App\Models\Kontrak;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class KontrakController extends Controller
{
    // Tampilkan semua kontrak untuk semua pengguna
    public function index()
    {
        $kontrak = Kontrak::all(); // Admin atau user biasa bisa melihat semua kontrak
        return view('admin.kontrak.home', compact('kontrak'));
    }

    
    public function create()
    {
    // Ambil data user_id yang ada di tabel pemasok
    $pemasoks = \App\Models\Pemasok::all();  // Mengambil semua pemasok yang memiliki user_id

    // Kirimkan data pemasok ke tampilan
    return view('admin.kontrak.create', compact('pemasoks'));
    }

    
    public function store(Request $request)
{
    // Validasi inputan
    $request->validate([
        'deskripsi' => 'required',
        'tanggal_mulai' => 'required|date',
        'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
        'bukti_kontrak' => 'required|mimes:pdf,doc,docx|max:10240', // Maksimal 10MB
    ]);

    // Ambil ID pengguna yang sedang login
    $user_id = Auth::id(); // Ini akan mendapatkan user ID dari pengguna yang sedang login

    // Proses upload bukti kontrak
    if ($request->hasFile('bukti_kontrak')) {
        $filePath = $request->file('bukti_kontrak')->store('kontrak_bukti', 'public');
    }

    // Buat kontrak baru dan tambahkan user_id
    Kontrak::create([
        'deskripsi' => $request->deskripsi,
        'tanggal_mulai' => $request->tanggal_mulai,
        'tanggal_selesai' => $request->tanggal_selesai,
        'bukti_kontrak' => $filePath ?? null,
        'user_id' => $user_id, // Menambahkan user_id yang terhubung dengan pengguna yang sedang login
    ]);

    // Redirect ke halaman daftar kontrak
    return redirect()->route('admin.kontrak.home')->with('success', 'Kontrak berhasil ditambahkan.');
}


    

    // Form edit kontrak hanya untuk admin
    public function edit($id)
    {
        if (Auth::user()->usertype !== 'admin') {
            abort(403, 'Anda tidak memiliki akses untuk mengedit kontrak.');
        }

        // Ambil kontrak berdasarkan ID
        $kontrak = Kontrak::findOrFail($id);
        return view('admin.kontrak.edit', compact('kontrak'));
    }

    
    public function update(Request $request, $id)
{
    
    $request->validate([
        'deskripsi' => 'required',
        'tanggal_mulai' => 'required|date',
        'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
        'bukti_kontrak' => 'nullable|mimes:pdf,doc,docx|max:10240', // Maksimal 10MB
    ]);

    if (Auth::user()->usertype !== 'admin') {
        abort(403, 'Anda tidak memiliki akses untuk memperbarui kontrak.');
    }

    // Ambil kontrak berdasarkan ID
    $kontrak = Kontrak::findOrFail($id);

    // Proses upload bukti kontrak jika ada file baru
    if ($request->hasFile('bukti_kontrak')) {
        // Hapus file sebelumnya jika ada
        if ($kontrak->bukti_kontrak && Storage::exists('public/' . $kontrak->bukti_kontrak)) {
            Storage::delete('public/' . $kontrak->bukti_kontrak);
        }

        
        $filePath = $request->file('bukti_kontrak')->store('kontrak_bukti', 'public');
        $kontrak->bukti_kontrak = $filePath;
    }

    
    $kontrak->update([
        'deskripsi' => $request->deskripsi,
        'tanggal_mulai' => $request->tanggal_mulai,
        'tanggal_selesai' => $request->tanggal_selesai,
    ]);

    
    return redirect()->route('admin.kontrak.home')->with('success', 'Kontrak berhasil diperbarui.');
}

    
    public function destroy($id)
    {
        
        if (Auth::user()->usertype !== 'admin') {
            abort(403, 'Anda tidak memiliki akses untuk menghapus kontrak.');
        }

        
        $kontrak = Kontrak::findOrFail($id);

        
        if ($kontrak->bukti_kontrak && Storage::exists('public/' . $kontrak->bukti_kontrak)) {
            Storage::delete('public/' . $kontrak->bukti_kontrak);
        }

        
        $kontrak->delete();

        return redirect()->route('admin.kontrak.home')->with('success', 'Kontrak berhasil dihapus.');
    }
}
