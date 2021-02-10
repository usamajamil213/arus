<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use App\Models\User\User;
use Mail;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Models\UsersReferences;
use DB;
use Session;
use Alert;
class LoginController extends Controller
{
    public function login(){
        // dd("SS");
      $page_title = '::Login';        
        return view('auth.login');
    }

    public function register_org(){
      return view('auth.register');
    }
    public function post_login(Request $request){
      
       $this->validate($request,[
          'email' => 'required|max:255|min:4',
          'password' => 'required|min:6'
       ]);
       $username = $request->input('email');
       $password = $request->input('password');
       
       if(User::where(['email'=>$request->input('username')])->count()){
          alert()->error('You have not activate your account please first activate your...');        
        return redirect()->back();
       }

       $user = User::where('email',$request->input('email'))->first();
       // alert()->success('Your logged in Successfully');

       if(!Auth::attempt($request->only(['email','password']))){
          
         //
              alert()->error('Email & Password combination doesn\'t not match'); 
         // Alert::error('Email & Password combination doesn\'t not match');
          return redirect()->back();
        
        } 
        
        

        if(Auth::user()->hasAccess(['admin'])){         
          return redirect()->route('admin.dashboard');
        }elseif(Auth::user()->hasAccess(['superadmin'])){
          
          return redirect()->route('admin.dashboard'); 
        
        }
        elseif(Auth::user()->hasAccess(['provider'])){
          
          return redirect()->route('admin-event'); 
        
        }
        else{
          alert()->error('Something went wrong please try again...');
          //Alert::error('Something went wrong please try again...');          
          return redirect()->back();
        }
        
    }

    public function register_post(Request $r){
       
       dd($r);
      $name = $r->name;
      $email = $r->email;     
      if(empty($name)){
           Alert::error('Name is Required');          
           return redirect()->back()->withInput(Input::all());
      }

      if(empty($email)){
           Alert::error('Email is Required');          
           return redirect()->back()->withInput(Input::all());
      }

     /*if(empty($nic)){
          Alert::error('Nic is Required');          
           return redirect()->back()->withInput(Input::all());
      }

      if(empty($gender)){
           Alert::error('Gender is Required');          
           return redirect()->back()->withInput(Input::all());
      }*/

      $email_check = User::where('email',$email)->first();
      if(!empty($email_check)){
                 Session::put('danger','Email Exists');       
           // Alert::error('Email Exists!');          
           return redirect()->back()->withInput(Input::all());
      }



      $password = $r->password;
      $confirm_password = $r->confirm_password;

        if(strlen($password) < 6){
           // Session::put('danger','Password Length Must be Greater than 5'); 
           // Alert::error('Password Length Must be Greater than 5');          
           return redirect()->back()->withInput(Input::all());
        }elseif($password!=$confirm_password){ 
           alert()->error('Password Does not Match');          
           return redirect()->back()->withInput(Input::all());
        }else{

            $email_token = md5(date('Y-m-d').microtime());
            $user=new User();
            $user->name = $name;
            $user->uid = md5(date('Y-m-d').microtime());
            $user->email = $email;
          //  $user->nic = $nic;
          //  $user->gender = $gender;
            $user->password = bcrypt($password);
            $user->email_token = $email_token;
            $user->verified = 1;
            $user->save();
            alert()->success('Registration Successfull !');
     


  $role = DB::table('roles')->where('slug','user')->first();
            $user->roles()->attach($role->id);
  /*              $data = ['username'=>$r->username,'email'=>$r->email,'password'=>$r->password,'uid'=>$email_token];
                if(Mail::send('mails.login_credentials',['data'=>$data],function($mail) use ($r){
                    $mail->to($r->email,'SAFE User')->from("no-reply@safepk.com")->subject("SAFE Account Credentials");
                })){}*/

        }
                    
           return redirect()->route('login');        

    }

    public function logout(){
      Auth::logout();
       alert()->success('You are logged Out Successfully !');
      return redirect()->route('login');
    }

    public function account_verify($uid){

        $user_check = User::where('email_token',$uid)->first();
        if(empty($user_check)){
                  // Alert::error('Verification Link not Valid');          
                  return redirect()->route('login');        
        }elseif($user_check->verified==1){
                  Alert::error('Your Account is Already Active');          
                  return redirect()->route('login');        
        }else{

              $user_check->verified=1;
              $user_check->saVe();
              // Alert::success('Verification Successfull');          
              return redirect()->route('login');        
        }

    }

}
