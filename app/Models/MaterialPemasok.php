<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaterialPemasok extends Model
{
    use HasFactory;

    protected $table = 'material_pemasok'; // Nama tabel di database

    protected $fillable = [
        'nama_material',
        'stok',
        'harga_satuan',
        'jenis_material',
        'pemasok_id'
    ];

    // Relasi ke tabel Pengiriman
    public function pengiriman()
    {
        return $this->hasMany(Pengiriman::class, 'pengiriman_id');
    }

    // Relasi ke tabel OrderMaterial
    public function orderMaterials()
    {
        return $this->hasMany(OrderMaterial::class, 'material_id','id');
    }

    public function pemasok()
    {
        return $this->belongsTo(Pemasok::class, 'pemasok_id');
    }
}
