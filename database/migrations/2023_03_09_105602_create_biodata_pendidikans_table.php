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
        Schema::create('biodata_pendidikans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('biodata_id')->constrained();
            // $table->unsignedBigInteger('biodata_id');
            // $table->foreign('biodata_id')->references('id')->on('biodatas');
            $table->string('jenjang_pendidikan_akhir');
            $table->string('nama_institusi');
            $table->string('jurusan');
            $table->string('tahun_lulus');
            $table->decimal('ipk', 5, 2)->default(0.00);
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
        Schema::dropIfExists('biodata_pendidikans');
    }
};
