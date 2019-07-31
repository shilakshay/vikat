<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    //
    protected $fillable = [
        'name', 'email', 'password'
    ];

    protected $hidden = [
        'password'
    ];

    public function verify(){
        return $this->hasMany('App\VerifyAdmin');
    }

    public function password_verify()
    {
        return $this->hasMany('App\PasswordChange');
    }
}
