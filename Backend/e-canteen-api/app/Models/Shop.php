<?php

namespace App\Models;

use App\Traits\UuidIndex;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Shop extends Model
{
    use HasFactory, UuidIndex;

    protected $table = 'shops';

    protected $fillable = [
        'user_id', 'location_id', 'name', 'slug', 'image' , 'is_open'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function products(){
        return $this->hasMany(Product::class);
    }

    public function location(){
        return $this->belongsTo(ShopAddress::class, 'location_id');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function (Model $model){
            $slug = Str::slug($model['name']);
            $model['slug'] = $slug;
        });
    }

    protected function getFoodCategoryAttribute(){
        $category = $this->products->map(function (Product $product){
            return $product->category['name'];
        });

        $flattened = $category->unique()->values()->all();
        return $flattened;
    }

    protected function getRatingCountAttribute(){
        return $this->products->map(function (Product $product){
            return $product['total_ratings']->count();
        });
    }

    protected function getShopRatingAttribute(){
        return $this->products->map(function (Product $product){
            return $product['total_ratings']->sum();
        });
    }

}
