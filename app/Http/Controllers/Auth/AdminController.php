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
class AdminController extends Controller
{
        public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard(){
          
            return view('admin.dashboard');
    }
     
    
}