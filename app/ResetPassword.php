<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResetPassword extends Model
{
    protected $fillable = [
       'key',
       'user_id'
    ];

    protected $guarded = [
        // guarded attributes
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
