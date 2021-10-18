<?php

namespace App\Http\Controllers;

use App\Classes\BaseResponse\BaseResponse;
use App\Http\Requests\StoreCategory;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\ShowCategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Spatie\QueryBuilder\QueryBuilder;

class CategoryController extends Controller
{

    public function index()
    {
        return CategoryResource::collection(
            QueryBuilder::for(Category::class)
                ->allowedSorts(['name'])
                ->cursorPaginate(10),
        );
    }

    public function store(StoreCategory $request)
    {
        BaseResponse::make(Category::create($request->validated()));
    }


    public function show(Category $category)
    {
        $category->load([
            'products.shop'
        ]);

        return BaseResponse::make(ShowCategoryResource::make($category));
    }


    public function update(StoreCategory $request, Category $category)
    {
        $category->update($request->validated() + [
            'slug' => Str::slug($request->get('name')),
            ]);
        return BaseResponse::make($category->refresh());
    }


    public function destroy(Category $category)
    {
        abort_if($category->products()->exists(), 403, 'This Category already have products');
        return BaseResponse::make($category->delete());
    }
}
