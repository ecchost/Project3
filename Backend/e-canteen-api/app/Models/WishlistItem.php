<?php

namespace App\Models;

use App\Traits\UuidIndex;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WishlistItem extends Model
{
    use HasFactory, UuidIndex;

    public function wishlist(){
        return $this->belongsTo(Wishlist::class);
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
