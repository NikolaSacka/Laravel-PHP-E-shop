<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductAdd extends Model
{
    protected $table = 'product_adds';
//    protected $guarded = ['id'];
    protected $fillable = ['name', 'description','Path','price'];
}
