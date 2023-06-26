<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\ExpertiseModel;
use App\IndustryModel;
use App\SeniorityModel;
use App\BusinessModel;
use App\BookingTempModel;
use App\CountryModel;
use Auth;
use App\MasterCatdataModel;
use App\BookingModel;
use App\RatingModel;
use App\FaqModel;
use App\NotificationModel;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $user_id        = Auth::user()->id;
        $bookingDone    = BookingModel::where('user_id', $user_id)->where('status', 'Done')->get();
        $bookingSchedul = BookingModel::where('user_id', $user_id)->where('status', 'Scheduled')->get();

        $donate             = BookingModel::where('user_id', $user_id)->where('status', 'Done')->where('pay_status', 'Donet')->get();

        $invested_done      = BookingModel::where('user_id', $user_id)->where('status', 'Done')->get();
        $invested_schedule  = BookingModel::where('user_id', $user_id)->where('status', 'Scheduled')->get();
        
        $paid_session       = BookingModel::where('user_id', $user_id)->where('status', 'Done')->get();

        return view('user_dashboard',compact('bookingDone','bookingSchedul','donate','invested_done','invested_schedule','paid_session'));
    }
    
    public function register(Request $request)
    {   
       
        $validated = $request->validate([
            
            'name' => 'required|max:50',
            'email' => 'required|email|max:50|unique:users',
            'password' => 'required|numeric|max:8',
            'country_code' => 'required',
            'terms_and_conditions' => 'required',
           
        ]);
        
        $hash_password = Hash::make($request->input('password'));
        
        $data = array(
           
            "name"=>$request->input('name'),
            "email"=>$request->input('email'),
            "password"=>$hash_password,
            "country_code"=>$request->input('country_code'),
            "terms_and_conditions"=>$request->input('terms_and_conditions'),
            "role" => "user",
        );
        
        $id = User::create($data)->id;
        if(!empty($id)){
            return '/user/profile';
        }else{
            return redirect()->back()->with('error_done',"Unable to register, Please try again");
        }
    }
    
    public function profile()
    {
        $user_id = Auth::user()->id;
        $user = User::where('id', $user_id)->first();
        $expertises = MasterCatdataModel::where('type', 'Expertise')->get();
        $countries = CountryModel::all();
        $industries = MasterCatdataModel::where('type', 'Industry')->get();
        $seniorities = MasterCatdataModel::where('type', 'Seniority')->get();
        $business_models = MasterCatdataModel::where('type', 'Business Model')->get();
        return view('user/profile',compact('expertises', 'user', 'industries', 'seniorities', 'business_models', 'countries'));
    }
   

    public function update_profile(Request $request)
    {   

        $user_id = Auth::user()->id;
       
        if($request->file('profile_image')){
            $image = $request->file('profile_image');
            if($image->isValid()){
                if(!empty($request->input('profile_image_old'))){
                    if(file_exists(public_path('/').'/'.$request->input('profile_image_old'))){
                        unlink(public_path('/').'/'.$request->input('profile_image_old')); 
                    }
                }
                $extension = $image->getClientOriginalExtension();
                $fileName = rand(100,999999).time().'.'.$extension;
                $image_path = public_path('upload/profile/user');
                $request->profile_image->move($image_path, $fileName);
                $formInput['profile_image'] = 'upload/profile/user/'.$fileName;
            }
            unset($formInput['profile_image_old']);
        }else{
            $formInput['profile_image'] = $request->input('profile_image_old');
        }

        $validated = $request->validate([
            'name' => 'required|max:50',
            // 'name' => 'required|regex:/^[a-zA-Z ]*$/|max:50',
            // 'last_name' => 'required|string|max:50',
            'phone' => 'required|numeric',
            'country_code' => 'required',
            'company' => 'required|max:100',
            'country' => 'required',
            // 'profile_photo' => 'required',
            // 'profile_headline' => 'required', 'max:500',
            'biography' => 'required|max:100',
            // 'expertise' => 'required',
            'seniority' => 'required',
            'industry' => 'required',
            'business_model' => 'required',
            // 'price_20' => 'required|numeric',
            // 'price_40' => 'required|numeric', 
            // 'price_60' => 'required|numeric',
            // 'available_slots' => 'required',
            // 'account_details' => 'required',
            'about_me' => 'required',
            'city' => 'required',
            // 'people_expect' => 'required',

        ]);

        // $expertise_array = $request->input('expertise');
        // $expertise_list = implode(', ', $expertise_array);

        $seniority_array = $request->input('seniority');
        $seniority_list = implode(', ', $seniority_array);

        $industry_array = $request->input('industry');
        $industry_list = implode(', ', $industry_array);

        $business_model_array = $request->input('business_model');
        $business_model_list = implode(', ', $business_model_array);

        if($request->input('city')){

            $city_timezone_name = str_replace(' ', '-', $request->input('city'));
            $countryName = $city_timezone_name;

            $ch = curl_init("https://api.ipgeolocation.io/timezone?apiKey=5b0b9352f61f4d7597a0c9e4befc3228&location=".$countryName);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $resultData = curl_exec($ch);
            curl_close($ch);

            $jsonData = json_decode($resultData, true);

            if(!empty($jsonData['timezone'])){
                $timezone = $jsonData['timezone'];
            }else{

                $countryName1 = $request->input('country');

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

        $data = array(
           
            "name"=>$request->input('name'),
            // "last_name"=>$request->input('last_name'),
            "phone"=>$request->input('phone'),
            "country_code"=>$request->input('country_code'),
            "company"=>$request->input('company'),
            "country"=>$request->input('country'),
            "profile_photo"=>$formInput['profile_image'],
            // "profile_headline"=>$request->input('profile_headline'),
            "biography"=>$request->input('biography'),
            // "expertise"=>$expertise_list,
            "seniority"=>$seniority_list,
            "industry"=>$industry_list,
            "business_model"=>$business_model_list,
            // "price_20"=>$request->input('price_20'),
            // "price_40"=>$request->input('price_40'),
            // "price_60"=>$request->input('price_60'),
            // "available_slots"=>$request->input('available_slots'),
            // "account_details"=>$request->input('account_details'),
            "about_me"=>$request->input('about_me'),
            "city"=>$request->input('city'),
            "timezone"=>$timezone,
            // "people_expect"=>$request->input('people_expect'),
            // "role"=>'user',
            // "account_no"=>$request->input('account_no'),
            // "swift_code"=>$request->input('swift_code'),
            // "ifc_code"=>$request->input('ifc_code'),
            // "bank_holder_name"=>$request->input('bank_holder_name'),
            
        );
        
        $updated = User::where('id',$user_id)->update($data);
        if(!empty($updated)){
            return redirect()->back()->with('success_done',"Profile updated successfully");
        }else{
            return redirect()->back()->with('error_done',"Profile not updated, Please try again");
        }
    }
    

    public function booking_confirm(Request $request)
    {  
        $user_id = Auth::user()->id;
        
        $validated = $request->validate([
            'preferred_session' => 'required',
            'preferred_date' => 'required',
        ]);
      
        $data = array(
            "plan"  =>implode(',', $request->input('preferred_date')),
            "price"=>$request->input('preferred_session'),
            "coach_id"=>$request->input('coach_id'),
            "user_id"=>$user_id,
           
        );
        
        $id = BookingTempModel::create($data)->id;
        if($id){
            return redirect()->back()->with('success_done',$id);
        }else{
            return redirect()->back()->with('error_done',"Booking slot not registered, Please try again");
        }
    }

     public function coach_booking_confirm($id) 
    {
        $ide = Crypt::decrypt($id);
        $temp_book = BookingTempModel::where('id', $ide)->first();
        
        $order_id = uniqid(); 
        $user_id = Auth::user()->id;
        
        $data = array(
            "plan"  =>$temp_book->plan,
            "price"=>$temp_book->price,
            "coach_id"=>$temp_book->coach_id,
            "user_id"=>$user_id,
            "order_id"=>$order_id,
        );
        
        $id = BookingModel::create($data)->id;
        
        
                
        $coachdetails = User::where('id',$temp_book->coach_id)->first();
        if($id){
            
            // email data
                $email_data = array(
                    'name' =>  $coachdetails->name,
                    'email' => $coachdetails->email,
                    'username' =>Auth::user()->name,
                );
                
            Mail::send('email.user_slot_booking', $email_data, function ($message) use ($email_data) {
                    $message->to($email_data['email'], $email_data['name'])
                    ->subject('Incoming meeting request')
                    ->from('zentiaaccess@gmail.com', 'Zentia');
                    });
            
            
            $datanot = array(
                "user_id"=>$temp_book->coach_id,
                "sender_id"=>$user_id,
                "notification_msg"=> 'Incoming meeting request from '.Auth::user()->name.'.',
                 "url"=>"coach-booking",
                "status"=>'unseen',
                "page"=>'booking',
            );
            
            NotificationModel::create($datanot)->id;
            
            return redirect()->back()->with('success_done_confirm',"Thank you for booking a slot. The advisor will confirm their availability soon.");
        }else{
            return redirect()->back()->with('error_done',"Booking slot not registered, Please try again");
        }
    }

    public function user_slot_booking(Request $request)
    {   
        $order_id = uniqid(); 
        $user_id = Auth::user()->id;
        
        $validated = $request->validate([
            'preferred_session' => 'required',
            'preferred_date' => 'required',
        ]);

        $data = array(
            "plan"  =>implode(',', $request->input('preferred_date')),
            "price"=>$request->input('preferred_session'),
            "coach_id"=>$request->input('coach_id'),
            "user_id"=>$user_id,
            "order_id"=>$order_id,
        );
        
        $id = BookingModel::create($data)->id;
        
        
                
        $coachdetails = User::where('id',$request->input('coach_id'))->first();
        if($id){
            
            // email data
                $email_data = array(
                    'name' =>  $coachdetails->name,
                    'email' => $coachdetails->email,
                    'username' =>Auth::user()->name,
                );
                
            Mail::send('email.user_slot_booking', $email_data, function ($message) use ($email_data) {
                    $message->to($email_data['email'], $email_data['name'])
                    ->subject('Incoming meeting request')
                    ->from('zentiaaccess@gmail.com', 'Zentia');
                    });
            
            
            $datanot = array(
                "user_id"=>$request->input('coach_id'),
                "sender_id"=>$user_id,
                "notification_msg"=> 'Incoming meeting request from '.Auth::user()->name.'.',
                 "url"=>"coach-booking",
                "status"=>'unseen',
                "page"=>'booking',
            );
            
            NotificationModel::create($datanot)->id;
            
            return redirect()->back()->with('success_done',"Thank you for booking a slot. The advisor will confirm their availability soon.");
        }else{
            return redirect()->back()->with('error_done',"Booking slot not registered, Please try again");
        }
    }

    public function booking()
    {
        $user_id = Auth::user()->id;
        $bookings = BookingModel::where('user_id', $user_id)->orderBy('id','DESC')->get();
        
        $not_status = NotificationModel::where('user_id', $user_id)->where('status', 'unseen')->where('page', 'booking')->get();
        if(count($not_status) > 0){
            foreach($not_status as $not_sta){
            
                $data = array(
                    "status"=>'seen',
                );
                
                $notifications = NotificationModel::where('id', $not_sta->id)->update($data);
               
            }
        }
    
        
        return view('user/booking',compact('bookings'));
    }
    
    public function booking_view($id)
    {
        $ide = Crypt::decrypt($id);
        $user_id = Auth::user()->id;
        $booking = BookingModel::where('id', $ide)->first();
        return view('user/booking_view',compact('booking'));
    }
    
    public function user_booking_scheduled(Request $request)
    {   
        $booking_id = $request->input('booking_id');
        $order_id = $request->input('order_id');
        $user_id = Auth::user()->id;
        
        $meetingId   = $order_id;
        // $meetingId   = uniqid();
        
        $link = url('callbackurl').'/'.$meetingId;
    
        $data = array(
          
            "status"=>$request->input('status'),
            "meeting_link"=>$link,
          
        );
        
        $updated = BookingModel::where('id',$booking_id)->update($data);
        if(!empty($updated)){
            return redirect()->back()->with('success_done',"Meeting generated successfully");
        }else{
            return redirect()->back()->with('error_done',"Meeting not generated, Please try again");
        }
    }
    
    
    
    public function doReview(Request $request)
    {
    
    
    $validated = $request->validate([
    
                    'rating'      => 'required',
                    
                    'comment'     => 'required',
    
                 ]);
    
    $user_id = Auth::user()->id;
    $data =array(
    
                'coach_id'       =>  $request->input('coach_id'),
                
                'user_id'        =>  $user_id,
                
                'rating'         =>  $request->input('rating'),
                
                'comment'        =>  $request->input('comment'),
               
                
                );
    
    
    
    RatingModel::insert($data);
    
    return redirect(route('home')); 
    
    
    }


    public function transaction()
    {
      $user_id = Auth::user()->id;
      $transaction = BookingModel::where('user_id',$user_id)->orderBy('id','DESC')->get();
      $not_status = NotificationModel::where('user_id', $user_id)->where('status', 'unseen')->where('page', 'transaction')->get();
        if(count($not_status) > 0){
            foreach($not_status as $not_sta){
            
                $data = array(
                    "status"=>'seen',
                );
                
                $notifications = NotificationModel::where('id', $not_sta->id)->update($data);
               
            }
        }
      return view('user/transaction',compact('transaction'));
      
    }
    
    public function faq()
    {
      $faq = FaqModel::where('type', 'user')->orderBy('id','ASC')->get();
      return view('user/faq',compact('faq'));
    }

    public function view_transaction($id)
    {
        $ide     = Crypt::decrypt($id);
        $user_id = Auth::user()->id;
        $transationView = BookingModel::where('id', $ide)->first();
        return view('user/trans_view',compact('transationView'));
    }
    
    
    public function invoice_view($id)
    {
    $ide     = Crypt::decrypt($id);
    
    $transationView = BookingModel::where('id', $ide)->first();
    $coach_id = $transationView->user_id;
    
    $coach   = User::where('id', $coach_id)->first();
    $country = CountryModel::all()->sortByDesc("id");
    return view('user/inv_view',compact('transationView','coach','country'));
    }


  
    public function store(Request $request)
    {
        //
    }

    
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

}
