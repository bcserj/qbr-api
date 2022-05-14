<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller as HttpController;

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
 *     url = "http://localhost/api/v1"
 * )
 * @OA\Server (
 *     description = "Qberry Laravel API server",
 *     url = "http://qbr.local/api/v1"
 * )
 * @OA\SecurityScheme (
 *     type = "apiKey",
 *     in = "header",
 *     name = "X-API-TOKEN",
 *     securityScheme = "X-API-TOKEN"
 * )
 */
class Controller extends HttpController
{
}
