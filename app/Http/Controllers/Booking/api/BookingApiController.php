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
    public function checkbooking(Request $request){
        $validator = Validator::make([
                    'date' => $request->date,
                    'provider_id' => $request->provider_id,
                ],
                [
                    'date' => 'required',
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
            $b=Booking::where('provider_id',$request->provider_id)->where('date',$request->date)->where(function ($query) {
       $query->where('status', '=', 'upcoming')
          ->orWhere('status', '=', 'ongoing');
   })->count();
            if($b==0){
             $message='provider is  available';
             $response = [
                        'success' => true,
                        'success_message' =>$message,
                    ];
                    return $response;
            }
            $response = [
                        'success' => true,
                        'success_message' => 'provider is already booked',

                    ];

                    return $response;
    }
    public function change_status(Request $request){
        $validator = Validator::make([
                    'booking_id' => $request->booking_id,
                    'status' => $request->status,
                ],
                [
                    'booking_id' => 'required',
                    'status' => 'required',
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
            $b=Booking::where('id',$request->booking_id)->first();
            if($request->status=='ongoing'){
                $b->status=$request->status;
                $b->start_date=date('Y-m-d H:i:s');
                $b->save();
                $response = [
                        'success' => true,
                        'success_message' => 'booking status updated successfully',

                    ];

                    return $response;

            }
            elseif ($request->status=='completed') {
                $b->status=$request->status;
                $b->end_date=date('Y-m-d H:i:s');;
                $b->save();
                $response = [
                        'success' => true,
                        'success_message' => 'booking status updated successfully',

                    ];

                    return $response;
            }
            else{
                $response = [
                        'success' => false,
                        'success_message' => 'something went wrong',

                    ];

                    return $response;
            }

    }
   public function getuserbooking(Request $request){
    $validator = Validator::make([
                    'user_id' => $request->user_id,
                    'status' => $request->status,
                ],
                [
                    'user_id' => 'required',
                    'status' => 'required',
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
            $bookings=Booking::where('user_id',$request->user_id)->where('status',$request->status)->with('provider','provider.company')->get();
            $data = [];
            $i = 0;
          foreach($bookings as $b){
           $data[$i]['provider_id'] = $b->provider->id;
           $data[$i]['provider_name'] = $b->provider->name;
           $data[$i]['company_name'] = $b->provider->company->comp_name;
           $data[$i]['price'] = $b->estimated_price;
           $data[$i]['starting_cost'] = $b->provider->starting_cost;
           $data[$i]['date'] = $b->date;
           $data[$i]['time'] = $b->time;
           $i++;
       }
       $response = [
                        'success' => true,
                        'success_message' => 'user bookings',
                        'user_bookings' => $data,

                    ];

                    return $response;  


   }
}
