<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    // dd('通りました');
    protected $fillable = ['company_name', 'email', 'password', 'in_charge', 'ceo_name', 'postal', 'address1', 'address2', 'city', 'country', 'url', 'tel', 'number_of_employee', 'established_at', 'facebook_url', 'twitter_url', 'company_logo', 'background_photo', 'company_introduction', 'what', 'what_photo1', 'what_photo1_explanation', 'what_photo2', 'what_photo2_explanation', 'bill_company_name', 'bill_postal', 'bill_address1', 'bill_address2', 'bill_city', 'bill_country', 'user_id', 'created_at', 'updated_at', 'is_active', 'company_size'];

    // dd('通りました');

    // protected $hidden = ['password'];
    protected $appends = ['population'];

    public function openings()
    {
        return $this->hasMany(Opening::class);
    }

    public function applications(){
        return $this->hasManyThrough('\App\Application','\App\Opening');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //related to scout
    public function scout_users()
    {
        return $this->belongsToMany(User::class, 'scouts', 'company_id', 'user_id');
    }

    public function scout_users_save($user_id)
    {
        return $this->scout_users()->attach($user_id);
    }

    public function getPopulationAttribute(){
        switch (@$this->attributes['company_size']) {
            case 1:
                return '1 ~ 10 employees';
                break;
            case 2:
                return '11 ~ 30 employees';
                break;
            case 3:
                return '31 ~ 50 employees';
                break;
            case 4:
                return '51 ~ 100 employees';
                break;
            case 5:
                return '101 ~ 200 employees';
                break;
            case 4:
                return '201 ~ 500 employees';
                break;
            case 4:
                return '501 ~ 1000 employees';
                break;
            case 4:
                return '1001 ~ employees';
                break;
            
            default:
                return '';
                break;
        }
    }

    /*public function company_google_mapper()
    {
        return $this->attributes['address1']. " ". $this->attributes['city']. " ". $this->attributes['country'];
    }*/

    public function getCompanyLogoAttribute(){
        if(!file_exists('storage/'.$this->attributes['company_logo']) || str_replace(' ','',$this->attributes['company_logo']) == ''){
            return asset('img/default-company.png');
        }

        return asset('storage/'.$this->attributes['company_logo']);
    }

    public function getBackgroundPhotoAttribute(){
        if(!file_exists('storage/'.$this->attributes['background_photo']) || str_replace(' ','',$this->attributes['background_photo']) == ''){
            return asset('img/default-opening.jpg');
        }

        return asset('storage/'.$this->attributes['background_photo']);
    }

    public function getWhatPhoto1Attribute(){
        if(!file_exists('storage/'.$this->attributes['what_photo1']) || str_replace(' ','',$this->attributes['what_photo1']) == ''){
            return asset('img/default-opening.jpg');
        }

        return asset('storage/'.$this->attributes['what_photo1']);
    }
}
