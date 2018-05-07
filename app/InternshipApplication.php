<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class InternshipApplication extends Model
{
    protected $fillable = ['user_id','objectives','school','course','preffered_training_date','batches'];
    private $remark;

    //related to application
    public function user(){
    	return $this->belongsTo(User::class);
    }

    public function skills(){
        return $this->belongsToMany(\App\Resume_skill::class,'application_skills','intership_application_id');
    }

    public function trainingBatch(){
    	return $this->belongsTo(TrainingBatch::class);
    }

    public static function boot(){

        parent::boot();

        static::updating(function($model){
            // detect if seen field has been updated
            if($model->status != $model->getOriginal('status')){}
        });

    }

    public function setRemark($remark){
        $this->remark;
    }
}
