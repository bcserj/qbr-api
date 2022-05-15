<?php

namespace App\Virtual\Models;

/**
 * @OA\Schema (
 *     title = "Timezone",
 *     description = "Timezone model",
 *     @OA\Xml (
 *          name = "Timezone"
 *     )
 * )
 */
class Timezone
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
     *      description="Time zone",
     *      example="Europe/Kiev"
     * )
     *
     * @var string
     */
    public $title;


    /**
     * @OA\Property(
     *      title="offset",
     *      description="Time zone offset",
     *      example="+03:00"
     * )
     *
     * @var string;
     */
    public $offset;
}
