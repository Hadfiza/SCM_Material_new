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
        'order_id',
        'pengiriman_id',
        'material_id',

    ];

    // Relasi ke tabel Pengiriman
    public function pengiriman()
    {
        return $this->belongsTo(Pengiriman::class, 'pengiriman_id');
    }

    // Relasi ke tabel OrderMaterial
    public function orderMaterials()
    {
        return $this->belongsTo(OrderMaterial::class, 'order_id');
    }
    public function materialPemasok()
    {
        return $this->belongsTo(MaterialPemasok::class, 'material_id');
    }


    public function Proyek()
    {
        return $this->belongsTo(Proyek::class, 'proyek_id');
    }

    public function DetailProyek()
    {
        return $this->hasMany(DetailProyek::class, 'detail_proyek_id');
    }
}
