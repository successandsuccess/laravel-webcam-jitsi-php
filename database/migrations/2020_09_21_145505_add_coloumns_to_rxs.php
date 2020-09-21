<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColoumnsToRxs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rxs', function (Blueprint $table) {
            $table->string('rx_desc')->nullable();
            $table->string('frequency')->nullable();
            $table->string('duration')->nullable();
            $table->text('rx_note')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rxs', function (Blueprint $table) {
            $table->dropColumn('rx_desc');
            $table->dropColumn('frequency');
            $table->dropColumn('duration');
        });
    }
}
