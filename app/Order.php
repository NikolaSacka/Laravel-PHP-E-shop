<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'product_id', 'user_id', 'quantity', 'address'
    ];

//    public static function create(array $array)
//    {
//    }

    public function user()
    {
        return $this->belongsTo(User::class, 'name');
    }

    public function product()
    {
        return $this->belongsTo(ProductAdd::class, 'name');
    }

}
