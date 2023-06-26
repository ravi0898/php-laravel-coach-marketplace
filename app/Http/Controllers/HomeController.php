<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\NotificationModel; 

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $coaches = User::where('role', 'coach')->where('status', 2)->get();
        $coaches_one = User::where('role', 'coach')->where('status', 2)->where('slider', 1)->get();
        $coaches_two = User::where('role', 'coach')->where('status', 2)->where('slider', 2)->get();
        $coaches_three = User::where('role', 'coach')->where('status', 2)->where('slider', 3)->get();
        return view('home',compact('coaches', 'coaches_one', 'coaches_two', 'coaches_three'));
    }

    public function change_notification_status($id){

    
    $not_status = NotificationModel::where('id', $id)->pluck('status')->first();
        if($not_status == "unseen"){
            
            $data = array(
                "status"=>'seen',
            );
            
            $notifications = NotificationModel::where('id', $id)->update($data);
            $urld = NotificationModel::where('id', $id)->pluck('url')->first();
            
            if($urld == 'coach-booking'){
                return redirect(route('coach-booking'));
            }else if($urld == 'user-booking'){
                return redirect(route('user-booking'));
            }else if($urld == 'user-transaction'){
                return redirect(route('user-transaction'));
            }else if($urld == 'coach-transaction'){
                return redirect(route('coach-transaction'));
            }else{
                return redirect(route('home'));
            }
            
        }else{
       
            $urld = NotificationModel::where('id', $id)->pluck('url')->first();
            
            if($urld == 'coach-booking'){
                return redirect(route('coach-booking'));
            }else if($urld == 'user-booking'){
                return redirect(route('user-booking'));
            }else if($urld == 'user-transaction'){
                return redirect(route('user-transaction'));
            }else if($urld == 'coach-transaction'){
                return redirect(route('coach-transaction'));
            }else{
                return redirect(route('home'));
            }
            
        }
    }
    
    public function change_notification_status_admin($id){

    
    $not_status = NotificationModel::where('id', $id)->pluck('admin_status')->first();
        if($not_status == "unseen"){
            
            $data = array(
                "admin_status"=>'seen',
            );
            
            $notifications = NotificationModel::where('id', $id)->update($data);
            $urld = NotificationModel::where('id', $id)->pluck('url')->first();
            
            if($urld == 'coach-booking'){
                return redirect(route('admin-show-booking'));
            }else if($urld == 'user-booking'){
                return redirect(route('admin-show-booking'));
            }else if($urld == 'user-transaction'){
                return redirect(route('admin-transaction'));
            }else if($urld == 'coach-transaction'){
                return redirect(route('admin-transaction'));
            }else if($urld == 'admin-coach-list'){
                return redirect(route('admin-coach-list'));
            }else if($urld == 'admin-users'){
                return redirect(route('admin-users'));
            }else{
                return redirect(route('home'));
            }
            
        }else{
       
            $urld = NotificationModel::where('id', $id)->pluck('url')->first();
            
            if($urld == 'coach-booking'){
                return redirect(route('admin-show-booking'));
            }else if($urld == 'user-booking'){
                return redirect(route('admin-show-booking'));
            }else if($urld == 'user-transaction'){
                return redirect(route('admin-transaction'));
            }else if($urld == 'coach-transaction'){
                return redirect(route('admin-transaction'));
            }else if($urld == 'admin-coach-list'){
                return redirect(route('admin-coach-list'));
            }else if($urld == 'admin-users'){
                return redirect(route('admin-users'));
            }else{
                return redirect(route('home'));
            }
            
        }
    }
}
