<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\BookingModel;
use App\RatingModel;
use App\MasterCatdataModel;
use App\InquiryModel;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;

class WebsiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     
    public function index()
    {
        $coaches = User::where('role', 'coach')->where('status', 2)->get();
        $coaches_one = User::where('role', 'coach')->where('status', 2)->where('slider', 1)->get();
        $coaches_two = User::where('role', 'coach')->where('status', 2)->where('slider', 2)->get();
        $coaches_three = User::where('role', 'coach')->where('status', 2)->where('slider', 3)->get();
        return view('welcome',compact('coaches', 'coaches_one', 'coaches_two', 'coaches_three'));
    } 
    
    public function user_register()
    {
        return view('website/user_register');
    }
    
    public function coach_detail($id) 
    {
        $ide = Crypt::decrypt($id);
        $coach = User::where('id', $ide)->where('status', 2)->first();
        $coach_booking = BookingModel::where('coach_id', $ide)->where('status', 'Scheduled')->get(); 
        $coach_booking_array = array();
        foreach($coach_booking as $c){
             $t = $c->meeting_time.'/'.$c->meeting_date;
             array_push($coach_booking_array,$t); 
        }
        $rating = RatingModel::where('coach_id', $ide)->where('rating', '5')->get(); 
        
        $random_list = $coach->random_list;
        $count_i_array = explode (",", $random_list); 
        
        
        return view('website/coach_detail',compact('coach', 'coach_booking', 'rating', 'coach_booking_array', 'count_i_array'));
    }
    
    public function discover()
    {
    
    $coaches = User::where('role', 'coach')->where('status', 2)->get();
    $coaches_marketing = User::where('role', 'coach')->where('status', 2)->whereRaw('FIND_IN_SET(?, expertise)', 12)->get();
    $coaches_product = User::where('role', 'coach')->where('status', 2)->whereRaw('FIND_IN_SET(?, expertise)', 13)->get();
    $coaches_Fundraising = User::where('role', 'coach')->where('status', 2)->whereRaw('FIND_IN_SET(?, expertise)', 18)->get();


    $Industry  = MasterCatdataModel::where('type', 'Industry' )->orderBy('id','DESC')->get();
    
    $Expertise = MasterCatdataModel::where('type', 'Expertise' )->orderBy('id','DESC')->get();

    $Business  = MasterCatdataModel::where('type', 'Business Model' )->orderBy('id','DESC')->get();


    return view('website/discover',compact('Industry','Expertise','Business', 'coaches', 'coaches_marketing', 'coaches_product', 'coaches_Fundraising'));
    
    }
    
    public function search_discover(Request $request)
    {
    
    $ff['industry'] = $request->input('industry') ?? [];
    $ff['expertise'] = $request->input('expertise') ?? [];
    $ff['business_models'] = $request->input('business_models') ?? [];
    
        if(empty($ff['industry']) && empty($ff['expertise']) && empty($ff['business_models']) ){
            
            $coachsearches = User::where('role', 'coach')->where('status', 2)->get();
    
            return view('website/search_discover',compact('coachsearches'));
        }else{
      
                $coaches = array();
                if (!empty($ff['industry'])) {
                   foreach($ff['industry'] as $f){
                      $cc = User::where('role', 'coach')->where('status', 2)->whereRaw('FIND_IN_SET(?, industry)', [$f])->pluck('id')->all();  
                      array_push($coaches, $cc);
                   }
                    
                }
                
                if (!empty($ff['expertise'])) {
                    foreach($ff['expertise'] as $e){
                      $cc = User::where('role', 'coach')->where('status', 2)->whereRaw('FIND_IN_SET(?, expertise)', [$e])->pluck('id')->all();  
                      array_push($coaches, $cc);
                    }
                    // $coaches = User::where('role', 'coach')->where('status', 2)->whereRaw('FIND_IN_SET(?, expertise)', [$ff['expertise']])->get();    
                  
                }
                if (!empty($ff['business_models'])) {
                    foreach($ff['business_models'] as $b){
                      $cc = User::where('role', 'coach')->where('status', 2)->whereRaw('FIND_IN_SET(?, business_model)', [$b])->pluck('id')->all();  
                      array_push($coaches, $cc);
                    }
                    // $coaches = User::where('role', 'coach')->where('status', 2)->whereRaw('FIND_IN_SET(?, business_model)', [$ff['business_models']])->get(); 
            
                }
             
                $coachess = array_map("unserialize", array_unique(array_map("serialize", $coaches)));
                $tm = array();
                foreach($coachess as $hh){  
                    foreach($hh as $h){  
                        array_push($tm, $h);
                    }
                }
                $coachsearch = array_unique($tm);
                $coachsearches = User::where('role', 'coach')->where('status', 2)->whereIn('id', $coachsearch)->get();  
                return view('website/search_discover',compact('coachsearches'));
        }
    }
    
    
    public function search_coach(Request $request)
    {
    
    $search = $request->input('search');
  
    $coachsearches = User::where('role', 'coach')->where('status', 2)->where('name', 'LIKE', "%{$search}%")->get();    
   
    return view('website/search_discover',compact('coachsearches'));
    
    }
    
    public function about()
    {
        return view('website/about');
    }
    
    public function policy()
    {
        return view('website/policy');
    }
    
    public function terms()
    {
        return view('website/terms');
    }
    
    public function contact()
    {
        return view('website/contact');
    }
    
    public function for_business()
    {
        return view('website/for_business');
    }
    
    public function become_an_advisor()
    {
        return view('website/become_an_advisor');
    }
    
    
    public function contactInquiry(Request $request)
    {
        
      $email_data = array(
        
                'name'            =>  $request->input('name'),
                
                'emails'          =>  $request->input('emails'),
                
                'company'         =>  $request->input('company'),
                
                'comments'        =>  $request->input('comments'),
                
                
                );


      
        InquiryModel::insert($email_data);
        
        // send email with the template
        Mail::send('email.contactMail', $email_data, function ($message) use ($email_data) {
            $message->to('zentiaaccess@gmail.com', 'Admin')
            ->subject('New business inquiry for Zentia')
            ->from('zentiaaccess@gmail.com', 'Zentia');
            });
        
        
        
        //return redirect()->back()->with('success', 'Send Inquiry Successfully!');


    }
    
    public function contact_send(Request $request)
    {
    
       
     
        // email data
                $email_data = array(
                    'name' =>  $request->input('name'),
                    'email' => $request->input('email'),
                    'message_in' => $request->input('message'),
                );
          
          //add data in db

           $adddata = array(
                    'name'       => $request->input('name'),
                    'emails'     => $request->input('email'),
                    'company'    => "Zentia",
                    'comments'   => $request->input('message'),
                );

          InquiryModel::insert($adddata);
        
        // send email with the template
        Mail::send('email.contact_page', $email_data, function ($message) use ($email_data) {
            $message->to('zentiaaccess@gmail.com', 'Zentia')
            ->subject('General inquiry for Zentia')
            ->from('zentiaaccess@gmail.com', 'Zentia');
            });
        
        // return redirect()->back()->with('success_done',"Request sent successfully. Zentia will contact you soon. Thanks!");
        
        
        //return redirect()->back()->with('success', 'Send Inquiry Successfully!');


    }
    
    
    

}
