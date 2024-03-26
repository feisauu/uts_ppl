<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    public function contacts(){
        return $this->hasMany(Contact::class);
    }

    protected $fillable = ['name', 'username', 'password'];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
