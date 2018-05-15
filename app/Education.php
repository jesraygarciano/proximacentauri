<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{

    protected $table = 'educations';

    protected $fillable = ['ed_university', 'ed_program_of_study', 'ed_field_of_study', 'ed_country', 'ed_city', 'ed_from_year', 'ed_from_month', 'ed_to_year', 'ed_to_month','resume_id'];
    //
    // protected $hidden = ['password'];
    public function resume()
    {
        return $this->belongsTo(Resume::class);
    }
}
