<?php

namespace App\Http\Controllers;

use App\Classes\BaseResponse\BaseResponse;
use App\Http\Requests\StoreBuilding;
use App\Http\Resources\BuildingResource;
use App\Http\Resources\ShowShopBasedOnBuilding;
use App\Models\Building;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

class BuildingController extends Controller
{

    public function index()
    {
        return BuildingResource::collection(
            QueryBuilder::for(Building::class)
                ->allowedSorts('name')
                ->cursorPaginate()
        );
    }


    public function store(StoreBuilding $request)
    {
        BaseResponse::make(Building::create($request->validated()));
    }


    public function update(StoreBuilding $request, Building $building)
    {
        $building->update($request->validated());

        return BaseResponse::make($building->refresh());
    }

    public function show(Building $building){
        $building->load([
            'addresses',
            'addresses.shops'
        ]);

        return BaseResponse::make(ShowShopBasedOnBuilding::make($building));
    }


    public function destroy(Building $building)
    {
        abort_if($building->addresses()->exists(), 403, 'This building already have included in shop location');
        return BaseResponse::make($building->delete());
    }
}
