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
    ];

    // Relasi ke tabel Material
    public function MaterialPemasok()
    {
        return $this->belongsTo(MaterialPemasok::class, 'material_id');
    }

    // Relasi ke tabel Pengiriman
    public function pengiriman()
    {
        return $this->hasMany(Pengiriman::class, 'pengiriman_id');
    }

    public function Pemasok()
    {
        return $this->belongsTo(Pemasok::class, 'pemasok_id');
    }
}
