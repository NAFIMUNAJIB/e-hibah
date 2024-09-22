<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProposalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proposals', function (Blueprint $table) {
            $table->id();
            $table->string('nama_organisasi');
            $table->string('no_telp_organisasi');
            $table->string('email_organisasi');
            $table->string('alamat_organisasi');
            $table->string('peruntukan');
            $table->string('lampiran');
            $table->bigInteger('nilai');
            $table->string('tahapan');
            $table->date('tanggal_pengajuan');
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
        Schema::dropIfExists('proposals');
    }
}
