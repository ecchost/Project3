<?php

namespace App\Models;

use App\Traits\UuidIndex;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
