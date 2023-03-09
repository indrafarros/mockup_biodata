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
        Schema::create('biodata_pekerjaans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('biodata_id')->constrained();
            // $table->unsignedBigInteger('biodata_id');
            // $table->foreign('biodata_id')->references('id')->on('biodatas');
            $table->string('nama_perusahaan');
            $table->string('posisi_akhir');
            $table->decimal('pendapatan_akhir', 15, 2)->default(0.00);
            $table->string('tahun');
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
        Schema::dropIfExists('biodata_pekerjaans');
    }
};
