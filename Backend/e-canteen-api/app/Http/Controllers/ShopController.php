<?php

namespace App\Http\Controllers;

use App\Classes\BaseResponse\BaseResponse;
use App\Http\Requests\StoreShop;
use App\Http\Requests\UpdateShop;
use App\Http\Resources\ShopResource;
use App\Http\Resources\ShowShopResource;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Spatie\QueryBuilder\QueryBuilder;

class ShopController extends Controller
{

    public function index()
    {
        return ShopResource::collection(
            QueryBuilder::for(Shop::class)
                ->with(['user', 'location.building'])
                ->allowedFilters(['name'])
                ->cursorPaginate(10)
        );
    }

    public function store(StoreShop $request)
    {
        BaseResponse::make(Shop::create($request->validated() +[
            'is_open' => false
            ]));
    }


    public function show(Shop $shop)
    {
        $shop->load([
           'products.category',
            'location.building'
        ]);

        return BaseResponse::make(ShowShopResource::make($shop));
    }


    public function update(UpdateShop $request, Shop $shop)
    {
        $shop->update($request->validated() + [
                'slug' => Str::slug($request->get('name')),
            ]);

        return BaseResponse::make($shop->refresh());
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
