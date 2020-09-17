<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRxTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rxs', function (Blueprint $table) {
            $table->id('rx_id');
            $table->string('rx_name')->nullable();
            $table->string('rx_link')->nullable();
            $table->string('rx_note')->nullable();
            $table->integer('dx_no')->nullable();
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
        Schema::dropIfExists('rxs');
    }
}
