<?php

namespace App\Models;

use App\Traits\UuidIndex;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory, UuidIndex;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public  function items(){
        return $this->hasMany(WishlistItem::class);
    }
}
