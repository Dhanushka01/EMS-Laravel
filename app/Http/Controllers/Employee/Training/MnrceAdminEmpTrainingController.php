<?php

namespace App\Http\Controllers\Employee\Training;

use App\Http\Controllers\Controller;


use Illuminate\Http\Request;

use App\Models\Employee\Training\Mnrce_admin_emp_training;

class MnrceAdminEmpTrainingController extends Controller{

   public function index(Request $req) {
		if(session('uname') && session('Status')=='A'){
	   		return view('employee.train.training');	
	   	}
	   	else{

	   		return redirect('/');
    	}
	}

	function new_emp_training(Request $req) {
		$user=session('user');
		$data=$req->input();
		//dd($data);
		$epf=$data['epf_'];
		
		foreach($epf as $key => $value){

			$tr= new Mnrce_admin_emp_training;	

			$tr->epf_id=$value;
			$tr->sdate=$data['sdate'];
			$tr->edate=$data['edate'];
			$tr->ttitle=$data['title'];
			$tr->tlocat=$data['locat'];
			$tr->tcond=$data['cond'];
			$tr->crby=$user;
			$tr->luby=$user;
			$tr->save();
		
		}	

		$req->session()->put('empTrain','Successfully Saved Training Data!!!');
		return back();			
	}

#
}
