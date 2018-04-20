<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Intern extends Model
{

    protected $fillable = ['email', 'password', 'nickname', 'picture', 'is_active', 'created_at', 'updated_at'];

}
