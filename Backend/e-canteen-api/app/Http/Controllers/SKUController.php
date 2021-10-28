<?php

namespace App\Http\Controllers;

use App\Http\Resources\SKUResource;
use App\Models\SKU;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

class SKUController extends Controller
{
    public function index()
    {
        return SKUResource::collection(
            QueryBuilder::for(SKU::class)
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
     * @param  \App\Models\SKU  $sKU
     * @return \Illuminate\Http\Response
     */
    public function show(SKU $sKU)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SKU  $sKU
     * @return \Illuminate\Http\Response
     */
    public function edit(SKU $sKU)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SKU  $sKU
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SKU $sKU)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SKU  $sKU
     * @return \Illuminate\Http\Response
     */
    public function destroy(SKU $sKU)
    {
        //
    }
}
