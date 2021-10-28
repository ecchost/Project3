<?php

namespace Database\Seeders;

use App\Models\Building;
use App\Models\Category;
use App\Models\Checkout;
use App\Models\CheckoutItem;
use App\Models\Payment;
use App\Models\PaymentMethod;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\Review;
use App\Models\selling_plan;
use App\Models\SellingPlan;
use App\Models\Shop;
use App\Models\ShopAddress;
use App\Models\SKU;
use App\Models\User;
use App\Models\Variant;
use App\Models\Wishlist;
use App\Models\WishlistItem;
use Illuminate\Database\Seeder;

class DummySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::factory(10)->create();
        Building::factory(8)
            ->has(ShopAddress::factory(1),'addresses')->create();

        User::factory(3)
            ->has(Shop::factory(1)
                ->has(Product::factory(random_int(5,10))
                    ->has(ProductVariant::factory(random_int(1,5)),'variants')
                    ->has(SKU::factory(1),'skus')
                    ->has(SellingPlan::factory(random_int(1,3)),'sellPlans'),'products'),'shops')
            ->create();

        User::factory(5)
            ->has(Wishlist::factory(1)
                ->has(WishlistItem::factory(random_int(1,3)),'items'),'wishlist')
            ->has(Checkout::factory(random_int(1,5))
                ->has(CheckoutItem::factory(1),'items'),'checkout')
            ->create();

        Review::factory(30)->create();

        PaymentMethod::factory(10)
            ->has(Payment::factory(random_int(1,10)),'payments')
            ->create();
    }
}
