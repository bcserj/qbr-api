<?php

namespace App\Virtual\Resources;

/**
 * @OA\Schema(
 *     title="LocationsCollection",
 *     description="Locations collection",
 *     @OA\Xml(
 *         name="LocationResource"
 *     )
 * )
 */
class LocationsCollection {
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

