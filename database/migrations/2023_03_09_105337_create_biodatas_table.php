<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biodatas', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('biodata_id')->constrained();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('jabatan');
            $table->string('nama');
            $table->string('no_ktp', 16);
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->string('agama');
            $table->string('golongan_darah', 5);
            $table->enum('status', ['menikah', 'belum_menikah']);
            $table->string('alamat_ktp');
            $table->string('alamat_tinggal');
            $table->string('email');
            $table->string('no_telp');
            $table->string('orang_terdekat');
            $table->string('skill');
            $table->enum('bersedia_pindah', ['Ya', 'Tidak']);
            $table->decimal('penghasilan_diharapkan', 15, 2)->nullable()->default(0.00);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('biodatas');
    }
};
