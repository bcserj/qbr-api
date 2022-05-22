<?php

use App\Models\Book;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->enum('status', [Book::STATUS_BOOKED, Book::STATUS_COMPLETED, Book::STATUS_OVERDUE])
                ->default(Book::STATUS_BOOKED);
            $table->tinyInteger('temperature');
            $table->unsignedTinyInteger('days');
            $table->timestamp('start_booking_date');
            $table->string('random_code')->unique()->nullable();
            $table->foreignIdFor(\App\Models\User::class);
            $table->foreignIdFor(\App\Models\Location::class);
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
        Schema::dropIfExists('books');
    }
}
