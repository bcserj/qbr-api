<?php

namespace App\Virtual\Requests\Book;

/**
 * @OA\Schema(
 *      title="Book store request",
 *      description="Book store request body data",
 *      type="object",
 *      required={"location_id", "temperature", "days", "volume"}
 * )
 */
class BookStoreRequest
{

    /**
     * @OA\Property(
     *      description="Location identifier",
     *      example="1"
     * )
     *
     * @var integer;
     */
    public $location_id;

    /**
     * @OA\Property(
     *      description="Temperature. Can be less or equal to 0.",
     *      example="-20"
     * )
     *
     * @var integer;
     */
    public $temperature;

    /**
     * @OA\Property(
     *      description="Count days for booking. Can be 1-24.",
     *      example="3"
     * )
     *
     * @var integer;
     */
    public $days;

    /**
     * @OA\Property (
     *      example = "41"
     * )
     * @var numeric|numeric-string
     */
    public $volume;
}
