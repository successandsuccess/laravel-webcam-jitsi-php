<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDxTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dxs', function (Blueprint $table) {
            $table->id('dx_id');
            $table->string('dx_name')->nullable();
            $table->text('dx_desc')->nullable();
            $table->bigInteger('rx_1')->unsigned()->nullable();
            $table->foreign('rx_1')->references('rx_id')->on('rxs')->onDelete('set null');
            $table->bigInteger('rx_2')->unsigned()->nullable();
            $table->foreign('rx_2')->references('rx_id')->on('rxs')->onDelete('set null');
            $table->bigInteger('rx_3')->unsigned()->nullable();
            $table->foreign('rx_3')->references('rx_id')->on('rxs')->onDelete('set null');
            $table->bigInteger('rx_4')->unsigned()->nullable();
            $table->foreign('rx_4')->references('rx_id')->on('rxs')->onDelete('set null');
            $table->bigInteger('rx_5')->unsigned()->nullable();
            $table->foreign('rx_5')->references('rx_id')->on('rxs')->onDelete('set null');
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
        Schema::dropIfExists('dxs');
    }
}
