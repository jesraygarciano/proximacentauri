<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['f_name', 'l_name', 'm_name', 'email', 'password', 'birth_date', 'role', 'university', 'graduate_flag', 'program_of_study', 'field_of_study', 'gender', 'postal', 'address1', 'address2', 'city', 'country', 'phone_number', 'photo', 'objective', 'is_active','verify_token'];

    protected $appends = ['name','photo'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    //related to application
    public function openings()
    {
        return $this->belongsToMany(Opening::class, 'applications', 'user_id', 'opening_id')->withPivot('id', 'description','created_at');
    }

    public function latestMessage(){
        return $this->recievedMessages()->latest()->limit(1);
    }

    public function recievedMessages(){
        return $this->hasMany('\App\Message','reciever');
    }

    public function unseenMessages(){
        return $this->recievedMessages()->where('messages.seen',0);
    }

    public function bookmarkings()
    {
        return $this->belongsToMany(Opening::class, 'save_openings', 'user_id', 'opening_id');
    }

    public function bookmark($opening_id) {

        //confirming if it exists or not
        $exist = $this->is_bookmarking($opening_id); //

        if ($exist) {

            //if it exists, I won't do anything
            return false;

        } else {

            //if it doesn't exist(don't bookmark yet), I'll bookmark
            $this->bookmarkings()->attach($opening_id);
            return true;
        }
    }

    public function unbookmark($opening_id)
    {
        //confirming if it exists or not
        $exist = $this->is_bookmarking($opening_id);

        if ($exist) {
            //if it exists, I will delete the data on joining table
            $this->bookmarkings()->detach($opening_id);
            return true;
        } else {
            //if it doesn't exist(don't bookmark yet), I won't do anything
            return false;
        }
    }

    public function is_bookmarking($opening_id) {
        return $this->bookmarkings()->where('opening_id', $opening_id)->exists();
    }

    //related to scout
    public function companies_that_scout_users()
    {
        return $this->belongsToMany('App\Company', 'scouts', 'user_id', 'company_id')->withTimestamps();
    }

    public function scouts(){
        return $this->hasMany('\App\Scout');
    }

    public function openingNotifications(){
        return $this->hasMany('\App\OpeningNotification');
    }

    public function getNameAttribute(){
        $name = $this->attributes['f_name'].' '.$this->attributes['l_name'];

        return trim($name,' ') != '' ? $name : 'Unknown';
    }

    public function getPhotoAttribute(){
        if(!@file_exists('storage/'.$this->attributes['photo']) || @str_replace(' ','',$this->attributes['photo']) == ''){
            return asset('img/member-placeholder.png');
        }

        return asset('storage/'.$this->attributes['photo']);
    }

    public function companies_that_scout_users_save($company_id)
    {
        return $this->companies_that_scout_users->attach($company_id);
    }

    public function companies()
    {
        return $this->hasMany(Company::class);
    }

    public function canEdit($opening){
        return $this->companies()->where('companies.id',$opening->company_id)->count() > 0;
    }

    public function companies_display()
    {
        return $this->belongsToMany(Company::class);
    }

    public function saved_applicants(){
        return $this->belongsToMany(User::class,'save_applicants','user_id','applicant_saved_id')->withTimestamps();
    }

    public function save_applicant($applicant_saved_id) {

        //confirming if it exists or not
        $exist = $this->is_applicant_saved($applicant_saved_id); //

        if ($exist) {

            //if it exists, I won't do anything
            return false;

        } else {

            //if it doesn't exist(don't bookmark yet), I'll bookmark
            $this->saved_applicants()->attach($applicant_saved_id);
            return true;
        }
    }

    public function unsave_applicant($applicant_saved_id)
    {
        //confirming if it exists or not
        $exist = $this->is_applicant_saved($applicant_saved_id);

        if ($exist) {
            //if it exists, I will delete the data on joining table
            $this->saved_applicants()->detach($applicant_saved_id);
            return true;
        } else {
            //if it doesn't exist(don't bookmark yet), I won't do anything
            return false;
        }
    }

    public function is_applicant_saved($applicant_saved_id) {
        return $this->saved_applicants()->where('applicant_saved_id', $applicant_saved_id)->exists();
    }



/*FOLLOWING COMPANIES*/

    public function followings()
    {
        return $this->belongsToMany(Company::class, 'follow_companies', 'user_id', 'company_id');
    }

    public function follow($company_id) {

        $exist = $this->is_following($company_id); //

        if ($exist) {

            return false;

        } else {

            $this->followings()->attach($company_id);
            return true;
        }
    }

    public function unfollow($company_id)
    {
        $exist = $this->is_following($company_id);

        if ($exist) {
            $this->followings()->detach($company_id);
            return true;
        } else {
            return false;
        }
    }

    public function is_following($company_id) {
        return $this->followings()->where('company_id', $company_id)->exists();
    }

/*FOLLOWING COMPANIES*/



    // returns relationship for hiring users who saved this user
    public function scouters(){
        return $this->belongsToMany(User::class,'save_applicants','applicant_saved_id','user_id')->withTimestamps();
    }

    // public function master_resume(){
    //     return $this->belongsToMany(User::class,'save_applicants','applicant_saved_id','user_id')->withTimestamps();
    // }

    // public function application_resume()
    // {
    //     return $this->hasManyThrough('App\Resume', 'App\Opening');
    // }

    public function requestMessage($data){
        if(!$this->contactExist($data->contact_id))
        {
            Contact::create(
                [
                    'user_id'=>$this->attributes['id'],
                    'contact_id'=>$data->contact_id,
                    'status'=>'requesting'
                ]
            );

            return true;
        }

        return false;
    }

    public function contactExist($id){
        if($this->contacts()->where('contact_id',$id)->exists()){
            return true;
        }
        else if($this->contactRequests()->where('contact_id',$id)->exists()){
            return true;
        }

        return false;
    }

    public function contacts(){
        return $this->hasMany('App\Contact')->where('status','approved');
    }

    public function contactRequests(){
        return $this->hasMany('App\Contact')->where('status','requesting');
    }

    public function receivedContactRequests(){
        return $this->hasMany('App\Contact','contact_id')->where('status','requesting');
    }

    public function resume(){
        return $this->hasMany('App\Resume');
    }

    public function findFirstOrCreateResume(){
        $resume = $this->resume()->first();

        if($resume){
            return $resume;
        }
        else{
            return \App\Resume::create([
                'user_id'=>$this->attributes['id'],
                'f_name'=>$this->attributes['f_name'],
                'l_name'=>$this->attributes['l_name'],
                'email'=>$this->attributes['email'],
                'is_active'=>1,
            ]);
        }
    }


    // scopes
    public function scopeSearchKey($query,$keyword){
        return $query->whereRaw('(concat(f_name," ",l_name) like "%'.$keyword.'%")')->where('id','<>',\Auth::user()->id);
    }

    public function intershipApplication(){
        return $this->hasMany('App\InternshipApplication');
    }
}
