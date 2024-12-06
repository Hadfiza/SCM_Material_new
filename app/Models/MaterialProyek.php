<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaterialProyek extends Model
{
    use HasFactory;

    protected $table = 'material_proyek'; // Nama tabel di database

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
        return $this->belongsTo(Pengiriman::class, 'pengiriman_id');
    }

    // Relasi ke tabel OrderMaterial
    public function orderMaterials()
    {
        return $this->hasMany(OrderMaterial::class, 'id_material');
    }

    public function Proyek()
    {
        return $this->hasMany(Proyek::class, 'proyek_id');
    }

    public function DetailProyek()
    {
        return $this->hasMany(DetailProyek::class, 'detail_proyek_id');
    }
}
