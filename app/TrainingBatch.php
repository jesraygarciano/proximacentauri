<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TrainingBatch extends Model
{
	protected $fillable = ['name', 'start_date', 'end_date', 'regitration_deadline', 'schedule', 'description', 'author_id'];

    protected $appends = ['startdate','regitrationdeadline'];


    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function internshipApplication(){
    	return $this->hasMany(InternshipApplication::class);
    }

    public function getStartdateAttribute(){
    	return date('M. d, Y',strtotime($this->attributes['start_date']));
    }

    public function getRegitrationdeadlineAttribute(){
        return date('M. d, Y',strtotime($this->attributes['regitration_deadline']));
    }

    public function scopeIsActive($query){
        return $query->where('is_active', 1);
    }
}
