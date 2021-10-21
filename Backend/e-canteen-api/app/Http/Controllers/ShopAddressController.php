<?php

namespace App\Http\Controllers;

use App\Http\Resources\ShopAddressResource;
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
     * @param  \App\Models\ShopAddress  $shopAddress
     * @return \Illuminate\Http\Response
     */
    public function show(ShopAddress $shopAddress)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ShopAddress  $shopAddress
     * @return \Illuminate\Http\Response
     */
    public function edit(ShopAddress $shopAddress)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ShopAddress  $shopAddress
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ShopAddress $shopAddress)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ShopAddress  $shopAddress
     * @return \Illuminate\Http\Response
     */
    public function destroy(ShopAddress $shopAddress)
    {
        //
    }
}
