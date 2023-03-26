<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Services\ItemService;
use App\Http\Requests\ItemRequest;
use App\Http\Resources\ItemCollection;
use App\Http\Resources\ItemResource;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Item::paginate(3);
        $items = ItemResource::collection($items);

        return $items;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ItemRequest $request)
    {
        $item = new Item();
        $itemService = new ItemService();
        $itemService->storeItem($request, $item);
        $response = new ItemResource($item);

        return response()->json([
            'message' => 'Item created',
            'data' => $response,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        return new ItemResource($item);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ItemRequest $request, Item $item)
    {
        $editedItem = Item::find($item->id);
        $editedItem->update($request->all());

        return response()->json([
            'message' => 'Item edited',
            'data' => new ItemResource($editedItem)
        ]);
    }

    public function search(Request $request)
    {
        if ($request->price == 'desc')
            $response = Item::orderBy('price', 'desc')->paginate(3);
        elseif ($request->price == 'asc')
            $response = Item::orderBy('price', 'asc')->paginate(3);

        return ItemResource::collection($response);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        $item->delete();
        return response()->json([
            'message' => 'Item deleted'
        ]);
    }
}
