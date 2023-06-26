<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Crypt;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Input;

use Illuminate\Support\Facades\Mail;

use Auth;

use App\User;

use App\Expertise;

use App\MasterCategoryModel;

use App\MasterCatdataModel;

use App\CategoryModel;

use App\CountryModel;

use App\BookingModel;

use Carbon\Carbon;

use App\RatingModel;
use App\FaqModel;
use App\NotificationModel;
class AdminController extends Controller

{

/**

* Display a listing of the resource.

*

* @return \Illuminate\Http\Response

*/



public function index()

{



$adminId = Auth::id();

$profile = User::where('id',$adminId)->first();

$coach    = User::where('status', '2')->where('role', 'coach')->get();
$users    = User::where('status', '1')->where('role', 'user')->get();
$inacoach = User::where('status', '0')->where('role', 'coach')->get();

$bookingDone    = BookingModel::where('status', 'Scheduled')->get();
$bookingSchedul = BookingModel::where('status', 'Done')->get();


$donate         = BookingModel::where('status', 'Done')->where('pay_status', 'Donet')->get();

$paidAmount     = BookingModel::where('status','Done')->get();


return view('admin_dashboard',compact('profile','coach','users','inacoach','bookingDone','bookingSchedul','donate','paidAmount'));



}



/**

* Show the form for creating a new resource.

*

* @return \Illuminate\Http\Response

*/





public function masterCategory()

{



$masterCat = MasterCategoryModel::all()->sortByDesc("id");


return view('admin.master_category',compact('masterCat'));





}



public function masterCatedit($id)

{

$ide = $id;

$mcat = MasterCategoryModel::where('id',$ide)->first();

return view('admin.edit_mcat',compact('mcat'));



}



public function updmasterCat(Request $request)

{



$validated = $request->validate([

'name' => 'required|min:1|max:50',

]);



$id   =  $request->input('id');

$data = array(

"name"  => $request->input('name'),

);



MasterCategoryModel::where('id',$id)->update($data);



return redirect()->back()->with('success', 'Update Successfully!');   



}





public function destroy_category_master($id)

{

$ide = $id;

$delete = MasterCategoryModel::findOrFail($ide);

if($delete->delete()){



return redirect()->back()->with('success', 'Delete Successfully!');   





}



}





public function master_categorydata()

{





$masterCat     = MasterCategoryModel::all()->sortByDesc("id");

$masterCatdata = MasterCatdataModel::all()->sortByDesc("id");



return view('admin.masterCatdata',compact('masterCat','masterCatdata'));



}





public function edit_catdata($id)

{





$ide          = $id;

$mdata        = MasterCatdataModel::where('id',$ide)->first();

$masterCat    = MasterCategoryModel::all();


return view('admin.editmasterCatdata',compact('masterCat','mdata'));

}





public function updCategoryData(Request $request)

{



$validated = $request->validate([

'name' => 'required|min:1|max:50',

'type' => 'required|min:1|max:50',

]);



$id   =  $request->input('id');



$type = explode(",", $request->input('type'));



$data = array(

"name"  => $request->input('name'),

"type"  => $type[0],

"type_id"  => $type[1],

);



MasterCatdataModel::where('id',$id)->update($data);



return redirect()->back()->with('success', 'Update Successfully!');   



}





public function category_coach()

{




$Category = CategoryModel::all()->sortByDesc("id");

return view('admin.coachCategory',compact('Category'));



}



public function destroy_coachCategory($id)

{

$ide = $id;



$Category = CategoryModel::where('id',$ide)->first();

$delete   = CategoryModel::findOrFail($ide);



if($delete->delete()){



$image_path   = $Category->cat_img;

if (file_exists($image_path)) {

@unlink($image_path);

}

return redirect()->back()->with('success', 'Delete Successfully!');   

}









}



public function edit_coachCategory($id)

{



$ide = $id;

$Category = CategoryModel::where('id',$ide)->first();

return view('admin.Edit_coachCategory',compact('Category'));





}



public function coachCatshow()

{



return view('admin.add-coach-cat');



}





public function AddCategoryOfcoach(Request $request)

{



$validated = $request->validate([

'categoryName' => 'required|min:1|max:30',

'cat_img'      => 'required|image|mimes:jpg,png,jpeg,gif,svg|',





]);





if($files = $request->file('cat_img')){



$nametemp   = $files->getClientOriginalName(); 

$imgname    = rand(100,999999).time().'.'.$nametemp;

$image_path = public_path('upload/category');

$files->move($image_path,$imgname);

$formInput['cat_img'] = 'upload/category/'.$imgname;





}else{ 



$formInput['cat_img'] = ''; 



}



$data =array(

'categoryName' =>  $request->input('categoryName'),

'cat_img'      =>  $formInput['cat_img'],

);



CategoryModel::insert($data);

return redirect()->back()->with('success', 'Add Successfully!');



}





public function updCategoryOfcoach(Request $request)

{



$validated = $request->validate([

'categoryName' => 'required|min:1|max:30',

'cat_img'      => 'image|mimes:jpg,png,jpeg,gif,svg|',





]);





if($files = $request->file('cat_img')){



$nametemp   = $files->getClientOriginalName(); 

$imgname    = rand(100,999999).time().'.'.$nametemp;

$image_path = public_path('upload/category');

$files->move($image_path,$imgname);

$formInput['cat_img'] = 'upload/category/'.$imgname;



}else{ 



$formInput['cat_img'] = $request->input('cat_img_old'); 



}



$data =array(

'categoryName' =>  $request->input('categoryName'),

'cat_img'      =>  $formInput['cat_img'],

);



$cat_id = $request->input('cat_id');



CategoryModel::where('id',$cat_id)->update($data);

return redirect()->back()->with('success', 'Update Successfully!');





}





public function destroy_catdata_master($id)

{



$ide = $id;

$delete = MasterCatdataModel::findOrFail($ide);

if($delete->delete()){



return redirect()->back()->with('success', 'Delete Successfully!');   

}

}







public function addCategoryData(Request $request)

{





$validated = $request->validate([

'name' => 'required|min:1|max:50',

'type' => 'required',

]);





$type = explode(",", $request->input('type'));



$data = array(

"name"       =>$request->input('name'),

"type"       =>$type[0],

"type_id"    =>$type[1],

);



$add = MasterCatdataModel::insert($data);



return redirect()->back()->with('success', 'Add Successfully!');



}





public function industry()

{



return view('admin.industry');



}



public function businessModel()

{



return view('admin.business_model');



}



public function user_list()

{



$users = User::where('role', 'user' )->orderBy('id','DESC')->get();

$not_status = NotificationModel::where('admin_status', 'unseen')->where('page', 'user')->get();
    if(count($not_status) > 0){
        foreach($not_status as $not_sta){
        
            $data = array(
                "admin_status"=>'seen',
            );
            
            $notifications = NotificationModel::where('id', $not_sta->id)->update($data);
           
        }
    }

return view('admin.users',compact('users'));



}





public function coach_list()

{

$users = User::where('role', 'coach' )->orderBy('id','DESC')->get();
$not_status = NotificationModel::where('admin_status', 'unseen')->where('page', 'coach')->get();
    if(count($not_status) > 0){
        foreach($not_status as $not_sta){
        
            $data = array(
                "admin_status"=>'seen',
            );
            
            $notifications = NotificationModel::where('id', $not_sta->id)->update($data);
           
        }
    }
return view('admin.coach',compact('users'));

}





public function profile()

{



$adminId = Auth::id();



$profile = User::where('id',$adminId)->first();



return view('admin.profile',compact('profile'));





}







public function update_profile(Request $request)

{





$validated = $request->validate([

'name' => 'required|min:1|max:20',

'last_name' => 'required|min:1|max:20',

//'email' => ['required', 'string', 'email', 'max:100', 'unique:users'],

//'password' => ['required', 'confirmed'],



]);



$password  = $request->input('password');



if(empty($password)){



$main_pass = $request->input('hidden_pass');



}else{



$main_pass = Hash::make($password);



}



$data = array(

"name"       =>$request->input('name'),

"last_name"  =>$request->input('last_name'),

"email"      =>$request->input('email'),

"password"   =>$main_pass,

//"profile_photo" =>$filename,

);









if(!empty($request->input('user_id'))){

$user_id = $request->input('user_id');

$updated = User::where('id',$user_id)->update($data);

if($updated){

$success = 'true';

}

}else{



$id = User::create($data)->id; 

if($id){

$success = 'true';

}

}



if($files=$request->file('profile_img')){

$user_id = $request->input('user_id');

$nametemp=$files->getClientOriginalName(); 

$imgname = rand(100,999999).time().'.'.$nametemp;

$image_path = public_path('upload/profile/admin');

$files->move($image_path,$imgname);

$formInput['profile_img'] = 'upload/profile/admin/'.$imgname;

$images =array(

'profile_photo' =>  $formInput['profile_img'],

);



//ProjectImageModel::insert($images);

User::where('id',$user_id)->update($images);





}







return redirect()->back()->with('success', 'Update Successfully!');   







}





public function addmasterCat(Request $request){



$validated = $request->validate([

'name' => 'required|min:1|max:50',

]);





$data = array(

"name"       =>$request->input('name'),

);



$add = MasterCategoryModel::insert($data);



return redirect()->back()->with('success', 'Add Successfully!');  



}







public function destroy_user($id)

{

$ide = $id;

$delete = User::findOrFail($ide);

if($delete->delete()){



return redirect()->back()->with('success', 'Delete Successfully!');   





}



}







public function destroy_coach($id)

{

$ide = $id;

$delete = User::findOrFail($ide);

if($delete->delete()){

return redirect()->back()->with('success', 'Delete Successfully!');   

}



}



public function view_user($id)
{

$UserId  = $id;
$profile = User::where('id',$UserId)->first();
$country = CountryModel::all();
$master_catdat = MasterCatdataModel::all();
return view('admin.user-view-profile',compact('profile','country','master_catdat'));


}


public function view_coach($id)
{

$UserId  = $id;
$profile = User::where('id',$UserId)->first();
$country = CountryModel::all();
$master_catdat = MasterCatdataModel::all();
return view('admin.coach-view-profile',compact('profile','country','master_catdat'));


}


public function edit_coach($id)

{

$UserId  = $id;

$user            = User::where('id',$UserId)->first();
$countries       = CountryModel::all();
$expertises      = MasterCatdataModel::where('type', 'Expertise')->get();
$industries      = MasterCatdataModel::where('type', 'Industry')->get();
$seniorities     = MasterCatdataModel::where('type', 'Seniority')->where('role', 'coach')->get();
$business_models = MasterCatdataModel::where('type', 'Business Model')->get();
     
//$profile = User::where('id',$UserId)->first();
//$country = CountryModel::all();
//$master_catdat = MasterCatdataModel::all();   
//return view('admin.coach-profile',compact('profile','country','master_catdat'));

return view('admin.coach-profile',compact('expertises', 'user', 'industries', 'seniorities', 'business_models', 'countries'));

}





public function coach_add()

{





//$profile = User::where('id',$UserId)->first();



$country = CountryModel::all();

$master_catdat = MasterCatdataModel::all();



return view('admin.coach-add',compact('country','master_catdat'));

}





public function add_coach_profile(Request $request)

{

$validated = $request->validate([



'profile_img'    => 'required|image|mimes:jpg,png,jpeg,gif,svg|',

'name'           => 'required|min:1|max:20',

'last_name'      => 'required|min:1|max:20',

'email'          => ['required', 'string', 'email', 'max:100', 'unique:users'],

'phone'          => 'required|min:10|max:15',

'password'       => 'required|min:6|max:12',

'country'        => 'required',

'company'        => 'required|min:1|max:50',

'bio'            => 'required|min:1|max:200',

'expertise'      => 'required|min:1|max:20',

'seniority'      => 'required|min:1|max:20',

'industry'       => 'required|min:1|max:20',

'business_model' => 'required|min:1|max:20',

'price_20'       => 'required|min:1|max:20',

'price_40'       => 'required|min:1|max:20',

'price_60'       => 'required|min:1|max:20',

'availability'   => 'required|min:1|max:20',

'about_me'       => 'required|min:1|max:200',



]);



if($files=$request->file('profile_img')){

$coach_id = $request->input('coach_id');

$nametemp = $files->getClientOriginalName(); 

$imgname  = rand(100,999999).time().'.'.$nametemp;

$image_path = public_path('upload/profile/coach');

$files->move($image_path,$imgname);

$formInput['profile_img'] = 'upload/profile/coach/'.$imgname;







}else{



$formInput['profile_img'] = 'upload/profile/coach/browse.png';



}







$data = array(



"name"             =>$request->input('name'),

"last_name"        =>$request->input('last_name'),

"email"            =>$request->input('email'),

"password"         =>Hash::make($request->input('password')),

"phone"            =>$request->input('phone'),

"country"          =>$request->input('country'),

"company"          =>$request->input('company'),

"biography"        =>$request->input('bio'),

"expertise"        =>implode(',', $request->input('expertise')),

"seniority"        =>implode(',', $request->input('seniority')),

"industry"         =>implode(',', $request->input('industry')),

"business_model"   =>implode(',', $request->input('business_model')),

"price_20"         =>$request->input('price_20'),

"price_40"         =>$request->input('price_40'),

"price_60"         =>$request->input('price_60'),

"available_slots"  =>implode(',', $request->input('availability')),

"about_me"         =>$request->input('about_me'),

"profile_photo"    =>$formInput['profile_img'],

"role"             =>'coach',

);





$add = User::insert($data);

return redirect()->back()->with('success', 'Add Successfully!'); 

}





public function update_coach_profile(Request $request)
{
 
 $user_id = $request->input('coach_id');
 
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
                    
            return redirect()->back()->with('success_done',"Profile updated successfully");
        }else{
            return redirect()->back()->with('error_done',"Profile not updated, Please try again");
        }

}


public function activeCoachProfile($id)
{

$getid = $id;    

$data =array(
		'status' =>'1',
		);

User::where('id',$getid)->update($data);

$profile = User::where('id',$getid)->first();


// email form data start
$email_data = array(
    'name'  =>  $profile->name,
    'email' =>  $profile->email,
);
// send email with the template
Mail::send('email.coach_active_acc', $email_data, function ($message) use ($email_data) {
    $message->to($email_data['email'], $email_data['name'])
    ->subject('Yippee-ki-yay! Zentia application approved')
    ->from('Zentiaaccess@gmail.com', 'Zentia');
    });
// email form data end

return redirect()->back()->with('success', 'Active Successfully!');

}


public function statusCoachProfile($id,$status)
{
 
 $getid     = $id;    
 $getStatus = $status; 


 $profile = User::where('id',$getid)->first();


 // get data of coach
$email_data = array(
    'name'  =>  $profile->name,
    'email' =>  $profile->email,
    'status' => $getStatus,
);



 
 if($getStatus =='1'){
  
    $random_list = array();
    for ($x = 1; $x <= 3; $x++) {

    $n= (rand(1,10));
    array_push($random_list, $n);
    }

  $data =array(
		'status' =>'2',
		'random_list' =>  implode(',', $random_list),
		);

	User::where('id',$getid)->update($data);
	$profile = User::where('id',$getid)->first();


	// send email with the template
	Mail::send('email.coach_req_status', $email_data, function ($message) use ($email_data) {
	$message->to($email_data['email'], $email_data['name'])
	->subject('You’re live on Zentia! Let the good times roll')
	->from('Zentiaaccess@gmail.com', 'Zentia');
	});
	// email form data end
    
    return redirect()->back()->with('success', 'Approved Successfully!');

 }else{

 $delete = User::findOrFail($getid);

		if($delete->delete()){


		// send email with the template
		Mail::send('email.coach_req_status', $email_data, function ($message) use ($email_data) {
		$message->to($email_data['email'], $email_data['name'])
		->subject('Your profile info wasn’t approved')
		->from('Zentiaaccess@gmail.com', 'Zentia');
		});
		// email form data end

		return redirect('admin-coach-list')->with('success','Rejected Successfully!');

		}

 }

}



public function create_meeting()
{

$username    = "Srk";
$coach       = "Caoch dony";
$meetingId   = uniqid();

$link = url('admin-callbackurl').'/'.$meetingId;
echo $msgs = '<b>'.'</b>'.$username." has Create a meeting join  <a href='$link' target='_blank'>here</a>";


// $data = array(

//             "userid"             =>$request->input('userid'),

//             "coach_id"           =>$request->input('coach_id'),

//             "meeting_min"        =>$request->input('meeting_min'),

//             "meetingId"          =>$meetingId,

//             "meeting_url"        =>$link,
//         );

//$add = User::insert($data);
//return redirect()->back()->with('success', 'Meeting Successfully create!');   

}


public function callback($id)
{  
$order_id = $id;
$bookings = BookingModel::where('order_id', $order_id)->first();
// echo $date = Carbon::now(); echo " fdf  ";
$current_date = date('Y-m-d H:i:s');
$meeting_start_time = $bookings->meeting_start_time;
$session_time1 = $bookings->meeting_session;
$meeting_date = $bookings->meeting_date; 

$ddate = $meeting_start_time;
$meeting_end_time = date('Y-m-d H:i:s', strtotime($ddate. ' +'.$session_time1.' minutes'));

$coach_id = $bookings->coach_id; 
$coach = User::where('id', $coach_id)->first();
$callback_id = $id;  


$secs = strtotime($meeting_end_time) - strtotime($current_date); 
$min = $secs / 60;
$session_time2 = round($min);
if($session_time2 > 0){
    if(($meeting_start_time > $current_date) && ($current_date <= $meeting_end_time)){
        
         return redirect(route('meeting-have-time')); 
    }else{
        $session_time = $session_time2;
    }
    
}else{
    // $session_time = 10;
    return redirect(route('expire-link', $callback_id  )); 
}

$role = Auth::user()->role;
if($role == 'user'){
    return view('admin.meeting_url',compact('callback_id', 'meeting_end_time', 'meeting_start_time', 'current_date', 'session_time', 'coach'));
}else{
    return view('admin.meeting_url_coach',compact('callback_id', 'meeting_end_time', 'meeting_start_time', 'current_date', 'session_time', 'coach'));   
}

     
// if($current_date >= $meeting_start_time){
//     if($current_date <= $meeting_end_time){
//         $callback_id = $id;    
//         return view('admin.meeting_url',compact('callback_id', 'meeting_end_time', 'meeting_start_time', 'current_date'));
//     }else{
//         return view('admin.meeting_expire');
//     }
// }else{
//     return view('admin.meeting_notstart');
// }



}


public function expire_link($id)
{
$booking = BookingModel::where('order_id', $id)->first();

$data = array(
    "status"=>"Done",
);

$updated = BookingModel::where('order_id', $id)->update($data);

$datanot = array(
    "user_id"=>$booking->coach_id,
    "sender_id"=>Auth::user()->id,
    "notification_msg"=> 'Meeting done with '.Auth::user()->name.',now you'.$booking->coach_details->name.' can request for transaction.',
     "url"=>"coach-transaction",
    "status"=>'unseen',
    "page"=>'transaction',
);
        
NotificationModel::create($datanot)->id;
return view('admin.timeOut',compact('booking'));

}

public function meeting_have_time()
{

return view('admin.meeting_have_time');

}

// public function doReview(Request $request)
// {


// $validated = $request->validate([

//                 'rating'      => 'required',
                
//                 'comment'     => 'required',

//              ]);


// $data =array(

//             'coach_id'       =>  'coachid',
            
//             'user_id'        =>  'UserID',
            
//             'rating'         =>  $request->input('rating'),
            
//             'comment'        =>  $request->input('comment'),
           
            
//             );



// RatingModel::insert($data);

// return redirect()->back()->with('success', 'Add Successfully!');


// }



public function payStripe()
{
	

$stripe = new \Stripe\StripeClient(
  'sk_test_51LSJbqSF5Bg24BtJ2oS2YOtaExIJET2PEds982cxQwx59CDj41ttyAa9I4JW037pNZpam8ZtuVaEc45i1TNbjPwc00j0Gl9jG4'
);
$stripe->charges->create([
  'amount' => 2000,
  'currency' => 'usd',
  'source' => 'tok_mastercard',
  'description' => 'My First Test Charge (created for API docs at https://www.stripe.com/docs/api)',
]);



}



public function sliderSelect($id,$status)
{
 
 $ide       = $id;    
 $parameter = $status; 

 
 $data = array(
	
		      'slider'   =>$parameter,
		      
	    
	    	);

	User::where('id',$ide)->update($data);

    return redirect()->back()->with('success', 'Slider Update Successfully!');


}


public function FaqShow()
{


$faqData = FaqModel::all()->sortByDesc("id");

return view('admin.faq',compact('faqData'));


}



public function destroy_faq($id)
{

$ide = $id;

$delete = FaqModel::findOrFail($ide);

if($delete->delete()){

  return redirect()->back()->with('success', 'Delete Successfully!');   

 }
 
}


public function edit_Faq($id)

{

$ide        = $id;

$Faq        = FaqModel::where('id',$ide)->first();


return view('admin.editFaq',compact('Faq'));

}


public function FaqAdd()
{


return view('admin.faqAddList');


}


public function inserFaq(Request $request)
{

$validated = $request->validate([

                'title'      => 'required',
                
                'descp'      => 'required',
                
                'type'       => 'required',

             ]);


$data =array(

            'title'         =>  $request->input('title'),
            
            'descp'         =>  $request->input('descp'),
            
            'type'          =>  $request->input('type'),
            
            
            );



FaqModel::insert($data);

return redirect()->back()->with('success', 'Add Successfully!');


}

public function updateFaq(Request $request)
{

$validated = $request->validate([

                'title'      => 'required',
                
                'descp'      => 'required',
                
                'type'       => 'required',

             ]);

$ide = $request->input('ide');

$data =array(

            'title'         =>  $request->input('title'),
            
            'descp'         =>  $request->input('descp'),
            
            'type'          =>  $request->input('type'),
            
            
            );

FaqModel::where('id',$ide)->update($data);

return redirect()->back()->with('success', 'Update Successfully!');


}



public function ShowBooking()
{
    
   
$bookingList =  BookingModel::all()->sortByDesc("id");
$not_status = NotificationModel::where('admin_status', 'unseen')->where('page', 'booking')->get();
    if(count($not_status) > 0){
        foreach($not_status as $not_sta){
        
            $data = array(
                "admin_status"=>'seen',
            );
            
            $notifications = NotificationModel::where('id', $not_sta->id)->update($data);
           
        }
    }
return view('admin.booking',compact('bookingList'));
}

public function booking_view($id)
{
    $ide = Crypt::decrypt($id);
    $booking = BookingModel::where('id', $ide)->first();
    return view('admin.booking_view',compact('booking'));
}


public function showTransaction()
{
     
     
$transaction = BookingModel::all()->sortByDesc("id");
$not_status = NotificationModel::where('admin_status', 'unseen')->where('page', 'transaction')->get();
    if(count($not_status) > 0){
        foreach($not_status as $not_sta){
        
            $data = array(
                "admin_status"=>'seen',
            );
            
            $notifications = NotificationModel::where('id', $not_sta->id)->update($data);
           
        }
    }
return view('admin.transaction',compact('transaction'));
}



public function transaction_view($id)
{
    $ide     = Crypt::decrypt($id);
    
    $transationView = BookingModel::where('id', $ide)->first();
    $coach_id = $transationView->coach_id;
    
    $coach = User::where('id', $coach_id)->first();
    return view('admin/trans_view',compact('transationView','coach'));
}




public function invoice_view($id)
{
    $ide     = Crypt::decrypt($id);
    
    $transationView = BookingModel::where('id', $ide)->first();
    $coach_id = $transationView->coach_id;
    
    $coach   = User::where('id', $coach_id)->first();
    $country = CountryModel::all()->sortByDesc("id");
    return view('admin/inv_view',compact('transationView','coach','country'));
}



public function payment_approval(Request $request)

{

$validated = $request->validate([

'note'   => 'required',
'status' => 'required',


]);

//input post
$id       =  $request->input('ide');
$note     =  $request->input('note');
$status   =  $request->input('status');

$bookings = BookingModel::where('id', $id)->first();

$coach_id = $bookings->coach_id;
$price    = $bookings->paid_amount;

$exp         = explode(',',$price);

$total_price = array_sum($exp);

$discount    = ($total_price * 20 ) /100 ;

$main_price  = $total_price - $discount ; 

$coach       = User::where('id', $coach_id)->first();

$coach_email = $coach->name;
$coach_name  = $coach->email;

$data = array(

"pay_status"  => $status,

);

BookingModel::where('id',$id)->update($data);

if($status == 'Approved'){
    $sub_ject = 'Your request is approved!';
}else{
     $sub_ject = 'Your Request is rejected!';
}



        // email data
        $email_data = array(
            
            'name'        => $coach_email,
            'email'       => $coach_name,
            'note'        => $note,
            'status'      => $status,
            'main_price'  => $main_price,
            'subject'     => $sub_ject,
            
        );
       
       
      if($status =='Approved'){
     
              //mail function        
            Mail::send('email.admin_payreq_approval', $email_data, function ($message) use ($email_data) {
                        $message->to($email_data['email'],$email_data['name'])
                        ->subject('Your money is on the way')
                        ->from('Zentiaaccess@gmail.com', 'Zentia');
                        });
            //mail function
            
      }else{
          
            //mail function for decline    
                Mail::send('email.admin_payreq_decline', $email_data, function ($message) use ($email_data) {
                            $message->to($email_data['email'],$email_data['name'])
                            ->subject('Your withdrawal has been declined')
                            ->from('Zentiaaccess@gmail.com', 'Zentia');
                            });
                //mail function
          
      }

// Notification

$datanot = array(
    "user_id"=>$coach_id,
    "sender_id"=>Auth::user()->id,
    "notification_msg"=> $sub_ject,
    "url"=>"coach-transaction",
    "status"=>'unseen',
    "page"=>'transaction',
);

NotificationModel::create($datanot)->id;
// ---- end ----    

return redirect()->back()->with('success', 'Payment Request '. $status. ' Successfully!');   

}






}//end of file.

