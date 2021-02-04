<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\models\Event;
use App\models\EventRatting;
use App\models\UserEvent;
use App\models\UserBookmark;
use Auth;
use Validator;
use DB;
use Exception;
use Illuminate\Support\Facades\Input;

class UserEventController extends Controller
{
	public $successStatus = 200;
    public function add_user_event(request $request){
     $validator = Validator::make([
                    'user_id' => $request->user_id,
                    'event_id' => $request->event_id,    
                ],
                [
                    'user_id' => 'required',
                    'event_id' => 'required',
                ]
            );
    
            if ($validator->fails())
            {
                    $error = $validator->errors()->all();
            
                    $response = [
                        'success' => false,
                        'success_message' => $error,

                    ];
                    return $response;          

            }

        $user_event=new UserEvent();
        $user_event->user_id = $request->user_id;
        $user_event->event_id = $request->event_id;
        $user_event->save();
        $message = trans('User Event inserted');
        $request = $user_event;
        $response = [
            'success' => true,
            'success_message' => $message,
        ];
        //print_r($response);die();

        return $response;


    }
   public function event_detail(Request $request){
    	$validator = Validator::make([
                    'user_id' => $request->user_id,
                    'event_id' => $request->event_id,    
                ],
                [
                    'user_id' => 'required',
                    'event_id' => 'required',
                ]
            );
    
            if ($validator->fails())
            {
                    $error = $validator->errors()->all();
            
                    $response = [
                        'success' => false,
                        'success_message' => $error,

                    ];
                    return $response;          

            }

            $event_detail=Event::where('id',$request->event_id)->with('user_event')->first();
             $user_chk= UserEvent::where('user_id',$request->user_id)->where('event_id',$request->event_id)->first();
             $event_ratting=EventRatting::select('ratting')->where('event_id',$request->event_id)->avg('ratting');
             $user_ratting=EventRatting::where('event_id',$request->event_id)->where('user_id',$request->user_id)->first();
              $user_bokmark=UserBookmark::where('event_id',$request->event_id)->where('user_id',$request->user_id)->first();
              $user_bookmark=true;
              if($user_bokmark==null){
                $user_bookmark=false;
              }  
             if(!empty($user_ratting)){
                $user_rating=$user_ratting->ratting;
              }
              else{
                $user_rating=0;
              }

             if($event_ratting==null){
                $event_ratting=0;
              }
             
              if(!empty($user_chk)){
                $chek_in=true;
              }
              else{
                $chek_in=false;
              }
                     $response = [
                        'success' => true,
                        'success_message' => 'Event Detail',
                        'event_detail' => $event_detail,
                        'user_cheack_in'=>$chek_in,
                        'event_ratting'=>$event_ratting,
                        'user_ratting'=>$user_rating,
                        'user_bookmark'=>$user_bookmark,
                    ];

                    return $response;  
    }


    public function change_status(Request $request){

        $validator = Validator::make([
                    'user_id' => $request->user_id,
                    'event_id' => $request->event_id,    
                ],
                [
                    'user_id' => 'required',
                    'event_id' => 'required',
                ]
            );
    
            if ($validator->fails())
            {
                    $error = $validator->errors()->all();
            
                    $response = [
                        'success' => false,
                        'success_message' => $error,

                    ];
                    return $response;          

            }
            $user_status=UserEvent::where('user_id',$request->user_id)->where('event_id',$request->event_id)->first();
            $response = [
                        'success' => true,
                        'success_message' => 'status changed',
                        'user_cheack_in'=>$user_status,
                    ];

                    return $response; 


    }
    public function delete_user_event(request $request){
     $validator = Validator::make([
                    'user_id' => $request->user_id,
                    'event_id' => $request->event_id,    
                ],
                [
                    'user_id' => 'required',
                    'event_id' => 'required',
                ]
            );
    
            if ($validator->fails())
            {
                    $error = $validator->errors()->all();
            
                    $response = [
                        'success' => false,
                        'success_message' => $error,

                    ];
                    return $response;          

            }

        $user_event=UserEvent::where('user_id',$request->user_id)->where('event_id',$request->event_id)->first();
        $user_event->delete();
        $message = trans('User Event deleted');
        $request = $user_event;
        $response = [
            'success' => true,
            'success_message' => $message,
        ];
        //print_r($response);die();

        return $response;


    }
}
