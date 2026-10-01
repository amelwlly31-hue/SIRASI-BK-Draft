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
        Schema::create('penjadwalan', function (Blueprint $table) {
            $table->id('id_penjadwalan');

            $table->Integer('id_siswa');

            $table->date('tanggal');
            $table->time('waktu_mulai');
            $table->time('waktu_selesai');

            $table->string('jenis_bimbingan');
            $table->text('catatan')->nullable();

            $table->enum('status', ['Terjadwal', 'Selesai', 'Dibatalkan'])
                ->default('Terjadwal');

            $table->timestamps();

            $table->foreign('id_siswa')
                ->references('id_siswa')
                ->on('siswa')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penjadwalan');
    }
};
