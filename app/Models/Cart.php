<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'userId',
        'detailId',
        'price'
    ];
    public function productDetail()
    {
        return $this->belongsTo(ProductDetail::class, 'detailId');
    }
}
