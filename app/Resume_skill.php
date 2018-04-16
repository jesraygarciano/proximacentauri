<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resume_skill extends Model
{
    public function belong_to_resume()
    {
        return $this->belongsToMany('App\Resume', 'joining_resume_skills', 'resume_skill_id', 'resume_id');
    }
}
