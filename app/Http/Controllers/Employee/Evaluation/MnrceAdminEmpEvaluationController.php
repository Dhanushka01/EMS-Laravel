<?php

namespace App\Http\Controllers\Employee\Evaluation;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Employee\Evaluation\Mnrce_admin_emp_evaluation;

use Illuminate\Support\Facades\DB;

class MnrceAdminEmpEvaluationController extends Controller{
  
   public function index(Request $req) {
		if(session('uname') && session('Status')=='A'){
	   		return view('employee.evaluation.evaluationsubmission');	
	   	}
	   	else{

	   		return redirect('/');
    	}
	}

    public function store(Request $request){
	   $user=session('user');
    	$data=$request->input();
    	
    	$epf=$data['epf_'];
    	
    	foreach($epf as $key=>$value){
    		if($value=='') {
				continue;    		
    		}
	     	$Store = new Mnrce_admin_emp_evaluation;  
	     	     
			$Store->epf_id=$value;
			$Store->subdate=$request->ndate;
			$Store->type=$request->type;
			$Store->remark=$request->remarks;  
			$Store->crby=$user;  	
			$Store->luby=$user;  	
	    	$Store->save();   	
    	}
    	

    	
	   $request->session()->put('eval','Successfully Saved !!!');
		return back();	       
    }

    public function received(Request $request){
	   $user=session('epf');
	   $data=$request->input();
		   	
		$affected = DB::table('mnrce_admin_emp_evaluations')
		              ->where('id', $request->sid)
		              ->update(['recive_date' => $request->sdate,'revive_remark'=>$request->sremarks]);
           
    	
	   $request->session()->put('eval','Successfully Saved !!!');
		return back();      
    }
		
#	
}
