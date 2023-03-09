<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biodata_pelatihan extends Model
{
    use HasFactory;
    protected $table = 'biodata_pelatihans';

    protected $fillable = [
        'biodata_id',
        'nama_kursus',
        'sertifikat',
        'tahun'
    ];

    /**
     * Get the biodata that owns the Biodata_pelatihan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function biodata()
    {
        return $this->belongsTo(Biodata::class, 'biodata_id', 'id');
    }
}
