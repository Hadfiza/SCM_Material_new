<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    protected $table = 'material'; // Nama tabel di database

    protected $fillable = [
        'nama_material',
        'stok',
        'harga_total',
        'jenis_material',
        'pemasok_id'
    ];

    // Relasi ke tabel Pengiriman
    public function pengiriman()
    {
        return $this->hasMany(Pengiriman::class, 'material_id');
    }

    // Relasi ke tabel OrderMaterial
    public function orderMaterials()
    {
        return $this->hasMany(OrderMaterial::class, 'id_material');
    }
}
