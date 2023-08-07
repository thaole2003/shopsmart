<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        "productId","colorId","status"];
    public function color()
    {
        return $this->belongsTo(Color::class, 'colorId');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'productId');
    }
}
