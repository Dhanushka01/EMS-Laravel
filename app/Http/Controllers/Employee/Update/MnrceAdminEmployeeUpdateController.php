<?php

namespace App\Http\Controllers\Employee\Update;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Employee\Personal\Mnrce_admin_emp_personal;
use App\Models\Employee\Epf\Mnrce_admin_emp_epf;
use App\Models\Employee\Contact\Mnrce_admin_emp_contact;
use App\Models\Employee\Emergency\Mnrce_admin_emp_emer_contact;

class MnrceAdminEmployeeUpdateController extends Controller{
   public function index(Request $req) {
        if(session('uname') && session('Status')=='A'){
            return view('employee.update.basic.empbasicupdate');    
        }
        else{

            return redirect('/');
        }
    }
//=============================================================================================================//

    function update_employee_basic_data(Request $req) {
                   
            $user=session('user');
            $data=$req->input();
            if (!$req){
                abort(404);
            }

            $epf1=$data['id1'];

            $epf5=$data['id5'];

            $epf2=$data['id2'];
            $epf3=$data['id3'];
            $epf4=$data['id4'];
            
            $pen1=$data['dob'];
            $pen2=date('Y-m-d', strtotime($pen1. ' + 60 year'));
            $pen3=date('Y-m-d', strtotime($pen2. ' - 1 days'));
            

            $Epf = Mnrce_admin_emp_epf::find($epf5);


            $Epf->appoint_date=$data['adate'];
            $Epf->pen_date=$pen3;
            $Epf->luby=$user;
            $Epf->save();
            


            $Personal = Mnrce_admin_emp_personal::find($epf1);
            
            $Personal->fullname=$data['fname'];
            $Personal->nameini=$data['Iname'];
            $Personal->nic=$data['nid'];
            $Personal->passport=$data['pass'];
            $Personal->dlicence=$data['dl'];
            $Personal->dob=$data['dob'];
            $Personal->gender=$data['gender'];
            $Personal->cstatus=$data['maried'];
            $Personal->remarks=$data['remarks'];
            $Personal->crby=$user;
            $Personal->luby=$user;
            $Personal->save();
            
            $Contact =Mnrce_admin_emp_contact::find($epf2);;
            

            $Contact->add1=$data['pa'];
            $Contact->add2=$data['gn'];
            $Contact->add3=$data['ds'];
            $Contact->tempadd=$data['temadd'];
            $Contact->grama=$data['gn'];
            $Contact->divisiona=$data['pd'];
            $Contact->districk=$data['a6'];
            $Contact->province=$data['a7'];
            $Contact->mobile1=$data['phone'];
            $Contact->mobile2=$data['phone2'];
            $Contact->homephone=$data['tel'];
            $Contact->email=$data['email'];
            $Contact->luby=$user;
            $Contact->save();       
            
            $Emer =Mnrce_admin_emp_emer_contact::find($epf3);;
            

            $Emer->conname=$data['ename'];
            $Emer->conmobile=$data['etel'];
            $Emer->conaddress=$data['eadd'];
            $Emer->luby=$user;
            $Emer->save();
            
            $Emer =Mnrce_admin_emp_emer_contact::find($epf4);;
            

            $Emer->conname=$data['ename'];
            $Emer->conmobile=$data['etel'];
            $Emer->conaddress=$data['eadd'];
            $Emer->luby=$user;
            $Emer->save();  

            $req->session()->put('emp','Successfully Updated Employee Basic Data!!!');
            return back();               
    }

#    
}
