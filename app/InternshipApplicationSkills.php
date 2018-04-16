<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class InternshipApplicationSkills extends Model
{
	protected $fillable = ['intership_application_id','resume_skill_id'];

    protected $appends = ['submitted_date'];


    //related to application
    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
