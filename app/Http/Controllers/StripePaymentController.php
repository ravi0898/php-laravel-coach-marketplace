<?php

   

namespace App\Http\Controllers;

   

use Illuminate\Http\Request;

use Session;
use Auth;
use Stripe;
use App\BookingModel;
use App\User;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;   
use App\NotificationModel;

class StripePaymentController extends Controller

{

    /**

     * success response method.

     *

     * @return \Illuminate\Http\Response

     */

    public function stripe($id)

    {
        $ide = Crypt::decrypt($id);
        $user_id = Auth::user()->id;
        $booking = BookingModel::where('id', $ide)->first();
        return view('stripe',compact('booking'));

    }

  

    /**

     * success response method.

     *

     * @return \Illuminate\Http\Response

     */

    public function stripePost(Request $request)

    {
        $price = $request->input('price');
        $booking_id = $request->input('booking_id');
        $order_id = $request->input('order_id');
        $user_id = Auth::user()->id;
        
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        Stripe\Charge::create ([

                "amount" => $price * 100,

                "currency" => "usd",

                "source" => $request->stripeToken,

                "description" => "Test payment from itsolutionstuff.com." 

        ]);

  

        Session::flash('success', 'Payment successful!');

          

        // return back();
        
        $meetingId   = $order_id;
      
        
        $link = url('callbackurl').'/'.$meetingId;
    
        $data = array(
          
            "status"=>$request->input('status'),
            "meeting_link"=>$link,
            "paid_amount"=>$price,
            "paid_currency"=>"usd",
            "tran_token"=>$request->stripeToken,
         
        );
        
        $updated = BookingModel::where('id',$booking_id)->update($data);
        $book_de = BookingModel::where('id', $booking_id)->first();
        $userdetails = User::where('id',$book_de->user_id)->first();
        $coachdetails = User::where('id',$book_de->coach_id)->first();
        
        $datanot = array(
            "user_id"=>$book_de->coach_id,
            "sender_id"=>$book_de->user_id,
            "notification_msg"=> 'Yay! Booking confirmed from '.Auth::user()->name.'.',
             "url"=>"coach-booking",
            "status"=>'unseen',
            "page"=>'booking',
        );
        
        NotificationModel::create($datanot)->id;
        
        $datanot1 = array(
            "user_id"=>$book_de->user_id,
            "sender_id"=>$book_de->coach_id,
            "notification_msg"=> 'Payment sent to '.$book_de->coach_details->name.'.',
             "url"=>"user-transaction",
            "status"=>'unseen',
            "page"=>'transaction',
        );
        
        NotificationModel::create($datanot1)->id;
        
        $m_start_time =$book_de->meeting_start_time; 
        $starttime = explode(" ",$m_start_time); 
        $ms_date1 = $starttime[0];    
        $ms_date = date("Ymd", strtotime($ms_date1));
        $ms_time1 = $starttime[1];
        $ms_time = date("His", strtotime($ms_time1));   
        $gm_start_date =  $ms_date.'T'.$ms_time;

        $m_session = $book_de->meeting_session;

        $m_end_time = date('Y-m-d H:i:s', strtotime($m_start_time. ' +'.$m_session.' minutes'));
        $endtime = explode(" ",$m_end_time);
        $me_date1 = $endtime[0]; 
        $me_date = date("Ymd", strtotime($me_date1));   
        $me_time1 = $endtime[1]; 
        $me_time = date("His", strtotime($me_time1));    
        $gm_end_date =  $me_date.'T'.$me_time;

        if(!empty($updated)){

             // email data
                $email_data = array(
                    'name' =>  $userdetails->name,
                    'email' => $userdetails->email,
			        'link' => $meetingId,
                    'gm_start_date' => $gm_start_date,
                    'gm_end_date' => $gm_end_date,
                );
                
                $email_data_coach = array(
                    'name' =>  $coachdetails->name,
                    'email' => $coachdetails->email,
                    'username' =>  $userdetails->name,
			        'link' => $meetingId,
                    'gm_start_date' => $gm_start_date,
                    'gm_end_date' => $gm_end_date,
                );
                
            Mail::send('email.meeting_scheduled ', $email_data, function ($message) use ($email_data) {
                    $message->to($email_data['email'], $email_data['name'])
                    ->subject('Yay! Booking confirmed')
                    ->from('zentiaaccess@gmail.com', 'Zentia');
                    });
            Mail::send('email.meeting_scheduled_coach ', $email_data_coach, function ($message) use ($email_data_coach) {
                    $message->to($email_data_coach['email'], $email_data_coach['name'])
                    ->subject('Yay! Booking confirmed')
                    ->from('zentiaaccess@gmail.com', 'Zentia');
                    });        
                    
            
            $ide = Crypt::encrypt($booking_id);
            return redirect(route('user-booking-view', $ide  )); 
        }
        // else{
        //     return redirect()->back()->with('error_done',"Meeting not generated, Please try again");
        // }

    }
    
    
    public function extend_meeting(Request $request)

    {   
        $order_id = $request->input('order_id');
        $bookings = BookingModel::where('order_id', $order_id)->first();

        $current_date = date('Y-m-d H:i:s');
        $meeting_start_time = $bookings->meeting_start_time;

        $paid_session        = $bookings->paid_session;
        $implodes =  explode(',', $paid_session);
        $session_time = array_sum($implodes);

        $session_time_demo = $bookings->meeting_session;
        
        $ddate = $meeting_start_time;
        $meeting_end_time = date('Y-m-d H:i:s', strtotime($ddate. ' +'.$session_time.' minutes'));
        
        $secs = strtotime($meeting_end_time) - strtotime($current_date); 
        $min = $secs / 60;
        $remain_min = round($min); 
       
        $preferred_session = $request->input('preferred_session'); 
        $rr = explode("/",$preferred_session); 
        $price = $rr[0];
        $session_time1 = $rr[1]+$remain_min;
        $new_session_time =$rr[1];
        
        $user_id = Auth::user()->id;
        
        $booking = BookingModel::where('order_id', $order_id)->first();
        return view('stripe_extend',compact('booking', 'price', 'session_time', 'new_session_time', 'session_time1'));
        
    }
    
    
     public function extend_meeting_done(Request $request)

    {
        $price = $request->input('price');
        $session_time = $request->input('session_time');
        $new_session_time = $request->input('new_session_time');
        $booking_id = $request->input('booking_id');
        $order_id = $request->input('order_id');
        $user_id = Auth::user()->id;
        
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        Stripe\Charge::create ([

                "amount" => $price * 100,

                "currency" => "usd",

                "source" => $request->stripeToken,

                "description" => "Test payment from itsolutionstuff.com." 

        ]);

  

        Session::flash('success', 'Payment successful!');

          

        // return back();
        
        $meetingId   = $order_id;
        
        
        $link = url('callbackurl').'/'.$meetingId;
        
        $book_de = BookingModel::where('id',$booking_id)->first();
        $paid_amount = $book_de->paid_amount;
        $tran_token = $book_de->tran_token;
        $paid_session = $book_de->paid_session;
        
        $ps = $paid_session.','.$new_session_time;
        $pa = $paid_amount.','.$price;
        $pt = $tran_token.','.$request->stripeToken;
        // array_push($pa, $paid_amount, $price);
        // $pt=array();
        // array_push($pt, $tran_token, $request->stripeToken);
        
        $data = array(
          
            "status_extend"=>"1",
            "meeting_session"=>$session_time,
            "meeting_link"=>$link,
            "paid_amount"=>$pa,
            "paid_currency"=>"usd",
            "tran_token"=>$pt,
            "paid_session"=>$ps,
         
        );
        
        $updated = BookingModel::where('id',$booking_id)->update($data);
        if(!empty($updated)){
           
            return redirect(route('callbackurl', $meetingId  )); 
        }
        // else{
        //     return redirect()->back()->with('error_done',"Meeting not generated, Please try again");
        // }

    }

}