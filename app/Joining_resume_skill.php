<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Joining_resume_skill extends Model
{
    protected $table = "joining_resume_skills";

    protected $fillable = ['duration', 'resume_id', 'resume_skill_id', 'created_at', 'updated_at'];
}
