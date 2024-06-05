<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use \App\Notification;

class InternshipApplication extends Model
{
    protected $fillable = ['user_id','objectives','school','course','training_batch_id'];

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
            if($model->status != $model->getOriginal('status')){

                $notification = Notification::create([
                    'author_id'=>\Auth::user()->id,
                    'recipient_id'=>$model->user_id,
                    'status'=>'unseen',
                    'explanation'=>$model->remark,
                    'meta_data'=>json_encode(['type'=>'itp_app','app_id'=>$model->id])
                ]);

                $notification->internshipApplication = $model->load('trainingBatch');

                event(new \App\Events\NotificationEvent(
                    [
                        'type'=>'internship_application_status',
                        'event'=>$model->status,
                        'notification'=>$notification,
                        'user_id'=>$model->user_id
                    ]
                ));
                
            }
        });

    }
}
