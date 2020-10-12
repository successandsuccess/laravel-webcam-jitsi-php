<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOneononefeedbackTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('firstfeedbacks', function (Blueprint $table) {
            $table->id();
            $table->integer('todaypain')->nullable();
            $table->integer('totalpain')->nullable();
            $table->integer('lastpain')->nullable();
            $table->integer('meeting_id')->nullable();
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
        Schema::dropIfExists('firstfeedbacks');
    }
}
