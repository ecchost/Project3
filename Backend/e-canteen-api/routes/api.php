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
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ShopAddressController;
use App\Http\Controllers\BuildingController;

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
Route::post('login', [AuthController::class, 'login']);


Route::get('payment', [PaymentController::class, 'index']);
Route::get('checkout-item', [CheckoutItemController::class, 'index']);
Route::get('payment_method', [PaymentMethodController::class, 'index']);
Route::get('wishlist', [WishlistItemController::class, 'index']);
Route::get('wishlist-item', [WishlistController::class,'index']);
Route::get('reviews', [ReviewController::class, 'index']);
Route::get('shop-location', [ShopAddressController::class, 'index']);
Route::get('building', [BuildingController::class, 'index']);

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

Route::apiResource('checkout', CheckoutController::class)
    ->only([
        'index', 'show'
]);

Route::apiResource('wishlist', WishlistController::class)
    ->only([
        'index', 'show'
    ]);

Route::apiResource('product', ProductController::class)
    ->only([
        'index', 'show'
    ])
    ->scoped([
        'product' => 'slug'
    ]);





Route::group(['middleware' => ['auth:sanctum', 'roleLevel:admin']], function () {
//    Route::post('category', [CategoryController::class, 'store']);
    Route::apiResource('category', CategoryController::class)->only([
        'store', 'update', 'destroy'
    ]);
});


Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('logout', [AuthController::class, 'logout']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
