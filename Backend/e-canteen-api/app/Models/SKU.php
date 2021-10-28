<?php

namespace App\Models;

use App\Traits\UuidIndex;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SKU extends Model
{
    use HasFactory, UuidIndex, SoftDeletes;

    protected $table = 'skus';

    public function product(){
        return $this->belongsTo(Product::class);
    }


    protected function getTotalStockAttribute(){
        return $this->product->variants->map(function (ProductVariant $variant){
            return $variant['stock'];
        })->sum();
    }
}
