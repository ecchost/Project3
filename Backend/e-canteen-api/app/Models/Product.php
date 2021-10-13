<?php

namespace App\Models;

use App\Traits\UuidIndex;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory, UuidIndex;

    public function category(){
        return $this->belongsTo(Category::class);
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
