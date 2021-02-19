<?php

namespace App\Models\Company;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $table='states';
    public function region(){
        return $this->hasone('App\Models\Company\Region','id','region_id');
    }
}
