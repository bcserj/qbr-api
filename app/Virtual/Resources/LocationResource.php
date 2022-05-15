<?php

namespace App\Virtual\Resources;

/**
 * @OA\Schema(
 *     title="LocationResource",
 *     description="Location resource",
 *     @OA\Xml(
 *         name="LocationResource"
 *     )
 * )
 */
class LocationResource {
    /**
     * @OA\Property(
     *     title="Data",
     *     description="Data wrapper"
     * )
     *
     * @var \App\Virtual\Models\Location[]
     */
    private $data;

}

