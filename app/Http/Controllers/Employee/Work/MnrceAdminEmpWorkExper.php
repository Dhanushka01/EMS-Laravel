<?php

namespace App\Http\Controllers\Employee\Work;

use App\Http\Controllers\Controller;


use Illuminate\Http\Request;

use App\Models\Employee\Past_emp\Mnrce_admin_emp_work_exper;

class MnrceAdminEmpWorkExper extends Controller{


   public function index(Request $req) {
		if(session('uname') && session('Status')=='A'){
	   		return view('employee.work.newedupastemp');	
	   	}
	   	else{

	   		return redirect('/');
    	}
	}

    function new_emp_edu_profi(Request $req){
     	$user=session('user');
    	$ct=time();
		$data=$req->input();
		$epf=$data['epf']; 
		
			$post=$data['woep_'];
			$ins=$data['woei_'];
			$from=$data['woef_'];
			$to=$data['woet_'];
			
			foreach($post as $key => $value){
				
				if($value=='') {
					continue;				
				}	
				
				$Profi = new Mnrce_admin_emp_work_exper;
				
				$Profi->epf_id=$data['epf'];
				$Profi->post=$value;
				$Profi->institute=$ins[$key];
				$Profi->wfrom=$from[$key];
				$Profi->wto=$to[$key];
				$Profi->crby=$user;
				$Profi->luby=$user;
				$Profi->save();				
			}
			$req->session()->put('empPRO','Successfully Saved Employee Working Experience Data !!!');
			return back();						   
    }

#
}
