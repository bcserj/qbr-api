<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Timezone;
use Illuminate\Http\Request;

class TimezoneController extends Controller
{
    /**
     * @OA\Get (
     *     path = "/timezones",
     *     operationId = "timezonesAll",
     *     tags = {"Timezone"},
     *     summary = "Get all timezones",
     *     @OA\Parameter (
     *          name = "page",
     *          in = "query",
     *          description = "Page number",
     *          required = false,
     *          @OA\Schema (
     *              type = "integer"
     *          )
     *     ),
     *     @OA\Parameter (
     *          name = "name",
     *          in = "query",
     *          description = "Part of name (%str%)",
     *          required = false,
     *          @OA\Schema (
     *              type = "string"
     *          )
     *     ),
     *     @OA\Response (
     *          response = "200",
     *          description = "Successfull operation",
     *          @OA\MediaType(
     *              mediaType="application/json",
     *          )
     *     )
     * )
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $filter = $request->get("name");
        $query = Timezone::query();

        if ($filter) {
            $query->where("name", "like", "%" . $filter . "%");
        }

        $model = $query->paginate(15);

        return response()->json($model);
    }


    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Timezone $id)
    {
        return Timezone::findOrFail($id);
    }
}
