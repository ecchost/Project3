<?php

namespace App\Http\Controllers;

use App\Classes\BaseResponse\BaseResponse;
use App\Http\Resources\CheckoutResource;
use App\Models\Checkout;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

class CheckoutController extends Controller
{

    public function index()
    {
        return CheckoutResource::collection(
            QueryBuilder::for(Checkout::class)
                ->with(['items'])
                ->allowedSorts(['accepted_at', 'cancelled_at', 'confirmed_at'])
                ->allowedFilters(['order_status'])
                ->cursorPaginate(15)
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

    }


    public function show(Checkout $checkout)
    {
        $checkout->load([
            'user',
            'items.product.shop'
        ]);

        return BaseResponse::make(CheckoutResource::make($checkout));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function edit(Checkout $checkout)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Checkout $checkout)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function destroy(Checkout $checkout)
    {
        //
    }
}
