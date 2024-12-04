<?php

namespace App\Http\Controllers;

use App\Models\Material;
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
        //
        return view('admin.order.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'material_id' => 'required|integer',
            'pengiriman_id' => 'required|integer',
            'jumlah_order' => 'required|integer',
            'tanggal_order' => 'required',
            'status_order' => 'required',
            'keterangan' => 'required|string'
        ]);

        OrderMaterial::create($validated);
        return redirect()->route('admin.order')->with('success', 'Order Material berhasil ditambahkan');
    }

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
        return view('admin.order.edit', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id, OrderMaterial $orderMaterial)
    {
        $validated = $request->validate([
            'material_id' => 'required|integer',
            'pengiriman_id' => 'required|integer',
            'jumlah_order' => 'required|integer',
            'tanggal_order' => 'required',
            'status_order' => 'required',
            'keterangan' => 'required|string'
        ]);

        $order = OrderMaterial::find($id);
        $order->update($validated);
        return redirect()->route('admin.order')->with('success', 'Order Material berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OrderMaterial $orderMaterial, int $id)
    {
        $order = OrderMaterial::find($id);
        $order->delete();

        return redirect()->route('admin.order')->with('success', 'Order Material berhasil dihapus');
    }
}
