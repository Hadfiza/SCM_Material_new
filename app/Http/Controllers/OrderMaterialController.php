<?php

namespace App\Http\Controllers;

use App\Models\MaterialPemasok;
use App\Models\OrderMaterial;
use Illuminate\Http\Request;

class OrderMaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $orders = OrderMaterial::all();
        return view('admin.order.home', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $material = MaterialPemasok::all(); // Ambil semua material
        return view('admin.order.create', compact('material'));
    }
    

    /**
     * Store a newly created resource in storage.
     */

     public function store(Request $request)
     {
         $validated = $request->validate([
             'material_id' => 'required|integer|exists:material_pemasok,id',
             'jumlah_order' => 'required|integer|min:1',
             'tanggal_order' => 'required|date',
             'keterangan' => 'required|string',
         ]);
     
         // Ambil material berdasarkan ID
         $material = MaterialPemasok::find($validated['material_id']);
     
         // Periksa stok material
         if ($material->stok < $validated['jumlah_order']) {
             return redirect()->back()->withErrors(['stok' => 'Stok material tidak mencukupi.']);
         }
     
         // Kurangi stok material
         $material->stok -= $validated['jumlah_order'];
         $material->save();
     
         // Simpan order
         OrderMaterial::create($validated);
     
         return redirect()->route('admin.order')->with('success', 'Order Material berhasil ditambahkan dan stok material telah diperbarui.');
     }
     

     

    // public function store(Request $request)
    // {
    //     $validated = $request->validate([
    //         'material_id' => 'required|integer',
    //         'pengiriman_id' => 'required|integer',
    //         'jumlah_order' => 'required|integer',
    //         'tanggal_order' => 'required',
    //         'status_order' => 'required',
    //         'keterangan' => 'required|string'
    //     ]);

    //     OrderMaterial::create($validated);
    //     return redirect()->route('admin.order')->with('success', 'Order Material berhasil ditambahkan');
    // }

    /**
     * Display the specified resource.
     */
    public function show(OrderMaterial $orderMaterial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OrderMaterial $orderMaterial, int $id)
    {
        $order = OrderMaterial::find($id);
        $material = MaterialPemasok::all(); // Ambil semua data material pemasok

        return view('admin.order.edit', compact('order','material'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id, OrderMaterial $orderMaterial)
    {
        $validated = $request->validate([
            'material_id' => 'required|integer',
            'jumlah_order' => 'required|integer',
            'tanggal_order' => 'required',
            'keterangan' => 'required|string'
        ]);

        $order = OrderMaterial::find($id);
        // Update order material
        $order->update($validated);

        return redirect()->route('admin.order')->with('success', 'Order Material berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OrderMaterial $orderMaterial, int $id)
    {
        $order = OrderMaterial::find($id);
    
        if (!$order) {
            return redirect()->route('admin.order')->withErrors(['order' => 'Order tidak ditemukan.']);
        }
    
        // Tambahkan kembali stok material
        $material = MaterialPemasok::find($order->material_id);
        if ($material) {
            $material->stok += $order->jumlah_order;
            $material->save();
        }
    
        $order->delete();
    
        return redirect()->route('admin.order')->with('success', 'Order Material berhasil dihapus dan stok material telah diperbarui.');
    }
}
