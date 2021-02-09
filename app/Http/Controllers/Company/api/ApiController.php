<?php

namespace App\Http\Controllers\Company\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company\Company;

class ApiController extends Controller
{
    public function get_companies(){
  $comp=Company::select('id','f_name','l_name','comp_name','comp_adress','comp_reg_no','post_c')->get();
     $response = [
            'success' => true,
            'success_message' =>'companies',
            'data' =>$comp,
        ];
        return $response;
    }
}
