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
        Schema::create('program1_responses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('participant_id')->constrained();
            $table->foreignId('infaq_id')->nullable()->constrained();
            $table->foreignId('batch_id')->constrained();
            $table->boolean('a1'); // Bisa membaca Al Quran dengan benar dan lancar (Makhorijul Huruf, Panjang Pendek, Tajwid)?
            $table->boolean('a2')->nullable(); // Bila belum benar dan lancar, apakah bersedia belajar tahsin dasar terlebih dahulu?

            $table->boolean('b1'); // Sudah pernah sebelumnya menghafal Juz 30 dengan mutqin ?
            $table->string('b2'); // Jika sudah pernah menghafal juz 30 dengan mutqin, maukah mengivestasikan ilmu dan waktunya untuk mengajarkan kepada orang yang belum pernah menghafal juz 30 melalui program AMMA? (boleh pilih lebih dari satu) - INSYAALLAH SIAP, INGIN MEMANTAPKAN LAGI HAFALAN JUZ 30, INGIN MENAMBAH HAFALAN

            $table->enum('c1', ['Online', 'Offline']); // Berkomitmen mengikuti kelas AMMA secara :
            $table->string('c2')->nullable(); // JIKA MEMILIH OFFLINE, PILIH AREA LOKASI YANG DIINGKANKAN
            $table->string('c3'); // Berkomitmen mengikuti kelas AMMA ONLINE intensif senin-kamis. Waktu yang akan diikuti:

            $table->string('resources'); // Mengetahui program ini dari mana ?
            $table->string('motivation_target'); // Apa motivasi dan target anda mengikuti program ini ?

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('program1_responses');
    }
};
