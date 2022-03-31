<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTripsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('trips', function (Blueprint $table) {
            $table->id();
            $table->integer('num');
            $table->string('from');
            $table->string('middle')->nullable();;
            $table->string('to');
            $table->string('from_time');
            $table->string('to_time');
            $table->string('change_date')->nullable();
            $table->string('duration');
            $table->integer('price');
            $table->integer('tong')->nullable();
            $table->string('from_desc')->nullable();
            $table->string('to_desc')->nullable();
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
        Schema::dropIfExists('trips');
    }
}
