<?php

namespace App\Virtual\Resources\Book;

/**
 * @OA\Schema (
 *     title = "BookResource",
 *     description = "Book resource",
 *     @OA\Xml (
 *          name = "BookResource"
 *     )
 * )
 */
class BookResource
{

    /**
     * @OA\Property(
     *     example = "2"
     * )
     *
     * @var integer
     */
    public $id;


    /**
     * @OA\Property (
     *     example = "5"
     * )
     *
     * @var integer
     */
    public $days;

    /**
     * @OA\Property (
     *     example = "30193"
     * )
     * @var integer|numeric|numeric-string
     */
    public $cost;


    /**
     * @OA\Property (
     *     example = "-37"
     * )
     * @var integer
     */
    public $temperature;


    /**
     * @OA\Property (
     * )
     * @var \App\Virtual\Resources\Book\LocationBookResource
     */
    public $location;


    /**
     * @OA\Property (
     * )
     * @var \App\Virtual\Resources\Book\BlocksBookResource
     */
    public $blocks;
}
