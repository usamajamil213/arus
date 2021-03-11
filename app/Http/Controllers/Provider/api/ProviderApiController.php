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
            $providers = User::whereHas('provider_skill', function ($query) use ($request) {
           $query->where('skill_id','=',$request->skill_id);
          })->with('provider_skill')->paginate(8);
            if($request->search_type=='rating'){
            $providers = User::orderBy('rating','desc')->whereHas('provider_skill', function ($query) use ($request) {
           $query->where('skill_id','=',$request->skill_id);
          })->with('provider_skill')->paginate(8);
           
           }
            $data = [];
            $i = 0;
          foreach($providers as $prov){
           $data[$i]['provider_id'] = $prov->id;
           $data[$i]['first_name'] = $prov->name;
           $data[$i]['last_name'] = $prov->l_name;
           $data[$i]['address'] = $prov->address;
           $data[$i]['image'] = $prov->image;
           $data[$i]['starting_cost'] = $prov->starting_cost;
           $data[$i]['rating'] = $prov->rating;
           $data[$i]['total_reviews'] = $prov->rating_count;
           $i++;
       }

           
             $response = [
                        'success' => true,
                        'success_message' => 'providers',
                        'providers' => $data,


                    ];

                    return $response;

}

public function get_provider_rewiews(Request $request){
     $validator = Validator::make([
                    'provider_id' => $request->provider_id,
                ],
                [
                    'provider_id' => 'required',
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
            $provider_rewiew=User::where('id',$request->provider_id)->with('provider_rating','provider_skill','provider_skill.skill')->first();
            // dd($provider_rewiew->provider_skill[1]->skill);
            $skills = [];
            $i = 0;
          foreach($provider_rewiew->provider_skill as $sk){
           $skills[$i]['id'] = $sk->skill->id;
           $skills[$i]['name'] = $sk->skill->skills_type;
           $skills[$i]['image'] = $sk->skill->image;
           $i++;
       }
            $provider_data = [
                        'id' => $provider_rewiew->id,
                        'name' => $provider_rewiew->name,
                        'l_name' => $provider_rewiew->l_name,
                        'address' => $provider_rewiew->address,
                        'image' => $provider_rewiew->image,
                        'about' => $provider_rewiew->about,
                        'rating' => $provider_rewiew->provider_rating->avg('rating'),
                        'total_reviews' => $provider_rewiew->provider_rating->count('ratting'),
                        'skills' => $skills,


                    ];

                  $provider_rewiews=ProviderRating::where('provider_id',$request->provider_id)->with('user','user.company')->get();
             $data = [];
            $i = 0;
          foreach($provider_rewiews as $p){
           $data[$i]['user_id'] = $p->user->id;
           $data[$i]['first_name'] = $p->user->name;
           $data[$i]['last_name'] = $p->user->l_name;
           $data[$i]['image'] = $p->user->image;
           $data[$i]['company_name'] = $p->user->company->comp_name;
           $data[$i]['date'] = $p->created_at->format('m/d/Y');
           $data[$i]['comment'] = $p->comment;
           $data[$i]['rating'] = $p->rating;
           $i++;
       }
       $t=$provider_rewiews=ProviderRating::where('provider_id',$request->provider_id)->count();
       $t_five=$provider_rewiews=ProviderRating::where('provider_id',$request->provider_id)->where('rating','5')->count();
       $t_four=$provider_rewiews=ProviderRating::where('provider_id',$request->provider_id)->where('rating','4')->count();
       $t_three=$provider_rewiews=ProviderRating::where('provider_id',$request->provider_id)->where('rating','3')->count();
        $t_two=$provider_rewiews=ProviderRating::where('provider_id',$request->provider_id)->where('rating','2')->count();
        $t_one=$provider_rewiews=ProviderRating::where('provider_id',$request->provider_id)->where('rating','1')->count();
        if($t==0){
       $five_per=0;
       $four_per=0;
       $three_per=0;
       $two_per=0;
       $one_per=0;
        }
      elseif ($t>0) {
       $five_per=$t_five/$t;
       $four_per=$t_four/$t;
       $three_per=$t_three/$t;
       $two_per=$t_two/$t;
       $one_per=$t_one/$t;
        }
       
    
       
       $rating_percentage = [
                        'five' => $five_per*100,
                        'four' =>$four_per*100,
                        'three' =>$three_per*100,
                        'two' =>$two_per*100,
                        'one' =>$one_per*100,

                    ];
            $response = [
                        'success' => true,
                        'success_message' =>'provider rewiew',
                        'provider_data' =>$provider_data,
                        'provider_rewiews' =>$data,
                        'rating percentage' =>$rating_percentage,

                    ];

                    return $response;   

}
}
