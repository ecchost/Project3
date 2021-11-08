<?php

namespace App\Http\Controllers;

use App\Classes\BaseResponse\BaseResponse;
use App\Http\Resources\ProductVariantResource;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\Shop;
use App\Models\SKU;
use App\Models\Variant;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

class ProductVariantController extends Controller
{
    public function variant(Request $request, Shop $shop, Product $product){
        abort_if($product->shop['user_id'] !== auth()->id(),403, 'Only Shop Keeper have this access');

        $validated =  $request->validate([
            'variant_id' => 'required|exists:variants,id',
            'value' => 'required'
        ]);



        BaseResponse::make(ProductVariant::create(
            ['product_id' => $product->id,
            ] + $validated
        ));

        BaseResponse::make(SKU::create([
            'product_id' => $product->id,
            'default_sku' => 0,
            'minimum_order' => $request->get('minimum_order'),
            'stock' => $request->get('stock'),
            'price' => $request->get('price'),
            'is_available' => $request->get('is_available'),
        ]));
    }

    public function index()
    {
        return ProductVariantResource::collection(
            QueryBuilder::for(ProductVariant::class)
                ->with(['variant', 'product'])
                ->paginate(10)
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
     * @param  \App\Models\ProductVariant  $productVariant
     * @return \Illuminate\Http\Response
     */
    public function show(ProductVariant $productVariant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductVariant  $productVariant
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductVariant $productVariant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductVariant  $productVariant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductVariant $productVariant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductVariant  $productVariant
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductVariant $productVariant)
    {
        //
    }
}
