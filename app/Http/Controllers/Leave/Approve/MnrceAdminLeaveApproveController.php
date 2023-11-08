<?php
namespace App\Http\Controllers\Leave\Approve;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Employee\Personal\Mnrce_admin_emp_personal;
use App\Models\Employee\Epf\Mnrce_admin_emp_epf;

use App\Models\Leave\Mnrce_admin_leave_genarate;
use App\Models\Leave\Mnrce_admin_leave_request;
use App\Models\Leave\Mnrce_admin_leave_adjust;
use App\Models\Master\Leave\Mnrce_admin_master_leave_type;

class MnrceAdminLeaveApproveController extends Controller
{

   public function index(Request $req) {
        if(session('uname') && session('Status')=='A'){
            return view('leave.approve.leaveApprove');    
        }
        else{

            return redirect('/');
        }
    }

//===================================================================================================
    function store_leave_adjustments(Request $req) {
        $user=session('user');
        $data=$req->input();
        $epf=$data['epf_']; 
        
        foreach($epf as $key => $value){
        
            $des = new Mnrce_admin_leave_adjust;
            
            $des->epf_id=$value;
            $des->ltype= $data['leave'];
            $des->adjtype=$data['add'];
            $des->amount=$data['amount'];   
            $des->reason=$data['reason'];
            $des->luby=$user;
            $des->crby=$user;
            $des->save();   
            
            $x=$data['amount'];
            
            if($data['add']=='remove') {
                $x=$data['amount']*-1;          
            }
            
            $Anual = new Mnrce_admin_leave_genarate;
            
            $Anual->epf_id=$value;
            $Anual->ltype=$data['leave'];
            $Anual->amount=$x;
            $Anual->genDate=date('Y-m-d');
            $Anual->applyDate=date('Y-01-01');
            $Anual->expDate=date('Y-12-31');
            $Anual->perMonth=0.0;
            $Anual->crby=$user;
            $Anual->luby=$user;
            $Anual->save();
            
                
        }
            $req->session()->put('empAdj','Successfully Saved Adjustment !!!');
            return back();            
    }    
}
