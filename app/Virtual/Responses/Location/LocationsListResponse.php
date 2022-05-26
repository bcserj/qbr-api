<?php

namespace App\Virtual\Responses\Location;

use App\Virtual\Responses\SuccessResponse;

/**
 * @OA\Schema(
 *     title="LocationsListResponse",
 *     description="Locations list response",
 *     @OA\Xml(
 *         name="LocationsListResponse"
 *     )
 * )
 */
class LocationsListResponse extends SuccessResponse
{
    /**
     * @OA\Property(
     *     title="Data",
     *     description="Data wrapper"
     * )
     *
     * @var \App\Virtual\Models\Location[]
     */
    public $data;
}

