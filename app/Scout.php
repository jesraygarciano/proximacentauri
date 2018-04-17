<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Scout extends Model
{
    
    protected $fillable = ['description', 'is_active', 'company_id','user_id','created_at', 'updated_at'];

    protected $appends = ['scouted_date'];

    //related to application
    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    //related to application
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function getScoutedDateAttribute(){
        return date('M. d, Y',strtotime($this->attributes['created_at']));
    }

    public static function boot()
    {
        parent::boot();

        static::created(function($model)
        {
            event(new \App\Events\NotificationEvent(
                [
                    'type'=>'scout',
                    'event'=>'created',
                    'user_id'=>$model->user_id
                ]
            ));
        });

        static::updating(function($model){

            // detect if seen field has been updated
            if($model->seen != $model->getOriginal('seen')){
                event(new \App\Events\NotificationEvent(
                [
                    'type'=>'scout',
                    'event'=>'seen',
                    'user_id'=>$model->user_id
                ]
            ));
            }

        });
    }

}
