<?php

namespace App\Virtual\Responses\Location;

use App\Virtual\Responses\SuccessResponse;

/**
 * @OA\Schema(
 *     title="LocationItemResponse",
 *     description="Location item response",
 *     @OA\Xml(
 *         name="LocationItemResponse"
 *     )
 * )
 */
class LocationItemResponse extends SuccessResponse
{
    /**
     * @OA\Property(
     *     title="Data",
     *     description="Data wrapper"
     * )
     *
     * @var \App\Virtual\Models\LocationResource
     */
    public $data;
}

