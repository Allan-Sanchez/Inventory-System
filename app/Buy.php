<?php

namespace App;

use App\State;
use Illuminate\Database\Eloquent\Model;

class Buy extends Model
{
    
    public function state()
    {
        return $this->belongsTo(State::class);
    }
}
