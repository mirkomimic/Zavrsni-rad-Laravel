<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Services\RestaurantServiceController;
use App\Http\Requests\RestaurantRequest;
use App\Http\Resources\RestaurantResource;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $restaurants = Restaurant::paginate(3);
        return RestaurantResource::collection($restaurants);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RestaurantRequest $request)
    {
        $restaurant = new Restaurant();
        $restService = new RestaurantServiceController();
        $restService->storeRestaurant($request, $restaurant);
        $response = new RestaurantResource($restaurant);

        return response()->json([
            'success' => true,
            'data' => $response
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Restaurant $restaurant)
    {
        return new RestaurantResource($restaurant);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RestaurantRequest $request, Restaurant $restaurant)
    {
        $restService = new RestaurantServiceController();
        $restService->storeRestaurant($request, $restaurant);

        return response()->json([
            'success' => true,
            'data' => new RestaurantResource($restaurant)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Restaurant $restaurant)
    {
        $restaurant->delete();

        return response()->json(['msg' => 'Restaurant deleted']);
    }
}
