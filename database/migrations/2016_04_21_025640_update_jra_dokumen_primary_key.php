<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateJraDokumenPrimaryKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('jra_dokumens', function (Blueprint $table) {
            //
            $table->unique('kode');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jra_dokumens', function (Blueprint $table) {
            //
        });
    }
}
