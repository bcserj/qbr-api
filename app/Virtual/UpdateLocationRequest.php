<?php

namespace App\Virtual;

/**
 * @OA\Schema(
 *      title="Store Location request",
 *      description="Store Location request body data",
 *      type="object",
 *      required={"title", "timezone_id"}
 * )
 */
class UpdateLocationRequest
{

    /**
     * @OA\Property(
     *      title="title",
     *      description="Name of the new location",
     *      example="Kiyv"
     * )
     *
     * @var string;
     */
    public $title;

    /**
     * @OA\Property(
     *      title="timezone_id",
     *      description="Timezone`s id of the new location",
     *      example="337"
     * )
     *
     * @var int;
     */
    public $timezone_id;
}
