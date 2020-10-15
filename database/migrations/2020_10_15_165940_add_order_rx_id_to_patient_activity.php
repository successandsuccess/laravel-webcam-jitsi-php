<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOrderRxIdToPatientActivity extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('patient_activities', function (Blueprint $table) {
            $table->integer('order')->nullable();
            $table->bigInteger('rx_id')->nullable()->unsigned();
            $table->foreign('rx_id')->references('rx_id')->on('rxs')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('patient_activities', function (Blueprint $table) {
            $table->dropColumn('order');
            $table->dropForeign('patient_activities_rx_id_foreign');
            $table->dropColumn('rx_id');
        });
    }
}
