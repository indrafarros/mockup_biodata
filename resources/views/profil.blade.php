@extends('layouts.main')

@section('title', 'Profil')

@section('content')

    <h2>Welcome back, {{ Auth::user()->email }}</h2>
    <div class="mt-5">
        <div class="card">
            <div class="card-body">
                <form enctype="multipart/form-data" id="formBiodata">
                    <input type="hidden" class="form-control" name="user_id" id="user_id" value="{{ Auth::user()->id }}">
                    <div class="row mb-3">
                        <label for="jabatan" class="col-sm-2 col-form-label">POSISI YANG DILAMAR</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="jabatan" name="jabatan">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="nama" class="col-sm-2 col-form-label">NAMA</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama" name="nama">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="no_ktp" class="col-sm-2 col-form-label">NO. KTP</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="no_ktp" name="no_ktp">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="tempat_lahir" class="col-sm-2 col-form-label">TEMPAT TANGGAL LAHIR</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir">
                        </div>
                        <div class="col-sm-4">
                            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir">
                        </div>
                    </div>
                    <fieldset class="row mb-3">
                        <legend class="col-form-label col-sm-2 pt-0">JENIS KELAMIN</legend>
                        <div class="col-sm-10">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin1"
                                    value="L">
                                <label class="form-check-label" for="jenis_kelamin1">Laki-laki</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin2"
                                    value="P">
                                <label class="form-check-label" for="jenis_kelamin2">Perempuan</label>
                            </div>
                        </div>
                    </fieldset>
                    <div class="row mb-3">
                        <label for="agama" class="col-sm-2 col-form-label">AGAMA</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" id="agama" name="agama">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="golongan_darah" class="col-sm-2 col-form-label">GOLONGAN DARAH</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" id="golongan_darah" name="golongan_darah">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="status" class="col-sm-2 col-form-label">STATUS</label>
                        <div class="col-sm-10">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="status1"
                                    value="menikah">
                                <label class="form-check-label" for="status1">Menikah</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="status2"
                                    value="belum_menikah">
                                <label class="form-check-label" for="status2">Belum menikah</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="alamat_ktp" class="col-sm-2 col-form-label">ALAMAT KTP</label>
                        <div class="col-sm-2">
                            <textarea name="alamat_ktp" class="form-control" id="alamat_ktp" cols="30" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="alamat_tinggal" class="col-sm-2 col-form-label">ALAMAT TINGGAL</label>
                        <div class="col-sm-6">
                            <textarea name="alamat_tinggal" class="form-control" id="alamat_tinggal" cols="30" rows="5"></textarea>
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
                            <input type="text" class="form-control" name="no_telp" id="no_telp">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="orang_terdekat" class="col-sm-2 col-form-label">ORANG TERDEKAT YG DAPAT DI
                            HUBUNGI</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="orang_terdekat" name="orang_terdekat">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="no_telp" class="col-sm-2 col-form-label">PENDIDIKAN TERAKHIR</label>
                        <div class="col-sm-8">
                            <input type="hidden" id="baris-pendidikan" name="baris_pendidikan" value="0" />
                            <table class="table table-sm" id="tablePendidikan">
                                <thead>
                                    <tr>
                                        <th>Jenjang Pendidikan Akhir</th>
                                        <th>Nama Institusi Akademik</th>
                                        <th>Jurusan</th>
                                        <th>Tahun lulus</th>
                                        <th>IPK</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="pendidikan">

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="no_telp" class="col-sm-2 col-form-label">RIWAYAT PELATIHAN</label>
                        <div class="col-sm-6">
                            <input type="hidden" name="baris_pelatihan" id="baris-pelatihan">
                            <table class="table table-sm" id="tablePelatihan">
                                <thead>
                                    <tr>
                                        <th>Nama Kursus/Seminar</th>
                                        <th>Sertifikat (ada/tidak)</th>
                                        <th>Tahun</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="pelatihan">

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="no_telp" class="col-sm-2 col-form-label">RIWAYAT PEKERJAAN</label>
                        <div class="col-sm-8">
                            <input type="hidden" name="baris_pekerjaan" id="baris-pekerjaan">
                            <table class="table table-sm" id="tablePekerjaan">
                                <thead>
                                    <tr>
                                        <th>Nama Perusahaan</th>
                                        <th>Posisi Terakhir</th>
                                        <th>Pendapatan Terakhir</th>
                                        <th>Tahun</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="pekerjaan">

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="skill" class="col-sm-2 col-form-label">SKILL</label>
                        <div class="col-sm-4">
                            <textarea name="skill" id="skill" cols="30" class="form-control" rows="5"></textarea>
                            <span class="text-danger fw-bold"><small><em>* Tuliskan keahlian & keterampilan anda saat
                                        ini</em></small></span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="pindah" class="col-sm-2 col-form-label">BERSEDIA PINDAH</label>
                        <div class="col-sm-10">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="bersedia_pindah" id="pindah1"
                                    value="Ya">
                                <label class="form-check-label" for="pindah1">YA</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="bersedia_pindah" id="pindah2"
                                    value="Tidak">
                                <label class="form-check-label" for="pindah2">TIDAK</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="penghasilan_diharapkan" class="col-sm-2 col-form-label">PENGHASILAN YANG
                            DIHARAPKAN</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="penghasilan_diharapkan"
                                name="penghasilan_diharapkan">
                        </div>
                        <div class="col-sm-2">
                            <span class="fw-bold">/ Bulan</span>
                        </div>
                    </div>
                    <button type="button" id="submitBiodata" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function initialize() {
            // $('#pendidikan').append(
            //     add_row_table_pendidikan(0, 0)
            // );

            // $('#pelatihan').append(
            //     add_row_table_pelatihan(0, 0)
            // );

            // $('#pekerjaan').append(
            //     add_row_table_pekerjaan(0, 0)
            // );
        }

        function add_row_table_pendidikan(i, action) {
            let tabel = '<tr class="pendidikan-row" id="pendidikan-' + i + '">';
            tabel += '<td><input type="text" class="form-control form-control-sm pendidikan" id="pendidikan-' + i +
                '-jenjang_pendidikan_akhir" name="pendidikan[' + i + '][jenjang_pendidikan_akhir]"></td>';
            tabel += '<td><input type="text" class="form-control form-control-sm pendidikan" id="pendidikan-' + i +
                '-nama_institusi" name="pendidikan[' + i + '][nama_institusi]"></td>';
            tabel += '<td><input type="text" class="form-control form-control-sm pendidikan" id="pendidikan-' + i +
                '-jurusan" name="pendidikan[' + i + '][jurusan]"></td>';
            tabel += '<td><input type="text" class="form-control form-control-sm pendidikan" id="pendidikan-' + i +
                '-tahun" name="pendidikan[' + i + '][tahun]"></td>';
            tabel += '<td><input type="text" class="form-control form-control-sm pendidikan" id="pendidikan-' + i +
                '-ipk" name="pendidikan[' + i + '][ipk]"></td>';
            if (action === 1) {
                tabel += '<td class="action" id="action-baris-pendidikan-' + i +
                    '"><a href="#void()" class="btn btn-danger btn-sm hapus-baris-pendidikan" id="hapus-baris-pendidikan-' +
                    i + '"><i class="fa-solid fa-trash"></i></a></td>';
            } else tabel += '<td class="action" id="action-baris-pendidikan-' + i +
                '"><a href="#void()" class="btn btn-primary btn-sm tambah-baris-pendidikan" id="tambah-baris-pendidikan-' +
                i + '"><i class="fa-solid fa-plus"></i></a></td>';
            tabel += '</tr>';

            $('#baris-pendidikan').val(i + 1);
            return tabel;
        }

        function add_row_table_pelatihan(i, action) {
            let tabel = '<tr class="pelatihan-row" id="pelatihan-' + i + '">';
            tabel += '<td><input type="text" class="form-control form-control-sm pelatihan" id="pelatihan-' + i +
                '-nama_kursus" name="pelatihan[' + i + '][nama_kursus]"></td>';
            tabel +=
                '<td><select class="form-select form-select-sm pelatihan" id="pelatihan-' +
                i +
                '-sertifikat" name="pelatihan[' + i +
                '][sertifikat]"><option value="ya">Ya</option><option value="tidak">Tidak</option></select></td>';
            tabel += '<td><input type="text" class="form-control form-control-sm pelatihan" id="pelatihan-' + i +
                '-tahun" name="pelatihan[' + i + '][tahun]"></td>';
            if (action === 1) {
                tabel += '<td class="action" id="action-baris-pelatihan-' + i +
                    '"><a href="#void()" class="btn btn-danger btn-sm hapus-baris-pelatihan" id="hapus-baris-pelatihan-' +
                    i + '"><i class="fa-solid fa-trash"></i></a></td>';
            } else tabel += '<td class="action" id="action-baris-pelatihan-' + i +
                '"><a href="#void()" class="btn btn-primary btn-sm tambah-baris-pelatihan" id="tambah-baris-pelatihan-' +
                i + '"><i class="fa-solid fa-plus"></i></a></td>';
            tabel += '</tr>';

            $('#baris-pelatihan').val(i + 1);
            return tabel;
        }

        function add_row_table_pekerjaan(i, action) {
            let tabel = '<tr class="pekerjaan-row" id="pekerjaan-' + i + '">';
            tabel += '<td><input type="text" class="form-control form-control-sm pekerjaan" id="pekerjaan-' + i +
                '-nama_perusahaan" name="pekerjaan[' + i + '][nama_perusahaan]"></td>';
            tabel += '<td><input type="text" class="form-control form-control-sm pekerjaan" id="pekerjaan-' + i +
                '-posisi_akhir" name="pekerjaan[' + i + '][posisi_akhir]"></td>';
            tabel += '<td><input type="text" class="form-control form-control-sm pekerjaan" id="pekerjaan-' + i +
                '-pendapatan_akhir" name="pekerjaan[' + i + '][pendapatan_akhir]"></td>';

            tabel += '<td><input type="text" class="form-control form-control-sm pekerjaan" id="pekerjaan-' + i +
                '-tahun" name="pekerjaan[' + i + '][tahun]"></td>';
            if (action === 1) {
                tabel += '<td class="action" id="action-baris-pekerjaan-' + i +
                    '"><a href="#void()" class="btn btn-danger btn-sm hapus-baris-pekerjaan" id="hapus-baris-pekerjaan-' +
                    i + '"><i class="fa-solid fa-trash"></i></a></td>';
            } else tabel += '<td class="action" id="action-baris-pekerjaan-' + i +
                '"><a href="#void()" class="btn btn-primary btn-sm tambah-baris-pekerjaan" id="tambah-baris-pekerjaan-' +
                i + '"><i class="fa-solid fa-plus"></i></a></td>';
            tabel += '</tr>';

            $('#baris-pekerjaan').val(i + 1);
            return tabel;
        }

        function getProfileData() {
            $.ajax({
                url: "{{ route('user.get.profile') }}",
                type: "GET",
                success: function(result) {
                    if (result.data) {
                        $('#jabatan').val(result.data.jabatan)
                        $('#nama').val(result.data.nama)
                        $('#no_ktp').val(result.data.no_ktp)
                        $('#tempat_lahir').val(result.data.tempat_lahir)
                        $('#tanggal_lahir').val(result.data.tanggal_lahir)
                        $("input[name=jenis_kelamin][value='" + result.data.jenis_kelamin + "']").prop(
                            'checked', true);
                        $('#jenis_kelamin').val(result.data.jenis_kelamin)
                        $('#agama').val(result.data.agama)
                        $('#golongan_darah').val(result.data.golongan_darah)
                        $("input[name=status][value='" + result.data.status + "']").prop(
                            'checked', true);
                        $('#alamat_ktp').val(result.data.alamat_ktp)
                        $('#alamat_tinggal').val(result.data.alamat_tinggal)
                        $('#no_telp').val(result.data.no_telp)
                        $('#orang_terdekat').val(result.data.orang_terdekat)
                        if (Array.isArray(result.data.pendidikan) && result.data.pendidikan.length) {
                            $('.pendidikan-row').remove();
                            $.each(result.data.pendidikan, function(i, item) {
                                $('#tablePendidikan').append(add_row_table_pendidikan(i, 1));
                                $('#pendidikan-' + i + '-jenjang_pendidikan_akhir').val(item
                                    .jenjang_pendidikan_akhir);
                                $('#pendidikan-' + i + '-nama_institusi').val(item.nama_institusi);
                                $('#pendidikan-' + i + '-jurusan').val(item.jurusan);
                                $('#pendidikan-' + i + '-tahun').val(item.tahun_lulus);
                                $('#pendidikan-' + i + '-ipk').val(item.ipk);
                                $('#baris-pendidikan').val(i + 1);
                                var isLastElement = i == result.data.pendidikan.length - 1;
                                if (isLastElement) {
                                    $('#tablePendidikan').append(add_row_table_pendidikan(i + 1,
                                        0));
                                }
                            });
                        } else {
                            $('#pendidikan').append(
                                add_row_table_pendidikan(0, 0)
                            );
                        }
                        if (Array.isArray(result.data.pelatihan) && result.data.pelatihan.length) {
                            $('.pelatihan-row').remove();
                            $.each(result.data.pelatihan, function(i, item) {
                                $('#tablePelatihan').append(add_row_table_pelatihan(i, 1));
                                $('#pelatihan-' + i + '-nama_kursus').val(item
                                    .nama_kursus);
                                $('#pelatihan-' + i + '-sertifikat').val(item.sertifikat);
                                $('#pelatihan-' + i + '-tahun').val(item.tahun);
                                $('#baris-pelatihan').val(i + 1);

                                var isLastElement = i == result.data.pelatihan.length - 1;
                                if (isLastElement) {
                                    $('#tablePelatihan').append(add_row_table_pelatihan(i + 1,
                                        0));
                                }
                            });
                        } else {
                            $('#pelatihan').append(
                                add_row_table_pelatihan(0, 0)
                            );
                        }
                        console.log(result.data.pekerjaan)
                        if (Array.isArray(result.data.pekerjaan) && result.data.pekerjaan.length) {
                            $('.pekerjaan-row').remove();
                            $.each(result.data.pekerjaan, function(i, item) {
                                $('#tablePekerjaan').append(add_row_table_pekerjaan(i, 1));
                                $('#pekerjaan-' + i + '-nama_perusahaan').val(item
                                    .nama_perusahaan);
                                $('#pekerjaan-' + i + '-posisi_akhir').val(item.posisi_akhir);
                                $('#pekerjaan-' + i + '-pendapatan_akhir').val(item.pendapatan_akhir);
                                $('#pekerjaan-' + i + '-tahun').val(item.tahun);
                                $('#baris-pekerjaan').val(i + 1);
                                var isLastElement = i == result.data.pekerjaan.length - 1;
                                if (isLastElement) {
                                    $('#tablePekerjaan').append(add_row_table_pekerjaan(i + 1,
                                        0));
                                }
                            });
                        } else {
                            $('#pekerjaan').append(
                                add_row_table_pekerjaan(0, 0)
                            );
                        }

                        $('#skill').val(result.data.skill)
                        $("input[name=bersedia_pindah][value='" + result.data.bersedia_pindah + "']").prop(
                            'checked', true);
                        $('#penghasilan_diharapkan').val(result.data.penghasilan_diharapkan)
                    } else {
                        $('#pendidikan').append(
                            add_row_table_pendidikan(0, 0)
                        );

                        $('#pelatihan').append(
                            add_row_table_pelatihan(0, 0)
                        );

                        $('#pekerjaan').append(
                            add_row_table_pekerjaan(0, 0)
                        );
                    }
                }
            })
        }

        $(document).ready(function() {
            getProfileData();

            $('body').on('click', '#submitBiodata', function() {
                $.ajax({
                    url: "{{ route('user.update') }}",
                    type: "POST",
                    data: $('#formBiodata').serialize(),
                    success: function(result) {
                        if (result.status == true) {
                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: 'Your data has been saved',
                                showConfirmButton: false,
                                timer: 1500
                            })
                        }
                    },
                    error: function(reject) {
                        var response = $.parseJSON(reject.responseText);
                        $.each(response.errors, function(key, val) {
                            console.log(val[0]);
                        })
                    }
                })
            })

            $(document).on('click', '.tambah-baris-pendidikan', function() {
                var str = $(this).attr('id');
                var num = str.replace("tambah-baris-pendidikan-", "");
                var maks = 0;
                var t = $('#tablePendidikan tr').length;


                $("#action" + str.replace("tambah", "")).html(
                    '<a href="#void()" class="btn btn-danger btn-sm hapus-baris hapus-baris-pendidikan" id="hapus-baris-pendidikan-' +
                    num + '"><i class="fas fa-trash"></i></a>'
                );
                // Insert row
                $('#tablePendidikan').append(
                    add_row_table_pendidikan(Number(str.replace('tambah-baris-pendidikan-',
                        '')) + 1, 0)
                );

            });

            $(document).on('click', '.hapus-baris-pendidikan', function() {
                Swal.fire({
                    title: 'Anda yakin untuk menghapus baris ini?',
                    // text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        var str = $(this).attr('id');
                        var num = str.split('-')[3];
                        $("#" + str.replace("hapus-baris-", "")).remove();
                    }
                })
            })

            $(document).on('click', '.tambah-baris-pelatihan', function() {
                var str = $(this).attr('id');
                var num = str.replace("tambah-baris-pelatihan-", "");
                var maks = 0;
                var t = $('#tablePelatihan tr').length;


                $("#action" + str.replace("tambah", "")).html(
                    '<a href="#void()" class="btn btn-danger btn-sm hapus-baris hapus-baris-pelatihan" id="hapus-baris-pelatihan-' +
                    num + '"><i class="fas fa-trash"></i></a>'
                );
                // Insert row
                $('#tablePelatihan').append(
                    add_row_table_pelatihan(Number(str.replace('tambah-baris-pelatihan-',
                        '')) + 1, 0)
                );

            });

            $(document).on('click', '.hapus-baris-pelatihan', function() {
                Swal.fire({
                    title: 'Anda yakin untuk menghapus baris ini?',
                    // text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        var str = $(this).attr('id');
                        var num = str.split('-')[3];
                        $("#" + str.replace("hapus-baris-", "")).remove();
                    }
                })
            })

            $(document).on('click', '.tambah-baris-pekerjaan', function() {
                var str = $(this).attr('id');
                var num = str.replace("tambah-baris-pekerjaan-", "");
                var maks = 0;
                var t = $('#tablePekerjaan tr').length;


                $("#action" + str.replace("tambah", "")).html(
                    '<a href="#void()" class="btn btn-danger btn-sm hapus-baris hapus-baris-pekerjaan" id="hapus-baris-pekerjaan-' +
                    num + '"><i class="fas fa-trash"></i></a>'
                );
                // Insert row
                $('#tablePekerjaan').append(
                    add_row_table_pekerjaan(Number(str.replace('tambah-baris-pekerjaan-',
                        '')) + 1, 0)
                );

            });

            $(document).on('click', '.hapus-baris-pekerjaan', function() {
                Swal.fire({
                    title: 'Anda yakin untuk menghapus baris ini?',
                    // text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        var str = $(this).attr('id');
                        var num = str.split('-')[3];
                        $("#" + str.replace("hapus-baris-", "")).remove();
                    }
                })
            })


        });
    </script>
@endsection
