<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $fillable = [
        'url',
        'productId',
    ];
    public function product()
    {
        return $this->belongsTo(Product::class, 'productId');
    }
}
