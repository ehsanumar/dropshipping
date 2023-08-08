<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable=[
        'id',
        'title',
        'description',
        'price',
        'quantity',
        'category_id',
        'brand_id',
        'image',
        'user_id',
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function comments(){
        return $this->hasMany(Comments::class);
    }
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'product_categories', 'product_id', 'category_id');
    }
    public function brands()
    {
        return $this->belongsToMany(Brand::class, 'product_categories', 'product_id', 'brand_id');
    }
    public function add(){
        return $this->belongsToMany(AddToCadfav::class, 'add_to_cadfavs' , 'product_id' ,'user_id');
    }
}
