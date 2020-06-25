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
    public function user_registration_otp_generate(Request $request){
        if(empty($request->input('user_mobile'))){
            $response = ['status'=>'failure','message'=>'please enter mobile number'];
          }else{
            $mobile_status = $this->check_temp_mobile_otp($request->input('user_mobile'));  
            if(!empty($mobile_status)){
              $update = ['otp'=>rand(111111,999999)];
              $status = DB::table('temp_mobile_otp')->where('mobile_number',$request->input('user_mobile'))->update($update);
                $response = ['status'=>'success','message'=>'otp send uccessfully','result'=>array(0=>$update)];
            }else{
              $update = ['otp'=>rand(111111,999999),'mobile_number'=>$request->input('user_mobile')];
              $status = DB::table('temp_mobile_otp')->insert($update);
                $response = ['status'=>'success','message'=>'otp send uccessfully','result'=>array(0=>$update)];
            }
          }
          return response()->json($response);
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
            $response = ['status'=>'failure','message'=>'please enter name'];
          }elseif(empty($request->input('user_mobile'))){
            $response = ['status'=>'failure','message'=>'please enter mobile number'];
          }elseif(empty($request->input('user_mobile_otp'))){
            $response = ['status'=>'failure','message'=>'please enter otp'];
          }elseif(empty($request->input('user_password'))){
            $response = ['status'=>'failure','message'=>'please enter password'];
          }elseif(empty($request->input('user_email'))){
            $response = ['status'=>'failure','message'=>'please enter email address'];
          }else{
            $user_details = $this->user_details_by_mobile_number($request->input('user_mobile'));
            if(!empty($user_details)){
              $response = ['status'=>'failure','message'=>'mobile number already registred'];
            }else{
              $mobile_otp = $this->check_temp_mobile_otp($request->input('user_mobile'));
              if($mobile_otp!=$request->input('user_mobile_otp')){
                $response = ['status'=>'failure','message'=>'please enter valid otp'];
              }else{
                $user = array(
                      'name' => $request->input('user_name'),
                      'mobile' => $request->input('user_mobile'),
                      'email' => $request->input('user_email'),
                      'mobile_otp' => $request->input('user_mobile_otp'),
                      'email_otp' => mt_rand(100000,999999),
                      'password' => $request->input('user_password'),
                      'city_id' => '',
                      'state_id' => '',
                      'country_id' => '',
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
    public function verify_otp(Request $request){
        if(empty($request->input('user_mobile'))){
            $response = ['status'=>'failure','message'=>'please enter mobile number'];
          }elseif(empty($request->input('user_otp'))){
            $response = ['status'=>'failure','message'=>'please enter otp'];
          }else{
            $mobile_number  =    $request->input('user_mobile');
            $user_otp       =    $request->input('user_otp');
            $user_details   =    DB::select("select * from temp_mobile_otp where mobile_number='$mobile_number' and otp='$user_otp'");
            if(empty($user_details)){
               $response = ['status'=>'failure','message'=>'please enter valid otp'];
            }else{
              $update = ['otp'=>$user_otp];
              $response = ['status'=>'success','message'=>'otp verify successfully','result'=>array(0=>$update)];                 
            }
          }
          return response()->json($response);
    }
    public function user_login(Request $request){
  		  if(empty($request->input('user_mobile'))){
        		$response = ['status'=>'failure','message'=>'please enter mobile number'];
        	}elseif(empty($request->input('user_password'))){
        		$response = ['status'=>'failure','message'=>'please enter password'];
        	}else{
        		$mobile_number  =    $request->input('user_mobile');
        		$user_password  =    $request->input('user_password');
        		$user_details   =    DB::select("select * from admin where mobile='$mobile_number' and password='$user_password' and type='user'");
        		if(empty($user_details)){
        		   $response = ['status'=>'failure','message'=>'please enter valid credential'];
        		}elseif($user_details[0]->status=='0'){
        		   $response = ['status'=>'failure','message'=>'user blocked please contact to admin'];      			
        		}else{
  	      	    unset($user_details[0]->password);
  	      		$response = ['status'=>'success','message'=>'user has been loged in successfully','result'=>$user_details];		              
        		}
        	}
     	    return response()->json($response);
    }
    public function verify_coupon(Request $request){
        if(empty($request->input('coupon_code'))){
            $response = ['status'=>'failure','message'=>'please enter coupon code'];
          }else{
            $coupon_code  =    $request->input('coupon_code');
            $user_details =    DB::select("select * from coupons where coupon_code='$coupon_code'");
            if(empty($user_details)){
               $response = ['status'=>'failure','message'=>'please enter valid coupon code'];
            }elseif($user_details[0]->status=='0'){
               $response = ['status'=>'failure','message'=>'coupon code no longer available'];
            }else{
              $response = ['status'=>'success','message'=>'coupon fetch successfully','result'=>$user_details];                 
            }
          }
          return response()->json($response);
    }
    public function verify_referer(Request $request){
        if(empty($request->input('referer_code'))){
            $response = ['status'=>'failure','message'=>'please enter referer code'];
          }else{
            $referer_code  =    base64_decode($request->input('referer_code'));
            $user_details =    DB::select("select * from admin where id='$referer_code' and status='1'");
            if(empty($user_details)){
               $response = ['status'=>'failure','message'=>'please enter valid referer code'];
            }else{
              $response = ['status'=>'success','message'=>'referer verified successfully','result'=>[]];                 
            }
          }
          return response()->json($response);
    }
    private function user_details_by_id($user_id=null){
      $user_details   =    DB::select("select * from admin where id='$user_id' and type='user'");
      if(!empty($user_details)){
          return $user_details;
      }else{
          return [];                      
      }
    }
    private function package_details_by_package_id($package_id=null){
      $package_details   =    DB::select("select * from package where id='$package_id'");
      if(!empty($package_details)){
          return $package_details;
      }else{
          return [];                      
      }
    }
    private function coupon_details_by_coupon_code($coupon_code=null){
       $copon_details =    DB::select("select * from coupons where coupon_code='$coupon_code'");
       if(!empty($copon_details)){
               return $copon_details;
       }else{
              return [];
       }
    }
    private function itinerary_details_by_id($id=null){
       $iternery_details =    DB::select("select * from package_itinerary where id='$id'");
       if(!empty($iternery_details)){
               return $iternery_details;
       }else{
              return [];
       }
    }
    public function package_purchase(Request $request){
      $user_id           = $created_by = $request->input('user_id');
      $number_of_person  = $request->input('number_of_person');
      $journey_date      = $request->input('journey_date');
      $package_id        = $request->input('package_id');
      $coupon_code       = $request->input('coupon_code');
      $referer_code      = $request->input('referer_code');
      $package_itinerary = $request->input('package_itinerary');
      $package_final_price = $request->input('package_final_price');
      $final_itenery     = [];
      $response          = [];
      $total_cost        = 0;
        if(empty($user_id)){
            $response = ['status'=>'failure','message'=>'please enter user id'];
        }elseif(empty($this->user_details_by_id($user_id))){
            $response = ['status'=>'failure','message'=>'please enter valid user id'];
        }elseif(empty($number_of_person)){
            $response = ['status'=>'failure','message'=>'please enter number of person'];
        }elseif(empty($journey_date)){
            $response = ['status'=>'failure','message'=>'please enter journey date'];
        }elseif(empty($package_id)){
            $response = ['status'=>'failure','message'=>'please enter package id'];
        }elseif(empty($package_details = $this->package_details_by_package_id($package_id))){
            $response = ['status'=>'failure','message'=>'please enter valid package id'];
        }elseif(empty($package_itinerary)){
            $response = ['status'=>'failure','message'=>'please enter package itinerary'];
        }elseif(empty($package_final_price)){
            $response = ['status'=>'failure','message'=>'please enter package final price'];
        }else{

            if(!empty($referer_code)){
              $referer_status = $this->user_details_by_id(base64_decode($referer_code)); 
              if(empty($referer_status)){
                $response = ['status'=>'failure','message'=>'please enter valid referer code'];
              }else{
                $created_by = base64_decode($referer_code);
              }
            }
            $package_itinerary = explode(',',$package_itinerary);
            foreach ($package_itinerary as $key => $itinerary_id) {
              $itinerary_status = $this->itinerary_details_by_id($itinerary_id);
              if(empty($itinerary_status)){
                $response = ['status'=>'failure','message'=>'please enter valid package itinerary'];
              }else{
                if($itinerary_status[0]->itinerary_default_status==1){
                  $total_cost      += $itinerary_status[0]->itinerary_cost;
                }
                $final_itenery[] = $itinerary_status[0];
              }
            }
            $total_cost  += $package_details[0]->package_cost;

            if(!empty($coupon_code)){
              $coupon_status = $this->coupon_details_by_coupon_code($coupon_code);
              if(empty($coupon_status)){
                $response = ['status'=>'failure','message'=>'please enter valid coupon code'];
              }else{
                if($coupon_status[0]->coupon_type=='flat'){
                  $total_cost -= $coupon_status[0]->coupon_value;
                }elseif($coupon_status[0]->coupon_type=='percentage'){
                  $total_cost = $total_cost-($total_cost*$coupon_status[0]->coupon_value)/100;
                }
              }
            }

            if($package_final_price!=$total_cost){
              $response = ['status'=>'failure','message'=>'please enter package final price calculation mismatch'];
            }
            
            if(empty($response)){
              $insert = [
                        'user_id'=>$user_id,
                        'adult'=>$number_of_person,
                        'journey_date'=>$journey_date,
                        'package_id'=>$package_id,
                        'coupon_code'=>$coupon_code,
                        'created_by'=>$created_by,
                        'itinerary_ids_costs'=>json_encode($final_itenery),
                        'package_cost'=>$package_details[0]->package_cost,
                        'final_package_cost'=>$total_cost,
                        'package_status'=>1,
                        'status'=>1,
                        'ticket_file'=>' ',
                        'insurance_file'=>' ',
                        'cruise_ticket_file'=>' ',
                        'hotel_ticket'=>' '
                      ];
              $status = DB::table('package_booked')->insert($insert);
              if($status){
                $response = ['status'=>'success','message'=>'package purchased successfully','result'=>$package_details];
              }else{
                $response = ['status'=>'failure','message'=>'package purchased failed,try again','result'=>[]];
              }
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
                  $value->country_details  = $this->country_details_by_country_id($value->country_id);
                  $value->state_details    = $this->state_details_by_state_id($value->state_id);
                  $value->city_details     = $this->city_details_by_city_id($value->city_id);
                  $value->Itinerary_image  = url('').'/itinerary_image/'.$value->itinerary_image;
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
                  $value->country_details  = $this->country_details_by_country_id($value->country_id);
                  $value->state_details    = $this->state_details_by_state_id($value->state_id);
                  $value->city_details     = $this->city_details_by_city_id($value->city_id);
                  $value->flight_type      = json_decode($packages->flight_type,true)[$key];
                  $value->flight_date_time = json_decode($packages->flight_date_time,true)[$key];
                  $value->flight_number    = json_decode($packages->flight_number,true)[$key];
                  $value->flight_from      = json_decode($packages->flight_from,true)[$key];
                  $value->flight_to        = json_decode($packages->flight_to,true)[$key];
                  $value->Itinerary_image  = url('').'/itinerary_image/'.$value->itinerary_image;
                  
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
   private function get_product_list(){
      $package_list     =    DB::select("select DISTINCT category_id from package where category_id>=1");
      $list             =    [];
      if(!empty($package_list)){
         return $package_list;
      }else{
         return $list;
      }
   }
   public function product_list(Request $request){
        $response         = ['status'=>'failure','message'=>'product list not available'];
        $packages_list    =    DB::select("select * from category");
        if(!empty($packages_list)){
          foreach ($packages_list as $key => $packages_lists) {
             $category_id      =    $packages_lists->id;
             $category_name    =    $packages_lists->category_name;
             $category_image   =    url('').'/category_image/'.$packages_lists->category_logo;
              $package_list    =    DB::select("select * from product where category_id='$category_id' and banner='1'");
              if(!empty($package_list)){
                $list    = [];
                foreach ($package_list as $key => $packages) {
                   $packages->country_details   = $this->country_details_by_country_id($packages->package_country);
                   $packages->amenities_details = $this->amenities_details_by_amenities_ids($packages->amenities_list);
                   $packages->hotel_details     = $this->itinerary_details_by_itinerary_id($packages->hotel_list);
                   $packages->flight_details    = $this->itinerary_details_by_itinerary_ids($packages->flight_list,$packages);
                   $packages->package_images    = $this->package_image_details($packages);
                   $packages->itinerary_details = $this->itinerary_list_from_package_id($packages->id);
                   $list[] = $packages;
                }
                $final[]  = array('category'=>$category_name,'category_image'=>$category_image,'details'=>$list);
                $response = ['status'=>'success','message'=>'Product List Get successfully','result'=>$final];   
              }

          }
        }      
        return response()->json($response);
   }
   public function purchase_package(Request $request){
        $user_id            = $request->input('user_id');
        $package_id         = $request->input('package_id');
        $package_cost_value = $request->input('package_cost_value');
        $coupon_code        = $request->input('coupon_code');
        $all_itinery        = $request->input('itinerary_add');
        $final_package_cost = $request->input('final_package_cost');
        $created_by         = $request->input('user_id');

        if(empty($user_id)){
          $response = ['status'=>'failure','message'=>'Please Enter User Id'];
        }elseif(empty($package_id)){
          $response = ['status'=>'failure','message'=>'Please Enter Package Id'];
        }elseif(empty($package_cost_value)){
          $response = ['status'=>'failure','message'=>'Please Enter Package Total Cost'];
        }elseif(empty($final_package_cost)){
          $response = ['status'=>'failure','message'=>'Please Enter Package Final Package Cost'];
        }else{
          $ids_costs   = [];
          if(!empty($all_itinery)){
            foreach ($all_itinery as $key => $iternity) {
             $ids_costs[] = json_decode(base64_decode($iternity),true);
            }
          }          
          $iternity_details = $ids_costs;
          $booking = array(
                'user_id' => $user_id,
                'package_id' => $package_id,
                'coupon_code' => $coupon_code,
                'itinerary_ids_costs' => json_encode($iternity_details),
                'package_cost' => $package_cost_value,
                'final_package_cost' => $final_package_cost,
                'created_by'=> $created_by,
                'package_status' => 1,
                'status' => 1,
                'ticket_file' => '',
                'insurance_file' => '',
                'cruise_ticket_file'=> '',
                'hotel_ticket' => '',
          );
          $status = DB::table('package_booked')->insert($booking);
          if(!empty($status)){
            $response = ['status'=>'success','message'=>'Package Purchased Successfully'];              
          }else{
            $response = ['status'=>'success','message'=>'Some Problem Occured Try Again'];
          }
        }
        return response()->json($response);
   } 

}

      