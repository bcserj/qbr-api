<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->enum('status', ['booked', 'completed', 'overdue'])->default('booked');
            $table->tinyInteger('temperature');
            $table->timestamp('start_storage');
            $table->timestamp('end_storage');
            $table->string('random_code')->unique()->default(Str::random(12));
            $table->foreignIdFor(\App\Models\User::class);
            $table->foreignIdFor(\App\Models\Location::class);
            $table->foreignIdFor(\App\Models\FreezerBlock::class);
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
        Schema::dropIfExists('orders');
    }
}
