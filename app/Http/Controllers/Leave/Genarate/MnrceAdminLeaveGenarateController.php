<?php

namespace App\Http\Controllers\Leave\Genarate;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Employee\Personal\Mnrce_admin_emp_personal;
use App\Models\Employee\Epf\Mnrce_admin_emp_epf;

use App\Models\Leave\Mnrce_admin_leave_genarate;
use App\Models\Leave\Mnrce_admin_leave_request;
use App\Models\Master\Leave\Mnrce_admin_master_leave_type;

class MnrceAdminLeaveGenarateController extends Controller{
    
   public function index(Request $req) {
        if(session('uname') && session('Status')=='A'){
            return view('leave.genarate.leavegenarate');    
        }
        else{

            return redirect('/');
        }
    }

//===========================================================================================================//

	function checkLeave($epf,$leave,$expireDate) {
		$Leave1= Mnrce_admin_leave_genarate::where('epf_id',$epf)
														->where('ltype',$leave)
														->where('expDate',$expireDate)
												 	  	->count();
		if($Leave1>0) {
			return TRUE;		
		}			
		else {
			return FALSE;		
		}		 	  			
	}

//===========================================================================================================//
	
	function genarate_leave(Request $req) {
		$user=session('user');
		
		$Emp=Mnrce_admin_emp_epf::where('resignDate',null)->orderBy('appoint_date','DESC')->get();
		
		$Leave=Mnrce_admin_master_leave_type::get();
		
		$yearF = date('Y-m-d',strtotime(date('Y-01-01')));	
		$yearM = date('Y-m-d',strtotime(date('Y-03-31')));	
		$yearL = date('Y-m-d',strtotime(date('Y-12-31')));	
		
		$yearSub='-1 year';	

		
		foreach($Emp as $key=>$value){
			$app = $value['appoint_date'];	
			$app1=date('m-d',strtotime($app));
				if($value['appoint_date'] >= $yearF ) {
					continue;
				}	
				
			$app3=date('Y',strtotime($app));		
			$app2=(date($app3)+1).date('-'.$app1);	
	
				
			$days = (int)((strtotime($yearF) - strtotime($app))/86400);	
			$month  = round($days*86400/60/60/24/30);

			$expireDate=date('Y-12-31');
			$applyDate=date('Y-01-01');
			
			
			foreach($Leave as $key=>$val){

				if($val['ltype']=='AL') {
					
					$Leave2=$this->checkLeave($value['id'],$val['ltype'],$expireDate);
					
					if($Leave2) {
						continue;					
					}
					
					
					if($days>275) {
						$AL=14;
						$applyDate=date('Y-01-01');
					
					}
					elseif($days<=275 and $days>=185) {
						$AL=10;
						$applyDate=$app2;
												
					}
					elseif($days<=184 and $days>=93) {
						$AL=7;	
						$applyDate=$app2;											
					}
					elseif($days<=92 and $days>=1) {
						$AL=4;	
						$applyDate=$app2;
											
					}
					else {
						$AL=0;	
						$applyDate=$app2;									
					}
					
					$Anual = new Mnrce_admin_leave_genarate;
					$Anual->epf_id=$value['id'];
					$Anual->ltype=$val['ltype'];
					$Anual->amount=$AL;
					$Anual->genDate=date('Y-m-d');
					$Anual->applyDate=$applyDate;
					$Anual->expDate=$expireDate;
					$Anual->perMonth=0;
					$Anual->crby=$user;
					$Anual->luby=$user;
					$Anual->save();
					
										
				}
				elseif($val['ltype']=='CL') {
					$Leave2=$this->checkLeave($value['id'],$val['ltype'],$expireDate);
					
					if($Leave2) {
						continue;					
					}					
					if($month >= 12) {
						$CL=7;	
						$applyDate=date('Y-01-01');																	
					}
					elseif($app>=date("Y-01-01",strtotime($yearSub)) and $app<=date("Y-01-31",strtotime($yearSub))) {
						$CL=7;	
						$applyDate=$app2;												
					}					
					elseif($app>=date("Y-02-01",strtotime($yearSub)) and $app<=date("Y-02-29",strtotime($yearSub))) {
						$CL=6.5;
																	
					}					
					elseif($app>=date("Y-03-01",strtotime($yearSub)) and $app<=date("Y-03-31",strtotime($yearSub))) {
						$x=0.5*2;
						$CL=6;
						$applyDate=$app2;									
					}					
					elseif($app>=date("Y-04-01",strtotime($yearSub)) and $app<=date("Y-04-30",strtotime($yearSub))) {
						$CL=5.5;
						$applyDate=$app2;											
					}
					elseif($app>=date("Y-05-01",strtotime($yearSub)) and $app<=date("Y-05-31",strtotime($yearSub))) {
						$CL=5;
						$applyDate=$app2;									
					}	
					elseif($app>=date("Y-06-01",strtotime($yearSub)) and $app<=date("Y-06-30",strtotime($yearSub))) {
						$CL=4.5;
						$applyDate=$app2;													
					}	
					elseif($app>=date("Y-07-01",strtotime($yearSub)) and $app<=date("Y-07-31",strtotime($yearSub))) {
						$CL=4;
						$applyDate=$app2;												
					}
					elseif($app>=date("Y-08-01",strtotime($yearSub)) and $app<=date("Y-08-31",strtotime($yearSub))) {
						$CL=3.5;
						$applyDate=$app2;											
					}
					elseif($app>=date("Y-09-01",strtotime($yearSub)) and $app<=date("Y-09-30",strtotime($yearSub))) {
						$CL=3;
						$applyDate=$app2;												
					}
					elseif($app>=date("Y-10-01",strtotime($yearSub)) and $app<=date("Y-10-31",strtotime($yearSub))) {
						$CL=2.5;
						$applyDate=$app2;												
					}	
					elseif($app>=date("Y-11-01",strtotime($yearSub)) and $app<=date("Y-11-30",strtotime($yearSub))) {
						$CL=2;
						$applyDate=$app2;							
					}
					elseif($app>=date("Y-12-01",strtotime($yearSub)) and $app<=date("Y-12-31",strtotime($yearSub))) {
						$CL=1.5;
						$applyDate=$app2;						
					}
					else {
						$x=0;
						$CL=0;					
					}
						$Anual = new Mnrce_admin_leave_genarate;
						$Anual->epf_id=$value['id'];
						$Anual->ltype=$val['ltype'];
						$Anual->amount=$CL;
						$Anual->genDate=date('Y-m-d');
						$Anual->applyDate=$applyDate;
						$Anual->expDate=$expireDate;
						$Anual->perMonth=0;
						$Anual->crby=$user;
						$Anual->luby=$user;
						$Anual->save();																																					
				}
				
				elseif($val['ltype']=='CL-N') {
					
					$Leave2=$this->checkLeave($value['id'],$val['ltype'],$expireDate);
					$app2=date('y-01-01');
					if($Leave2) {
						continue;					
					}					
					if($month >= 12) {
						$x=0;	
						$applyDate=date('Y-01-01');																	
					}
					elseif($app>=date("Y-01-01",strtotime($yearSub)) and $app<=date("Y-01-31",strtotime($yearSub))) {
						$x=0.5*0;

						$applyDate=$app2;												
					}					
					elseif($app>=date("Y-02-01",strtotime($yearSub)) and $app<=date("Y-02-29",strtotime($yearSub))) {
						$x=0.5*1;

																	
					}					
					elseif($app>=date("Y-03-01",strtotime($yearSub)) and $app<=date("Y-03-31",strtotime($yearSub))) {
						$x=0.5*2;
						$applyDate=$app2;									
					}					
					elseif($app>=date("Y-04-01",strtotime($yearSub)) and $app<=date("Y-04-30",strtotime($yearSub))) {
						$x=0.5*3;
						$applyDate=$app2;											
					}
					elseif($app>=date("Y-05-01",strtotime($yearSub)) and $app<=date("Y-05-31",strtotime($yearSub))) {
						$x=0.5*4;
						$applyDate=$app2;									
					}	
					elseif($app>=date("Y-06-01",strtotime($yearSub)) and $app<=date("Y-06-30",strtotime($yearSub))) {
						$x=0.5*5;
						$applyDate=$app2;													
					}	
					elseif($app>=date("Y-07-01",strtotime($yearSub)) and $app<=date("Y-07-31",strtotime($yearSub))) {
						$x=0.5*6;
						$applyDate=$app2;												
					}
					elseif($app>=date("Y-08-01",strtotime($yearSub)) and $app<=date("Y-08-31",strtotime($yearSub))) {
						$x=0.5*7;
						$applyDate=$app2;											
					}
					elseif($app>=date("Y-09-01",strtotime($yearSub)) and $app<=date("Y-09-30",strtotime($yearSub))) {
						$x=0.5*8;
						$applyDate=$app2;												
					}
					elseif($app>=date("Y-10-01",strtotime($yearSub)) and $app<=date("Y-10-31",strtotime($yearSub))) {
						$x=0.5*9;
						$applyDate=$app2;												
					}	
					elseif($app>=date("Y-11-01",strtotime($yearSub)) and $app<=date("Y-11-30",strtotime($yearSub))) {
						$x=0.5*10;
						$applyDate=$app2;							
					}
					elseif($app>=date("Y-12-01",strtotime($yearSub)) and $app<=date("Y-12-31",strtotime($yearSub))) {
						$x=0.5*11;
						$applyDate=$app2;						
					}
					else {
						$x=0;
						$CL=0;					
					}
						$Anual = new Mnrce_admin_leave_genarate;
						$Anual->epf_id=$value['id'];
						$Anual->ltype=$val['ltype'];
						$Anual->amount=$x;
						$Anual->genDate=date('Y-m-d');
						$Anual->applyDate=$applyDate;
						$Anual->expDate=$expireDate;
						$Anual->perMonth=0.5;
						$Anual->crby=$user;
						$Anual->luby=$user;
						$Anual->save();																																					
				}
				elseif($val['ltype']=='AL-Old') {
					
					$Epf=$value['id'];
					
					$expireDate2=date('Y-03-31');
					
					$date=('Y-01-01');
					
					$applyDate1 = date("Y-01-01", strtotime("-1 years"));
					$expireDate3 = date("Y-12-31", strtotime("-1 years"));
					
					$Leave3=$this->checkLeave($value['id'],$val['ltype'],$expireDate2);
					
					if($Leave3) {
						continue;					
					}
					
					$Leave1=Mnrce_admin_leave_genarate::where('epf_id',$Epf)
													->where('ltype','AL')
													->where('applyDate','>=',$applyDate1)
													->where('expdate','<=',$expireDate3)
													->sum('amount');					
					
					$Leave2=Mnrce_admin_leave_request::where('epf_id',$Epf)
													->where('leaveType','AL')
													->where('leaveBookStatus','1')
													->where('reqDate','>=',$applyDate1)
													->where('reqDate','<=',$expireDate3)
													->sum('leaveQty');	
						
						$AL_old=$Leave1-$Leave2;
						
						if($AL_old<0) {
							$AL_old=0;						
						}
						
						$Anual = new Mnrce_admin_leave_genarate;
						$Anual->epf_id=$value['id'];
						$Anual->ltype=$val['ltype'];
						$Anual->amount=$AL_old;
						$Anual->genDate=date('Y-m-d');
						$Anual->applyDate=$applyDate;
						$Anual->expDate=$expireDate2;
						$Anual->perMonth=0;
						$Anual->crby=$user;
						$Anual->luby=$user;
						$Anual->save();					
								
				}		
			}

		}	
		$req->session()->put('lgen','Successfully Leave Generated !!!');
		return back();	
	}

#    
}
