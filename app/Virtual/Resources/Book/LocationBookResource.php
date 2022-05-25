<?php

namespace App\Virtual\Resources\Book;

/**
 * @OA\Schema (
 *     title = "LocationBookResource",
 *     description = "Location book resource",
 *     @OA\Xml (
 *          name = "LocationBookResource"
 *     )
 * )
 */
class LocationBookResource
{

    /**
     * @OA\Property(
     * )
     *
     * @var string
     */
    public $title;


    /**
     * @OA\Property (
     * )
     * @var string
     */
    public $timezone;


    /**
     * @OA\Property (
     *     example = "24.05.2022"
     * )
     * @var string
     */
    public $start_booking_timezone_date;

}
