<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Resources\BookResource;
use App\Models\Book;
use App\Models\FreezerBlock;
use App\Models\Location;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

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
     *          @OA\JsonContent(ref="#/components/schemas/BooksListResponse"),
     *     ),
     *     @OA\Response(
     *          response=401,
     *          description="Unauthorized"
     *      )
     * )
     */
    public function index()
    {
        $books = Book::byUserId(auth()->id())->get();
        return $this->sendResponse(BookResource::collection($books));
    }

    /**
     * @OA\Post (
     *     path = "/books",
     *     operationId = "bookAdd",
     *
     *     security = {{"bearer_token": {}}},
     *     tags = {"Booking"},
     *     summary = "Store new book",
     *     description = "Return created book data",
     *     @OA\RequestBody (
     *          required = true,
     *          @OA\JsonContent(ref = "#/components/schemas/BookStoreRequest")
     *     ),
     *      @OA\Response(
     *          response=201,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/BookItemResponse")
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthorized",
     *      )
     * )
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
            'volume' => 'required|numeric|gt:0',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors(),);
        }

        //get available blocks with filter
        $blocks = FreezerBlock::with('properties')->available()->whereHas(
            'storage', function ($query) use ($input) {
            $query->withLocation($input['location_id'])->withTemperature($input['temperature']);
        })->get();

        $maxAvailableVolume = $blocks->map->properties->sum('volume');

        // check volume max value
        if (!$maxAvailableVolume) {
            $validator->errors()->add('volume', 'There are no free blocks for the filter. Change filter settings.');
            return $this->sendError('Volume Error.', $validator->errors());
        }

        if ($input['volume'] > $maxAvailableVolume) {
            $validator->errors()->add('volume', 'The volume must be less or equal to ' . $maxAvailableVolume);
            return $this->sendError('Volume Error.', $validator->errors());
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

        return $this->sendResponse(new BookResource(Book::find($newBook->id)), 'Book created successfully.', HttpResponse::HTTP_CREATED);
    }


    /**
     * @OA\Get (
     *     path = "/books/{id}",
     *     operationId = "bookGet",
     *     security = {{"bearer_token": {}}},
     *     tags = {"Booking"},
     *     summary = "Get book",
     *     @OA\Response (
     *          response = "200",
     *          description = "Successfull operation",
     *          @OA\JsonContent(ref="#/components/schemas/BookItemResponse"),
     *     ),
     *     @OA\Response(
     *          response=401,
     *          description="Unauthorized"
     *      ),
     *     @OA\Response(
     *          response=404,
     *          description="Not Found"
     *      )
     * )
     */
    public function show(Book $book)
    {
        if ($book->user_id !== auth()->user()->getAuthIdentifier()) {
            return $this->sendError('Permission denied.');
        }
        return $this->sendResponse((new BookResource($book))->includeRandomCode(), "Book retrieved successfully.");
    }


    public function update(Request $request, Book $book)
    {
    }

    public function destroy(Book $book)
    {
    }

}
