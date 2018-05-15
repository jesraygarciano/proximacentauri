<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    protected $fillable = ['f_name', 'm_name', 'l_name', 'email', 'objective', 'nationality', 'birth_date', 'marital_status', 'spoken_language', 'experience', 'university', 'graduate_flag', 'program_of_study', 'field_of_study', 'gender', 'postal', 'address1', 'address2', 'city', 'country', 'phone_number', 'photo', 'is_master', 'is_active', 'user_id','spoken_language', 'religion', 'summary', 'other_skills', 'websites', 'seminars_attended', 'awards', 'job_title'];

    protected $appends = ['formated_birthdate'];
    // $resume_skill_ids should be array
    public function register_skill($resume_skill_ids)
    {
        $existing_skills = $this->skill_requirements()->lists('resume_skills.id')->toArray();

        foreach ($resume_skill_ids as $resume_skill_id) {
            if(!in_array($resume_skill_id, $existing_skills))
            {
                $this->has_skill()->attach($resume_skill_id);
            }
        }
        return true;
    }

    public function has_skill()
    {
        return $this->belongsToMany('App\Resume_skill', 'joining_resume_skills', 'resume_id', 'resume_skill_id');
    }

    // public function skill_requirements()
    // {
    //     return $this->belongsToMany(Resume_skill::class, 'joining_resume_skills', 'resume_id', 'resume_skill_id');
    // }

    public function getPhotoAttribute(){
        if(!file_exists('storage/'.$this->attributes['photo']) || str_replace(' ','',$this->attributes['photo']) == ''){
            return asset('img/member-placeholder.png');
        }
        return asset('storage/'.$this->attributes['photo']);
    }

    //related to scout
    public function companies_that_scout_users()
    {
        return $this->belongsToMany('App\Company', 'scouts', 'user_id', 'company_id')->withTimestamps();
    }

    public function getFormatedBirthdateAttribute(){
        return date('M. d, Y',strtotime($this->attributes['birth_date']));
    }

    public function educations()
    {
        return $this->hasMany(Education::class);
    }

    public function experiences()
    {
        return $this->hasMany(Experience::class);
    }

    public function character_references()
    {
        return $this->hasMany(CharacterReferences::class);
    }

    public function skills()
    {
        return $this->belongsToMany('App\Resume_skill','joining_resume_skills','resume_id','resume_skill_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getResumeFileAttribute(){
        return asset('storage/'.$this->attributes['resume_file']);
    }

    public function resumeFileExist(){
        return file_exists('storage/'.$this->attributes['resume_file']) && str_replace(' ','',$this->attributes['resume_file']);
    }
}
