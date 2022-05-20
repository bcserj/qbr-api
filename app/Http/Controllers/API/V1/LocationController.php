<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Requests\LocationRequest;
use App\Http\Resources\LocationResource;
use App\Models\Location;
use App\Models\Timezone;
use Illuminate\Http\Request;

class LocationController extends ApiController
{
    /**
     * @OA\Get (
     *     path = "/locations",
     *     operationId = "locationsAll",
     *     tags = {"Location"},
     *     summary = "Get all locations",
     *     @OA\Response (
     *          response = "200",
     *          description = "Successfull operation",
     *          @OA\MediaType(
     *              mediaType="application/json",
     *          )
     *     )
     * )
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Http\JsonResponse
    {
        $locations = \App\Models\Location::with([
            'timezone',
            'blocks' => function ($q) {
                $q->available();
            }])->get();
        return $this->sendResponse(LocationResource::collection($locations), 'Locations retrieved successfully.');
    }

    /**
     * @OA\Post (
     *     path = "/locations",
     *     operationId = "locationAdd",
     *     tags = {"Location"},
     *     summary = "Store new location",
     *     description = "Return created location data",
     *     @OA\RequestBody (
     *          required = true,
     *          @OA\JsonContent(ref = "#/components/schemas/StoreLocationRequest")
     *     ),
     *      @OA\Response(
     *          response=201,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Location")
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     * )
     *
     * Store a newly created resource in storage.
     */
    public function store(LocationRequest $request)
    {
        //check perms
        $location = Location::create($request->all());
        return $this->sendResponse(new LocationResource($location), 'Location created successfully.');
    }

    /**
     *
     * @OA\Get (
     *     path = "/locations/{id}",
     *     operationId = "locationGet",
     *     tags = {"Location"},
     *     summary="Get location information",
     *     description="Returns location data",
     *     @OA\Parameter (
     *          name = "id",
     *          description = "Location id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *     ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Location")
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      )
     * )
     *
     * Display the specified resource.
     */
    public function show(Location $location)
    {
        return $this->sendResponse(new LocationResource($location), 'Locations retrieved successfully.');
    }

    /**
     * @OA\Put (
     *     path = "/locations/{id}",
     *     operationId = "locationUpdate",
     *     tags = {"Location"},
     *     summary = "Update location",
     *     description = "Return updated location data",
     *     @OA\Parameter(
     *          name="id",
     *          description="location id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *     @OA\RequestBody (
     *          required = true,
     *          @OA\JsonContent(ref = "#/components/schemas/UpdateLocationRequest")
     *     ),
     *      @OA\Response(
     *          response=202,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Location")
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     *      @OA\Response(
     *          response=500,
     *          description="Internal Server Error"
     *      )
     * )
     *
     * Update the specified resource in storage.
     */
    public function update(Request $request, Location $location)
    {
        //check perms

        $validator = \Validator::make($request->all(), [
            'title' => 'required',
            "timezone_id" => 'bail|numeric|gt:0|exists:' . Timezone::class . ', id'
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation error', $validator->errors());
        }
        $location->update($request->all());

        return $this->sendResponse(new LocationResource($location), 'Location updated successfully.');
    }

    /**
     * @OA\Delete(
     *      path="/locations/{id}",
     *      operationId="locationDelete",
     *      tags={"Location"},
     *      summary="Delete existing location",
     *      description="Deletes location item and returns no content",
     *      @OA\Parameter(
     *          name="id",
     *          description="Location id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=204,
     *          description="Successful operation",
     *          @OA\JsonContent()
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Resource Not Found"
     *      )
     * )
     *
     * Remove the specified resource from storage.
     *
     */
    public function destroy(Location $location)
    {
        //check perms
        //add check blocks. if freezer blocks exist destroy disabled
        $location->delete();
        return $this->sendResponse([], 'Location deleted successfully.');
    }
}
