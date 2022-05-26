<?php

namespace App\Virtual\Requests\User;

/**
 * @OA\Schema(
 *      title="User login request",
 *      description="User login request body data",
 *      type="object",
 *      required={"email", "password"}
 * )
 */
class UserLoginRequest
{

    /**
     * @OA\Property(
     *      title="email",
     *      description="User email",
     *      example="test@user.test"
     * )
     *
     * @var string;
     */
    public $email;

    /**
     * @OA\Property(
     *      title="password",
     *      description="User password.",
     *      example="12345678"
     * )
     *
     * @var string;
     */
    public $password;
}
