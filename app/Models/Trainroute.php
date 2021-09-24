<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trainroute extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function departures()
    {
        return $this->hasOne(Station::class,'id','departure_id');
    }

    public function arrivals()
    {
        return $this->hasOne(Station::class,'id','arrival_id');
    }

    public function vias()
    {
        return $this->hasOne(Station::class,'id','via_id');
    }

}
