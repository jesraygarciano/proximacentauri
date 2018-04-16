<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    protected $fillable = ['ex_from_year', 'ex_from_month', 'ex_to_year', 'ex_to_month', 'ex_company', 'ex_postion', 'ex_explanation'];

    // protected $hidden = ['password'];
    public function company()
    {
        return $this->belongsTo(Resume::class);
    }
}
