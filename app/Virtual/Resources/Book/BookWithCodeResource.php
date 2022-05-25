<?php

namespace App\Virtual\Resources\Book;

/**
 * @OA\Schema (
 *     title = "BookWithCodeResource",
 *     description = "Book with code resource",
 *     @OA\Xml (
 *          name = "BookWithCodeResource"
 *     )
 * )
 */
class BookWithCodeResource extends BookResource
{

    /**
     * @OA\Property(
     *     example = "7gkK5reEakUG"
     * )
     *
     * @var string
     */
    public $code;
}
