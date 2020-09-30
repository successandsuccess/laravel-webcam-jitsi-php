<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMoreToPatientactivities extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('patient_activities', function (Blueprint $table) {
            $table->bigInteger('videouploads_id')->unsigned()->nullable();
            $table->foreign('videouploads_id')->references('id')->on('videouploads')->onDelete('set null');
            $table->bigInteger('meetings_id')->unsigned()->nullable();
            $table->foreign('meetings_id')->references('id')->on('meetings')->onDelete('set null');
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
            $table->dropForeign('patient_activities_videouploads_id_foreign');
            $table->dropColumn('videouploads_id');
            $table->dropForeign('patient_activities_meetings_id_foreign');
            $table->dropColumn('meetings_id');
        });
    }
}
