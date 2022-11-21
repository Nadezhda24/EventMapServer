<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model{
    protected $table = "user";
    public  $timestamps = false;
    protected $fillable = [
        'id',
        'first_name',
        'last_name',
        'middle_name',
        'mail',
        'role',
        'password'
    ];
}
