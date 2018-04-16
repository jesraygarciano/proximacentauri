<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Joining_opening_skill extends Model
{
    protected $table = "joining_opening_skills";

    protected $fillable = ['duration', 'opening_id', 'opening_skill_id', 'created_at', 'updated_at'];
}
