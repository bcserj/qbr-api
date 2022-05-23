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
    private $status;

    /**
     * @OA\Property (
     * )
     *
     * @var object
     */
    private $data;

    /**
     * @OA\Property (
     * )
     * @var string
     */
    private $message;
}
