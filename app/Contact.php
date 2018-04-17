<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    //
    protected $fillable = ['user_id', 'contact_id', 'status'];

	public function user()
	{
	  return $this->belongsTo(User::class);
	}

	public function contact(){
		return $this->belongsTo(User::class,'contact_id');
	}

	public function latestMessage(){
		return $this->hasMany('\App\Message','user_id','contact_id')->latest()->limit(1);
	}

	// scopes
    public function scopeSearchKey($query,$keyword){
        return $query->leftJoin('users','users.id','=','contacts.contact_id')->whereRaw('(concat(users.f_name," ",users.l_name) like "%'.$keyword.'%")');
    }
}
