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
 *     url = "L5_SWAGGER_CONST_HOST"
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
