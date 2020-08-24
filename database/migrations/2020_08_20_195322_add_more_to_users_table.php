<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMoreToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('lname')->nullable();
            $table->string('street')->nullable();
            $table->string('no')->nullable();
            $table->string('city')->nullable();
            $table->string('zip')->nullable();
            $table->string('insurance_carrier')->nullable();
            $table->string('insurance_phone')->nullable();
            $table->string('group')->nullable();
            $table->string('policy_id')->nullable();
            $table->boolean('gender')->nullable();
            $table->string('phone')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('lname');
            $table->dropColumn('street');
            $table->dropColumn('no');
            $table->dropColumn('city');
            $table->dropColumn('zip');
            $table->dropColumn('insurance_carrier');
            $table->dropColumn('insurance_phone');
            $table->dropColumn('group');
            $table->dropColumn('policy_id');
            $table->dropColumn('gender');
            $table->dropColumn('phone');
        });
    }
}
