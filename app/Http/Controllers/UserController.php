<?php

namespace App\Http\Controllers;

use App\Models\Biodata;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Models\Biodata_pekerjaan;
use App\Models\Biodata_pelatihan;
use App\Models\Biodata_pendidikan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function profil()
    {
        return view('profil');
    }

    public function getDataProfile()
    {
        $biodata = Biodata::with('pendidikan')->with('pelatihan')->with('pekerjaan')->where('user_id', Auth::user()->id)->first();
        return response()->json(['data' => $biodata]);
    }

    public function store(UserRequest $request)
    {
        // $biodata = Biodata::create([
        //     'user_id' => Auth::user()->id,
        //     'jabatan' => $request->jabatan,
        //     'nama' => $request->nama,
        //     'no_ktp' => $request->no_ktp,
        //     'tempat_lahir' => $request->tempat_lahir,
        //     'tanggal_lahir' => date('Y-m-d', strtotime($request->tanggal_lahir)),
        //     'jenis_kelamin' => $request->jenis_kelamin,
        //     'agama' => $request->agama,
        //     'golongan_darah' => $request->golongan_darah,
        //     'status' => $request->status,
        //     'alamat_ktp' => $request->alamat_ktp,
        //     'alamat_tinggal' => $request->alamat_tinggal,
        //     'email' => $request->email,
        //     'no_telp' => $request->no_telp,
        //     'orang_terdekat' => $request->orang_terdekat,
        //     'skill' => $request->skill,
        //     'bersedia_pindah' => $request->bersedia_pindah,
        //     'penghasilan_diharapkan' => $request->penghasilan_diharapkan
        // ]);
        $biodata = Biodata::updateOrCreate(['user_id' => Auth::user()->id], [
            'user_id' => Auth::user()->id,
            'jabatan' => $request->jabatan,
            'nama' => $request->nama,
            'no_ktp' => $request->no_ktp,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => date('Y-m-d', strtotime($request->tanggal_lahir)),
            'jenis_kelamin' => $request->jenis_kelamin,
            'agama' => $request->agama,
            'golongan_darah' => $request->golongan_darah,
            'status' => $request->status,
            'alamat_ktp' => $request->alamat_ktp,
            'alamat_tinggal' => $request->alamat_tinggal,
            'email' => $request->email,
            'no_telp' => $request->no_telp,
            'orang_terdekat' => $request->orang_terdekat,
            'skill' => $request->skill,
            'bersedia_pindah' => $request->bersedia_pindah,
            'penghasilan_diharapkan' => $request->penghasilan_diharapkan
        ]);

        if ($biodata) {

            if (count($request->pendidikan) > 0) {
                $pendidikan = Biodata_pendidikan::where('biodata_id', $biodata->id)->delete();
                for ($i = 0; $i < count($request->pendidikan); $i++) {
                    if (
                        isset($request->pendidikan[$i]['jenjang_pendidikan_akhir']) and
                        isset($request->pendidikan[$i]['nama_institusi']) and
                        isset($request->pendidikan[$i]['jurusan']) and
                        isset($request->pendidikan[$i]['tahun']) and
                        isset($request->pendidikan[$i]['ipk'])
                    ) {
                        Biodata_pendidikan::create([
                            'biodata_id' => $biodata->id,
                            'jenjang_pendidikan_akhir' => $request->pendidikan[$i]['jenjang_pendidikan_akhir'],
                            'nama_institusi' => $request->pendidikan[$i]['nama_institusi'],
                            'jurusan' => $request->pendidikan[$i]['jurusan'],
                            'tahun_lulus' => $request->pendidikan[$i]['tahun'],
                            'ipk' => $request->pendidikan[$i]['ipk'],
                        ]);
                    }
                }
            }

            if (count($request->pelatihan) > 0) {
                $pelatihan = Biodata_pelatihan::where('biodata_id', $biodata->id)->delete();
                for ($i = 0; $i < count($request->pelatihan); $i++) {
                    if (
                        isset($request->pelatihan[$i]['nama_kursus']) and
                        isset($request->pelatihan[$i]['sertifikat']) and
                        isset($request->pelatihan[$i]['tahun'])
                    ) {
                        Biodata_pelatihan::create([
                            'biodata_id' => $biodata->id,
                            'nama_kursus' => $request->pelatihan[$i]['nama_kursus'],
                            'sertifikat' => $request->pelatihan[$i]['sertifikat'],
                            'tahun' => $request->pelatihan[$i]['tahun'],
                        ]);
                    }
                }
            }

            if (count($request->pekerjaan) > 0) {
                $pekerjaan = Biodata_pekerjaan::where('biodata_id', $biodata->id)->delete();
                for ($i = 0; $i < count($request->pekerjaan); $i++) {
                    if (
                        isset($request->pekerjaan[$i]['nama_perusahaan'])
                    ) {
                        Biodata_pekerjaan::create([
                            'biodata_id' => $biodata->id,
                            'nama_perusahaan' => $request->pekerjaan[$i]['nama_perusahaan'],
                            'pendapatan_akhir' => $request->pekerjaan[$i]['pendapatan_akhir'],
                            'posisi_akhir' => $request->pekerjaan[$i]['posisi_akhir'],
                            'tahun' => $request->pekerjaan[$i]['tahun'],
                        ]);
                    }
                }
            }
        }

        return response()->json(["status" => true, "message" => "Data berhasil disimpan", "data" => $biodata->id]);
    }
}
