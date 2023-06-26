<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;
    
    // protected function credentials(Request $request)
    // {        
    //   return ['email' => $request->{$this->username()}, 'password' => $request->password, 'status' => 1];
   
    // }
    protected function authenticated(Request $request, $user)
    {
        if ($user->status == 0) {
            Auth::logout();

            return redirect(route('login'))->with('error_msg',"Your application has been sent to Zentia. You will receive an email with next steps, when your application has been approved or rejected");
        }
    }
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectTo() {
        $role = Auth::user()->role; 
        $status = Auth::user()->status; 
        
        if($role == 'admin'){
            return '/admin/dashboard';
        }if(($role == 'coach') &&  ($status == '1')){
            return '/coach/profile';
        }if(($role == 'coach') &&  ($status == '2')){
            return '/coach/dashboard';
        }if($role == 'user'){
            return '/user/dashboard';
        }else{
            return '/home'; 
        }
       
    }
}
