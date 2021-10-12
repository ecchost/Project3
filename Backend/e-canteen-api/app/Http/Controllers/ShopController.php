<?php

namespace App\Http\Controllers;

use App\Classes\BaseResponse\BaseResponse;
use App\Http\Resources\ShopResource;
use App\Http\Resources\ShowShopResource;
use App\Models\Shop;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

class ShopController extends Controller
{

    public function index()
    {
        return ShopResource::collection(
            QueryBuilder::for(Shop::class)
                ->with('user')
                ->allowedFilters(['name'])
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


    public function show(Shop $shop)
    {
        $shop->load([
           'products.category'
        ]);

        return BaseResponse::make(ShowShopResource::make($shop));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function edit(Shop $shop)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shop $shop)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shop $shop)
    {
        //
    }
}
