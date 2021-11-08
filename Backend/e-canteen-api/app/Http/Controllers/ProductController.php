<?php

namespace App\Http\Controllers;

use App\Classes\BaseResponse\BaseResponse;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ShowProductResource;
use App\Models\Product;
use App\Models\Shop;
use App\Models\SKU;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Spatie\QueryBuilder\QueryBuilder;

class ProductController extends Controller
{

    public function index()
    {
        return ProductResource::collection(
            QueryBuilder::for(Product::class)
                ->with(['category','shop', 'variants.variant', 'sellPlans', 'skus'])
                ->allowedFilters(['price','stock','availability'])
                ->Paginate(10)
        );
    }

    public function product(Shop $shop, Request $request){
        abort_if($shop['user_id'] !== auth()->id(),403, 'Only Shop Keeper have this access');

        $validated =  $request->validate([
           'category_id' => 'required|exists:categories,id',
           'name' => 'required|unique:products,name',
            'image' => 'nullable',
            'description' => 'nullable'
        ]);

        $product = Product::create($validated +
            ['shop_id' => $shop->id,
            ]);


        BaseResponse::make($product);

        $lastID = $product->id;

        BaseResponse::make(SKU::create([
            'product_id' => $lastID,
            'default_sku' => 1,
            'minimum_order' => $request->get('minimum_order'),
            'stock' => $request->get('stock'),
            'price' => $request->get('price'),
            'is_available' => $request->get('is_available'),
        ]));

    }


    public function show(Product $product)
    {
        $product->load([
            'category',
            'shop',
            'reviews.user',
            'variants.variant',
            'sellPlans',
            'skus'
        ]);

        return BaseResponse::make(ShowProductResource::make($product));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shop $shop,  Product $product, SKU $sku)
    {
        abort_if($shop['user_id'] !== auth()->id(),403, 'Only Shop Keeper have this access');

        $validated =  $request->validate([
            'category_id' => 'nullable|exists:categories,id',
            'name' => 'nullable|unique:products,name',
            'image' => 'nullable',
            'description' => 'nullable'
        ]);

        $product->update($validated + [
                'slug' => Str::slug($request->get('name')),
            ]);

        $sku->update([
            'minimum_order' => $request->get('minimum_order'),
            'stock' => $request->get('stock'),
            'price' => $request->get('price'),
            'is_available' => $request->get('is_available'),
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
