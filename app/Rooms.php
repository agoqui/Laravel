<?php

namespace FormationLaravel;

use Illuminate\Database\Eloquent\Model;

class Rooms extends Model
{
    //
    protected $table = 'rooms';
    protected $fillable = ['name', 'address'];
}
