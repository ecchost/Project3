<?php

namespace App\Http\Controllers;

use App\Classes\BaseResponse\BaseResponse;
use App\Http\Requests\StoreShop;
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
                ->with(['user', 'location'])
                ->allowedFilters(['name'])
                ->cursorPaginate(10)
        );
    }

    public function store(StoreShop $request)
    {
        BaseResponse::make($request->validated());
    }


    public function show(Shop $shop)
    {
        $shop->load([
           'products.category'
        ]);

        return BaseResponse::make(ShowShopResource::make($shop));
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
