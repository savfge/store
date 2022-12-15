<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];
    public function color()
    {
        return $this->belongsTo(Color::class);
    }
    public static function colorcount($color_id)
    {
        $colorcount = Product::where('color_id',$color_id)->count();
        return $colorcount;
    }
    public function size()
    {
        return $this->belongsTo(Size::class);
    }
    public static function countsize($size_id)
    {
        $countsize = Product::where('size_id',$size_id)->count();
        return $countsize;
    }
    public function stock()
    {
        return $this->belongsTo(Stock::class);
    }
    public static function countstock($stock_id)
    {
        $countstock = Product::where('stock_id',$stock_id)->count();
        return $countstock;
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public static function countcategory($category_id)
    {
        $countcategory = Product::where('category_id',$category_id)->count();
        return $countcategory;
    }
    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class);
    }
    public static function countsubcategory($subcategory_id)
    {
        $countsubcategorry = Product::where('subcategory_id',$subcategory_id)->count();
        return $countsubcategorry;
    }

    public function review()
    {
        return $this->hasMany(Review::class,'prodect_id');
    }
    public function prodectattr()
    {
        return $this->hasMany(Prodectatrbite::class);
    }
}
