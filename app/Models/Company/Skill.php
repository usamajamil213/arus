<?php

namespace App\Models\Company;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $table='skills';
    public function skill_category(){
        return $this->hasOne('App\Models\Skill\SkillCategory','id','category_id');
    }
}
