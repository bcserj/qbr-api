<?php

namespace App\Virtual\Requests\Book;

/**
 * @OA\Schema(
 *      title="Book update request",
 *      description="Book update request body data",
 *      type="object",
 *      required={"location_id", "temperature", "days", "volume"}
 * )
 */
class BookUpdateRequest
{

    /**
     * @OA\Property(
     *      description="Book random code",
     *      example="7gkK5reEakUG+"
     * )
     *
     * @var integer;
     */
    public $code;

}
