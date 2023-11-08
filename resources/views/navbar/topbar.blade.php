  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->   
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="dash-board" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="employee-search-profile" class="nav-link">Profile</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="employee-agreement" class="nav-link">Agreement</a>
      </li>      
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline" action="employee-profile" method="post">
           @csrf
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" name="search_epfno" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>


			<?php
				$date=date('Y-m-d');
				$count1 = DB::table('mnrce_admin_emp_designations')
											->where('revDate', null)
											->where('aExpDate','<',$date)
											->count();
				$data1 = DB::table('mnrce_admin_emp_designations')
											->where('revDate', null)
											->where('aExpDate','<',$date)
											->orderBy('aExpDate','DESC')
											->join('mnrce_admin_emp_epfs','mnrce_admin_emp_epfs.id','mnrce_admin_emp_designations.epf_id')
											->join('mnrce_admin_emp_personals','mnrce_admin_emp_personals.id','mnrce_admin_emp_epfs.emp_id')
											->select('mnrce_admin_emp_personals.nameini','mnrce_admin_emp_epfs.epf_no','mnrce_admin_emp_designations.*')
											->get();	
											
			?>
          		
		<li class="nav-item dropdown" id="">
        <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
          <i class="far fa-bell"></i>
          <span class="badge badge-danger navbar-badge"><b><?php echo $count1 ?></b></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px; overflow-y: scroll; height: 1500%" >
          <span class="dropdown-item dropdown-header"><b><?php echo $count1 ?></b> No of Agreements are Expired</span>
          <div class="dropdown-divider"></div>
			@foreach($data1 as $value)
          <a href="#" class="dropdown-item">
             {{$value->epf_no}} &nbsp; &nbsp; {{$value->nameini}}
            <span class="float-right text-muted text-sm" style="color: red;">on {{$value->aExpDate}}</span>
          </a>
          <div class="dropdown-divider"></div>
			@endforeach
        </div>
      </li>      


		<?php
				
				$month=date("Y-m-d", strtotime("+1 month"));	
							
				$count2 = DB::table('mnrce_admin_emp_epfs')
											->where('resignDate', null)
											->where('pen_date','<=',$month)
											->count();																	

				$data2 = DB::table('mnrce_admin_emp_epfs')
											->where('resignDate', null)
											->where('pen_date','<=',$month)
											->join('mnrce_admin_emp_personals','mnrce_admin_emp_personals.id','mnrce_admin_emp_epfs.emp_id')
											->orderBy('pen_date','DESC')
											->get();	
		?>
		
		<li class="nav-item dropdown" id="">
        <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
         <i class="fa fa-blind" aria-hidden="true"></i>

          <span class="badge badge-danger navbar-badge"><b><?php echo $count2 ?></b></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px; overflow-y: scroll; height: 1500%" >
          <span class="dropdown-item dropdown-header"><b><?php echo $count2 ?></b> No of Employees are going to Retire</span>
          <div class="dropdown-divider"></div>
			@foreach($data2 as $value)
          <a href="#" class="dropdown-item">
             {{$value->epf_no}} &nbsp; &nbsp; {{$value->nameini}}
            <span class="float-right text-muted text-sm" style="color: red;">on {{$value->pen_date}}</span>
          </a>
          <div class="dropdown-divider"></div>
			@endforeach
        </div>
      </li>       

      
     <!-- Profile Module --> 
     <li class="nav-item dropdown">


      <a href="javascript:;" class="dropdown-item" data-toggle="dropdown" aria-expanded="false">
        <img src="../public/assets/images/emp/profile/	{{session('uname')}}.jpeg" alt="User Avatar" style="height: 30px;" 
        	class="img-circle"
        	onerror="this.src='../public/assets/images/profile.jpg';"> 
        <b>
        	{{session('uname')}}
        	</b>
        <span class=" fa fa-angle-down"></span>
      </a>
      <ul class="dropdown-menu dropdown-usermenu pull-right">
        <li><a class="nav-link" href="employee-profile"> Profile</a></li>

        <li><a class="nav-link" href="user-pass-reset-2">Password Reset</a></li>
        <li><a class="nav-link" href="" data-target="#logoutModal" data-toggle="modal"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
      </ul>
    </li>    
    </ul>
  </nav>
    
    
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel" style="color: red; font-weight: bold;">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body"><b>Click "Logout" below if you are ready to end your current session.</b></div>
        <div class="modal-footer">
          <button class="btn btn-primary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-danger" href="logout">Logout</a>
        </div>
      </div>
    </div>
  </div>    
          