<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biodata_pendidikan extends Model
{
    use HasFactory;
    protected $table = 'biodata_pendidikans';

    protected $fillable = [
        'biodata_id',
        'jenjang_pendidikan_akhir',
        'nama_institusi',
        'jurusan',
        'tahun_lulus',
        'ipk'
    ];

    /**
     * Get the biodata that owns the Biodata_pendidikan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function biodata()
    {
        return $this->belongsTo(Biodata::class, 'biodata_id', 'id');
    }
}
