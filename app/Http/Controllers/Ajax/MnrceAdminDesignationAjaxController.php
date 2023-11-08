<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Employee\Designation\Mnrce_admin_emp_designation;

class MnrceAdminDesignationAjaxController extends Controller{
    
    function getDesignationByEpf(Request $req) {         
        $epf=$req['epf'];
        //$epf=91;
                        
        $desig1= Mnrce_admin_emp_designation::where('epf_id',$epf)
                                                ->where('revDate',NULL)
                                                ->count();
        if($desig1==0) {
            $desig[0]['name']="Not Available";
        }
        else {  
                $desig= Mnrce_admin_emp_designation::where('epf_id',$epf)
                                                        ->where('revDate',NULL)
                                                        ->join('mnrce_admin_master_designations','mnrce_admin_master_designations.id','=','mnrce_admin_emp_designations.empDesig')
                                                        ->get();                                                              
        }

        echo json_encode($desig);           
    }

}
