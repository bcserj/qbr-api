<?php

namespace App\Virtual\Resources\Book;

/**
 * @OA\Schema (
 *     title = "BlocksBookResource",
 *     description = "Blocks book resource",
 *     @OA\Xml (
 *          name = "BlocksBookResource"
 *     )
 * )
 */
class BlocksBookResource
{

    /**
     * @OA\Property(
     *     example = "3"
     * )
     *
     * @var integer
     */
    public $count;

}
