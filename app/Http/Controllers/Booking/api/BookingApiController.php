<?php

namespace App\Http\Controllers\Booking\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company\Skill;
use App\Models\Company\State;
use App\Models\Company\Region;
use App\Models\Provider\ProviderCertificate;
use App\Models\Provider\ProviderSkill;
use App\Models\Provider\ProviderRating;
use App\Models\Booking\Booking;
use App\Models\Booking\BookingDocs;
use App\Models\User\User;
use Validator;
use DB;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;

class BookingApiController extends Controller
{
    public function add_booking(Request $request){
$validator = Validator::make([
                    'provider_id' => $request->provider_id,
                    'user_id' => $request->user_id,
                    'date' => $request->date,
                    'time' => $request->time,
                    'booking_info' => $request->booking_info,
                    'booking_docs' => $request->booking_docs,
                    'skill_id' => $request->skill_id,
                ],
                [
                    'provider_id' => 'required',
                    'user_id' => 'required',
                    'date' => 'required',
                    'time' => 'required',
                    'booking_info' => 'required',
                    'booking_docs' => 'required',
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
            $b= new Booking();
            $b->date=$request->date;
            $b->time=$request->time;
            $b->booking_info=$request->booking_info;
            $b->provider_id=$request->provider_id;
            $b->user_id=$request->user_id;
            $b->estimated_price=7000;
            $b->skill_id=$request->skill_id;
            $b->save();
             $destinationPath = public_path()."/docs/booking_docs";
             foreach($request->booking_docs as $doc){
                $new_d = new BookingDocs();
                $extension =  $doc->getClientOriginalExtension();
                $fileName = time();
                $fileName .= rand(11111,99999).'.'.$extension;  
                if(!$doc->move($destinationPath,$fileName))
                 {
                        throw new \Exception("Failed Upload");                    
                 }

                 $picture = $fileName;
                 $new_d->document= $picture;
                 $new_d->booking_id=$b->id; 
                 $new_d->save();
             }
             $response = [
                        'success' => true,
                        'success_message' => 'booking inserted',

                    ];
                    // return $validator->errors()->first('email');

                    return $response;      
    }
}
