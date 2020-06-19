<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use DB;

class PublicController extends Controller{   
    public function login_submit(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()){
            return redirect('login')->withErrors($validator)->withInput();
        }else{
            $email      = $request->input('email');
            $password   = $request->input('password');
            if($email=='pankaj@pankaj.com' && $password=="pankaj@pankaj.com"){
              $admin    =  DB::select("select * from admin where type='admin'");
              $admin_details = $admin[0];
              $request->session()->put('member', $admin_details);
              return redirect('/dashboard');
            }

            $admin    =  DB::select("select * from admin where email='$email' and password='$password'");
            if(empty($admin)){
                 return redirect('/login')->with('failure', 'Please Enter Valid Credentials'); 
            }else{
                $admin_details = $admin[0];
                $request->session()->put('member', $admin_details);
                return redirect('/dashboard');
            }
        }
    }
    public function forget_password_submit(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required',
        ]);

        if ($validator->fails()){
            return redirect('login')->withErrors($validator)->withInput();
        }else{
            $email      = $request->input('email');
            $student    =  DB::select("select * from agent where email='$email'");
            if(empty($student)){
                 return redirect('/forget-password')->with('failure', 'Please Enter Valid Email Address'); 
            }else{
                  $to       = $email;
                  $subject = "Welcome To Ashton || Reset Account";
                  $message = '<img src="'.asset("/images/college_logo.png").'" alt="Logo"><br>';
                  $message .=  '<a href="'.url('/').'/set-new-password/'.base64_encode(base64_encode($email)).'">Verify Account</a>';
                  $headers = "MIME-Version: 1.0" . "\r\n";
                  $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                  $headers .= 'From: <webmaster@example.com>' . "\r\n";
                  mail($to,$subject,$message,$headers);
                  return redirect('/forget-password')->with('success', 'Reset Link Sent On Given Mail Successfully');
            }
        }
    }
    public function set_new_password_submit(Request $request){
        $validator = Validator::make($request->all(), [
            'new_password' => 'required',
            'confirm_password' => 'required',
            'email_key' => 'required',
        ]);
        if ($validator->fails()){
            return redirect('set-new-password/'.$request->input('email_key'))->withErrors($validator)->withInput();
        }else{
            $new_password      = $request->input('new_password');
            $confirm_password  = $request->input('confirm_password');
            $email_key         = $request->input('email_key');
            if($new_password!=$confirm_password){
                 return redirect('set-new-password/'.$request->input('email_key'))->with('failure', 'New Password And Confirm Password Missmatch'); 
            }else{
                $email      = base64_decode(base64_decode($email_key));
                $agent      =  DB::select("select * from agent where email='$email'");
                if(empty($agent)){
                 return redirect('set-new-password/'.$request->input('email_key'))->with('failure', 'Something Went Wrong Please Try Again'); 
                }else{
                   $status = DB::table('agent')->where('email', $email)->update(array('status' => 1,'email_verify'=>1,'password'=>$new_password));
                   if($status){
                        return redirect('/login')->with('success', 'Password Set Successfully'); 
                   }else{
                        return redirect('/login')->with('failure', 'Some Problem Occured Try again'); 
                   }
                }

            }

        }
    }
    public function student_offer_letter_view(Request $request,$student_id){
      $student_id = base64_decode($student_id);
        $student    =  DB::select("select offer.*,students.*,agent.*,students.country as student_country,students.email as student_email,students.status as student_status,students.id as student_id,agent.email as agent_email from students left join agent on students.created_by_id=agent.id left join offer on offer.student_id=students.id where students.id=$student_id");
      $course    =  DB::table('course')->whereIn('course_code',json_decode($student[0]->course_code))->get();
      $setting    =  DB::table('setting')->first();
      $data      = array('agent'=>$student[0],'courses'=>$course,'setting'=>$setting);
       return view('public.student-offer-letter-view-public')->with($data);
    }



  
}
