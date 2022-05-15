<?php

namespace App\Virtual\Models;

/**
 * @OA\Schema (
 *     title = "Location",
 *     description = "Location model",
 *     @OA\Xml (
 *          name = "Location"
 *     )
 * )
 */
class Location
{

    /**
     * @OA\Property(
     *     title="id",
     *     description="ID",
     *     format="int64",
     *     example=1
     * )
     *
     * @var int
     */
    private $id;

    /**
     * @OA\Property(
     *      title="title",
     *      description="Location title",
     *      example="Kiyv"
     * )
     *
     * @var string
     */
    public $title;


    /**
     * @OA\Property(
     *      title="timezone",
     *      description="Tocation timezone model",
     *      example="337"
     * )
     *
     * @var \App\Virtual\Models\Timezone
     *
     */
    public $timezone;
}
