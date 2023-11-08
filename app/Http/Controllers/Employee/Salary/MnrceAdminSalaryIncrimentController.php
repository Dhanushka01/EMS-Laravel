<?php

namespace App\Http\Controllers\Employee\Salary;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Employee\Salary\Mnrce_admin_salary_incriment;

use Illuminate\Support\Facades\DB;

class MnrceAdminSalaryIncrimentController extends Controller{

   public function index(Request $req) {
        if(session('uname') && session('Status')=='A'){
            return view('employee.salary.salaryinc');   
        }
        else{

            return redirect('/');
        }
    }
//=======================================================================================================================//

	function new_salary_increment(Request $req) {
 		$data = $req->input();
 		$user=session('user');
 		$ct=time();
 		$count=1;
 	//	dd($data);
					
		$sql = DB::table('mnrce_admin_salary_incriments')
		              ->where('epf_id',$data['epf'] )
		              ->where('incStatus',0 )
		              ->orderBy('id','DESC')
		              ->limit(1)
		              ->update(['incStatus' => 1]); 			
	
		$sql2 = DB::table('mnrce_admin_salary_incriments')
		              ->where('epf_id',$data['epf'] )
		              ->orderBy('id','DESC')
		              ->limit(1)
		              ->get(); 	
		              	
		       foreach($sql2 as $key=> $value){
		       	$count=$value->incCount;
		       	if($data['post']=='N') {
		       		$count++;
		       	}
		       }

		 
    			
			$Local = new Mnrce_admin_salary_incriment;
			$Local->edate=$data['ndate'];
			$Local->epf_id=$data['epf'];
			$Local->post=$data['post'];
			$Local->inc=$data['inc'];
			$Local->nxtdate=$data['nxtdate'];
			$Local->ref=$data['ref'];
			$Local->incCount=$count;
			$Local->remark=$data['remarks'];
			$Local->incStatus=0;
			$Local->crby=$user;
			$Local->luby=$user;
			$Local->save();	 		
			
 			$req->session()->put('empsalinc','Successfully Saved Employee Basic Salary increment Data !!!');
			return back();			
 	} 

#    
}
