<?php

namespace App\Models\Provider;

use Illuminate\Database\Eloquent\Model;

class ProviderRating extends Model
{
    protected $table='providers_rating';

        public function provider_skill(){
        return $this->hasMany('App\Models\Provider\ProviderSkill','provider_id','provider_id');
    }

}
