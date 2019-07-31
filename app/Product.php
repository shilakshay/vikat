<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $fillable = [
        'name',
        'desc',
        'price',
        'type'
    ];

    //
    public function slider()
    {
        return $this->hasMany('App\Slider');
    }

    public function images()
    {
        return $this->hasMany('App\ProductImages');
    }
}
