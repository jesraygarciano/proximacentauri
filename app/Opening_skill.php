<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Opening_skill extends Model
{
    protected $table = "opening_skills";

    public function belong_to_resume()
    {
        return $this->belongsToMany('App\Opening', 'joining_opening_skills', 'opening_skill_id', 'opening_id');
    }

    public function openings(){
    	return $this->belongsToMany('App\Opening', 'joining_opening_skills', 'opening_skill_id', 'opening_id');
    }
}
