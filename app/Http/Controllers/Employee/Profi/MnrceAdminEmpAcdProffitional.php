<?php

namespace App\Http\Controllers\Employee\Profi;

use App\Http\Controllers\Controller;


use Illuminate\Http\Request;

use App\Models\Employee\Edu_profitional\Mnrce_admin_emp_acd_profi;

class MnrceAdminEmpAcdProffitional extends Controller{

   public function index(Request $req) {
		if(session('uname') && session('Status')=='A'){
	   		return view('employee.profi.neweduprofi');	
	   	}
	   	else{

	   		return redirect('/');
    	}
	}

    function new_emp_edu_profi(Request $req){
    	
    	$user=session('user');
		$data=$req->input();
		$epf=$data['epf']; 
		
		$course=$data['pct_'];
		$ins=$data['pins_'];
		$year=$data['pyear_'];
		$year2=$data['eyear_'];
		
		foreach($course as $key => $value){
			
			if($value=='') {
				continue;				
			}	
			
			$Profi = new Mnrce_admin_emp_acd_profi;
			
			$Profi->epf_id=$data['epf'];
			$Profi->title=$value;
			$Profi->institute=$ins[$key];
			$Profi->pfrom=$year[$key];
			$Profi->pto=$year2[$key];
			$Profi->crby=$user;
			$Profi->luby=$user;
			$Profi->save();				
		}
			$req->session()->put('empPRO','Successfully Saved Employee Professional Qualification Data !!!');
			return back();			
		
    } 

#
}
