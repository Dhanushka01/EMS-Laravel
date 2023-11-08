<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Employee\Designation\Mnrce_admin_emp_designation;

class MnrceSalaryCodeAjaxController extends Controller
{

    function getSalcodeByEpfId(Request $req) {         
        $epf=$req['epf'];
        //$epf=91;
                        
        $desig1= Mnrce_admin_emp_designation::where('epf_id',$epf)
                                             ->where('revDate',NULL)
                                             ->count();
        if($desig1==0) {
            $desig[0]['salcode']="Not Available";
        }
        else {  
                $desig= Mnrce_admin_emp_designation::where('epf_id',$epf)
                                                    ->where('mnrce_admin_emp_designations.revDate',NULL)
                                                    ->join('mnrce_admin_master_salary_codes','mnrce_admin_master_salary_codes.id','=','mnrce_admin_emp_designations.empSalCode')
                                                    ->select('mnrce_admin_master_salary_codes.salcode')
                                                    ->get();                                                              
                }
        echo json_encode($desig);           
    }
#    
}
