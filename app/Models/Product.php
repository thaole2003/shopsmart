<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'sku',
        'describe',
        'image',
        'price',
    ];
    protected $timestamp = true;

    public function images()
    {
        return $this->hasMany(Image::class, 'productId');
    }
    public function productDetails()
    {
        return $this->hasMany(ProductDetail::class, 'productId');
    }
    public function CategoryProduct()
    {
        return $this->hasMany(CategoryProduct::class, 'productId');
    }
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_products', 'productId', 'categoryId');
    }
    public function details()
    {
        return $this->hasMany(ProductDetail::class, 'productId');
    }
    public function sale()
    {
        return $this->hasOne(Sale::class, 'productId');
    }
}
