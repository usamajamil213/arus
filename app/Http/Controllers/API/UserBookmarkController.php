<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\models\UserBookmark;
use App\models\EventRatting;
use Validator;
use DB;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Auth;

class UserBookmarkController extends Controller
{
	public $successStatus = 200;
   public function add_bookmark(Request $request){
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

        $user_bookmark=new UserBookmark();
        $user_bookmark->user_id = $request->user_id;
        $user_bookmark->event_id = $request->event_id;
        $user_bookmark->save();
        $message = trans('User bookmarked succfully');
        $response = [
            'success' => true,
            'success_message' => $message,
        ];
        //print_r($response);die();

        return $response;


   }  
   public function delete_bookmark(Request $request){
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

            $user_bookmark=UserBookmark::where('event_id',$request->event_id)->where('user_id',$request->user_id)->first();
            if(empty($user_bookmark)){
            	$message = trans('this event is not bookmarked by this user');
            	 $response = [
                        'success' => false,
                        'success_message' => $message,

                    ];
                    return $response;
            }
            else{
            	$user_bookmark->delete();
            $message = trans('User bookmark deleted');
        $response = [
            'success' => true,
            'success_message' => $message,
        ];
        return $response;
            }
   }


   public function user_bookmark_event(Request $request){
    $validator = Validator::make([
                    'user_id' => $request->user_id,    
                ],
                [
                    'user_id' => 'required',
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
            $u_id=$request->user_id;
            
         $bookmark_event=UserBookmark::where('user_id',$request->user_id)->with('bookmark_event.bookmark_event_ratting')->get();
            foreach($bookmark_event as $activity){
                $total_ratting = $activity->bookmark_event->bookmark_event_ratting->count();
                $rating = 0;
                $final_rate = 0;
                foreach($activity->bookmark_event->bookmark_event_ratting as $rate){
                    $rating = $rating + $rate->ratting;

                }   
                    if($rating==0){
                    $final_rate = 0;                
                    }else{
                    $final_rate = $rating / $total_ratting;                                        
                    }

                    $activity->rating = $final_rate;
            }

        // dd($bookmark_event[0]);
           // $user_ratting=EventRatting::where('event_id',$qry)->get();
           // dd($user_ratting);
        //     $be_id[];
        //     foreach($bookmark_event as $id){
        //     $be_id[
        //            'id'=> $id->event_id;      
        //     ];
        // }
            // $bookmark_event_ratting=EventRatting::where('user_id',$request->user_id)->where($be_id)->get();
            if(empty($bookmark_event)){
                $message='this user has no event';
                $response = [
                        'success' => false,
                        'success_message' => $message,

                    ];
                    return $response;
            }
            $response = [
                        'success' => true,
                        'bookmark-events' => $bookmark_event,
        

                    ];
                    return $response;


   }
            
            // $sql = 'SELECT u.user_id,e.*,(SELECT avg(ratting) FROM `event_ratting` where er.event_id=u.event_id) as ratting,u.event_id FROM `user_bookmark` u LEFT JOIN event e ON u.event_id=e.id LEFT JOIN (SELECT * FROM event_ratting LIMIT 1) as er ON u.event_id = er.event_id where u.user_id=:status';
            // $bookmark_event= DB::select($sql, [ 'status' => '%'.$u_id.'%' ]);
            
            
            
            // $bookmark_event=DB::select('SELECT u.user_id,e.*,(SELECT avg(ratting) FROM `event_ratting` where er.event_id=u.event_id) as ratting,u.event_id FROM `user_bookmark` u LEFT JOIN event e ON u.event_id=e.id LEFT JOIN (SELECT * FROM event_ratting LIMIT 1) as er ON u.event_id = er.event_id where u.user_id=$u_id');
             
             
             
        //     $bookmark_event=UserBookmark::where('user_id',$request->user_id)->with('bookmark_event')->get();
        //     foreach($bookmark_event as $activity){
        //     $qry[] = UserBookmark::select('event_id')->where('user_id',$request->user_id)->get();
        // }
        //   $user_ratting=EventRatting::where('event_id',)->get();
        //     $be_id[];
        //     foreach($bookmark_event as $id){
        //     $be_id[
        //            'id'=> $id->event_id;      
        //     ];
        // }
            // $bookmark_event_ratting=EventRatting::where('user_id',$request->user_id)->where($be_id)->get();
            // if(empty($bookmark_event)){
            //     $message='this user has no event';
            //     $response = [
            //             'success' => false,
            //             'success_message' => $message,

            //         ];
            //         return $response;
            // }
            
            // $response = [
            //             'success' => true,
            //             'bookmark-events' => $bookmark_event,

            //         ];
            //         return $response;


  
}
