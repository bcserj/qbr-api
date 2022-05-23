<?php

namespace App\Http\Controllers\API\V1;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends ApiController
{
    public function register(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] = $user->createToken('app_token')->accessToken;
        $success['name'] = $user->name;

        return $this->sendResponse($success, 'User register successfully.');
    }

    /**
     * @OA\Post (
     *     path = "/login",
     *     operationId = "userLogin",
     *     tags = {"Users"},
     *     summary = "Login user",
     *     description = "Return user data (token and othrer).",
     *     @OA\RequestBody (
     *          required = true,
     *          @OA\JsonContent(ref = "#/components/schemas/UserLoginRequest")
     *     ),
     *      @OA\Response(
     *          response=200,
     *          description="Successfully.",
     *          @OA\JsonContent(ref="#/components/schemas/UserLoginResponse")
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthorized",
     *          @OA\JsonContent(ref="#/components/schemas/ErrorResponse")
     *      )
     * )
     *
     */
    public function login(Request $request)
    {
        if (auth()->attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = \Auth::user();
            $success['token'] = $user->createToken('app_token')->accessToken;
            $success['name'] = $user->name;
            return $this->sendResponse($success, 'User login successfully.');
        }

        return $this->sendError('Unauthorised.', ['error' => 'Unauthorised']);
    }

    /**
     * @OA\Post (
     *     path = "/logout",
     *     operationId = "userLogout",
     *     tags = {"Users"},
     *     summary = "Logout user",
     *     description = "",
     *      @OA\Response(
     *          response=200,
     *          description="Successfully.",
     *          @OA\JsonContent(ref="#/components/schemas/SuccessResponse")
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthorized",
     *          @OA\JsonContent(ref="#/components/schemas/ErrorResponse")
     *      )
     * )
     *
     */
    public function logout()
    {
        if (auth()->check()) {
            auth()->user()->token()->revoke();
            return $this->sendResponse([], 'User logout successfully.');
        }
        return $this->sendError('Unauthorised.', ['error' => 'Unauthorised']);
    }
}
