<?php

namespace App\Http\Controllers\Provider\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Provider\ProviderCertificate;
use App\Models\Provider\ProviderSkill;
use App\Models\Provider\ProviderRating;
use App\Models\User\User;
use App\Models\Company\Company;
use App\Models\Company\Skill;
use App\Models\Company\State;
use App\Models\Company\Region;
use Validator;
use DB;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;

class ProviderApiController extends Controller
{
    public function get_providers(Request $request){
        $validator = Validator::make([
                    'skill_id' => $request->skill_id,
                    'search_type' => $request->search_type,
                ],
                [
                    'skill_id' => 'required',
                    'search_type' => 'required',
                ]
            );
    
            if ($validator->fails())
            {

                    $error = $validator->errors()->all();
            
                    $response = [
                        'success' => false,
                        'error_message' => $error,

                    ];

                    return $response;         
            }

        
            if($request->search_type=='rating'){
            //  $providers = User::orderBy('rating','desc')->with(['provider_skill' => function($query) use ($request) {
            //     $query->where('skill_id', $request->skill_id);
            // }])->get();

            $providers = User::orderBy('rating','desc')->whereHas('provider_skill', function ($query) use ($request) {
        $query->where('skill_id','=',$request->skill_id);
      })->with('provider_skill')->get();
            $data = [];
            $i = 0;
          foreach($providers as $prov){


           $data[$i]['provider_id'] = $prov->id;
           $data[$i]['first_name'] = $prov->name;
           $data[$i]['last_name'] = $prov->l_name;
           $data[$i]['phone_no'] = $prov->phone;
           $data[$i]['rating'] = $prov->rating;

           $i++;
       }

             $response = [
                        'success' => true,
                        'success_message' => 'providers',
                        'providers' => $data,


                    ];

                    return $response;
    }
}
}
