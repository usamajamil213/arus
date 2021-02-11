<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User\User;
use App\Models\User\EmailVerification;
use App\Models\Provider\ProviderCertificate;
use App\Models\Provider\ProviderSkill;
use App\Models\Company\Company;
use Validator;
use DB;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Auth;
use Mail;

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
            else{
             $code = rand(100000,999999); 
             $newt = new EmailVerification();
             $newt->email = $request->email;
             $newt->code  = $code;
             $newt->status = 0;
             $newt->save();
             $data = ['email'=>$request->email,'email_code'=>$code];
             $email = $request->email;
            Mail::send('mails.email_otp',['data'=>$data],function($mail) use ($email){
                        $mail->to($email,'Arus')->from("arus@floatingyoutube.com")->subject("Arus Email Verification");
                    });

                        $message = trans('Verification Email Sent');

                        $response = [
                                    'success' => true,
                                    'success_message' => $message,
                                    'data'=>$email
                            ];

                            return $response;      
            }
             


   }


 
    public function provider_signup(Request $request)

	{
        // dd($request);
        $validator = Validator::make([
                    'name' => $request->name,
                    'phone' => $request->phone,
                    'email' => $request->email,
                    'company_id' => $request->company_id,
                    'certificates' => $request->certificates,
                    'skill_id' => $request->skill_id,
                    // 'image' =>  $request->image ? 'image|mimes:jpg,png,jpeg' : "",
                    'password' => $request->password,
                    // 'contact' => $request->contact,
                     // 'device_token'=> $request->device_token,
                    
                ],
                [
                    'name' => 'required',
                    'email' => 'required|email|unique:users,email',
                    'phone' => 'required',
                    'company_id' => 'required',
                    'certificates' => 'array',
                    'skill_id' => 'required',
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
       
        if($request->company_id=='0'){
            // dd('success');
            $company= new Company();
            $company->comp_name=$request->comp_name;
            $company->post_c=$request->post_code;
            $company->comp_adress=$request->address;
            $company->position=$request->position;
            $company->comp_reg_no=$request->comp_reg_no;
            $company->department=$request->department;
            $company->save();
            $comp_id=$company->id;  
        }
        else{
            $comp_id=$request->company_id;

        }

        $user = new User();
        $user->name = $request->name;
        $user->l_name = $request->l_name;
        $user->email = $request->email;
        $user->company_id = $comp_id;
        $user->phone = $request->phone;
        // $user->contact = $request->contact;
         // $user->device_token = $request->device_token;
        $user->password = $request->password?Hash::make($request->password):null;
        $user->save();
        $role = DB::table('roles')->where('slug','provider')->first();
        $user->roles()->attach($role->id); 
    
        $destinationPath = public_path()."/images/user_certificates";
            foreach($request->certificates as $image){
               $new_img = new ProviderCertificate();
               $extension =  $image->getClientOriginalExtension();
               $fileName = time();
               $fileName .= rand(11111,99999).'.'.$extension; // renaming image
               if(!$image->move($destinationPath,$fileName))
                {
                       throw new \Exception("Failed Upload");                    
                }

                $picture = $fileName;
                $new_img->certicate_image= $picture;
                $new_img->provider_id=$user->id; 
                $new_img->save();
            }

          foreach ($request->skill_id as $sk) {
            $new=  new ProviderSkill();
            $new->skill_id=$sk;
            $new->provider_id=$user->id;
            $new->save();
          }


        $message = trans('Provider Added');
        $request = $user;

        $response = [
            'success' => true,
            'success_message' => $message,
            'user' =>[
                'id' => $request->id,
                'name' => $request->name,
                'l_name' => $request->l_name,
                'email' => $request->email,
                'phone' => $request->phone,

                // 'password' => $request->password,
                // 'device_token' => $request->device_token,
            ],
        ];
        //print_r($response);die();

        return $response;
    }

    public function user_signup(Request $request){

        $validator = Validator::make([
                    'name' => $request->name,
                    'l_name' => $request->l_name,
                    'phone' => $request->phone,
                    'email' => $request->email,
                    // 'image' =>  $request->image ? 'image|mimes:jpg,png,jpeg' : "",
                    'password' => $request->password,
                    // 'address' => $request->address,
                     // 'device_token'=> $request->device_token,
                    
                ],
                [
                    'name' => 'required',
                    'email' => 'required|email|unique:users,email',
                    'phone' => 'required',
                    'password'  => 'required|min:6|max:25',
                    // 'address'  => 'required',
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
        $user->l_name = $request->l_name;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->phone = $request->phone;
        // $user->contact = $request->contact;
         // $user->device_token = $request->device_token;
        $user->password = $request->password?Hash::make($request->password):null;
        $user->save();
        $role = DB::table('roles')->where('slug','user')->first();
        $user->roles()->attach($role->id); 
        $message = trans('User Added');
        $request = $user;

        $response = [
            'success' => true,
            'success_message' => $message,
            'user' =>[
                'id' => $request->id,
                'name' => $request->name,
                'l_name' => $request->l_name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,

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
             $user = User::where('email',$request->email)->with('roles')->first();
       // dd($user);
        // $device_token = $request->device_token;
        // $user->device_token = $device_token;
         $user->save();
            return response()->json(['success_message' => 'user loged in', 

            'user' =>[
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'password' => $user->password,
                'phone' => $user->phone,
                'img'=> $user->img,
                'role'=> $user->roles[0]->name,
                
            ],
             'success'=>true
            ]);
        } 
        else{ 
            return response()->json(['error_message'=>'Unauthorised','error_code'=>'401','success'=>false]); 
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
  public function send_otp(Request $request){
    // $validator = Validator::make([           
    //                 'email' => $request->email,
                    
    //             ],
    //             [                   
    //                 ' email'  =>'required',                   
    //             ]
    //         );
    
    //         if ($validator->fails())
    //         {
    //                 $error = $validator->errors()->all();
            
    //                 $response = [
    //                     'success' => false,
    //                     'error_message' => $error ,
    //                 ];
    //                 return $response;          
    //         }
       $user=User::where('email',$request->email)->first();
       if(empty($user)){
         $message = trans('Invalid Email');

                        $response = [
                                    'success' => false,
                                    'success_message' => $message,
                            ];

                            return $response; 
       }
     $chkt = EmailVerification::where('email',$request->email)->first();
        $code = rand(100000,999999);    
        if(!empty($chkt)){

            $chkt->code  = $code;
            $chkt->status = 0;
            $chkt->save();

        }else{

            $newt = new EmailVerification();
            $newt->email = $request->email;
            $newt->code  = $code;
            $newt->status = 0;
            $newt->save();
        }

                    $data = ['email'=>$request->email,'email_code'=>$code];
                    $email = $request->email;
                    

                    Mail::send('mails.email_otp',['data'=>$data],function($mail) use ($email){
                        $mail->to($email,'Arus')->from("arus@floatingyoutube.com")->subject("Arus Email Verification");
                    });

                        $message = trans('Verification Email Sent');

                        $response = [
                                    'success' => true,
                                    'success_message' => $message,
                                    'data'=>$email
                            ];

                            return $response;                        

       }                     
        public function verify_otp(Request $request){

            $validator = Validator::make([           
                    'email' => $request->email,
                    'code' => $request->code,
                    
                ],
                [                   
                    'email'  =>'required',    
                    'code'  =>'required',               
                ]
            );
    
            if ($validator->fails())
            {
                    $error = $validator->errors()->all();
            
                    $response = [
                        'success' => false,
                        'error_message' => $error ,
                    ];
                    return $response;          
            }
            
            $chkt = EmailVerification::where('email',$request->email)->where('code',$request->code)->first();
        if(!empty($chkt)){

            $chkt->status = 1;
            $chkt->save();

                         $message = trans('OTP Verified');

                        $response = [
                                    'success' => true,
                                    'success_message' => $message,
                                    'data'=>'true'
                            ];

                            return $response;
        }else{

                        $message = trans('OTP Not Verified');

                        $response = [
                                    'success' => false,
                                    'success_message' => $message,
                                    'data'=>'false'
                            ];

                            return $response;
        }
        }
        public function forget_password(Request $request){
        $validator = Validator::make([
                    
                    'email' => $request->email,
                    'new_password' => $request->new_password,
                    
                ],
                [
                    
                    'email'  =>'required',
                    'new_password' => 'required',
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
         $user=User::where('email',$request->email)->first();
         if(!empty($user)){
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
             $response = [
            'success' => false,
            'success_message' =>'Invalid Email',
        ];
         }
         
        }

 
}
