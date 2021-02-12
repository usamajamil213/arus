<?php

namespace App\Http\Controllers\Company\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company\Company;
use App\Models\Company\State;

class ApiController extends Controller
{
    public function get_companies(){

  $comp=Company::select('id','comp_name','comp_adress','comp_reg_no','post_c')->get();
  $state=State::where('id','state')->get();

     $response = [
            'success' => true,
            'success_message' =>'companies',
            'data' =>$comp,
            'state' =>$state,
        ];
        return $response;
    }
}
