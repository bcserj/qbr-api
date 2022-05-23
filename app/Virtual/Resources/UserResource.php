<?php

namespace App\Virtual\Resources;

/**
 * @OA\Schema (
 *     title = "UserResource",
 *     description = "User resource",
 *     @OA\Xml (
 *          name = "UserResource"
 *     )
 * )
 */
class UserResource
{

    /**
     * @OA\Property(
     *      title="title",
     *      description="Location title",
     *      example="eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiI5NjVjZDBiZS1kMWM0LTRiYWEtYjY4NS1mZmVhNzI0ZjkxNzgiLCJqdGkiOiI3MzhiOGI0ZTBkN2QwMzVmZmRhMjZiYjYzZmVkNDgzZDQ1OTQzOTcxODdjYTgzYThmODNlM2FjZmQ4NjA3MGUzNWNmODYxYjI1NGU1NzAxZiIsImlhdCI6MTY1MzI2MDIyNC4zMDI2MTcsIm5iZiI6MTY1MzI2MDIyNC4zMDI2MjMsImV4cCI6MTY4NDc5NjIyNC4yODgwNDIsInN1YiI6IjEiLCJzY29wZXMiOltdfQ.fEVX5K0SbVcA_3nfR5DrVsE9CcFoHQrQjdugQEhCTqr2tBh2wKoee_oeIAVf-p6R3mo6aJwKQkOp69kPfr8dR_OAV4gWRT0mUbJ0RGD9dTQZwtVNZzcVOTLOgqrm_ilJYV_DNe17Md97waLr491hRxpppATobt2alsT5eJXDcpVqajgE8qeOyYYFdPHWBT527Ji11Q14d9njO50KCBq8k6g3s06RDl7D82nXDAmc8feelRdCPdc5aL_mF6La-rDCf6ZU4vbBjnUBdq_e1rpOuUEOs-lxJbkbA2NwM76V6czowuLiUKUGPayOGtNxkq3SEGAkBvYFTNC1Vz9I6uQJlDKD98GE8lyudXec4zV66Dx74EZ-UhzA6KRAjHbUJLGUKq-YsNgPo4fIP9TITFcsSS7QxxS10q13EmYFT6vKm7YDZ5M7wufwvHUtXzkbWHcebkdxu6x6QACc0gx17zc-niDE6PD1y4ygccqammo6yQJbpmSA7yWwzHv4agvyIbXLxOF2wRb3seARZRYxqpT75JOgdCIMyzJglYw3QZ56-LGrggXGVq2OBOJ6NE401PPNT2owCLHcgATUUlqs7gRut_Rcnq0ZdtKx2PBEQ5aaczjydEVbPVA7E6W3ps9GLl6Y6jKQkHawkhK91dbb2ArtSyrN7TlFAZxeD10nibjJM6c"
     * )
     *
     * @var string
     */
    public $token;


    /**
     * @OA\Property (
     *     example = "User Name"
     * )
     * @var string
     */
    public $name;
}
