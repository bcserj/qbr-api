<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Resources\TimezoneResource;
use App\Http\Resources\TimezonesCollection;
use App\Models\Timezone;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TimezoneController extends ApiController
{
    /**
     * @OA\Get (
     *     path = "/timezones",
     *     operationId = "timezonesAll",
     *     tags = {"Timezone"},
     *     summary = "Get all timezones",
     *     @OA\Response (
     *          response = "200",
     *          description = "Successfull operation",
     *          @OA\MediaType(
     *              mediaType="application/json",
     *          )
     *     ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     * )
     *
     * @return TimezonesCollection|\Illuminate\Http\JsonResponse|object
     */
    public function index(Request $request)
    {
        return (new TimezonesCollection(Timezone::all()))->response()->setStatusCode(Response::HTTP_OK);
    }


    /**
     * @OA\Get (
     *     path = "/timezones/{id}",
     *     operationId = "timezoneGet",
     *     tags = {"Timezone"},
     *     summary = "Get timezone data",
     *     @OA\Parameter (
     *          name = "id",
     *          description = "Timezone id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *     ),
     *     @OA\Response (
     *          response = "200",
     *          description = "Successfull operation",
     *          @OA\MediaType(
     *              mediaType="application/json",
     *          )
     *     ),
     *      @OA\Response(
     *          response=404,
     *          description="Bad Request"
     *      ),
     * )
     *
     * Display the specified resource.
     *
     * @param Timezone $timezone
     * @return TimezoneResource
     */
    public function show(Timezone $timezone)
    {
        return new TimezoneResource($timezone);
    }
}
