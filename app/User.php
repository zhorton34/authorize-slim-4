<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = [
        'email',
        'last_name',
        'first_name',
        'team_id'
    ];

    protected $guarded = [
        'password'
    ];
}
