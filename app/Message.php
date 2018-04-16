<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    //
    protected $fillable = ['user_id', 'reciever', 'message'];

    protected $appends = ['formated_date'];

	public function user()
	{
	  return $this->belongsTo(User::class);
	}

	public function reciever(){
		return $this->belongsTo(User::class,'reciever');
	}

	public function getFormatedDateAttribute(){
		return date('M. d, Y h:i:sa',strtotime($this->attributes['created_at']));
	}
}
