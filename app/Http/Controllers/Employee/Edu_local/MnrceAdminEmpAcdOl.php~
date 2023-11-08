<?php

namespace App\Http\Controllers\Employee\Edu_local;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Employee\Edu_Local\Mnrce_admin_emp_acd_ol;

class MnrceAdminEmpAcdOl extends Controller
{
   public function index(Request $req) {
		if(session('uname') && session('Status')=='A'){
	   		return view('employee.ol.neweduol');	
	   	}
	   	else{

	   		return redirect('/');
    	}
	}

    function new_emp_edu_ol(Request $req){
    	$user=session('user');

		$data=$req->input();
		$epf=$data['epf'];
		
		$sub=$data['subo_'];
		$grade=$data['gro_'];
		
		foreach($sub as $key => $value){
			if($value=='') {
				continue;				
			}				
			$Local = new Mnrce_admin_emp_acd_ol;
			
			$Local->epf_id=$data['epf'];
			$Local->type='GCE O/L';
			$Local->eindex=$data['index'];
			$Local->eyear=$data['year'];
			$Local->subject=$sub[$key];
			$Local->sgrade=$grade[$key];
			$Local->crby=$user;
			$Local->luby=$user;
			$Local->save();		
		}    
			$req->session()->put('empOL','Successfully Saved Employee O/L Exam Results !!!');
			return back();
    }	
	
#	
}
