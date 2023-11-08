<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Employee\Evaluation\Mnrce_admin_emp_evaluation;

class MnrceAdminEmployeeEvaluationAjaxController extends Controller{
  
  public function get_employee_evaluation_data_by_id(Request $req) {
		$eval=Mnrce_admin_emp_evaluation::find($req->id);
		
		echo json_encode($eval);      
		  
  }

	public function getEvaluationList(Request $req) {
		
		$type=$req['pramo_type'];
		//$type='Permanent';
		
		$data = Mnrce_admin_emp_evaluation::where('recive_date','<>',null)
														->where('pramo_flag','0')
														->where('type',$type)
														->join('mnrce_admin_emp_epfs','mnrce_admin_emp_epfs.id','mnrce_admin_emp_evaluations.epf_id')
														->join('mnrce_admin_emp_personals','mnrce_admin_emp_personals.id','mnrce_admin_emp_epfs.emp_id')
														->orderBy('epf_no', 'ASC')
														->select('mnrce_admin_emp_evaluations.recive_date','mnrce_admin_emp_personals.nameini','mnrce_admin_emp_epfs.id','mnrce_admin_emp_epfs.epf_no')
														->get();
		echo "<option value='-1'> Select a employee </option>";
		foreach($data as $key => $value){
			echo "<option value='".$value->id."'>".$value->epf_no." | ".$value->nameini." | ".$value->recive_date."</option>";											
		}	
			  								
	}	


#
}
