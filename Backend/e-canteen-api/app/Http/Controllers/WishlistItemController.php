<?php

namespace App\Http\Controllers;

use App\Http\Resources\WishlistItemResource;
use App\Models\WishlistItem;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

class WishlistItemController extends Controller
{

    public function index()
    {
        return WishlistItemResource::collection(
            QueryBuilder::for(WishlistItem::class)
                ->with(['product'])
                ->cursorPaginate()
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WishlistItem  $wishlistItem
     * @return \Illuminate\Http\Response
     */
    public function show(WishlistItem $wishlistItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WishlistItem  $wishlistItem
     * @return \Illuminate\Http\Response
     */
    public function edit(WishlistItem $wishlistItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WishlistItem  $wishlistItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WishlistItem $wishlistItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WishlistItem  $wishlistItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(WishlistItem $wishlistItem)
    {
        //
    }
}
