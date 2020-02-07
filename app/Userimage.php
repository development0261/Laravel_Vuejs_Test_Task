<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Userimage extends Model
{
     protected $fillable = [
        'image', 'user_id'
    ];
    public static $createRules = [
        'photo' => 'required'
    ];
}
