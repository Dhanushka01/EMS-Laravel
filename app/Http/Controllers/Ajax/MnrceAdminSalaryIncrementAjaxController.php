<?php
namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Employee\Salary\Mnrce_admin_salary_incriment;
use App\Models\Employee\Designation\Mnrce_admin_emp_designation;

class MnrceAdminSalaryIncrementAjaxController extends Controller{

    function getSalIncrementCount(Request $req) {           
        $epf=$req['epf'];
        //$epf=208;

            $desig1= Mnrce_admin_salary_incriment::where('epf_id',$epf)
                                                    ->where('post','N')
                                                    ->count();      
            if($desig1==0) {
                $desig=1;
            }                               
            else {                                  
                $desig= Mnrce_admin_salary_incriment::where('epf_id',$epf)
                                                        ->where('post','N')
                                                        ->orderBy('id','DESC')
                                                        ->limit(1)
                                                        ->select('incCount')
                                                        ->get();  
                $desig=$desig[0]['incCount'];       
                $desig=$desig+1;                    
            }                                   
    echo json_encode($desig);           
    }

#=========================================================================================================#

    function getSalIncrementByEpfId(Request $req) {           
            $epf=$req['epf'];
            //$epf=91;
            
            $desig1= Mnrce_admin_salary_incriment::where('epf_id',$epf)
                                                    ->where('post','N')
                                                    ->count();      
            if($desig1==0) {
                $count=1;
            }                               
            else {                                  
                $count= Mnrce_admin_salary_incriment::where('epf_id',$epf)
                                                    ->where('post','N')
                                                    ->orderBy('id','DESC')
                                                    ->limit(1)
                                                    ->select('incCount')
                                                    ->get();  
                $count=$count[0]['incCount']+1;                         
        }
        
            $salcode= Mnrce_admin_emp_designation::where('epf_id',$epf)
                                                    ->where('mnrce_admin_emp_designations.revDate',NULL)
                                                    ->join('mnrce_admin_master_salary_codes','mnrce_admin_master_salary_codes.id','=','mnrce_admin_emp_designations.empSalCode')
                                                    ->get();
                                                                                                                      
            switch ($count) {
              case $count<=$salcode[0]['yr1']:
                $sal= $salcode[0]['ir1'];
                break;
             case $count<=$salcode[0]['yr1']+$salcode[0]['yr2']:
                $sal= $salcode[0]['ir2'];
                break;
             case $count<=$salcode[0]['yr1']+$salcode[0]['yr2']+$salcode[0]['yr3']:
                $sal= $salcode[0]['ir3'];
                break;
             case $count<=$salcode[0]['yr1']+$salcode[0]['yr2']+$salcode[0]['yr3']+$salcode[0]['yr4']:
                $sal= $salcode[0]['ir4'];
                break;  
             case $count<=$salcode[0]['yr1']+$salcode[0]['yr2']+$salcode[0]['yr3']+$salcode[0]['yr4']+$salcode[0]['yr5']:
                $sal= $salcode[0]['ir5'];
                break;                          
              default:
                $sal= $salcode[0]['ir6'];
            }                                                                           
    echo json_encode($sal);             
    }    

#
}
