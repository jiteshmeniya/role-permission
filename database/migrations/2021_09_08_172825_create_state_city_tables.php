<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStateCityTables extends Migration
{
   public function up()
   {
       Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });


        Schema::create('states', function (Blueprint $table) {
            $table->id();
            $table->integer('state_id');
            $table->string('name');
            $table->timestamps();
        });
   }
   public function down()
   {
       Schema::drop('countries');
       Schema::drop('states');
   }
}
