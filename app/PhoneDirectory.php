<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhoneDirectory extends Model
{
    protected $table = 'phone_dir';

    protected $fillable = [
        'firstname',
        'lastname',
        'phone',
        'user_id' 
    ]; 

}
