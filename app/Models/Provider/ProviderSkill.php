<?php

namespace App\Models\Provider;

use Illuminate\Database\Eloquent\Model;

class ProviderSkill extends Model
{
    protected $table='providers_skills';
    public function user(){
        return $this->hasone('App\Models\User\User','id','provider_id');
    }
    public function skill(){
        return $this->hasone('App\Models\Company\Skill','id','skill_id');
    }
    public function rating(){
        return $this->hasMany('App\Models\Provider\ProviderRating','provider_id','provider_id');
    }

}
