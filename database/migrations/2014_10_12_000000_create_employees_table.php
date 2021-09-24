<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->string('nip')->primary()->unique();
            $table->string('nama')->nullable();
            $table->string('gelar')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('umur_thn')->nullable();
            $table->string('umur_bln')->nullable();
            $table->date('tmt_kerja')->nullable();
            $table->string('mk_tahun')->nullable();
            $table->string('mk_bulan')->nullable();
            $table->date('tmt_organik')->nullable();
            $table->string('gol_ruang')->nullable();
            $table->date('tmt_pangkat')->nullable();
            $table->string('mk_pkt_th')->nullable();
            $table->string('mk_pkt_bl')->nullable();
            $table->string('jenis_pangkat')->nullable();
            $table->string('mkg_thn')->nullable();
            $table->string('mkg_bln')->nullable();
            $table->string('photo')->nullable();

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
        Schema::dropIfExists('employees');
    }
}
