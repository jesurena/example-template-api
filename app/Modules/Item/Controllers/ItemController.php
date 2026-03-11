<?php

namespace App\Modules\Item\Controllers;

use App\Models\Item;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Modules\Item\Requests\StoreItemRequest;
use App\Modules\Item\Requests\UpdateItemRequest;
use App\Modules\Item\Resources\ItemResource;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ItemResource::collection(Item::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreItemRequest $request)
    {
        $item = Item::create($request->validated());

        return response()->json([
            'message' => 'Item created successfully',
            'item' => new ItemResource($item)
        ], 201);
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
    public function update(UpdateItemRequest $request, Item $item)
    {
        $item->update($request->validated());

        return response()->json([
            'message' => 'Item updated successfully',
            'item' => new ItemResource($item)
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        $item->delete();

        return response()->json(['message' => 'Item deleted successfully.'], 200);
    }
}
