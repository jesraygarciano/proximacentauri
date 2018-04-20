<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Opening extends Model
{

    protected $fillable = ['title', 'company_id', 'address', 'picture', 'icon', 'details', 'requirements', 'term', 'other', 'created_at', 'updated_at'];

    protected $appends = ['salary_range_words'];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    //related to application
    public function users()
    {
        return $this->belongsToMany(User::class, 'applications', 'opening_id', 'user_id');
    }

    public function users_that_bookmarked()
    {
        return $this->belongsToMany(User::class, 'save_openings', 'opening_id', 'user_id');
    }

    public function bookmark_count()
    {
        return $this->users_that_bookmarked()->count();
    }

    public function register_skill($opening_skill_ids)
    {
        $existing_skills = $this->skill_requirements()->pluck('opening_skills.id')->toArray();

        foreach ($opening_skill_ids as $opening_skill_id) {
            if(!in_array($opening_skill_id, $existing_skills))
            {
                $this->has_skill()->attach($opening_skill_id);
            }
        }
        return true;
    }

    public function has_skill()
    {
        return $this->belongsToMany('App\Opening_skill', 'joining_opening_skills', 'opening_id', 'opening_skill_id');
    }

    public function applications()
    {
        return $this->hasMany(Application::class, 'application_id');
    }

    public function applicant_notifications(){
        return $this->hasMany('App\OpeningNotification');
    }

    public function skill_requirements()
    {
        return $this->belongsToMany(Opening_skill::class, 'joining_opening_skills', 'opening_id', 'opening_skill_id');
    }

    public function getSalaryRangeWordsAttribute(){
        if(@$this->attributes['salary_range'])
        {
            return salary_ranges()[@$this->attributes['salary_range']];
        }
    }

    public function getBookmarkCountAttribute(){
        return $this->users_that_bookmarked()->count();
    }

    public function getPictureAttribute(){
        if(!file_exists('storage/'.$this->attributes['picture']) || str_replace(' ','',$this->attributes['picture']) == ''){
            return asset('img/default-opening.jpg');
        }
        return asset('storage/'.$this->attributes['picture']);
    }

    public function notifySubscribedApplicants(){
        $follower_ids = \DB::table('follow_companies')->where('company_id',$this->company->id)->pluck('user_id');

        foreach ($follower_ids as $id) {
            $notification = \App\OpeningNotification::create([
                //
                'opening_id'=>$this->attributes['id'],
                'user_id'=>$id,
                'company_id'=>$this->attributes['company_id'],
            ]);

            event(new \App\Events\NotificationEvent(
                [
                    'type'=>'new opening',
                    'user_id'=>$notification->user_id
                ]
            ));
        }
    }

    //QUESTION_DETECT : サービスプロバイダーの代わりにbootを使う？？
    //QUESTION_DETECT : Listnerもここで包含？Listenerが存在しない。
    //QUESTION_DETECT : boot()をいろんなmodelで作りまくってるのはなんで？
    //QUESTION_DETECT : どこで使われてるの？
    public static function boot()
    {
        parent::boot();
        //↑これで状況監視しているらしい。

        //↓何が起こった時に反応するのか？下記の場合、"created"が起こった場合に反応する
        static::created(function($model)
        {
            $follower_ids = \DB::table('follow_companies')->where('company_id',$model->company->id)->pluck('user_id');
            foreach ($follower_ids as $id) {
                $notification = \App\OpeningNotification::create([
                    //
                    'opening_id'=>$model->attributes['id'],
                    'user_id'=>$id,
                    'company_id'=>$model->attributes['company_id'],
                ]);

                event(new \App\Events\NotificationEvent(
                    [
                        'type'=>'new opening',
                        'event'=>'created',
                        'user_id'=>$id
                    ]
                ));
            }
        });
    }

}
