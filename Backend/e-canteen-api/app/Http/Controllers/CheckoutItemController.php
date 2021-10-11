<?php

namespace App\Http\Controllers;

use App\Http\Resources\CheckoutItemResource;
use App\Models\CheckoutItem;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

class CheckoutItemController extends Controller
{

    public function index()
    {
        return CheckoutItemResource::collection(
            QueryBuilder::for(CheckoutItem::class)
                ->allowedSorts(['item_quantity'])
                ->cursorPaginate(10)
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
     * @param  \App\Models\CheckoutItem  $checkoutItem
     * @return \Illuminate\Http\Response
     */
    public function show(CheckoutItem $checkoutItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CheckoutItem  $checkoutItem
     * @return \Illuminate\Http\Response
     */
    public function edit(CheckoutItem $checkoutItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CheckoutItem  $checkoutItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CheckoutItem $checkoutItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CheckoutItem  $checkoutItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(CheckoutItem $checkoutItem)
    {
        //
    }
}
