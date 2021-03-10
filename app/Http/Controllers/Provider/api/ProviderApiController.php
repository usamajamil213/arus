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
                ],
                [
                    'skill_id' => 'required',
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
            $providers=ProviderSkill::where('skill_id',$request->skill_id)->with('user','user.provider_rating')->paginate(8);
            $data = [];
            $i = 0;
          foreach($providers as $prov){
           $data[$i]['provider_id'] = $prov->user->id;
           $data[$i]['first_name'] = $prov->user->name;
           $data[$i]['last_name'] = $prov->user->l_name;
           $data[$i]['address'] = $prov->user->address;
           $data[$i]['image'] = $prov->user->image;
           $data[$i]['rating'] = $prov->user->provider_rating->avg('rating');
           $data[$i]['total_reviews'] = $prov->user->provider_rating->count('provider_id');
           $i++;
       }
         //      $providers = User::whereHas('provider_skill', function ($query) use ($request) {
         //  $query->where('skill_id','=',$request->skill_id);
         // })->with('provider_skill')->get();
            if($request->search_type=='rating'){
            $providers = User::orderBy('rating','desc')->whereHas('provider_skill', function ($query) use ($request) {
        $query->where('skill_id','=',$request->skill_id);
           })->with('provider_skill')->get();
        }
            

             $response = [
                        'success' => true,
                        'success_message' => 'providers',
                        'providers' => $data,


                    ];

                    return $response;

}
}
