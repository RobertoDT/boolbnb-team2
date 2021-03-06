<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertyExtraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_extra', function (Blueprint $table) {
          $table->foreignId('property_id')->constrained()->on('properties')->onDelete('cascade');
          $table->foreignId('extra_id')->constrained()->on('extras')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('property_extra');
    }
}
