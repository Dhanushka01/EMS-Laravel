<?php

namespace App\Http\Controllers\Master\Designation;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Master\Designation\Mnrce_admin_master_designation;

class MnrceAdminMasterDesignationController extends Controller
{
   public function index(Request $req) {
		if(session('uname') && session('Status')=='A'){
	   		return view('masters.designation.insertempmasterdesignation');	
	   	}
	   	else{

	   		return redirect('/');
	   	}		
    }	

    function new_designation(Request $req) {
    	$user=session('user');
		$data=$req->input();
		
		$emp1= Mnrce_admin_master_designation::where('name',$data['desig'])
   		   												->count();
   	   	if($emp1>0) {
					$req->session()->put('mdesigD','Designation Already Exits !!!');
					return redirect('master-designation-new');
   		   }		
   		   
		$Des = new Mnrce_admin_master_designation;
		
		$Des->name=$data['desig'];		
		$Des->status=1;
		$Des->timing='NA';
		$Des->cadre=$data['cadre'];
		$Des->crby=$user;
		$Des->luby=$user;
		$Des->save();	

			$req->session()->put('mdesig','Successfully saved new designation !!!');
			return redirect('master-designation-new');			    
    }    
#    
}
