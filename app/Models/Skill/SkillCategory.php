<?php

namespace App\Models\Skill;

use Illuminate\Database\Eloquent\Model;

class SkillCategory extends Model
{
     protected $table='skill_categories';
     public function skill(){
        return $this->hasMany('App\Models\Company\Skill','category_id','id');
    }
}
