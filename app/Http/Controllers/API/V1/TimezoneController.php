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
     *          name = "all",
     *          in = "query",
     *          description = "Get all locations or with paginate",
     *          required = false,
     *          @OA\Schema (
     *              type = "boolean"
     *          )
     *     ),
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
        $query = Timezone::query()->when($request->input("name"), function ($query) use ($request) {
            return $query->where("name", "like", "%" . $request->input("name") . "%");
        });

        $model = (filter_var($request->input("all"), FILTER_VALIDATE_BOOLEAN)) ?
            $query->get() : $query->simplePaginate(10);

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
