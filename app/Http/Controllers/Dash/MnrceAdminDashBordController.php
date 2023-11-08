<?php

namespace App\Http\Controllers\Dash;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MnrceAdminDashBordController extends Controller
{
	public function index(){
		if(session('uname') && session('Status')=='A'){
	   		return view('dash_bord.dash_bord');	
	   	}
	   	else{

	   		return redirect('/');
	   	}	

		
	}
}
