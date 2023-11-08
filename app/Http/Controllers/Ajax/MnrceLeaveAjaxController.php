<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Leave\Mnrce_admin_leave_genarate;
use App\Models\Leave\Mnrce_admin_leave_request;
use App\Models\Master\Leave\Mnrce_admin_master_leave_type;

class MnrceLeaveAjaxController extends Controller{

    function getLeaveBalanceByEpfId(Request $req) {        
        
        $epf=$req['epf'];
        //$epf=91;
        $ltype=$req['ltype'];
        $date=date('Y-m-d');
        $expDate=date('Y-12-31');
        $appDate=date('Y-01-01');

                        
        $leave1= Mnrce_admin_leave_genarate::where('epf_id',$epf)
                                    ->where('ltype',$ltype)
                                    ->where('expDate','<=',$expDate)
                                    ->where('applyDate','>=',$appDate)
                                    ->where('applyDate','<=',$date)
                                    ->sum('amount');  
                                                                                              
        $leave2= Mnrce_admin_leave_request::where('epf_id',$epf)
                                    ->where('reqDate','<=',$expDate)
                                    ->where('reqDate','>=',$appDate)        
                                    ->where('leaveType',$ltype)
                                    ->where('leaveBookStatus','<>',2)
                                    ->sum('leaveQty');   
        $bal=$leave1-$leave2; 
                                        
    echo json_encode($bal);             
    }

#
}
