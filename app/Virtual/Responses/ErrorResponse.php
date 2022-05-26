<?php

namespace App\Virtual\Responses;

/**
 * @OA\Schema(
 *     title="ErrorResponse",
 *     description="Error response",
 *     @OA\Xml(
 *         name="ErrorResponse"
 *     )
 * )
 */
class ErrorResponse
{

    /**
     * @OA\Property (
     *      example= false
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
