<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePositionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('positions', function (Blueprint $table) {
            $table->id();
            $table->string('position_id',10)->unique();
            $table->string('name');
            $table->string('grade',10);
            $table->string('holder_id',10);
            $table->string('parent_id',10);
            $table->string('parent_name');
            $table->tinyInteger('hierarchy');
            $table->timestamps();

            $table->foreign('holder_id')->references('nip')->on('employees');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('positions');
    }
}
