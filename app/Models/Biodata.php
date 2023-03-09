<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biodata extends Model
{
    use HasFactory;

    protected $table = 'biodatas';
    protected $fillable = [
        'user_id',
        'jabatan',
        'nama',
        'no_ktp',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'agama',
        'golongan_darah',
        'status',
        'alamat_ktp',
        'alamat_tinggal',
        'email',
        'no_telp',
        'orang_terdekat',
        'skill',
        'bersedia_pindah',
        'penghasilan_diharapkan'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function pendidikan()
    {
        return $this->hasMany(Biodata_pendidikan::class);
    }
    public function pelatihan()
    {
        return $this->hasMany(Biodata_pelatihan::class);
    }
    public function pekerjaan()
    {
        return $this->hasMany(Biodata_pekerjaan::class);
    }
}
