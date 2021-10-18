<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Kalnoy\Nestedset\NodeTrait;

class Category extends Model
{
    use HasFactory, NodeTrait;

    protected $fillable = [
        'name', 'image', '_lft', '_rgt', 'parent_id', 'slug'];

    public function products(){
        return $this->hasMany(Product::class, 'category_id');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function (Model $model){
            $slug = Str::slug($model['name']);
            $model['slug'] = $slug;
        });
    }
}
