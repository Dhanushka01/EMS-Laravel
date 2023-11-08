<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Employee\Division\Mnrce_admin_emp_division;
use App\Models\Employee\Location\Mnrce_admin_emp_location;

class MnrceAdminLocationAjaxController extends Controller{

	function getLocationByEpfId(Request $req) {			
		$epf=$req['epf'];
		//$epf=91;
 						
		$div1= Mnrce_admin_emp_location::where('epf_id',$epf)
										->where('resDate',NULL)
   		  								->count();
   	if($div1==0) {
   		$div[0]['Pname']="Not Available";
   	}
   	else {	
		$div= Mnrce_admin_emp_location::where('epf_id',$epf)
										->where('resDate',NULL)
										->join('mnrce_admin_master_projects','mnrce_admin_master_projects.Pcode','=','mnrce_admin_emp_locations.locat')
	   		  							->get();   	  						   		  						  
   	}
   	echo json_encode($div); 			
	}
#
}
