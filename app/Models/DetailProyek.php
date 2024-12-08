<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailProyek extends Model
{
    use HasFactory;

    protected $table = 'detail_proyek';

    protected $fillable = [
        'proyek_id',
        'material_id',
        'jumlah_digunakan',
        'tanggal_digunakan',
        'keterangan',
        'biaya_penggunaan',
    ];

    public function proyek()
    {
        return $this->belongsTo(Proyek::class, 'proyek_id');
    }

    public function materialProyek()
    {
        return $this->belongsTo(MaterialProyek::class, 'material_id');
    }

    public function laporan()
    {
        return $this->hasMany(Laporan::class, 'detail_proyek_id');
    }
}
