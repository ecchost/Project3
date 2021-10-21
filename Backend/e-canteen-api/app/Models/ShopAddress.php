<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopAddress extends Model
{
    use HasFactory;

    public function building(){
        return $this->belongsTo(Building::class);
    }

    public function shops(){
        return $this->hasMany(Shop::class,'location_id');
    }
}
