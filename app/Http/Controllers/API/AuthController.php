<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User\User;
use Validator;
use DB;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Auth;

class AuthController extends Controller
{    
   public function check_email(Request $request){
    $validator = Validator::make([
                    'email' => $request->email,
                ],
                [
                    'email' => 'required|email|unique:users,email',
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
            $response = [
                        'success' => true,
                        'success_message' => 'email is valid',

                    ];

                    return $response;


   }


    public function signup(Request $request)
	{
        // dd($request);
        $validator = Validator::make([
                    'name' => $request->name,
                    'phone' => $request->phone,
                    'email' => $request->email,
                    // 'image' =>  $request->image ? 'image|mimes:jpg,png,jpeg' : "",
                    'password' => $request->password,
                    // 'contact' => $request->contact,
                     'device_token'=> $request->device_token,
                    
                ],
                [
                    'name' => 'required',
                    'email' => 'required|email|unique:users,email',
                    'phone' => 'required',
                    'password'  => 'required|min:6|max:25',
                     // 'device_token'  => 'required',
                ]
            );
    
            if ($validator->fails())
            {

                    // $error = $validator->errors()->first('email');
                    $error = $validator->errors()->all();
            
                    $response = [
                        'success' => false,
                        'error_message' => $error,

                    ];
                    // return $validator->errors()->first('email');

                    return $response;          

            }

        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        // $user->contact = $request->contact;
         // $user->device_token = $request->device_token;
        $user->password = $request->password?Hash::make($request->password):null;
        $user->save();


        $role = DB::table('roles')->where('slug','provider')->first();
        $user->roles()->attach($role->id);   
        $message = trans('User Added');
        $request = $user;

        $response = [
            'success' => true,
            'success_message' => $message,
            'user' =>[
                'id' => $request->id,
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                // 'password' => $request->password,
                // 'device_token' => $request->device_token,
            ],
        ];
        //print_r($response);die();

        return $response;
    }


    public function login(Request $request){ 

        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){ 
            $user = Auth::user(); 
            // $success['token'] =  $user->createToken('MyApp')-> accessToken; 
             $user = User::where('email',$request->email)->first();
       // dd($user);
        $device_token = $request->device_token;
        $user->device_token = $device_token;
         $user->save();
            return response()->json(['success' => 'user loged in', 

            'user' =>[
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'password' => $user->password,
                'phone' => $user->phone,
                'img'=> $user->img,
                
            ],
            ]);
        } 
        else{ 
            return response()->json(['error'=>'Unauthorised'], 401); 
        } 
    }

    public function social_login(Request $request){ 

        // dd($request);
        $user=User::where('email',$request->email)->first();
        if($user){ Auth::login($user);
        // if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){ 
            $user = Auth::user(); 
            // $success['token'] =  $user->createToken('MyApp')-> accessToken; 
            return response()->json(['success' => true,

                'success_message' => 'user loged in',
                'user' =>[
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'password' => $user->password,
                'contact' => $user->contact,
                'img' => $user->img,
                
            ],
        ]); 
        } 
        else{ 
             return response()->json(['success' => false,

                'success_message' => 'SignUp First',
                
        ]); 
            // return response()->json(['error'=>'SignUp First'], 401); 
        } 
    }



    public function change_email(Request $request){
// dd($request);
        $validator = Validator::make([
                    
                    'id' => $request->id,
                    'email' => $request->email,
                    
                ],
                [
                    
                    'email'  =>'required',
                    'id'  =>'required',
                    
                ]
            );
    
            if ($validator->fails())
            {

                    $error = $validator->errors()->all();
            
                    $response = [
                        'success' => false,
                        'success_message' => $error ,
                    ];

                    return $response;          

            }


        $user = User::where('id',$request->id)->first();
       // dd($user);
        $email = $request->email;
        // $contact = $request->contact?Hash::make($request->contact):null;
      

       
        $user->email = $email;
       
               

        

        $user->save();

        // $details = new StudentDetail();
        // $details->student_id = $user->id;
        // $details->university_id = $request->school;
        // $details->save();

        $message = trans('Email Updated');
        $obj = new \stdClass();
        $obj->message = $message;
        $obj->data = (object)array('student'=>$user);
        $data['response']=$obj;

        $message = $message;
        $request = $user;

        $response = [
            'success' => true,
            'success_message' => $message,
            'data' =>[
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'contact' => $user->contact,
                

            ],
        ];
        //print_r($response);die();

        return $response;
    }
        public function update_image(Request $request){

         $validator = Validator::make([
                    
                    'user_id' => $request->user_id,
                    'image' => $request->image,
                    
                ],
                [
                    
                    'user_id'  =>'required',
                    'image'  =>'required|image|mimes:jpeg,png,jpg,gif,svg',
                    
                ]
            );
    
            if ($validator->fails())
            {

                    $error = $validator->errors()->all();
            
                    $response = [
                        'success' => false,
                        'success_message' => $error ,
                    ];

                    return $response;          

            }

                $user=User::where('id',$request->user_id)->first();             
               if(!$request->hasFile('image')) {
                return response()->json(['upload_file_not_found'], 400);
                }
                            $destinationPath = public_path()."/images/upload_images/event_images/";
                            $extension =  $request->file('image')->getClientOriginalExtension();
                            $fileName = time();
                            $fileName .= rand(11111,99999).'.'.$extension; // renaming image
                            if(!$request->file('image')->move($destinationPath,$fileName))
                            {
                                throw new \Exception("Failed Upload");                    
                            }

                            $picture = asset("public/images/upload_images/event_images/")."/".$fileName;
                $user->img=$picture;
                $user->save();
                // return response()->json(compact('path'));
                $message = trans('image Updated');
                $request = $user;
                $response = [
            'success' => true,
            'success_message' => $message,
            'data' =>[
                'id' => $user->id,
                'image' =>$picture,

            ],
        ];
        //print_r($response);die();

        return $response;

    }
     public function change_name(Request $request){
// dd($request);
        $validator = Validator::make([
                    
                    'user_id' => $request->user_id,
                    'user_name' => $request->user_name,
                    
                ],
                [
                    
                    'user_id'  =>'required',
                    'user_name'  =>'required',
                    
                ]
            );
    
            if ($validator->fails())
            {

                    $error = $validator->errors()->all();
            
                    $response = [
                        'success' => false,
                        'success_message' => $error ,
                    ];

                    return $response;          

            }
        $user = User::where('id',$request->user_id)->first();
        $u_name=$request->user_name;
        $user->name = $u_name;
        $user->save();
        $message = trans('Name Updated');
        $message = $message;
        $request = $user;
        $response = [
            'success' => true,
            'success_message' => $message,
            'data' =>[
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,            

            ],
        ];
        //print_r($response);die();

        return $response;

    }
    
    public function change_password(Request $request)
{
$validator = Validator::make([
                    
                    'user_id' => $request->user_id,
                    'old_password' => $request->old_password,
                    'new_password' => $request->new_password,
                    
                ],
                [
                    
                    'user_id'  =>'required',
                    'new_password' => 'required',
                    'old_password' => 'required',
                    
                ]
            );
    
            if ($validator->fails())
            {

                    $error = $validator->errors()->all();
            
                    $response = [
                        'success' => false,
                        'success_message' => $error ,
                    ];

                    return $response;          

            }

            $user=User::where('id',$request->user_id)->first();
            $user_pass=$user->password;
        if (Hash::check($request->old_password,$user_pass)) {
        $user->password = $request->new_password?Hash::make($request->new_password):null;
        $user->save();
        $message = trans('Password Updated');
        $message = $message;
        $request = $user;
        $response = [
            'success' => true,
            'success_message' => $message,
        ];
        //print_r($response);die();

        return $response;
    }
        else{
        $message = trans('Invalid old password');
        $message = $message;
        $request = $user;
        $response = [
            'success' => false,
            'success_message' => $message,
        ];
        //print_r($response);die();

        return $response;
        }


}


}
