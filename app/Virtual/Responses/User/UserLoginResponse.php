<?php

namespace App\Virtual\Responses\User;

/**
 * @OA\Schema(
 *     title="UserLoginResponse",
 *     description="Login response",
 *     @OA\Xml(
 *         name="UserLoginResponse"
 *     )
 * )
 */
class UserLoginResponse
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
     * @OA\Property(
     *     title="Data",
     *     description="Data wrapper"
     * )
     *
     * @var \App\Virtual\Resources\UserResource
     */
    private $data;

    /**
     * @OA\Property (
     *     example = "User login successfully."
     * )
     * @var string
     */
    private $message;
}

