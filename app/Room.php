<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    // retrieve user - (user + _id) - one to one (Defining The Inverse Of The Relationship)
    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
