<?php

namespace App\Http\Controllers\Employee\Designation;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Employee\Designation\Mnrce_admin_emp_designation;

class MnrceAdminEmpDesignationController extends Controller{

   public function index(Request $req) {
		if(session('uname') && session('Status')=='A'){
	   		return view('employee.designation.insertempdesignation');	
	   	}
	   	else{

	   		return redirect('/');
    	}
	}
//====================================================================================
  function checkDes($epf) {
		$des= Mnrce_admin_emp_designation::where('epf_id', $epf)
											->where('revDate', null)
         		   							->count();		
         		   
      if($des>0) {
			return true;      
      }
      else {
			return false;      
      }	   
   }

  //===================================================================================

	function emp_set_designation(Request $req) {
		$data=$req->input();

		$epf=$data['epf_'];	

		$user=session('user');

		$pen2=$data['date'];
		$pen=date('Y-m-d', strtotime($pen2. ' - 1 days'));
	//	dd($data);
		foreach($epf as $key => $value){
			
			$dessig=$this->checkDes($value);
			
			if($dessig) {
			$Sal1= Mnrce_admin_emp_designation::where('epf_id', $value)
												->where('revDate', null)
							         		   ->update(['revDate' => $pen,		   
							         		   'luby' =>$user]);			
			}
			
			$des = new Mnrce_admin_emp_designation;
			
			$des->effDate=$data['date'];
			$des->epf_id= $value;
			$des->empType=$data['type'];
			$des->EmpCat=$data['cat'];	
			$des->aExpDate=$data['aedate'];	
			$des->aRef=$data['arname'];	
			$des->empDesig=$data['desig'];
			$des->empSalCode=$data['sal'];
			$des->nextPromotion=$data['nxtpro'];
			$des->luby=$user;
			$des->crby=$user;
			$des->save();	
			
				
		}
			$req->session()->put('empDes','Successfully Saved Employee Designation !!!');
			return back();			
	}	
  //===================================================================================

  	function emp_extend_agreement(Request $req) {
		$data=$req->input();
		
		$epf=$data['aepf_'];	
		
		$user=session('user');
		
		$pen2=$data['adate'];
		
		$pen=date('Y-m-d', strtotime($pen2. ' - 1 days'));
	//	dd($data);
		foreach($epf as $key => $value){
			
			$dessig=$this->checkDes($value);
			
			$Sal2= Mnrce_admin_emp_designation::where('epf_id', $value)
												->where('revDate', null)
	         		  							->get();
			if($dessig) {
			$Sal1= Mnrce_admin_emp_designation::where('epf_id', $value)
												->where('revDate', null)
								         		->update(['revDate' => $pen,		   
								         		   'luby' =>$user]);			
			}	         		  	
  		  		foreach($Sal2 as $key=> $val){
  		  			$type= $val->empType;  		  		
  		  			$cat= $val->EmpCat;  		  		
  		  			$desig= $val->empDesig;  		  		
  		  			$salcode= $val->empSalCode;  	
 
		 			$des = new Mnrce_admin_emp_designation;
					
					$des->effDate=$data['adate'];
					$des->epf_id= $value;
					
					$des->empType=$type;
					$des->EmpCat=$cat;	
					
					$des->aExpDate=$data['aedate2'];	
					$des->aRef=$data['aDocRef2'];	
					
					$des->empDesig=$desig;
					$des->empSalCode=$salcode;
					
					$des->luby=$user;
					$des->crby=$user;
					
					$des->save(); 		  				 
  		  			 		
  		  		}
		
				
		}
			$req->session()->put('empDes','Successfully Saved Employee Agreement Data !!!');
			return back();				
	}	

//===================================================================================

	function setPromotion(Request $req) {
		$data=$req->input();
		$epf=$data['pramo_epf'];	
		
		$user=session('user');
		$pen2=$data['pramo_date'];
		
		$pen=date('Y-m-d', strtotime($pen2. ' - 1 days'));
		
	//	dd($data);

			
			$dessig=$this->checkDes($epf);
			
			if($dessig) {
			$Sal1= Mnrce_admin_emp_designation::where('epf_id', $epf)
												->where('revDate', null)
							         		   	->update(['revDate' => $pen,		   
							         		  	 'luby' =>$user]);			
			}
			
			
			$des = new Mnrce_admin_emp_designation;
			
			$des->effDate=$data['pramo_date'];
			$des->epf_id= $epf;
			$des->empType=$data['pramo_type2'];
			$des->EmpCat=$data['pramo_cat'];	
	
			$des->empDesig=$data['pramo_desig'];
			$des->empSalCode=$data['pramo_sal_code'];
			$des->nextPromotion=$data['pramo_next'];
			$des->luby=$user;
			$des->crby=$user;
			$des->save();	

			if($data['pramo_type']=='PERMANENT') {
				$eval= Admin_evaluation::where('epf_id', $epf)
								->where('type','Permanent')
								->where('recive_date','<>', NULL)
								->where('pramo_flag', '0')
		         		   ->update(['pramo_flag' => 1,		   
		         		   'luby' =>$user]);				
			}
			else {

				$eval= Admin_evaluation::where('epf_id', $epf)
								->where('type','Promotion')
								->where('recive_date','<>', NULL)
								->where('pramo_flag', '0')
		         		   ->update(['pramo_flag' => 1,		   
		         		   'luby' =>$user]);				
			}

			$req->session()->put('empDes','Successfully Saved Employee Promotion !!!');
			return back();				
	}	

//===================================================================================	
#	
}
