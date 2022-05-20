<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response as HttpResponse;


/**
 * @OA\Info (
 *     title = "Qberry Laravel API documentation",
 *     version = "1.0.0",
 *     @OA\Contact (
 *          email = "bc.serj@gmail.com"
 *     ),
 * )
 * @OA\Tag (
 *     name = "User",
 *     description = ""
 * )
 * @OA\Tag (
 *     name = "Timezone",
 *     description = ""
 * )
 * @OA\Tag (
 *     name = "Location",
 *     description = ""
 * )
 * @OA\Server (
 *     description = "Qberry Laravel API server",
 *     url = L5_SWAGGER_CONST_HOST
 * )
 * @OA\SecurityScheme (
 *     type = "apiKey",
 *     in = "header",
 *     name = "X-API-TOKEN",
 *     securityScheme = "X-API-TOKEN"
 * )
 */
class ApiController extends Controller
{
    public function sendResponse($result, $message)
    {
        $response = [
            'success' => true,
            'data' => $result,
            'message' => $message,
        ];
        return response()->json($response, HttpResponse::HTTP_OK);
    }

    public function sendError($error, $errorMessages = [], $code = HttpResponse::HTTP_NOT_FOUND)
    {
        $response = [
            'success' => false,
            'message' => $error,
        ];

        if (!empty($errorMessages)) {
            $response['data'] = $errorMessages;
        }

        return response()->json($response, $code);
    }
}
