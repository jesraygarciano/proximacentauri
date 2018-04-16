<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OpeningNotification extends Model
{
	protected $fillable = ['opening_id','user_id','company_id'];

    public function user(){
    	return $this->belongsTo('\App\User');
    }

    public function opening(){
    	return $this->belongsTo('\App\Opening');
    }

    public function company(){
    	return $this->belongsTo('\App\Company');
    }

    public static function boot()
    {
        parent::boot();

        static::updating(function($model){

            // detect if seen field has been updated
            if($model->seen != $model->getOriginal('seen')){
                event(new \App\Events\NotificationEvent(
                    [
                        'type'=>'new opening',
                        'event'=>'seen',
                        'user_id'=>$model->user_id
                    ]
                ));
            }

        });
    }
}
