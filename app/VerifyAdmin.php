<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VerifyAdmin extends Model
{
    //

    protected $fillable = [
        'token',
        'admin_id'
    ];

    public function admin(){
        return $this->hasOne('App\Admin');
    }
}
