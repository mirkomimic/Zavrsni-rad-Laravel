<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Services\RestaurantServiceController;
use App\Http\Requests\RestaurantRequest;
use App\Http\Resources\ItemResource;
use App\Http\Resources\RestaurantResource;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function search(Request $request)
    {
        // $restaurants = Restaurant::all();
        $response = DB::table('restaurants')->where('name', 'Like', '%' . $request->search . '%')->get();

        return response()->json([
            'data' => RestaurantResource::collection($response),
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

    public function items(Restaurant $restaurant)
    {
        return ItemResource::collection($restaurant->items);
    }
}
