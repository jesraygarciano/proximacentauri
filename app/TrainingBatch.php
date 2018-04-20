<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TrainingBatch extends Model
{
	protected $fillable = ['name', 'start_date', 'end_date', 'regitration_deadline', 'schedule', 'description', 'author_id'];

    //related to application
    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function internshipApplication(){
    	return $this->hasMany(InternshipApplication::class);
    }
}
