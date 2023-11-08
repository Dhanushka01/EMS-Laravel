<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Login\Mnrce_admin_login;

use App\Models\User\Mnrce_admin_user;

use App\Models\Employee\Personal\Mnrce_admin_emp_personal;
use App\Models\Employee\Epf\Mnrce_admin_emp_epf;

class MnrceAdminLoginController extends Controller {

   public function index(Request $req) {
		if(session('uname') && session('Status')=='A'){
	   		return redirect('dash-board');	
	   	}
	   	else{

	   		return view('login.login');  
	   	}		
			  	

    }

    function userLogin(Request $req) {
    	if(isset($_POST['submit'])) {
	    	
			$data=$req->input();
			$user= $data['username'];
			$pass=md5($data['password']);
	    	
			$user1= Mnrce_admin_user::where('username', $user)
														->where('password', $pass)
            		  								->count();
            		   	  
         if($user1==1) {
         	
				$user2= Mnrce_admin_user::where('username', $user)
															->where('password', $pass)
								            		   ->get();
								            		   
	         if($user2[0]['user_status']=='D') {
         		$req->session()->put('login1','Your account is disabled. Please contact system administrator.  !!!');
					return back(); 	         	
	         }
	         elseif($user2[0]['user_status']=='L') {
         		$req->session()->put('login2','Your account is temporary locked. Please contact system administrator.  !!!');
					return back(); 	         	
	         }
	         	         
	         $user3= Mnrce_admin_emp_personal::where('id', $user2[0]['epf_id'])
	            		   							->get();  	
	
	         $user4= Mnrce_admin_emp_epf::where('emp_id', $user2[0]['epf_id'])
	            		   							->get();              		   								   
	            		   
	         $req->session()->put('user',$user2[0]['id']);
	         
	         $req->session()->put('epf_id',$user2[0]['epf_id']);
	         
	         $req->session()->put('uname',$user2[0]['username']);
	         
	         $req->session()->put('role',$user2[0]['role_id']);
	         $req->session()->put('Status',$user2[0]['user_status']);
	         $req->session()->put('ses',$user2[0]['session']);
	         
	         $req->session()->put('name',$user3[0]['nameini']);
	         
	         $req->session()->put('epf',$user4[0]['epf_no']);
				
				$ct=time();
				
				$ip=$req->ip();
				
				$host=$req->getSchemeAndHttpHost();
				
				$Login = new Mnrce_admin_login;
				
				$Login->epf_id=$user2[0]['epf_id'];
				$Login->LoggedInTime=$ct;		
				$Login->Ip=$ip;			
				$Login->host=$host;			
				$Login->save();
				
				$id=$Login->id;
				
				$req->session()->put('login_id',$id);
				//echo session('epf_id');       
	         return redirect('dash-board');		   
			
         } 
         else {
         	$req->session()->put('login','Username & password combination is incorrect !!!');
				return back();        
         }  		
              	
    	}
    	else {
			return redirect('/');
    	}
    }
    
   function userLogout() { 
   	//Auth::logout()
   	$ct=time();
   	$user=session('epf_id');
   	$id=session('login_id');
   	
   	
		$user1= Mnrce_admin_login::where('id', $id)
						         		   ->update(['LoggedOutTime' => $ct]);
   	
   	session()->flush();
   	return redirect('/');
   }
}
