<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use DB;

class ApiController extends Controller{

	private function check_temp_mobile_otp($mobile_number=null){
            $otp_status     =    DB::select("select * from temp_mobile_otp where mobile_number='$mobile_number'");
            if(!empty($otp_status)){
            	return $otp_status[0]->otp;
            }else{
            	return null; 
            }
	}
	private function user_details_by_mobile_number($mobile_number=null){
	  	    $otp_status     =    DB::select("select * from admin where mobile='$mobile_number'");
	        if(!empty($otp_status)){
	        	return $otp_status;
	        }else{
	        	return []; 
	        }
	} 
   public function user_registration(Request $request){
      	if(empty($request->input('user_name'))){
      		$response = ['status'=>'failure','message'=>'Please Enter User Name'];
      	}elseif(empty($request->input('user_mobile'))){
      		$response = ['status'=>'failure','message'=>'Please Enter Mobile Number'];
      	}elseif(empty($request->input('user_mobile_otp'))){
      		$response = ['status'=>'failure','message'=>'Please Enter OTP'];
      	}elseif(empty($request->input('user_password'))){
      		$response = ['status'=>'failure','message'=>'Please Enter Password'];
      	}elseif(empty($request->input('user_email'))){
      		$response = ['status'=>'failure','message'=>'Please Enter Email Address'];
      	}else{
      		$user_details = $this->user_details_by_mobile_number($request->input('user_mobile'));
      		if(!empty($user_details)){
      		  $response = ['status'=>'failure','message'=>'Mobile Number Already Registred'];
      		}else{
      			$mobile_otp = $this->check_temp_mobile_otp($request->input('user_mobile'));
	      		if($mobile_otp!=$request->input('user_mobile_otp')){
	      		  $response = ['status'=>'failure','message'=>'Please Enter Valid OTP'];
	      		}else{
	      			$user = array(
		                'name' => $request->input('user_name'),
		                'mobile' => $request->input('user_mobile'),
		                'email' => $request->input('user_email'),
		                'mobile_otp' => $request->input('user_mobile_otp'),
		                'email_otp' => mt_rand(100000,999999),
		                'password' => $request->input('user_password'),
		                'city' => '',
		                'state' => '',
		                'country' => 'india',
		                'email_verify' => 1,
		                'passport_file' => '',
		                'pan_file' => '',
		                'adhaar_file' => '',
		                'type' => 'user',
		                'status'=> 1,
		                'created_by'=> 'self'
		                    );
		      			$status = DB::table('admin')->insert($user);
			            if(!empty($status)){
	      					$user_details = $this->user_details_by_mobile_number($request->input('user_mobile'));
	      					unset($user_details[0]->password);
	      					$response = ['status'=>'success','message'=>'User has been added successfully','result'=>$user_details];		              
			            }else{
	      					$response = ['status'=>'success','message'=>'Some Problem Occured Try Again'];
	   		            }

	      		     }
      		    }      		
      	    }
   	      return response()->json($response);
   }
   public function user_registration_otp_generate(Request $request){
   		if(empty($request->input('user_mobile'))){
      		$response = ['status'=>'failure','message'=>'Please Enter Mobile Number'];
      	}else{
      		$mobile_status = $this->check_temp_mobile_otp($request->input('user_mobile'));	
      		if(!empty($mobile_status)){
      			$update = ['otp'=>rand(111111,999999)];
      			$status = DB::table('temp_mobile_otp')->where('mobile_number',$request->input('user_mobile'))->update($update);
      		    $response = ['status'=>'success','message'=>'OTP Send Successfully','result'=>array(0=>$update)];
      		}else{
      			$update = ['otp'=>rand(111111,999999),'mobile_number'=>$request->input('user_mobile')];
      			$status = DB::table('temp_mobile_otp')->insert($update);
      		    $response = ['status'=>'success','message'=>'OTP Send Successfully','result'=>array(0=>$update)];
      		}
      	}
   	    return response()->json($response);
   }
   public function user_login(Request $request){
		  if(empty($request->input('user_mobile'))){
      		$response = ['status'=>'failure','message'=>'Please Enter Mobile Number'];
      	}elseif(empty($request->input('user_password'))){
      		$response = ['status'=>'failure','message'=>'Please Enter Password'];
      	}else{
      		$mobile_number  =    $request->input('user_mobile');
      		$user_password  =    $request->input('user_password');
      		$user_details   =    DB::select("select * from admin where mobile='$mobile_number' and password='$user_password' and type='user'");
      		if(empty($user_details)){
      		   $response = ['status'=>'failure','message'=>'Please Enter Valid Credential'];
      		}elseif($user_details[0]->status=='0'){
      		   $response = ['status'=>'failure','message'=>'User Bolocked Please Contact To Admin'];      			
      		}else{
	      	    unset($user_details[0]->password);
	      		$response = ['status'=>'success','message'=>'User has been Loged In successfully','result'=>$user_details];		              
      		}
      	}
   	    return response()->json($response);
   }
   private function amenities_details_by_amenities_ids($amenities_id=null){
            $amenities_id       =   implode(",",json_decode($amenities_id));
            $amenities_list     =    DB::select("select * from amenities where id in($amenities_id)");
            if($amenities_list){
              foreach ($amenities_list as $key => $value) {
                $value->amenities_logo = url('').'/amenities_image/'.$value->amenities_logo;
                $final[] = $value;
              }
              return $final;
            }else{
              return [];
            }
   }
   private function country_details_by_country_id($country_id=null){
            $country_list     =    DB::select("select * from countries where id='$country_id'");
            if($country_list){
              return $country_list;
            }else{
              return [];
            }
   }
   private function itinerary_details_by_itinerary_id($itinerary_id=null){
            $itinerary_list     =    DB::select("select * from itinerary where id='$itinerary_id'");
            $records            =     [];
            if($itinerary_list){
                foreach ($itinerary_list as $key => $value) {
                  $value->category_details = $this->category_details_by_category_id($value->category_id);
                  $value->country_details  = $this->country_details_by_country_id($value->country);
                  $value->state_details    = $this->state_details_by_state_id($value->state);
                  $value->city_details     = $this->city_details_by_city_id($value->city);
                  $value->Itinerary_image  = url('').'/itinerary_image/'.$value->Itinerary_image;
                  $records[]               = $value;
                }
            }
            return $records;
   }
   private function category_details_by_category_id($category_id=null){
            $category_list     =    DB::select("select * from category where id='$category_id'");
            if($category_list){
              foreach ($category_list as $key => $value) {
                  $value->category_logo  = url('').'/category_image/'.$value->category_logo;
                  $final[] = $value;                
              }
              return $final;
            }else{
              return [];
            }
   }
   private function state_details_by_state_id($state_id=null){
            $state_list     =    DB::select("select * from states where id='$state_id'");
            if($state_list){
              return $state_list;
            }else{
              return [];
            }
   }
   private function city_details_by_city_id($city_id=null){
            $city_list     =    DB::select("select * from cities where id='$city_id'");
            if($city_list){
              return $city_list;
            }else{
              return [];
            }
   }
   private function itinerary_details_by_itinerary_ids($itinerary_id=null,$packages=null){
          if(!empty($itinerary_id) && strpos($itinerary_id,'null')===false){
            $itinerary_id       =    implode(",",json_decode($itinerary_id));
            $itinerary_list     =    DB::select("select * from itinerary where id in($itinerary_id)");
            $records            =     [];
            if($itinerary_list){
                foreach ($itinerary_list as $key => $value) {
                  $value->category_details = $this->category_details_by_category_id($value->category_id);
                  $value->country_details  = $this->country_details_by_country_id($value->country);
                  $value->state_details    = $this->state_details_by_state_id($value->state);
                  $value->city_details     = $this->city_details_by_city_id($value->city);
                  $value->flight_type      = json_decode($packages->flight_type,true)[$key];
                  $value->flight_date_time = json_decode($packages->flight_date_time,true)[$key];
                  $value->flight_number    = json_decode($packages->flight_number,true)[$key];
                  $value->flight_from      = json_decode($packages->flight_from,true)[$key];
                  $value->flight_to        = json_decode($packages->flight_to,true)[$key];
                  $value->Itinerary_image  = url('').'/itinerary_image/'.$value->Itinerary_image;
                  
                  $records[]               = $value;
                }
            }
          }else{
            $records            =     [];
          }
          return $records;
   }
   private function package_image_details($packages=null){
         $title       = json_decode($packages->package_image_title,true);
         $description = json_decode($packages->package_image_description,true);
         $image       = json_decode($packages->package_image,true);
         $final       = [];
         foreach ($title as $key => $value) {
           $final[] = array('image_title'=>$title[$key],'image_description'=>$description[$key],'image'=>url('').'/packages_image/'.$image[$key]);
         }
         return $final;
   }
   private function itinerary_list_from_package_id($package_id){
            $itinerary_list     =    DB::select("select * from package_itinerary where package_id='$package_id'");
            $final              =    [];
            if($itinerary_list){
              foreach ($itinerary_list as $key => $value) {
                $value->item_details = $this->itinerary_details_by_itinerary_id($value->iternity_item);
                $final[] = $value;
              }
              return $final;
            }else{
              return [];
            }
   }
   public function banner_list(Request $request){
        $response = ['status'=>'failure','message'=>'List Not Available'];
        $package_list     =    DB::select("select * from package where banner='1'");
        if(!empty($package_list)){
          foreach ($package_list as $key => $packages) {
             $packages->country_details   = $this->country_details_by_country_id($packages->package_country);
             $packages->amenities_details = $this->amenities_details_by_amenities_ids($packages->amenities_list);
             $packages->hotel_details     = $this->itinerary_details_by_itinerary_id($packages->hotel_list);
             $packages->flight_details    = $this->itinerary_details_by_itinerary_ids($packages->flight_list,$packages);
             $packages->package_images    = $this->package_image_details($packages);
             $packages->itinerary_details = $this->itinerary_list_from_package_id($packages->id);
             $list[] = $packages;
          }
          $response = ['status'=>'success','message'=>'Banner Get successfully','result'=>$list];   
        }
          return response()->json($response);
   }
   public function hot_place_list(Request $request){
        $response = ['status'=>'failure','message'=>'List Not Available'];
        $package_list     =    DB::select("select * from package where hot_place='1'");
        if(!empty($package_list)){
          foreach ($package_list as $key => $packages) {
             $packages->country_details   = $this->country_details_by_country_id($packages->package_country);
             $packages->amenities_details = $this->amenities_details_by_amenities_ids($packages->amenities_list);
             $packages->hotel_details     = $this->itinerary_details_by_itinerary_id($packages->hotel_list);
             $packages->flight_details    = $this->itinerary_details_by_itinerary_ids($packages->flight_list,$packages);
             $packages->package_images    = $this->package_image_details($packages);
             $packages->itinerary_details = $this->itinerary_list_from_package_id($packages->id);
             $list[] = $packages;
          }
          $response = ['status'=>'success','message'=>'Hot Places Get successfully','result'=>$list];   
        }
          return response()->json($response);
   }


}

      