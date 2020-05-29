<?php

namespace App;

use App\Inventory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = ['name', 'nameManager', 'address'];   

    public function inventory()
    {
        return $this->hasMany(Inventory::class);
    }
}
