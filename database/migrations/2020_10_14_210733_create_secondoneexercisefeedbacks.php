<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSecondoneexercisefeedbacks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('secondoneexercisefeedbacks', function (Blueprint $table) {
            $table->id();
            $table->integer('feeling')->nullable(); // this shows 1 = better, 2 = same and 3 = worse
            $table->integer('order')->nullable(); // this shows the rx_1, or rx_2, rx_3 in users table. 
            $table->bigInteger('user_id')->nullable()->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
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
        Schema::dropIfExists('secondoneexercisefeedbacks');
    }
}
