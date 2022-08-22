<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Brand;
use App\Models\ProductImage;
class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $guarded = [];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function images()
    {
        return $this->hasMany(ProductImage::class, 'product_id', 'id');
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
