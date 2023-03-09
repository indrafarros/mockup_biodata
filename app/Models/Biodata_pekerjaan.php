<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biodata_pekerjaan extends Model
{
    use HasFactory;
    protected $table = 'biodata_pekerjaans';
    protected $fillable = [
        'biodata_id',
        'nama_perusahaan',
        'posisi_akhir',
        'pendapatan_akhir',
        'tahun'
    ];

    /**
     * Get the biodata that owns the Biodata_pekerjaan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function biodata()
    {
        return $this->belongsTo(Biodata::class, 'biodata_id', 'id');
    }
}
