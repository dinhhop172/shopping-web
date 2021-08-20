<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    protected $table = "products";
    protected $guarded = [];

    public function images()
    {
        return $this->hasMany(ProductImage::class, 'product_id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'product_tags', 'product_id', 'tag_id')->withTimestamps();
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    // accessor: dung de dinh dang(format) du lieu khi lay du lieu show ra view
    public function getFullNameAttribute()
    {
        return "{$this->name} {$this->price}";
    }
    // muarator: dung de dinh dang(format) du lieu truoc khi lay luu vao DB
    // public function setNameAttributes($value)
    // {
    //     return $this->attributes['name'] = $value;
    // }

    public function scopeSearch($query)
    {
        if (request()->search) {
            $search = request()->search;
            // $query->where('name', 'LIKE', "%" . $search . "%");
            $query->orWhere('name', 'LIKE', "%" . $search . "%")
                ->orWhere('price', 'LIKE', "%" . $search . "%");
        }
        return $query;
    }
}
