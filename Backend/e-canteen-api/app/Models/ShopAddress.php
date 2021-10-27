<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopAddress extends Model
{
    use HasFactory;

//    protected $table = 'shop_addresses';

    protected $fillable = [
        'building_id', 'floor', 'specific_location'
    ];

//    protected $primaryKey = 'id';

    public function building(){
        return $this->belongsTo(Building::class);
    }

    public function shops(){
        return $this->hasMany(Shop::class,'location_id');
    }
}
