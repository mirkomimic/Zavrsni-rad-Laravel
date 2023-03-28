<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ItemController;
use App\Http\Controllers\Api\RestaurantController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Login
Route::post('/login', [AuthController::class, 'login']);
// Register
Route::post('/users', [UserController::class, 'store']);


Route::group(['middleware' => 'auth:sanctum'], function ()
{
    // Logout
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::group(['middleware' => 'ability:admin'], function ()
    {

        Route::get('/users', [UserController::class, 'index']);
        Route::get('/users/{user}', [UserController::class, 'show']);
        Route::put('/users/{user}', [UserController::class, 'update']);
        Route::delete('/users/{user}', [UserController::class, 'destroy']);
    });
});

// Filters
Route::get('/restaurants/search', [RestaurantController::class, 'search']);
Route::get('/items/search', [ItemController::class, 'search']);


// Restaurants routes
Route::get('/restaurants', [RestaurantController::class, 'index']);
Route::post('/restaurants', [RestaurantController::class, 'store']);
Route::get('/restaurants/{restaurant}', [RestaurantController::class, 'show']);
Route::put('/restaurants/{restaurant}', [RestaurantController::class, 'update']);
Route::delete('/restaurants/{restaurant}', [RestaurantController::class, 'destroy']);

// Items routes
Route::get('/items', [ItemController::class, 'index']);
Route::post('/items', [ItemController::class, 'store']);
Route::get('/items/{item}', [ItemController::class, 'show']);
Route::put('/items/{item}', [ItemController::class, 'update']);
Route::delete('/items/{item}', [ItemController::class, 'destroy']);
