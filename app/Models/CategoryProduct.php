<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryProduct extends Model
{
    use HasFactory;
    public function category()
    {
        return $this->belongsTo(Category::class, 'categoryId');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'productId');
    }
}
