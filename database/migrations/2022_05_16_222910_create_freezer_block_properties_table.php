<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFreezerBlockPropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('freezer_block_properties', function (Blueprint $table) {
            $table->id();
            $table->unsignedTinyInteger('length');
            $table->unsignedTinyInteger('width');
            $table->unsignedTinyInteger('height');
            $table->unsignedMediumInteger('volume')->virtualAs('length * width * height');
            $table->unsignedInteger('cost_per_day');
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
        Schema::dropIfExists('freezer_block_properties');
    }
}
