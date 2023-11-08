<?php

namespace App\Http\Controllers\Employee\Status;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Employee\Status\Mnrce_admin_emp_status;

use App\Models\Employee\Epf\Mnrce_admin_emp_epf;

use App\Models\Employee\Designation\Mnrce_admin_emp_designation;

use App\Models\Employee\Division\Mnrce_admin_emp_division;
use App\Models\Employee\Location\Mnrce_admin_emp_location;

class MnrceAdminEmpStatusController extends Controller{

   public function index(Request $req) {
		if(session('uname') && session('Status')=='A'){
	   		return view('employee.status.empstate');	
	   	}
	   	else{

	   		return redirect('/');
    	}
	}

	function emp_state_change(Request $req) {
		$data=$req->input();
		$user=session('user');
		//dd($data);
		
		
		$status =new Mnrce_admin_emp_status;
		
		$status->sdate=$data['date'];
		$status->epf_id=$data['epf'];
		$status->status=$data['type'];
		$status->remarks=$data['remarks'];
		$status->luby=$user;
		$status->crby=$user;
		$status->save();
		
		$epf=$data['epf'];
		
		$Emp_epf	= Mnrce_admin_emp_epf::find($epf);
		$Emp_epf->emp_status=$data['type'];
		$Emp_epf->luby=$user;
		$Emp_epf->save();
				
		
		if($data['type']==0 || $data['type']==4 || $data['type']==3) {
					
					$Emp_epf	= Mnrce_admin_emp_epf::find($epf);
					
					$Emp_epf->resignDate=$data['date'];
					$Emp_epf->luby=$user;
					$Emp_epf->save();
	         		   		
					$Emp_designation= Mnrce_admin_emp_designation::where('epf_id', $epf)->where('revDate',null)
			         		   					->update(['revDate' => $data['date'],        		   
			         		  						 'luby' =>$user]);		 
	         		   
					$Emp_division= Mnrce_admin_emp_division::where('epf_id', $epf)->where('resdate',null)
								         		   ->update(['resdate' => $data['date'],        		   
								         		   'luby' =>$user]);			    
			         		   
					$Emp_location= Mnrce_admin_emp_location::where('epf_id', $epf)->where('resdate',null)
								         		   ->update(['resdate' => $data['date'],        		   
								         		   'luby' =>$user]);		         		        		           		   		
		}

		$msg='Successfully Updated ('.$Emp_epf->epf_no.') Employee Status!!!';
		$req->session()->put('empSt',$msg);
		return back();		
	}	

#
}
