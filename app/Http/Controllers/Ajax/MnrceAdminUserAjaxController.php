<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\User\Mnrce_admin_user;

class MnrceAdminUserAjaxController extends Controller
{
	public function get_mnrce_user_data(Request $req) {
	
	$req->id=5;
	$user= new Mnrce_admin_user;
	$user=$user::find($req->id);

	return json_encode($user);

	
	}
}
