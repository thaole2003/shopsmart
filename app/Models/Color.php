<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];
    public $timestamp= true;
    public function productDetails()
    {
        return $this->hasMany(ProductDetail::class, 'colorId');
    }
}
