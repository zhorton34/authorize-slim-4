<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = [
        'email', 'first_name', 'last_name'
    ];

    protected $guarded = [
        'password'
    ];
}
