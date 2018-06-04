<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Notification extends Model
{
    // protected $fillable = ['user_id','objectives','school','course','training_batch_id'];

    public function recipient(){
        return $this->belongsTo('App\User','recipient_id');
    }

    public function getMetaDataAttribute(){
        return json_decode($this->attributes['meta_data']);
    }
}
