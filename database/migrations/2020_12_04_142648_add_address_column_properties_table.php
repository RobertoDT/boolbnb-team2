<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAddressColumnPropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('properties', function (Blueprint $table) {
        $table->string('street')->nullable();
        $table->string('metropolis');
        $table->string('country');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('properties', function (Blueprint $table) {
        $table->dropColumn('street')->nullable(false);
        $table->dropColumn('metropolis');
        $table->dropColumn('country');
      });
    }
}
