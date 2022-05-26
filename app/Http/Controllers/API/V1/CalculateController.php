<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Requests\CalculateRequest;
use App\Models\Location;

class CalculateController extends ApiController
{
    /**
     * @OA\Get (
     *     path = "/locations/{id}/calculate",
     *     operationId = "calculateBooking",
     *     tags = {"Booking", "Locations"},
     *     summary = "Calculate booking",
     *     @OA\Parameter (
     *          name = "id",
     *          description = "Location id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *     ),
     *     @OA\Parameter (
     *          name = "days",
     *          description = "Count of days for booking. Available: 1 - 24",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *     ),
     *     @OA\Parameter (
     *          name = "temperature",
     *          description = "Block storage temperature. Can be equal or less than 0.",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *     ),
     *     @OA\Parameter (
     *          name = "volume",
     *          description = "Products volume for booking. Must be greater than 0.",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *     ),
     *     @OA\Response (
     *          response = "200",
     *          description = "Successfull operation",
     *          @OA\JsonContent(ref="#/components/schemas/SuccessResponse"),
     *     ),
     *     @OA\Response (
     *          response = "404",
     *          description = "Not Found",
     *          @OA\JsonContent(ref="#/components/schemas/ErrorResponse"),
     *     )
     * )
     * Display a listing of the resource.
     */
    public function index(CalculateRequest $request, Location $location)
    {

    }
}
