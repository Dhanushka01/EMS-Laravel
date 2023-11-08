<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Employee\Personal\Mnrce_admin_emp_personal;
use App\Models\Employee\Epf\Mnrce_admin_emp_epf;
use App\Models\Employee\Contact\Mnrce_admin_emp_contact;
use App\Models\Employee\Emergency\Mnrce_admin_emp_emer_contact;
use App\Models\Employee\Edu_profitional\Mnrce_admin_emp_acd_profi;
use App\Models\Employee\Certificate\Mnrce_admin_emp_certificate;
use App\Models\Employee\Edu_basic\Mnrce_admin_emp_acd_basic;
use App\Models\Employee\Edu_hire\Mnrce_admin_emp_acd_high;
use App\Models\Employee\Past_emp\Mnrce_admin_emp_work_exper;
use App\Models\Employee\Edu_Local\Mnrce_admin_emp_acd_ol;

class MnrceAdminReportController extends Controller{

// Profile    
    function employee_profile(Request $req) {
        if(session('uname') && session('Status')=='A'){
        		$data1=session('epf_id');
        		$data2=session('epf');
            return view('reports.employee.profile.profile',compact('data1','data2'));    
        }
        else{

            return redirect('/');
        }
    }

 //===========================================================================================================//   

    function employee_search_profile(Request $req) {
        if(session('uname') && session('Status')=='A'){
            return view('reports.employee.profile.searchprofile');    
        }
        else{

            return redirect('/');
        }
    }

 //===========================================================================================================//  

    function employee_basic_data(Request $req) {
        if(session('uname') && session('Status')=='A'){
            return view('reports.employee.tabel.empbasicdata');    
        }
        else{

            return redirect('/');
        }
    }



 //===========================================================================================================//   

    function employee_contact_data(Request $req) {
        if(session('uname') && session('Status')=='A'){
            return view('reports.employee.tabel.empContactData');    
        }
        else{

            return redirect('/');
        }
    }


 //===========================================================================================================//   
    
    function employee_carder_data(Request $req) {
        if(session('uname') && session('Status')=='A'){
            return view('reports.employee.tabel.empcarder');    
        }
        else{

            return redirect('/');
        }
    }


 //===========================================================================================================//   

    function employee_agreement_data(Request $req) {
        if(session('uname') && session('Status')=='A'){
            return view('reports.employee.tabel.empagreementexpire');    
        }
        else{

            return redirect('/');
        }
    }


 //===========================================================================================================//   

    function employee_leave_balance_data(Request $req) {
        if(session('uname') && session('Status')=='A'){
            return view('leave.report.leaveBalanceReport');    
        }
        else{

            return redirect('/');
        }
    }


 //===========================================================================================================//   




#    
}

