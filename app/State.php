<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $fillable = ['state', 'description']; 

    public function buy()
    {
        return $this->hasMany(Buy::class);
    }

    public function inventory()
    {
        return $this->hasMany(Inventory::class);
    }

}
