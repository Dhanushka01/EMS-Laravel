<?php

namespace App\Http\Controllers\Leave\Book;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Employee\Personal\Mnrce_admin_emp_personal;
use App\Models\Employee\Epf\Mnrce_admin_emp_epf;

use App\Models\Leave\Mnrce_admin_leave_genarate;
use App\Models\Leave\Mnrce_admin_leave_request;
use App\Models\Leave\Mnrce_admin_leave_adjust;
use App\Models\Master\Leave\Mnrce_admin_master_leave_type;

class MnrceLeaveBookController extends Controller{
    public function index(Request $req) {
        if(session('uname') && session('Status')=='A'){
            return view('leave.book.leaveBook');    
        }
        else{

            return redirect('/');
        }
    }

#
}
