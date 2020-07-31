<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSelectTyresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('select_tyres', function (Blueprint $table) {
            $table->id();
            $table->string('vendor');
            $table->string('car');
            $table->string('year');
            $table->string('modification');
            $table->string('pcd')->nullable();
            $table->string('diametr')->nullable();
            $table->string('gaika')->nullable();
            $table->string('zavod_shini')->nullable();
            $table->string('zamen_shini')->nullable();
            $table->string('tuning_shini')->nullable();
            $table->string('zavod_diskov')->nullable();
            $table->string('zamen_diskov')->nullable();
            $table->string('tuning_diski')->nullable();


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
        Schema::dropIfExists('select_tyres');
    }
}
