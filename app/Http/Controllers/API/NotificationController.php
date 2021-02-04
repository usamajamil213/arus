<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\CustomUserNotifications;
use App\models\CustomNotifications;
use App\models\SendedUserNotifications;
use DB;
use App\Role;
use Alert;
use App\User;
use App\models\Event;
use App\models\EventRatting;
use App\models\EventServices;
use Auth;
use Validator;
use Exception;
use Illuminate\Support\Facades\Input;

class NotificationController extends Controller
{
    public function notification(Request $request)
    {

    	$users = explode(',',$request->selected_noti_users);
        $msg = CustomUserNotifications::where('id',$request->predefined_text)->first();
        // dd($users);
        foreach($users as $u){

        $usr = User::where('id',$u)->first();
        $device_token = $usr->device_token;
        $role = DB::table('role_users')->where('user_id',$u)->first();

            $new = new SendedUserNotifications();
            $new->user_id = $u;   
            $new->user_type  = $role->role_id;  
            $new->notification_id = $request->predefined_text; 
            $new->status = 0;
            $new->save();

            $title = $msg->title;
            $message = $msg->short_desc;
            $obj = new \stdClass();
            $obj->success = true;
            $obj->success_message= 'notification_admin';
            $notification_message = $obj;
            $title = trans($msg->title);

    $url = "https://fcm.googleapis.com/fcm/send";
    $token = $usr->device_token;
    $serverKey = 'AAAAQq4_bZk:APA91bHcq5vqFcpV4PrALgXitA0U_14QkQwNI3N5WGv53E9gS6WZknVfqUhRp_ALClA2FkyCz5lU7_qi8OJ1ttB8i-yprzpUu147mNPfcA8pDId5tkmeL5Ltc03g0NTpIJIvsXhi46y3';
    $title = "Notification title";
    $body = "Hello I am from Your php server";
    $notification = array('title' =>$title , 'body' => $body, 'sound' => 'default', 'badge' => '1');
    $arrayToSend = array('to' => $token, 'notification' => $notification,'priority'=>'high');
    $json = json_encode($arrayToSend);
    $headers = array();
    $headers[] = 'Content-Type: application/json';
    $headers[] = 'Authorization: key='. $serverKey;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST,"POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
    curl_setopt($ch, CURLOPT_HTTPHEADER,$headers);
    //Send the request
    $response = curl_exec($ch);

    //Close request
    if ($response === FALSE) {
        die('FCM Send Error: ' . curl_error($ch));
    }
    curl_close($ch);



        }

            alert()->success('SMS Sent');
            return redirect()->back();
    }
    public function user_notifications(Request $request){
        $validator = Validator::make([
                    'user_id' => $request->user_id,                    
                ],
                [
                    'user_id' => 'required',
                ]
            );
    
            if ($validator->fails())
            {

                    // $error = $validator->errors()->first('email');
                    $error = $validator->errors()->all();
            
                    $response = [
                        'success' => false,
                        'success_message' => $error,

                    ];
                    // return $validator->errors()->first('email');

                    return $response;          

            }

            $user_noti=SendedUserNotifications::with('user_notification')->where('user_id', $request->user_id)->get();
            $message = trans('User Notifications');
        $response = [
            'success' => true,
            'success_message' => $message,
            'user Notifications' => $user_noti,

        ];
        //print_r($response);die();

        return $response;

    }
    public function delete_notification(Request $request){
        $validator = Validator::make([
                    'notif_id' => $request->notification_id,                    
                ],
                [
                    'notif_id' => 'required',
                ]
            );
    
            if ($validator->fails())
            {

                    // $error = $validator->errors()->first('email');
                    $error = $validator->errors()->all();
            
                    $response = [
                        'success' => false,
                        'success_message' => $error,

                    ];
                    // return $validator->errors()->first('email');

                    return $response;          

            }
         $notification=SendedUserNotifications::where('id',$request->notification_id)->first();
         if(empty($notification)){
            $message = trans('No Notification Exists');
            $response = [
                        'success' => false,
                        'success_message' => $message,

                    ];
                    // return $validator->errors()->first('email');

                    return $response;  
         }
           $notification->delete();
           $message = trans('Notification Deleted');
            $response = [
                        'success' => true,
                        'success_message' => $message,

                    ];
                    // return $validator->errors()->first('email');

                    return $response; 

         
    }
}
