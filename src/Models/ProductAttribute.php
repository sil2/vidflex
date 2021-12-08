<?php

namespace Sil2\Vidflex\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{
    use HasFactory;


    public function product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }
}
