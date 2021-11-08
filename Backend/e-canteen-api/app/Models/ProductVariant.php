<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{
    use HasFactory;

    protected $fillable = [
      'product_id' , 'variant_id', 'price', 'stock', 'value'
    ];

    public function variant(){
        return $this->belongsTo(Variant::class, 'variant_id');
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }

}
