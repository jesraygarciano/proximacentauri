<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CharacterReferences extends Model
{

    protected $table = 'character_references';

    protected $fillable = ['cr_name', 'cr_position', 'cr_company_or_university', 'cr_phone_number', 'cr_email'];
    
    public function resume()
    {
        return $this->belongsTo(Resume::class);
    }

}
