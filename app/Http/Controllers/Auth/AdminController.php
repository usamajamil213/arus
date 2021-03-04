<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\User\User;
use Mail;
use Illuminate\Http\Request;
use App\models\CustomUserNotifications;
use App\Models\User\Role;
use Auth;
use Validator;
use App\Models\Company\Company;
class AdminController extends Controller
{
        public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard(){
        $role_id = Role::where('slug','user')->select('id')->first();

            $users = User::whereHas('roles', function ($query) use($role_id) {
                            $query->where('role_id', $role_id->id);
                        })->count();
            $role_id = Role::where('slug','provider')->select('id')->first();

            $providers = User::whereHas('roles', function ($query) use($role_id) {
                            $query->where('role_id', $role_id->id);
                        })->count();
            $u_companies=Company::where('added_by','user')->count();
            $p_companies=Company::where('added_by','si')->count();
          
            return view('admin.dashboard',compact('users','providers','u_companies','p_companies'));
    }
     
    
}