<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('trip_id')->constrained();
            $table->string('order_id');
            $table->string('pay_id');
            $table->string('date');
            $table->integer('place');
            $table->string('fio');
            $table->string('doc');
            $table->string('phone');
            $table->integer('tariff');
            $table->string('address');
            $table->string('author')->default('web');
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
        Schema::dropIfExists('tickets');
    }
}
