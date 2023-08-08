<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;
    protected $fillable=['user_id' , 'product_id' , 'comment'];
    public function product(){
        return  $this->belongsTo(Products::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
