<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Services\UserServiceController;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::paginate(3);

        return UserResource::collection($user);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $user = new User();
        $userService = new UserServiceController();
        $userService->storeUser($request, $user);
        $response = new UserResource($user);

        return response()->json([
            'success' => true,
            'data' => $response
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return new UserResource($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user)
    {
        $userService = new UserServiceController();
        $userService->storeUser($request, $user);
        $response = new UserResource($user);

        return response()->json([
            'success' => true,
            'data' => $response
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return response()->json([
            'msg' => 'User deleted'
        ]);
    }
}
