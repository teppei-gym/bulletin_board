<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    protected $fillable = [
        'user_id', 'post_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
