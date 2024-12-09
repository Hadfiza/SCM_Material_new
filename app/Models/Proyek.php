<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyek extends Model
{
    use HasFactory;

    protected $table = 'proyek';

    protected $fillable = [
        'nama_proyek',
        'lokasi',
        'status',
        'material_id'
    ];

    // public function kontrak()
    // {
    //     return $this->belongsTo(Kontrak::class, 'kontrak_id');
    // }

    public function detailProyek()
    {
        return $this->hasMany(DetailProyek::class, 'detail_proyek_id');
    }

    public function MaterialProyek()
    {
        return $this->hasMany(MaterialProyek::class, 'material_id');
    }
}
