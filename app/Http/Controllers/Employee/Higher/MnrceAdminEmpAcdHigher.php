<?php

namespace App\Http\Controllers\Employee\Higher;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Employee\Edu_hire\Mnrce_admin_emp_acd_high;

class MnrceAdminEmpAcdHigher extends Controller{

   public function index(Request $req) {
		if(session('uname') && session('Status')=='A'){
	   		return view('employee.high.neweduhigh');	
	   	}
	   	else{

	   		return redirect('/');
    	}
	}

    function new_emp_edu_higher(Request $req){
    	$user=session('user');
		$data=$req->input();
		$epf=$data['epf'];   

			$Eduhire = new Mnrce_admin_emp_acd_high;
				
			$Eduhire->epf_id=$data['epf'];
			$Eduhire->type=$data['highered'];
			$Eduhire->title=$data['ct'];
			$Eduhire->institute=$data['ins1'];
			$Eduhire->year=$data['year1'];
			$Eduhire->crby=$user;
			$Eduhire->luby=$user;
			$Eduhire->save();		
		
		if(isset($data['highered2']) and isset($data['ct2'])) {
			
			$Eduhire = new Mnrce_admin_emp_acd_high;
			
			$Eduhire->epf_id=$data['epf'];
			$Eduhire->type=$data['highered2'];
			$Eduhire->title=$data['ct2'];
			$Eduhire->institute=$data['ins2'];
			$Eduhire->year=$data['year2'];
			$Eduhire->crby=$user;
			$Eduhire->luby=$user;
			$Eduhire->save();		
		}	
		if(isset($data['highered3']) and isset($data['ct3'])) {
			
			$Eduhire = new Mnrce_admin_emp_acd_high;
			
			$Eduhire->epf_id=$data['epf'];
			$Eduhire->type=$data['highered3'];
			$Eduhire->title=$data['ct3'];
			$Eduhire->institute=$data['ins3'];
			$Eduhire->year=$data['year3'];
			$Eduhire->crby=$user;
			$Eduhire->luby=$user;
			$Eduhire->save();		
		}
		if(isset($data['highered4']) and isset($data['ct4'])) {
			
			$Eduhire = new Mnrce_admin_emp_acd_high;
			
			$Eduhire->epf_id=$data['epf'];
			$Eduhire->type=$data['highered4'];
			$Eduhire->title=$data['ct4'];
			$Eduhire->institute=$data['ins4'];
			$Eduhire->year=$data['year4'];
			$Eduhire->crby=$user;
			$Eduhire->luby=$user;
			$Eduhire->save();		
		}	
		if(isset($data['highered5']) and isset($data['ct5'])) {
			
			$Eduhire = new Mnrce_admin_emp_acd_high;
			
			$Eduhire->epf_id=$data['epf'];
			$Eduhire->type=$data['highered5'];
			$Eduhire->title=$data['ct4'];
			$Eduhire->institute=$data['ins5'];
			$Eduhire->year=$data['year5'];
			$Eduhire->crby=$user;
			$Eduhire->luby=$user;
			$Eduhire->save();		
		}
			$req->session()->put('empHigh','Successfully Saved Employee Higher Educational Data !!!');
			return back();						
		    
    } 

#
}
