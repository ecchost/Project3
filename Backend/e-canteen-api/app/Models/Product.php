<?php

namespace App\Models;

use App\Traits\UuidIndex;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory, UuidIndex;

    protected $fillable = [
        'category_id', 'name', 'shop_id' , 'slug', 'image', 'description'
    ];

    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function shop(){
        return $this->belongsTo(Shop::class);
    }

    public function wishlist(){
        return $this->hasMany(WishlistItem::class);
    }

    public function checkouts(){
        return $this->hasMany(CheckoutItem::class);
    }

    public function reviews(){
        return $this->hasMany(Review::class);
    }

    public function variants(){
        return $this->hasMany(ProductVariant::class);
    }

    public function skus(){
        return $this->hasMany(SKU::class);
    }

    public function sellPlans(){
        return $this->hasMany(SellingPlan::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function (Model $model){
            $slug = Str::slug($model['name']);
            $model['slug'] = $slug;
        });
    }

    protected function getTotalRatingsAttribute(){
        return $this->reviews->map(function (Review $review){
            return $review['ratings'];
        });
    }
}
