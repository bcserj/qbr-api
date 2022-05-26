<?php

namespace App\Virtual\Responses;

/**
 * @OA\Schema(
 *     title="SuccessResponse",
 *     description="Success response",
 *     @OA\Xml(
 *         name="SuccessResponse"
 *     )
 * )
 */
class SuccessResponse
{

    /**
     * @OA\Property (
     *      example= true
     * )
     *
     * @var boolean
     */
    public $status;

    /**
     * @OA\Property (
     * )
     *
     * @var object
     */
    public $data;

    /**
     * @OA\Property (
     * )
     * @var string
     */
    public $message;
}
