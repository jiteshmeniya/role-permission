<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organizations', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nip')->unique();
            $table->string('persa_id')->nullable();
            $table->string('personnel_area')->nullable();
            $table->string('persubarea_id')->nullable();
            $table->string('personnel_subarea')->nullable();
            $table->string('id_posisi')->nullable();
            $table->string('posisi')->nullable();
            $table->string('org_id')->nullable();
            $table->string('abbr_org')->nullable();
            $table->string('org_text')->nullable();
            $table->string('korsa_id')->nullable();
            $table->string('abbr_korsa')->nullable();
            $table->string('korsa_text')->nullable();
            $table->string('py_group')->nullable();
            $table->string('py_level')->nullable();
            $table->string('id_job')->nullable();
            $table->string('job')->nullable();
            $table->string('id_job_group')->nullable();
            $table->string('job_group')->nullable();
            $table->string('payroll_area')->nullable();
            $table->string('payroll_area_desc')->nullable();


            $table->foreign('nip')->references('nip')->on('employees');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('organizations');
    }
}
