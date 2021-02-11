<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User\User;
use App\Models\Company\Company;
use App\Models\User\Role;
Use Alert;
use Illuminate\Support\Facades\Hash;
use DB;

class UsersController extends Controller
{
    public function index(){
        $users=User::all();
        return view('users.index',compact('users'));
    }
    public function add_user(Request $request){
      
        $user= new User();
        $user->name=$request->name;
        $user->l_name=$request->l_name;
        $user->phone=$request->phone;
        $user->email=$request->email;
        $user->address=$request->address;
        $user->password = $request->password?Hash::make($request->password):null;
        $user->save();
        $role = DB::table('roles')->where('slug','user')->first();
        $user->roles()->attach($role->id); 
        alert()->success('User registered successfully');
     return redirect()->back();


    }
    public function providers_show(){
    $role_id = Role::where('slug','provider')->select('id')->first();
     $providers=$providers = User::whereHas('roles', function ($query) use($role_id) {
                            $query->where('role_id', $role_id->id);
                        })->paginate(5);
        return view('providers.index',compact('providers'));
    }
    public function provider_edit($id){
        $provider=User::with('certificate','company')->where('id',$id)->first();
          $companies=Company::all();
        return view('providers.edit',compact('provider','companies'));
    }
    public function provider_update(Request $request){
         // dd($request->address);
       $user=User::where('id',$request->id)->first();
       $user->name=$request->name;
        $user->l_name=$request->l_name;
        $user->phone=$request->phone;
        $user->email=$request->email;
        $user->address=$request->address;
        $user->is_approve=$request->is_approve;
        // $user->password = $request->password?Hash::make($request->password):null;
        $user->save();
        alert()->success(' Upadted successfully');
     return redirect()->back();


    }

}