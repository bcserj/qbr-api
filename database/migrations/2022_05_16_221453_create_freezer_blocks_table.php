<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFreezerBlocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('freezer_blocks', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\FreezerStorage::class);
            $table->foreignIdFor(\App\Models\FreezerBlockProperty::class);
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
        Schema::dropIfExists('freezer_blocks');
    }
}
