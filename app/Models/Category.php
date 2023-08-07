<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'image',
    ];
    public $timestamp= true;
    public function CategoryProduct()
    {
        return $this->hasMany(CategoryProduct::class, 'categoryId');
    }
    public function products()
    {
        return $this->belongsToMany(Product::class, 'category_products', 'categoryId', 'productId');
    }
}
