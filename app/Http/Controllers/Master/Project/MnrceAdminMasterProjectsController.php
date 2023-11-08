<?php

namespace App\Http\Controllers\Master\Project;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Models\Master\Project\Mnrce_admin_master_projects;

class MnrceAdminMasterProjectsController extends Controller{

   public function index(Request $req) {
		if(session('uname') && session('Status')=='A'){
	   		return view('masters.project.projectreg');	
	   	}
	   	else{

	   		return redirect('/');
	   	}		
    }
#================================================================================================  



#
}
