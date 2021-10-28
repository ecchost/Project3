<?php

namespace App\Models;

use App\Traits\UuidIndex;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variant extends Model
{
    use HasFactory, UuidIndex;

    public function products(){
        return $this->hasMany(ProductVariant::class, 'variant_id');
    }
}
