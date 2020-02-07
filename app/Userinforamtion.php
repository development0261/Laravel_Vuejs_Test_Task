<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Userinforamtion extends Model
{
     protected $fillable = [
        'name', 'email','phone_number', 'zip_code','address'
    ];
    
    public static $createRules = [
        'name' => 'required',
        'email' => 'required|email|unique:userinforamtions',
        'phone_number' => 'required',
        'zip_code' => 'required|digits:5',
        'address' => 'required',
        'photo' => 'required',
        /*'photo.*' => 'image|mimes:jpeg,jpg,png,gif',*/
    ];
}
