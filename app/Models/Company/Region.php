<?php

namespace App\Models\Company;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $table='region';

    public function states(){
        return $this->hasMany('App\Models\Company\State','region_id','id');
    }

}
