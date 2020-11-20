<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string("title");
            $table->text("description")->nullable();
            $table->integer("rooms_number");
            $table->integer("beds_number");
            $table->integer("bathrooms_number");
            $table->string("flat_image");
            $table->integer("square_meters");
            $table->float("latitude", 12, 6);
            $table->float("longitude", 12, 6);
            $table->boolean("active")->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('properties');
    }
}
