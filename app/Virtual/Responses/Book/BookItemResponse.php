<?php

namespace App\Virtual\Responses\Book;

use App\Virtual\Responses\SuccessResponse;

/**
 * @OA\Schema(
 *     title="BookItemResponse",
 *     description="Book item response",
 *     @OA\Xml(
 *         name="BookItemResponse"
 *     )
 * )
 */
class BookItemResponse extends SuccessResponse
{
    /**
     * @OA\Property(
     *     title="Data",
     *     description="Data wrapper"
     * )
     *
     * @var \App\Virtual\Resources\Book\BookWithCodeResource
     */
    public $data;

}

