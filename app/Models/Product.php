<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Tất cả các field đều được insert nghĩa là ko chặn thằng nào
    protected $guarded = [];

    public function images()
    {
        // Nếu không truyền vào thì nó sẽ lấy tên class và tự thêm classModel_id
        return $this->hasMany(ProductImage::class, 'product_id', 'id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'product_tags', 'product_id', 'tag_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}