<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
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
            $table->dropForeign('users_rx_1_foreign');
            $table->dropColumn('rx_1');
            $table->dropForeign('users_rx_2_foreign');
            $table->dropColumn('rx_2');
            $table->dropForeign('users_rx_3_foreign');
            $table->dropColumn('rx_3');
            $table->dropForeign('users_rx_4_foreign');
            $table->dropColumn('rx_4');
            $table->dropForeign('users_rx_5_foreign');
            $table->dropColumn('rx_5');
        });
    }
}
