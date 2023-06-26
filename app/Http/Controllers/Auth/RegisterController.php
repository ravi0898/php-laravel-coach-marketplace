<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use App\NotificationModel; 

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    { 
        return Validator::make($data, [
            'name' => ['required', 'max:50'],
           
            'email' => ['required', 'email', 'max:50', 'unique:users'],
            'phone' => ['required', 'numeric'],
           
            'password' => ['required' , 'max:15', 'min:8'],
            'country_code' => ['required'],
           
            'terms_and_conditions' => ['required'],
            'role' => ['required'],
            'country' => ['required'],
            'city' => ['required'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {   
        if(isset($data['marketing_and_news'])){
            $mar = $data['marketing_and_news'];
        }else{
            $mar = 0;
        }
        
        if(isset($data['why_advisor'])){
            $why_advisor = $data['why_advisor'];
        }else{
            $why_advisor = '';
        }
        
        if(isset($data['expertise'])){
            $expertise = $data['expertise'];
        }else{
            $expertise = '';
        }
        
        
        if($data['role'] == 'coach'){
            $status = 0;
        }else{
            $status = 1;
        }
        
      
        if($data['city']){

            $city_timezone_name = str_replace(' ', '-', $data['city']);
            $countryName = $city_timezone_name;

            $ch = curl_init("https://api.ipgeolocation.io/timezone?apiKey=5b0b9352f61f4d7597a0c9e4befc3228&location=".$countryName);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $resultData = curl_exec($ch);
            curl_close($ch);

            $jsonData = json_decode($resultData, true);

            if(!empty($jsonData['timezone'])){
                $timezone = $jsonData['timezone'];
            }else{

                $countryName1 = $data['country'];

                $ch1 = curl_init("https://api.ipgeolocation.io/timezone?apiKey=5b0b9352f61f4d7597a0c9e4befc3228&location=".$countryName1);
                curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
                $resultData1 = curl_exec($ch1);
                curl_close($ch1);

                $jsonData1 = json_decode($resultData1, true);
                $timezone = $jsonData1['timezone'];
            }
            

        }else{
            $timezone = 'Europe/Brussels';
        }

        



        return User::create([
            'name' => $data['name'],
            // 'last_name' => $data['last_name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'country_code' => $data['country_code'],
         
            'password' => Hash::make($data['password']),
           
            'marketing_and_news' => $mar,
            'why_advisor' => $why_advisor,
            'expertise_reg' => $expertise,
            'terms_and_conditions' => $data['terms_and_conditions'],
            'role' => $data['role'],
            'status' => $status,
            'country' => $data['country'],
            'city' => $data['city'],
            'timezone' => $timezone,
        ]);
    }
    
    
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        event(new Registered($user = $this->create($request->all())));
        // $this->guard()->login($user);
        
        if($user->role == 'coach'){
                
                $admin_id = User::where('role', 'admin')->pluck('id')->first();
        
                $datanot = array(
                    "user_id"=>$admin_id,
                    "sender_id"=>$user->id,
                    "notification_msg"=> 'Coach( '.$user->name.' ) register on your site. ',
                    "url"=>"admin-coach-list",
                    "admin_status"=>'unseen',
                    "page"=>'coach',
                );
                
                NotificationModel::create($datanot)->id;
                
                // email data
                $email_data = array(
                    'name' =>  $user->name,
                    'email' => $user->email,
                );
                
                // send email with the template
                Mail::send('email.coach_approval_request', $email_data, function ($message) use ($email_data) {
                    $message->to('zentiaaccess@gmail.com', 'Zentia')
                    ->subject('New coach applicationt')
                    ->from($email_data['email'], $email_data['name']);
                    });
                    
                    
                // send email with the template
                Mail::send('email.coach_approval_request_tocoach', $email_data, function ($message) use ($email_data) {
                    $message->to($email_data['email'], $email_data['name'])
                    ->subject('Thank you for your interest')
                    ->from('zentiaaccess@gmail.com', 'Zentia');
                    });
                    
          
            return redirect(route('login'))->with('error_msg',"Your application has been sent to Zentia. You will receive an email with next steps, when your application has been approved or rejected");
                            
        }else{
            
            $admin_id = User::where('role', 'admin')->pluck('id')->first();
        
            $datanot = array(
                "user_id"=>$admin_id,
                "sender_id"=>$user->id,
                "notification_msg"=> 'User( '.$user->name.' ) register on your site. ',
                "url"=>"admin-users",
                "admin_status"=>'unseen',
                "page"=>'user',
            );
            
            NotificationModel::create($datanot)->id;
            
             // email data
                $email_data = array(
                    'name' =>  $user->name,
                    'email' => $user->email,
                );
                  
                // send email with the template
                Mail::send('email.signup_email_touser', $email_data, function ($message) use ($email_data) {
                    $message->to($email_data['email'], $email_data['name'])
                    ->subject('Hey you, welcome to Zentia!')
                    ->from('zentiaaccess@gmail.com', 'Zentia');
                    });
        
            return redirect(route('login'))->with('success_done',"Registered successfylly, Please login from here");
            
        }
        
        
    }

    
}
