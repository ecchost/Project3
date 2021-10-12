<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\CheckoutItemController;
use App\Http\Controllers\PaymentMethodController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\WishlistItemController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('checkout', [CheckoutController::class, 'index']);
Route::get('payment', [PaymentController::class, 'index']);
Route::get('checkout-item', [CheckoutItemController::class, 'index']);
Route::get('payment_method', [PaymentMethodController::class, 'index']);
Route::get('product', [ProductController::class, 'index']);
Route::get('wishlist', [WishlistItemController::class, 'index']);
Route::get('wishlist-item', [WishlistController::class,'index']);

Route::apiResource('category', CategoryController::class)
    ->only([
        'index', 'show'
    ])
    ->scoped([
        'category' => 'slug'
    ]);

Route::apiResource('shop', ShopController::class)
    ->only([
    'index', 'show'
])
    ->scoped([
    'shop' => 'slug'
]);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
