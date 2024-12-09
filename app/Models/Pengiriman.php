<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengiriman extends Model
{
    use HasFactory;

    protected $table = 'pengiriman'; // Nama tabel di database

    protected $fillable = [
        'order_id',
        'tanggal_kirim',
        'tanggal_selesai',
        'status_pengiriman',
    ];

    // Relasi ke tabel OrderMaterial
    public function orderMaterial()
    {
        return $this->belongsTo(OrderMaterial::class, 'order_id'); // sesuaikan nama foreign key
    }
    public function materialPemasok()
    {
        return $this->belongsTo(MaterialPemasok::class, 'material_id');
    }

    // Relasi dengan MaterialProyek
    public function materialProyek()
    {
        return $this->hasMany(MaterialProyek::class, 'pengiriman_id');
    }
}
