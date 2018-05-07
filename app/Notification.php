<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Notification extends Model
{
    protected $fillable = ['author_id','recipient_id','status','explanation','meta_data'];

    public function recipient(){
        return $this->belongsTo('App\User','recipient_id');
    }
}
