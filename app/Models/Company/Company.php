<?php

namespace App\Models\Company;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table='companies';

    public function state(){
        return $this->hasOne('App\Models\Company\State','id','state_id');
    }
    public function region(){
        return $this->hasOne('App\Models\Company\region','id','region_id');
    }
}
