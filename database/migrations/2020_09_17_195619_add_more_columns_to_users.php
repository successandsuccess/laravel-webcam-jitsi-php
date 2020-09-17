<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMoreColumnsToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('prov_id_1')->nullable();
            $table->foreign('prov_id_1')->references('id')->on('admins')->onDelete('set null');

            $table->unsignedBigInteger('prov_id_2')->nullable();
            $table->foreign('prov_id_2')->references('id')->on('admins')->onDelete('set null');

            $table->unsignedBigInteger('prov_id_3')->nullable();
            $table->foreign('prov_id_3')->references('id')->on('admins')->onDelete('set null');

            $table->unsignedBigInteger('dx_1')->nullable();
            $table->foreign('dx_1')->references('dx_id')->on('dxs')->onDelete('set null');

            $table->unsignedBigInteger('dx_2')->nullable();
            $table->foreign('dx_2')->references('dx_id')->on('dxs')->onDelete('set null');

            $table->unsignedBigInteger('dx_3')->nullable();
            $table->foreign('dx_3')->references('dx_id')->on('dxs')->onDelete('set null');

            $table->unsignedBigInteger('dx_4')->nullable();
            $table->foreign('dx_4')->references('dx_id')->on('dxs')->onDelete('set null');

            $table->unsignedBigInteger('dx_5')->nullable();
            $table->foreign('dx_5')->references('dx_id')->on('dxs')->onDelete('set null');

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
            $table->dropColumn('prov_id_1');
            $table->dropColumn('prov_id_2');
            $table->dropColumn('prov_id_3');
            $table->dropColumn('dx_1');
            $table->dropColumn('dx_2');
            $table->dropColumn('dx_3');
            $table->dropColumn('dx_4');
            $table->dropColumn('dx_5');
        });
    }
}
