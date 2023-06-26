<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\ExpertiseModel;
use App\IndustryModel;
use App\SeniorityModel;
use App\BusinessModel;
use App\CountryModel;
use Auth;
use App\BookingModel;
use App\MasterCatdataModel;
use App\FaqModel;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Crypt;
use App\NotificationModel;

class CoachController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $coach_id           = Auth::user()->id;
        
        $bookingDone        = BookingModel::where('coach_id', $coach_id)->where('status', 'Done')->get();

        $donate             = BookingModel::where('coach_id', $coach_id)->where('status', 'Done')->where('pay_status', 'Donet')->get();

        $earning            = BookingModel::where('coach_id', $coach_id)->where('status', 'Done')->get();

        $paid_session       = BookingModel::where('coach_id', $coach_id)->where('status', 'Done')->get();


        return view('coach_dashboard',compact('bookingDone','donate','earning','paid_session'));
    }

    public function profile()
    {
        $user_id = Auth::user()->id;
        $user = User::where('id', $user_id)->first();
        $expertises = MasterCatdataModel::where('type', 'Expertise')->get();
        $countries = CountryModel::all();
        $industries = MasterCatdataModel::where('type', 'Industry')->get();
        $seniorities = MasterCatdataModel::where('type', 'Seniority')->where('role', 'coach')->get();
        $business_models = MasterCatdataModel::where('type', 'Business Model')->get();
        return view('coach/profile',compact('expertises', 'user', 'industries', 'seniorities', 'business_models', 'countries'));
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
                $image_path = public_path('upload/profile/coach');
                $request->profile_image->move($image_path, $fileName);
                $formInput['profile_image'] = 'upload/profile/coach/'.$fileName;
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
            'expertise' => 'required',
            'seniority' => 'required',
            'industry' => 'required',
            'business_model' => 'required',
            'price_20_min' => 'required|numeric',
            'price_40_min' => 'required|numeric', 
            'price_60_min' => 'required|numeric',
            // 'available_slots' => 'required',
            // 'account_details' => 'required',
            'about_me' => 'required',
            'city' => 'required',
            // 'people_expect' => 'required',

        ]);

        $expertise_array = $request->input('expertise');
        $expertise_list = implode(', ', $expertise_array);

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
            "expertise"=>$expertise_list,
            "seniority"=>$seniority_list,
            "industry"=>$industry_list,
            "business_model"=>$business_model_list,
            "price_20"=>$request->input('price_20_min'),
            "price_40"=>$request->input('price_40_min'),
            "price_60"=>$request->input('price_60_min'),
            // "available_slots"=>$request->input('available_slots'),
            // "account_details"=>$request->input('account_details'),
            "about_me"=>$request->input('about_me'),
            "city"=>$request->input('city'),
            "timezone"=>$timezone,
            // "people_expect"=>$request->input('people_expect'),
            // "role"=>'coach',
            // "account_no"=>$request->input('account_no'),
            // "swift_code"=>$request->input('swift_code'),
            // "ifc_code"=>$request->input('ifc_code'),
            // "bank_holder_name"=>$request->input('bank_holder_name'),
            
        );
        
        $updated = User::where('id',$user_id)->update($data);
        if(!empty($updated)){
            $user = User::where('id',$user_id)->first();
            
            
            if($user->status == '1' && !empty($user->available_slots)){
                
                $admin_id = User::where('role', 'admin')->pluck('id')->first();
                $datanot = array(
                    "user_id"=>$admin_id,
                    "sender_id"=>$user_id,
                    "notification_msg"=> 'Coach( '.$request->input('name').' ) updated his profile. ',
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
                Mail::send('email.coach_profile_approval_request', $email_data, function ($message) use ($email_data) {
                    $message->to('zentiaaccess@gmail.com', 'Zentia')
                    ->subject('Coach Profile Approval Request')
                    ->from($email_data['email'], $email_data['name']);
                    });
                    
                    
                // send email with the template
                Mail::send('email.coach_profile_approval_request_tocoach', $email_data, function ($message) use ($email_data) {
                    $message->to($email_data['email'], $email_data['name'])
                    ->subject('Your profile is now complete, thanks!')
                    ->from('zentiaaccess@gmail.com', 'Zentia');
                    });
                    
            }
                    
            return redirect()->back()->with('success_done',"Profile updated successfully");
        }else{
            return redirect()->back()->with('error_done',"Profile not updated, Please try again");
        }
    }

    
    public function payment_info()
    {
        $user_id = Auth::user()->id;
        $user = User::where('id', $user_id)->first();
        
        return view('coach/payment_info',compact('user'));
    }
   
    
   public function update_payment_info(Request $request)
    {   

        $user_id = Auth::user()->id;
       
        $validated = $request->validate([
            'bank_holder_name' => 'required|regex:/^[a-zA-Z ]*$/|max:50',
            'iban_number' => 'required',
            'swift_code' => 'required',
            'bank_country' => 'required',
          
        ]);

        $data = array(
           
            "swift_code"=>$request->input('swift_code'),
            "bank_holder_name"=>$request->input('bank_holder_name'),
            "bank_country"=>$request->input('bank_country'),
            "iban_number"=>$request->input('iban_number'),
            
        );
        
        $updated = User::where('id',$user_id)->update($data);
        if(!empty($updated)){
            return redirect()->back()->with('success_done',"Payment info updated successfully");
        }else{
            return redirect()->back()->with('error_done',"Payment info not updated, Please try again");
        }
    }


    public function calender()
    {
        $user_id = Auth::user()->id;
        $user = User::where('id', $user_id)->first();
        
        return view('coach/calender',compact('user'));
    }
   
    public function update_calender(Request $request)
    {   

        $user_id = Auth::user()->id;
       
        $validated = $request->validate([
            'availability' => 'required',
           
        ]);
        $random_list = array();
        for ($x = 1; $x <= 3; $x++) {

        $n= (rand(1,10));
        array_push($random_list, $n);
        }

        $data = array(
           
            "available_slots"  =>implode(',', $request->input('availability')),
            "random_list" => implode(',', $random_list),
        );
        
        $updated = User::where('id',$user_id)->update($data);
        if(!empty($updated)){
            
            $user = User::where('id',$user_id)->first();
            
            if($user->status == '1' && !empty($user->available_slots) && !empty($user->price_20) && !empty($user->expertise) && !empty($user->about_me)){
                
                $admin_id = User::where('role', 'admin')->pluck('id')->first();
                $datanot = array(
                    "user_id"=>$admin_id,
                    "sender_id"=>$user_id,
                    "notification_msg"=> 'Coach( '.Auth::user()->name.' ) updated his profile. ',
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
                Mail::send('email.coach_profile_approval_request', $email_data, function ($message) use ($email_data) {
                    $message->to('zentiaaccess@gmail.com', 'Zentia')
                    ->subject('Coach Profile Approval Request')
                    ->from($email_data['email'], $email_data['name']);
                    });
                    
                    
                // send email with the template
                Mail::send('email.coach_profile_approval_request_tocoach', $email_data, function ($message) use ($email_data) {
                    $message->to($email_data['email'], $email_data['name'])
                    ->subject('Coach Profile Approval Pending')
                    ->from('zentiaaccess@gmail.com', 'Zentia');
                    });
                    
            }
            return redirect()->back()->with('success_done',"Calender updated successfully");
        }else{
            return redirect()->back()->with('error_done',"Calender not updated, Please try again");
        }
    }

     public function update_calender_tempory(Request $request)
    {   

        $user_id = Auth::user()->id;
       
        $validated = $request->validate([
            'availability' => 'required',
           
        ]);

        $data = array(
           
            "available_slots_tempory"  =>implode(',', $request->input('availability')),
        );
        
        $updated = User::where('id',$user_id)->update($data);
        if(!empty($updated)){
            return redirect()->back()->with('success_done_tempory',$user_id);
        }else{
            return redirect()->back()->with('error_done',"Calender not updated, Please try again");
        }
    }

    public function coach_calender_confirm()
    {
        $user_id = Auth::user()->id;
       
        $random_list = array();
        for ($x = 1; $x <= 3; $x++) {

        $n= (rand(1,10));
        array_push($random_list, $n);
        }

        $data = array(
           
            "available_slots"  =>Auth::user()->available_slots_tempory,
            "random_list" => implode(',', $random_list),
        );
        
        $updated = User::where('id',$user_id)->update($data);
        if(!empty($updated)){
            
            $user = User::where('id',$user_id)->first();
            
            if($user->status == '1' && !empty($user->available_slots) && !empty($user->price_20) && !empty($user->expertise) && !empty($user->about_me)){
                
                $admin_id = User::where('role', 'admin')->pluck('id')->first();
                $datanot = array(
                    "user_id"=>$admin_id,
                    "sender_id"=>$user_id,
                    "notification_msg"=> 'Coach( '.Auth::user()->name.' ) updated his profile. ',
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
                Mail::send('email.coach_profile_approval_request', $email_data, function ($message) use ($email_data) {
                    $message->to('zentiaaccess@gmail.com', 'Zentia')
                    ->subject('Coach Profile Approval Request')
                    ->from($email_data['email'], $email_data['name']);
                    });
                    
                    
                // send email with the template
                Mail::send('email.coach_profile_approval_request_tocoach', $email_data, function ($message) use ($email_data) {
                    $message->to($email_data['email'], $email_data['name'])
                    ->subject('Coach Profile Approval Pending')
                    ->from('zentiaaccess@gmail.com', 'Zentia');
                    });
                    
            }
            return redirect()->back()->with('success_done',"Calender updated successfully");
        }else{
            return redirect()->back()->with('error_done',"Calender not updated, Please try again");
        }
    }

    public function booking()
    {
        $user_id = Auth::user()->id;
        $bookings = BookingModel::where('coach_id', $user_id)->orderBy('id','DESC')->get();
        $not_status = NotificationModel::where('user_id', $user_id)->where('status', 'unseen')->where('page', 'booking')->get();
        if(count($not_status) > 0){
            foreach($not_status as $not_sta){
            
                $data = array(
                    "status"=>'seen',
                );
                
                $notifications = NotificationModel::where('id', $not_sta->id)->update($data);
               
            }
        }
        return view('coach/booking',compact('bookings'));
    }
    
    public function booking_view($id)
    {
        $ide = Crypt::decrypt($id);
        $user_id = Auth::user()->id;
        $booking = BookingModel::where('id', $ide)->first();
        return view('coach/booking_view',compact('booking'));
    }
    
    public function coach_booking_rejection(Request $request)
    {   
        $booking_id = $request->input('booking_id');
        $user_id = Auth::user()->id;
       
        $validated = $request->validate([
            'rejection' => 'required|max:1000',
           
        ]);

        $data = array(
           
            "rejection"=>$request->input('rejection'),
            "status"=>$request->input('status'),
          
        );
        
        $updated = BookingModel::where('id',$booking_id)->update($data);
        
        $book_de = BookingModel::where('id', $booking_id)->first();
        $userdetails = User::where('id',$book_de->user_id)->first();
        
        $datanot = array(
            "user_id"=>$book_de->user_id,
            "sender_id"=>$user_id,
            "notification_msg"=> 'Booking rejected from '.Auth::user()->name.'.',
             "url"=>"user-booking",
            "status"=>'unseen',
            "page"=>'booking',
            
        );
        
        NotificationModel::create($datanot)->id;
        
        if(!empty($updated)){
             // email data
                $email_data = array(
                    'name' =>  $userdetails->name,
                    'email' => $userdetails->email,
                    'coachname' => Auth::user()->name,
                );
                
            Mail::send('email.rejected_request', $email_data, function ($message) use ($email_data) {
                    $message->to($email_data['email'], $email_data['name'])
                    ->subject('Booking rejected')
                    ->from('zentiaaccess@gmail.com', 'Zentia');
                    });
            return redirect()->back()->with('success_done',"Reason of rejection successfully sent");
        }else{
            return redirect()->back()->with('error_done',"Error in sending reason of rejection, Please try again");
        }
    }
    
    
    public function coach_confirmed_availability(Request $request)
    {   
        $booking_id = $request->input('booking_id');
        $user_id = Auth::user()->id;
       
        $validated = $request->validate([
            'meeting_date' => 'required',
            'meeting_time' => 'required',
           
        ]);

        $data = array(
           
            "meeting_date"=>$request->input('meeting_date'),
            "meeting_time"=>$request->input('meeting_time'),
            "meeting_start_time"=>$request->input('meeting_start_time'),
            "meeting_session"=>$request->input('meeting_session'),
            "paid_session"=>$request->input('meeting_session'),
            "meeting_price"=>$request->input('meeting_price'),
            "status"=>$request->input('status'),
          
        );
        
        $updated = BookingModel::where('id',$booking_id)->update($data);
        
        $book_de = BookingModel::where('id', $booking_id)->first();
        $userdetails = User::where('id',$book_de->user_id)->first();
        
        $datanot = array(
            "user_id"=>$book_de->user_id,
            "sender_id"=>$user_id,
            "notification_msg"=> 'Complete booking payment within 12 hours meeting availability confirm from '.Auth::user()->name.'.',
             "url"=>"user-booking",
            "status"=>'unseen',
            "page"=>'booking',
        );
        
        NotificationModel::create($datanot)->id;
        
        if(!empty($updated)){
            // email data
                $email_data = array(
                    'name' =>  $userdetails->name,
                    'email' => $userdetails->email,
                    'coachname' => Auth::user()->name,
                );
                
            Mail::send('email.coach_confirmed_availability', $email_data, function ($message) use ($email_data) {
                    $message->to($email_data['email'], $email_data['name'])
                    ->subject('Complete booking payment within 12 hours')
                    ->from('zentiaaccess@gmail.com', 'Zentia');
                    });
            
            return redirect()->back()->with('success_done',"Availability Confirmed");
        }else{
            return redirect()->back()->with('error_done',"Error in confirming availability, Please try again");
        }
    }
    public function transaction()
    {
        
        $user_id = Auth::user()->id;
        $transactions = BookingModel::where('coach_id', $user_id)->orderBy('id','DESC')->get();
        $not_status = NotificationModel::where('user_id', $user_id)->where('status', 'unseen')->where('page', 'transaction')->get();
        if(count($not_status) > 0){
            foreach($not_status as $not_sta){
            
                $data = array(
                    "status"=>'seen',
                );
                
                $notifications = NotificationModel::where('id', $not_sta->id)->update($data);
               
            }
        }
        return view('coach/transaction',compact('transactions'));
        

    }
    
     public function transaction_view($id)
    {
        
        $ide     = Crypt::decrypt($id);
        
        $transationView = BookingModel::where('id', $ide)->first();
        return view('coach/transactionView',compact('transationView'));
        
    }
    
    public function invoice_view($id)
    {
    $ide     = Crypt::decrypt($id);
    
    $transationView = BookingModel::where('id', $ide)->first();
    $user_id        = $transationView->coach_id;
    
    $coach   = User::where('id', $user_id)->first();
    
    $country = CountryModel::all()->sortByDesc("id");
    return view('coach/inv_view',compact('transationView','coach','country'));
    }
    
    
    
    
     public function donetpay($id)
    {
     
     $user_id = Auth::user()->id;
     
     $ide     = $id;    

     
     $data = array(
    	
    		      'pay_status'   => 'Donate',
    		      
    	    
    	    	);
    
    BookingModel::where('id',$ide)->update($data);
    
    
    $userdetails = User::where('id',$user_id)->first();
    
     // Notification
    $admin_id = User::where('role', 'admin')->pluck('id')->first();
    $datanot = array(
        "user_id"=>$admin_id,
        "sender_id"=>$user_id,
        "notification_msg"=> 'Coach( '.$userdetails->name.' ) send donate request. ',
        "url"=>"admin-transaction",
        "admin_status"=>'unseen',
        "page"=>'transaction',
    );
    
    NotificationModel::create($datanot)->id;
    // ---- end ----
   
                // email data
                $email_data = array(
                    'name' =>  $userdetails->name,
                    'email' => $userdetails->email,
                    
                );
       
    //mail function  for admin       
    Mail::send('email.coachPaydonet', $email_data, function ($message) use ($email_data) {
                $message->to('Zentiaaccess@gmail.com','Admin')
                ->subject('Donation of earnings from coach')
                ->from('Zentiaaccess@gmail.com', 'Zentia');
                });
    //mail function
    
    
    //mail function  for coach       
    Mail::send('email.coach_donationmail_coach', $email_data, function ($message) use ($email_data) {
                $message->to($email_data['email'],$email_data['name'])
                ->subject('You’ve made a donation. Thank you')
                ->from('Zentiaaccess@gmail.com', 'Zentia');
                });
    //mail function
    
       
            
            
    
    return redirect()->back()->with('success', 'Donate amount Successfully!');
    
    
    }
    
    
    
    public function sendRequestpay($id)
    {
     
     $user_id = Auth::user()->id;
     
     $ide     = $id;    

     
     $data = array(
    	
    		      'pay_status'   => 'Request',
    		      
    	    
    	    	);
    
    BookingModel::where('id',$ide)->update($data);
    
    
    $userdetails = User::where('id',$user_id)->first();
    
    // Notification
    $admin_id = User::where('role', 'admin')->pluck('id')->first();
    $datanot = array(
        "user_id"=>$admin_id,
        "sender_id"=>$user_id,
        "notification_msg"=> 'Coach( '.$userdetails->name.' ) send withdrawl request. ',
        "url"=>"coach-transaction",
        "admin_status"=>'unseen',
        "page"=>'transaction',
    );
    
    NotificationModel::create($datanot)->id;
    // ---- end ----
   
                // email data
                $email_data = array(
                    'name' =>  $userdetails->name,
                    'email' => $userdetails->email,
                    
                );
       
    //mail function        
    Mail::send('email.coachPayreq', $email_data, function ($message) use ($email_data) {
                $message->to('Zentiaaccess@gmail.com','Admin')
                ->subject('Withdrawal request from coach')
                ->from('Zentiaaccess@gmail.com', 'Zentia');
                });
    //mail function
            
            
            
    
    return redirect()->back()->with('success', 'Send request Successfully!');
    
    
    }

    
    
    
    public function faq()
    {
        
      $faq = FaqModel::where('type', 'coach')->orderBy('id','ASC')->get();
      return view('coach/faq',compact('faq'));

    }

    public function create()
    {
        //
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
