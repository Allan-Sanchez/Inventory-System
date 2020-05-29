<?php

namespace App;

use App\State;
use App\Location;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    //
    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }
}
