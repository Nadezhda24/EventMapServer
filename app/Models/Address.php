<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model{
    protected $table = "adress";
    public  $timestamps = false;
    protected $fillable = [
        'id',
        'lat',
        'lon'
    ];
}
