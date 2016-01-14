<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdatePosisiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posisi', function (Blueprint $table) {
            //
            $table->string('nama',200)->after('id');
            $table->string('singkatan', 5);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posisi', function (Blueprint $table) {
            //
        });
    }
}
