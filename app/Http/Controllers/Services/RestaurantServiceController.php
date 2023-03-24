<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use App\Http\Requests\RestaurantRequest;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RestaurantServiceController extends Controller
{
    public function storeRestaurant(RestaurantRequest $request, Restaurant $restaurant)
    {
        $restaurant->name = $request->name;
        $restaurant->address = $request->address;
        $restaurant->email = $request->email;
        $restaurant->password = Hash::make($request->password);
        $restaurant->save();
    }
}
