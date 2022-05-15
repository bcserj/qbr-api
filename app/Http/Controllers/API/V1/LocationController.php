<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLocationRequest;
use App\Http\Resources\LocationResource;
use App\Http\Resources\LocationsCollection;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class LocationController extends Controller
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
     *
     * @return LocationsCollection
     */
    public function index(): LocationsCollection
    {
        return new LocationsCollection(Location::all());
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
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse|Response|object
     */
    public function store(StoreLocationRequest $request)
    {
        $location = Location::create($request->all());
        return (new LocationResource($location))->response()->setStatusCode(HttpResponse::HTTP_CREATED);
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
     *
     * @param \App\Models\Location $location
     * @return LocationResource
     */
    public function show(Location $location)
    {
        return new LocationResource($location);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Location $location
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Location $location)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Location $location
     * @return \Illuminate\Http\Response
     */
    public function destroy(Location $location)
    {
        //
    }
}
