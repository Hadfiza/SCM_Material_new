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

    ];

    // public function kontrak()
    // {
    //     return $this->belongsTo(Kontrak::class, 'kontrak_id');
    // }

    public function detailProyek()
    {
        return $this->hasMany(DetailProyek::class, 'proyek_id');
    }
}
