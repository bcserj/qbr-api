<?php

namespace App\Observers;

use App\Models\Book;
use Carbon\Carbon;

class BookObserver
{

    /**
     * Before create. Used this method for modification model data without second update db object
     * @param Book $book
     * @return void
     */
    public function creating(Book $book)
    {
        //start generate unique token
        $arrAllRandomCodes = Book::query()->pluck('random_code')->toArray();
        do {
            $randomCode = $book->generateRandomCodeAttribute();
        } while (in_array($randomCode, $arrAllRandomCodes));
        $book->random_code = $randomCode;
        //end generate unique token

        $book->start_booking_date = Carbon::now($book->location->timezone->name)->startOfDay()->addDay();

    }

    /**
     * Handle the Book "created" event.
     *
     * @param \App\Models\Book $book
     * @return void
     */
    public function created(Book $book)
    {

    }

    /**
     * Handle the Book "updated" event.
     *
     * @param \App\Models\Book $book
     * @return void
     */
    public function updated(Book $book)
    {
        //
    }

    /**
     * Handle the Book "deleted" event.
     *
     * @param \App\Models\Book $book
     * @return void
     */
    public function deleted(Book $book)
    {
        //
    }

    /**
     * Handle the Book "restored" event.
     *
     * @param \App\Models\Book $book
     * @return void
     */
    public function restored(Book $book)
    {
        //
    }

    /**
     * Handle the Book "force deleted" event.
     *
     * @param \App\Models\Book $book
     * @return void
     */
    public function forceDeleted(Book $book)
    {
        //
    }
}
