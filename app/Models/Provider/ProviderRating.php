<?php

namespace App\Models\Provider;

use Illuminate\Database\Eloquent\Model;

class ProviderRating extends Model
{
    protected $table='providers_rating';

        public function provider_skill(){
        return $this->hasMany('App\Models\Provider\ProviderSkill','provider_id','provider_id');
    }
    public function user(){
        return $this->hasone('App\Models\User\User','id','user_id');
    }
    public function provider(){
        return $this->hasone('App\Models\User\User','id','provider_id');
    }

}
