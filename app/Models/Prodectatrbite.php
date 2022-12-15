<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodectatrbite extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function size()
    {
        return $this->belongsTo(Size::class);
    }
    public function color()
    {
        return $this->belongsTo(Color::class);
    }
    public function prodect()
    {
        return $this->belongsTo(Product::class);
    }
}
