<?php

namespace App\Http\Controllers;

use App\Http\Requests\ItemRequest;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Item::paginate(6);

        return view('index', ['items' => $items]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create.item');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ItemRequest $request)
    {
        $item = Item::create([
            'name' => $request->name,
            'price' => $request->price,
            'restaurant_id' => $request->restaurant_id
        ]);

        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        $item = Item::find($item);

        return view('store.show')->with([
            'item' => $item
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        $item = Item::find($item);

        return view('store.edit')->with([
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ItemRequest $request, Item $item)
    {
        $item->name = $request->input('name');
        $item->price = $request->input('price');
        $item->restaurant_id = $request->input('restaurant_id');

        $item->save();

        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        $item = Item::find($item);

        $item->delete();

        return redirect('/');
    }
}
