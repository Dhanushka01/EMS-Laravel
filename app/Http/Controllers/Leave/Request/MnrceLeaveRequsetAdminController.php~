<?php

namespace App\Http\Controllers\Leave\Request;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Leave\Mnrce_admin_leave_request;

class MnrceLeaveRequsetAdminController extends Controller{
   public function index(Request $req) {
        if(session('uname') && session('Status')=='A'){
            return view('leave.request.leaveRequestFormAdmin');    
        }
        else{

            return redirect('/');
        }
    }
#=========================================================================================================#

	function store_leave_request_admin(Request $req) {
		$user=session('user');
		$data=$req->input();	
		
		$Leave= new Mnrce_admin_leave_request;
		
		$Leave->v_id=$data['vid'];
		$Leave->epf_id=$data['epf'];
		$Leave->reqDate=$data['date'];
		$Leave->leaveFrom=$data['from'];
		$Leave->leaveTo=$data['to'];
		$Leave->leaveType=$data['ltype'];
		$Leave->leaveQty=$data['qty'];
		$Leave->w_arrange=$data['aepf'];
		$Leave->description=$data['remarks'];
		$Leave->leaveStatus=1;
		$Leave->approvedBy=$user;
		$Leave->leaveBookStatus=1;
		$Leave->checkedBy=$user;
		$Leave->crby=$user;
		$Leave->luby=$user;
		$Leave->save();
		
		$req->session()->put('leaveReq','Successfully Saved Data!!!');
		return back();			
	}
    
#    
}
