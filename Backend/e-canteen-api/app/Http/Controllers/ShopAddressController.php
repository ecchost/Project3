<?php

namespace App\Http\Controllers;

use App\Classes\BaseResponse\BaseResponse;
use App\Http\Requests\StoreShopAddress;
use App\Http\Resources\ShopAddressResource;
use App\Http\Resources\ShowShopLocation;
use App\Models\ShopAddress;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

class ShopAddressController extends Controller
{

    public function index()
    {
        return ShopAddressResource::collection(
            QueryBuilder::for(ShopAddress::class)
                ->with('building')
                ->allowedSorts(['floor'])
                ->allowedFilters(['floor'])
                ->cursorPaginate(10)
        );
    }


    public function store(StoreShopAddress $request)
    {
        BaseResponse::make(ShopAddress::create($this->validated()));
    }


    public function show(ShopAddress $shopAddress){
        $shopAddress->load([
            'shops'
        ]);

        return BaseResponse::make(ShowShopLocation::make($shopAddress));
    }


    public function update(StoreShopAddress $request, ShopAddress $shopAddress)
    {
        $shopAddress->update($request->validated());

        return BaseResponse::make($shopAddress->refresh());
    }

    public function destroy(ShopAddress $shopAddress)
    {
        abort_if($shopAddress->shops()->exists(), 403, 'This Location Detail Already Have Shops/Canteen');
        return BaseResponse::make($shopAddress->delete());
    }
}
