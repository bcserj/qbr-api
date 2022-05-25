<?php

namespace App\Virtual\Responses\Book;

use App\Virtual\Responses\SuccessResponse;

/**
 * @OA\Schema(
 *     title="BooksListResponse",
 *     description="Books list response",
 *     @OA\Xml(
 *         name="BooksListResponse"
 *     )
 * )
 */
class BooksListResponse extends SuccessResponse
{
    /**
     * @OA\Property(
     *     title="Data",
     *     description="Data wrapper"
     * )
     *
     * @var \App\Virtual\Resources\Book\BookResource[]
     */
    public $data;
}

