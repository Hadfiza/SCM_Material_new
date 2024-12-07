<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemasok extends Model
{
    use HasFactory;

    protected $table = 'pemasok';

    protected $fillable = [
        'nama_pemasok',
        'alamat',
        'kontak',
        'kontrak_id',
        'rating_pemasok',
    ];

    // Relasi ke Kontrak
    public function kontrak()
    {
        return $this->belongsTo(Kontrak::class, 'kontrak_id','id');
    }

    public function materialPemasok()
    {
        return $this->hasMany(MaterialPemasok::class, 'material_id');
    }

    public function orderMaterial()
    {
        return $this->hasMany(OrderMaterial::class, 'order_id');
    }

    // Model Pemasok
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
