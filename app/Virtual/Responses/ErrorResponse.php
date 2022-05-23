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
