<?php

namespace App;


use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{

    public function sods()
        {
            return $this->hasMany('App\Sods');
        }

        public function isAdmin()
        {
            return $this->type=='Admin' ? true : false; // this looks for an admin column in your users table
        }
    
}
