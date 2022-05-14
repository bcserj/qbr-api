<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return  response("sd");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
