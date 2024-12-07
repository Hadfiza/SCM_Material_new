<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderMaterial extends Model
{
    use HasFactory;

    protected $table = 'order_material'; // Nama tabel di database

    protected $fillable = [
        'material_id',
        'pengiriman_id',
        'jumlah_order',
        'tanggal_order',
        'status_order',
        'keterangan',
        'nama_material', // Tambahkan nama_material ke dalam fillable
        'nama_pemasok',
        'harga_satuan',
        // Tambahkan nama_material ke dalam fillable

    ];

    // Relasi ke tabel Material
    public function MaterialPemasok()
    {
        return $this->belongsTo(MaterialPemasok::class, 'material_id');
    }

    // Relasi ke tabel Pengiriman
    public function pengiriman()
    {
        return $this->hasMany(Pengiriman::class, 'order_id');
    }
    public function materialProyek()
    {
        return $this->hasMany(Pengiriman::class, 'material_id');
    }

    public function pemasok()
    {
        return $this->belongsTo(Pemasok::class, 'pemasok_id');
    }
}
