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
 *
 * @OA\Server (
 *     description = "Qberry Laravel API server",
 *     url = L5_SWAGGER_CONST_HOST
 * )
 *
 * @OA\Tag (
 *     name = "Users",
 *     description = ""
 * )
 * @OA\Tag (
 *     name = "Timezones",
 *     description = ""
 * )
 * @OA\Tag (
 *     name = "Locations",
 *     description = ""
 * )
 * @OA\Tag (
 *     name = "Booking",
 *     description = ""
 * )

 */
class ApiController extends Controller
{
    public function sendResponse($result, $message = 'Success.', $code = HttpResponse::HTTP_OK)
    {
        $response = [
            'success' => true,
            'data' => $result,
            'message' => $message,
        ];
        return response()->json($response, $code);
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
