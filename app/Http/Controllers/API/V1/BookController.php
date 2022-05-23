<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Resources\BookResource;
use App\Models\Book;
use App\Models\FreezerBlock;
use App\Models\Location;
use Illuminate\Http\Request;

class BookController extends ApiController
{
    /**
     * @OA\Get (
     *     path = "/books",
     *     operationId = "booksAll",
     *     security = {{"bearer_token": {}}},
     *     tags = {"Booking"},
     *     summary = "Get all books by user",
     *     @OA\Response (
     *          response = "200",
     *          description = "Successfull operation",
     *          @OA\MediaType(
     *              mediaType="application/json",
     *          )
     *     )
     * )
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::byUserId(auth()->id())->get();
        return $this->sendResponse($books);
    }

    /**
     *
     *
     * We use this method on location details page and have location_id in uri.
     * Need use this value in the form like hidden input.
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $validator = \Validator::make($input, [
            'location_id' => 'bail|required|integer|gt:0|exists:' . Location::class . ',id',
            'days' => 'required|integer|between:1,24',
            'temperature' => 'required|integer|lte:0',
            'volume' => 'required|integer|gt:0',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        //get available blocks with filter
        $blocks = FreezerBlock::with('properties')->available()->whereHas(
            'storage', function ($query) use ($input) {
            $query->withLocation($input['location_id'])->withTemperature($input['temperature']);
        })->get();

        $maxAvailableVolume = $blocks->map->properties->sum('volume');

        // check volume max value
        if ($input['volume'] > $maxAvailableVolume) {
            $validator->errors()->add('volume', 'The volume must be less or equal to ' . $maxAvailableVolume);
            return $this->sendError('Volume Error. ', $validator->errors());
        }

        //generate collection of blocks for booking. Calc volume
        $bookBlocks = $blocks->reject(function ($item) use (&$maxAvailableVolume, $input) {
            return (($maxAvailableVolume -= $item->properties->volume) >= $input['volume']);
        });

        $newBook = Book::create($request->merge(['user_id' => auth()->id()])->all());

        if (!$newBook) {
            return $this->sendError('Creating booking error');
        }
        FreezerBlock::whereIn('id', $bookBlocks->pluck('id'))->update([
            'book_id' => $newBook->id
        ]);

        return $this->sendResponse(new BookResource(Book::find($newBook->id)), 'Location created successfully.');
    }

}
