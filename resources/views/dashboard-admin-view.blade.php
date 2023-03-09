@extends('layouts.main')

@section('title', 'Dashboard')


@section('content')
    <h1>Welcome {{ Auth::user()->email }}</h1>
    <div class="mt-5">
        <div class="card">
            <div class="card-body">
                <form enctype="multipart/form-data" id="formBiodata">
                    <input type="hidden" class="form-control" name="user_id" id="user_id" value="{{ Auth::user()->id }}">
                    <div class="row mb-3">
                        <label for="jabatan" class="col-sm-2 col-form-label">POSISI YANG DILAMAR</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" readonly id="jabatan" name="jabatan"
                                value="{{ $biodata->jabatan }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="nama" class="col-sm-2 col-form-label">NAMA</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama" name="nama"
                                value="{{ $biodata->nama }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="no_ktp" class="col-sm-2 col-form-label">NO. KTP</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="no_ktp" name="no_ktp"
                                value="{{ $biodata->no_ktp }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="tempat_lahir" class="col-sm-2 col-form-label">TEMPAT TANGGAL LAHIR</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir"
                                value="{{ $biodata->tempat_lahir }}">
                        </div>
                        <div class="col-sm-4">
                            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir"
                                value="{{ $biodata->tanggal_lahir }}">
                        </div>
                    </div>
                    <fieldset class="row mb-3">
                        <legend class="col-form-label col-sm-2 pt-0">JENIS KELAMIN</legend>
                        <div class="col-sm-10">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio"
                                    @if ($biodata->jenis_kelamin == 'L') checked @endif name="jenis_kelamin"
                                    id="jenis_kelamin1" value="L">
                                <label class="form-check-label" for="jenis_kelamin1">Laki-laki</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio"
                                    @if ($biodata->jenis_kelamin == 'P') checked @endif name="jenis_kelamin"
                                    id="jenis_kelamin2" value="P">
                                <label class="form-check-label" for="jenis_kelamin2">Perempuan</label>
                            </div>
                        </div>
                    </fieldset>
                    <div class="row mb-3">
                        <label for="agama" class="col-sm-2 col-form-label">AGAMA</label>
                        <div class="col-sm-2">
                            <input type="text" value="{{ $biodata->agama }}"class="form-control" id="agama"
                                name="agama">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="golongan_darah" class="col-sm-2 col-form-label">GOLONGAN DARAH</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" readonly id="golongan_darah" name="golongan_darah"
                                value="{{ $biodata->golongan_darah }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="status" class="col-sm-2 col-form-label">STATUS</label>
                        <div class="col-sm-10">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" @if ($biodata->status == 'menikah') checked @endif
                                    type="radio" name="status" id="status1" value="menikah">
                                <label class="form-check-label" for="status1">Menikah</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" @if ($biodata->status == 'belum_menikah') checked @endif
                                    type="radio" name="status" id="status2" value="belum_menikah">
                                <label class="form-check-label" for="status2">Belum menikah</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="alamat_ktp" class="col-sm-2 col-form-label">ALAMAT KTP</label>
                        <div class="col-sm-2">
                            <textarea name="alamat_ktp" class="form-control" id="alamat_ktp" cols="30" rows="5" readonly
                                value="{{ $biodata->alamat_ktp }}">{{ $biodata->alamat_ktp }}</textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="alamat_tinggal" class="col-sm-2 col-form-label">ALAMAT TINGGAL</label>
                        <div class="col-sm-6">
                            <textarea name="alamat_tinggal" class="form-control" id="alamat_tinggal" cols="30" rows="5" readonly
                                value="{{ $biodata->alamat_tinggal }}">{{ $biodata->alamat_tinggal }}</textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="email" class="col-sm-2 col-form-label">EMAIL</label>
                        <div class="col-sm-4">
                            <input type="email" value="{{ Auth::user()->email }}" class="form-control" id="email"
                                name="email" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="no_telp" class="col-sm-2 col-form-label">NO. TELPON</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="no_telp" id="no_telp" readonly
                                value="{{ $biodata->no_telp }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="orang_terdekat" class="col-sm-2 col-form-label">ORANG TERDEKAT YG DAPAT DI
                            HUBUNGI</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" readonly value="{{ $biodata->orang_terdekat }}"
                                id="orang_terdekat" name="orang_terdekat">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="no_telp" class="col-sm-2 col-form-label">PENDIDIKAN TERAKHIR</label>
                        <div class="col-sm-8">
                            <table class="table table-sm" id="tablePendidikan">
                                <thead>
                                    <tr>
                                        <th>Jenjang Pendidikan Akhir</th>
                                        <th>Nama Institusi Akademik</th>
                                        <th>Jurusan</th>
                                        <th>Tahun lulus</th>
                                        <th>IPK</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($biodata->pendidikan as $item)
                                        <tr>
                                            <td>{{ $item->jenjang_pendidikan_akhir }}</td>
                                            <td>{{ $item->nama_institusi }}</td>
                                            <td>{{ $item->jurusan }}</td>
                                            <td>{{ $item->tahun_lulus }}</td>
                                            <td>{{ $item->ipk }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="no_telp" class="col-sm-2 col-form-label">RIWAYAT PELATIHAN</label>
                        <div class="col-sm-6">
                            <table class="table table-sm" id="tablePelatihan">
                                <thead>
                                    <tr>
                                        <th>Nama Kursus/Seminar</th>
                                        <th>Sertifikat (ada/tidak)</th>
                                        <th>Tahun</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($biodata->pelatihan as $item)
                                        <tr>
                                            <td>{{ $item->nama_kursus }}</td>
                                            <td>{{ $item->sertifikat }}</td>
                                            <td>{{ $item->tahun }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="no_telp" class="col-sm-2 col-form-label">RIWAYAT PEKERJAAN</label>
                        <div class="col-sm-8">
                            <table class="table table-sm" id="tablePekerjaan">
                                <thead>
                                    <tr>
                                        <th>Nama Perusahaan</th>
                                        <th>Posisi Terakhir</th>
                                        <th>Pendapatan Terakhir</th>
                                        <th>Tahun</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($biodata->pekerjaan as $item)
                                        <tr>
                                            <td>{{ $item->nama_perusahaan }}</td>
                                            <td>{{ $item->posisi_akhir }}</td>
                                            <td>{{ $item->pendapatan_akhir }}</td>
                                            <td>{{ $item->tahun }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="skill" class="col-sm-2 col-form-label">SKILL</label>
                        <div class="col-sm-4">
                            <textarea name="skill" id="skill" cols="30" class="form-control" rows="5" readonly>{{ $biodata->skill }}</textarea>
                            <span class="text-danger fw-bold"><small><em>* Tuliskan keahlian & keterampilan anda saat
                                        ini</em></small></span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="pindah" class="col-sm-2 col-form-label">BERSEDIA PINDAH</label>
                        <div class="col-sm-10">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio"
                                    @if ($biodata->bersedia_pindah == 'Ya') checked @endif name="bersedia_pindah" id="pindah1"
                                    value="Ya">
                                <label class="form-check-label" for="pindah1">YA</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" @if ($biodata->jenis_kelamin == 'Tidak') checked @endif
                                    type="radio" name="bersedia_pindah" id="pindah2" value="Tidak">
                                <label class="form-check-label" for="pindah2">TIDAK</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="penghasilan_diharapkan" class="col-sm-2 col-form-label">PENGHASILAN YANG
                            DIHARAPKAN</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="penghasilan_diharapkan"
                                name="penghasilan_diharapkan" readonly value={{ $biodata->penghasilan_diharapkan }}>
                        </div>
                        <div class="col-sm-2">
                            <span class="fw-bold">/ Bulan</span>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
