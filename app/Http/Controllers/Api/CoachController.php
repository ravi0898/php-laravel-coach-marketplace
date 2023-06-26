<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;
use App\Http\Requests\CoachUpdateRequest;
use App\Http\Resources\CoachResource;

use App\User;
use App\ExpertiseModel;
use App\IndustryModel;
use App\SeniorityModel;
use App\BusinessModel;
use Auth;

class CoachController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
        
    // }

   
    // public function create()
    // {
    //     //
    // }

  
    // public function store(Request $request)
    // {
    //     //
    // }

    
    // public function profile()
    // {
    //     try {
    //         return $this->returnResponse(true, "Data Received", null, null);
    //     } catch (\Throwable $th) {
    //         return $this->returnResponse(false, null, "ERR001", $this->getExceptionMessage($th));
    //     }
    // }

   
    // public function edit($id)
    // {
    //     //
    // }

    // public function update(Request $request, $id)
    // {
    //     //
    // }

    // public function destroy($id)
    // {
    //     //
    // }
    
    // public function update__(CoachUpdateRequest $request)
    // {

    //     try {
    //         $data = [
    //             "id" => $request->id,
    //             "name" => $request->name,
    //             "email" => $request->email
    //         ];
    //         $data = (object) $data;
    //         // $dataResource =  CoachResource::collection($data);
    //         $dataResource =  new CoachResource($data);

    //         return $this->returnResponse(true, "Data Received", null, null,$dataResource);
    //     } catch (\Throwable $th) {
    //         return $this->returnResponse(false, null, "ERR001", $this->getExceptionMessage($th));
    //     }
        
    //     $requestParams = $request->validated();
    //     // $requestParams['last_name'];
    //     $user_id = $id;
    //     // Auth::user()->id;
       
    //     $validated = $request->validate([
    //         'name' => 'required', 'string', 'max:50',
    //         'last_name' => 'required', 'string', 'max:50',
    //         'phone' => 'required', 'max:15',
    //         'company' => 'required', 'max:100',
    //         'country' => 'required',
    //         'profile_photo' => 'required',
    //         'profile_headline' => 'required', 'max:500',
    //         'biography' => 'required', 'max:1000',
    //         'expertise' => 'required',
    //         'seniority' => 'required',
    //         'industry' => 'required',
    //         'business_model' => 'required',
    //         'price_20' => 'required', 'numeric', 'max:10000000',
    //         'price_40' => 'required', 'numeric', 'max:10000000',
    //         'price_60' => 'required', 'numeric', 'max:10000000',
    //         'available_slots' => 'required',
    //         'account_details' => 'required',
    //         'about_me' => 'required',
    //         'people_expect' => 'required',
            
    //     ]);

    //     if($request->file('profile_photo')){
    //         $image = $request->file('profile_photo');
    //         if($image->isValid()){
    //             if(!empty($request->input('profile_photo_old'))){
    //                 if(file_exists(public_path('/').'/'.$request->input('profile_photo_old'))){
    //                     unlink(public_path('/').'/'.$request->input('profile_photo_old')); 
    //                 }
    //             }
    //             $extension = $image->getClientOriginalExtension();
    //             $fileName = rand(100,999999).time().'.'.$extension;
    //             $image_path = public_path('upload/user/profile_photo');
    //             $request->profile_photo->move($image_path, $fileName);
    //             $formInput['profile_photo'] = 'upload/user/profile_photo/'.$fileName;
    //         }
    //         unset($formInput['profile_photo_old']);
    //     }else{
    //         $formInput['profile_photo'] = $request->input('profile_photo_old');
    //     }

    //     $data = array(
           
    //         "name"=>$request->input('name'),
    //         "last_name"=>$request->input('last_name'),
    //         "phone"=>$request->input('phone'),
    //         "company"=>$request->input('company'),
    //         "country"=>$request->input('country'),
    //         "profile_photo"=>$formInput['profile_photo'],
    //         "profile_headline"=>$request->input('profile_headline'),
    //         "biography"=>$request->input('biography'),
    //         "expertise"=>$request->input('expertise'),
    //         "seniority"=>$request->input('seniority'),
    //         "industry"=>$request->input('industry'),
    //         "business_model"=>$request->input('business_model'),
    //         "price_20"=>$request->input('price_20'),
    //         "price_40"=>$request->input('price_40'),
    //         "price_60"=>$request->input('price_60'),
    //         "available_slots"=>$request->input('available_slots'),
    //         "account_details"=>$request->input('account_details'),
    //         "about_me"=>$request->input('about_me'),
    //         "people_expect"=>$request->input('people_expect'),
    //         "role"=>'coach',
            
    //     );
        
    //     $updated = User::where('id',$user_id)->update($data);
    //     if(!empty($updated)){
    //        return response()->json([ 'status' => '200', 'response' => 'success' ]);
    //     }else{ 
    //         return response()->json([ 'status' => '201', 'response' => 'error' ]);
    //     }
    // }

    
    

    // public function index__()
    // {
    //      try {
    //         return $this->returnResponse(true, "Data Received", null, null);
    //     } catch (\Throwable $th) {
    //         return $this->returnResponse(false, null, "ERR001", $this->getExceptionMessage($th));
    //     }
    // }


    public function index()
    {
        return view('coach_dashboard');
    }

    public function profile()
    {
        $user_id = 3;
        $user = User::where('id', $user_id)->first();
        $expertises = ExpertiseModel::all();
        $industries = IndustryModel::all();
        $seniorities = SeniorityModel::all();
        $business_models = BusinessModel::all();
        return view('coach/profile',compact('expertises', 'user', 'industries', 'seniorities', 'business_models'));
    }

     public function update_profile(Request $request)
    {   

        $user_id = 3;
       
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
                $image_path = public_path('upload/coach/profile_photo');
                $request->profile_image->move($image_path, $fileName);
                $formInput['profile_image'] = 'upload/coach/profile_photo/'.$fileName;
            }
            unset($formInput['profile_image_old']);
        }else{
            $formInput['profile_image'] = $request->input('profile_image_old');
        }

        $validated = $request->validate([
            'name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'phone' => 'required|numeric',
            'company' => 'required|max:100',
            'country' => 'required',
            // 'profile_photo' => 'required',
            // 'profile_headline' => 'required', 'max:500',
            'biography' => 'required|max:1000',
            'expertise' => 'required',
            'seniority' => 'required',
            'industry' => 'required',
            'business_model' => 'required',
            'price_20' => 'required|numeric',
            'price_40' => 'required|numeric', 
            'price_60' => 'required|numeric',
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
            "last_name"=>$request->input('last_name'),
            "phone"=>$request->input('phone'),
            "company"=>$request->input('company'),
            "country"=>$request->input('country'),
            "profile_photo"=>$formInput['profile_image'],
            // "profile_headline"=>$request->input('profile_headline'),
            "biography"=>$request->input('biography'),
            "expertise"=>$expertise_list,
            "seniority"=>$seniority_list,
            "industry"=>$industry_list,
            "business_model"=>$business_model_list,
            "price_20"=>$request->input('price_20'),
            "price_40"=>$request->input('price_40'),
            "price_60"=>$request->input('price_60'),
            // "available_slots"=>$request->input('available_slots'),
            // "account_details"=>$request->input('account_details'),
            "about_me"=>$request->input('about_me'),
            // "people_expect"=>$request->input('people_expect'),
            // "role"=>'coach',
            "account_no"=>$request->input('account_no'),
            "swift_code"=>$request->input('swift_code'),
            "ifc_code"=>$request->input('ifc_code'),
            "bank_holder_name"=>$request->input('bank_holder_name'),
            
        );
        
        $updated = User::where('id',$user_id)->update($data);
        if(!empty($updated)){
            return response()->json([ 'status' => '200', 'response' => 'success' ]);
            // return redirect()->back()->with('success_done',"Profile updated successfully");
        }else{
            return response()->json([ 'status' => '201', 'response' => 'error' ]);
            // return redirect()->back()->with('error_done',"Profile not updated, Please try again");
        }
    }
     
}
