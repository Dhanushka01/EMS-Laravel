<?php

namespace App\Http\Controllers\Employee\Division;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Employee\Division\Mnrce_admin_emp_division;
use App\Models\Employee\Location\Mnrce_admin_emp_location;

class MnrceAdminEmpDivisionController extends Controller{

   public function index(Request $req) {
        if(session('uname') && session('Status')=='A'){
            return view('employee.division.insertempdivision');   
        }
        else{

            return redirect('/');
        }
    }

//=========================================================================================================================//

   function checkDiv($epf) {
		$des= Mnrce_admin_emp_division::where('epf_id', $epf)
													->where('resdate', null)
							         		   ->count();		
      if($des>0) {
			return true;      
      }
      else {
			return false;      
      }	   
   }
//=========================================================================================================================//
   function checkLocat($epf) {
		$des= Mnrce_admin_emp_location::where('epf_id', $epf)
													->where('resdate', null)
							         		   ->count();		
      if($des>0) {
			return true;      
      }
      else {
			return false;      
      }	   
   }
   
//=========================================================================================================================//
       
    function new_emp_division(Request $req) {
		$data=$req->input();
		
		$pen2=$data['date'];
		$epf=$data['epf_'];	
		
		$user=session('user');
		
		$pen=date('Y-m-d', strtotime($pen2. ' - 1 days'));
		
		foreach($epf as $key => $value){
			
			$div=$this->checkDiv($value);
			
			if($div) {
				$Sal1= Mnrce_admin_emp_division::where('epf_id', $value)
								->where('resdate', null)
		         		   ->update(['resdate' => $pen,		   
		         		   'luby' =>$user]);			
			}
			
			$des = new Mnrce_admin_emp_division;
			
			$des->effdate=$data['date'];
			$des->epf_id= $value;
			$des->divs=$data['div'];
			$des->crby=$user;
			$des->luby=$user;
			$des->ref=$data['ref'];
			$des->save();	
#-------------------------------------------------------------------------------------------------#
			
			$Locat=$this->checkLocat($value);
			
			if($Locat) {
				$Sal1= Mnrce_admin_emp_location::where('epf_id', $value)
								->where('resdate', null)
		         		   ->update(['resdate' => $pen,		   
		         		   'luby' =>$user]);			
			}
			
			$des = new Mnrce_admin_emp_location;
			
			$des->effdate=$data['date'];
			$des->epf_id= $value;
			$des->locat=$data['locat'];	
			$des->crby=$user;
			$des->luby=$user;
			$des->ref=$data['ref'];
			$des->save();			
				
		}
			$req->session()->put('empDiv','Successfully Saved Employee Division !!!');
			return back();				
	}

#
}
