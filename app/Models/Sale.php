<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;
    protected $fillable = [
        "productId","discount","start_date","end_date"
    ];
    public $timestamp= true;
    public function product()
    {
        return $this->belongsTo(Product::class, 'productId');
    }


}
