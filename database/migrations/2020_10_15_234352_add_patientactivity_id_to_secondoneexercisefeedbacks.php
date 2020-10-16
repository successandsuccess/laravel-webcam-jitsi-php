<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPatientactivityIdToSecondoneexercisefeedbacks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('secondoneexercisefeedbacks', function (Blueprint $table) {
            $table->bigInteger('patientactivity_id')->unsigned()->nullable();
            $table->foreign('patientactivity_id')->references('id')->on('patient_activities')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('secondoneexercisefeedbacks', function (Blueprint $table) {
            $table->dropForeign('secondoneexercisefeedbacks_patientactivity_id_foreign');
            $table->dropColumn('patientactivity_id');
        });
    }
}
