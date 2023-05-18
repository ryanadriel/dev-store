<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $fillable = [
        "sku",
        "name",
        "productType_id",
        "price",
        "description",
        "size_mb",
        "weight_kg",
        "dimensions",
        "deleted_at"
    ];

    public function products(){
        return $this->belongsTo(ProductType::class)->where('deleted_at', '=', null);
    }

}
