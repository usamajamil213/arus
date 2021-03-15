<?php

namespace App\Models\Booking;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = 'bookings';
    public function user(){
        return $this->hasone('App\Models\User\User','id','user_id');
    }
    public function provider(){
        return $this->hasone('App\Models\User\User','id','provider_id');
    }
}
