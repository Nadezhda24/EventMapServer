<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model{
    protected $table = "event";
    public  $timestamps = false;
    protected $fillable = [
        'adress_id',
        'category_id',
        'date',
        'description',
        'id',
        'image',
        'name',
        'user_id'
    ];
}
