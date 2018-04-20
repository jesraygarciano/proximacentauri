<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Application extends Model
{

    protected $fillable = ['description', 'is_active', 'user_id','opening_id','resume_id','created_at', 'updated_at', 'from_available_time', 'to_available_time', 'expected_salary', 'salary_from', 'salary_to'];

    protected $appends = ['submitted_date'];

    //related to application
    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function getSubmittedDateAttribute(){
        return date('M. d, Y',strtotime($this->attributes['created_at']));
    }

    //related to application
    public function opening()
    {
        return $this->belongsTo(Opening::class);
    }

    public function resume()
    {
        // return $this->hasOne(Application::class, 'resume_id');
        return $this->belongsTo(Resume::class);
    }

    //for using "DB::table", changed to static method
    public static function applied_application_openings($user_id)
    {
        $applied_application_openings = DB::table('applications as a')
            ->select('a.id', 'a.created_at', 'o.title', 'o.id as opening_id', 'o.details', 'o.address1')
            ->join('openings as o', 'a.opening_id', '=', 'o.id')
            ->where('a.user_id', $user_id)
            ->orderBy('created_at', 'desc')
            ->get();
        return $applied_application_openings;
    }

    public static function boot()
    {
        parent::boot();

        static::created(function($model)
        {

            $receiver = $model->opening->company->user;

            event(new \App\Events\NotificationEvent(
                [
                    'type'=>'application',
                    'event'=>'created',
                    'user_id'=>$receiver->id
                ]
            ));
        });


        static::updating(function($model){
            $receiver = $model->opening->company->user;
            // detect if seen field has been updated
            if($model->seen != $model->getOriginal('seen')){
                event(new \App\Events\NotificationEvent(
                [
                    'type'=>'application',
                    'event'=>'seen',
                    'user_id'=>$receiver->id
                ]
            ));
            }

        });
    }
}
