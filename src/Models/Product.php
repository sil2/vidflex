<?php

namespace Sil2\Vidflex\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;



     public function type()
    {
        return $this->belongsTo(ProductType::class,'type_id');
    }

     public function category()
    {
        return $this->belongsTo(ProductCategory::class,'category_id');
    }

    public function attributes()
    {
        return $this->hasMany(ProductAttribute::class,'product_id');
    }
}
