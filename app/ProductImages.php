<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImages extends Model
{
    //

    protected $fillable = [
        'name',
        'url',
        'product_id'
    ];

    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
