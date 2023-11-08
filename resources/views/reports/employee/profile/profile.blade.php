@include('navbar.leftbar');

<?php
	if(isset($_POST['epfno'])) {
		$user=$_POST['epfno']; 
		$img = DB::table('mnrce_admin_emp_epfs')->where('id', $user)->get();
		foreach($img as $value){
			$imgEpf=$value->epf_no;		
		}
								
	}
	elseif(isset($_POST['search_epfno'])) {
		$user=$_POST['search_epfno']; 
		$imgEpf=$user;
		$count = DB::table('mnrce_admin_emp_epfs')->where('epf_no', $user)->count();
		if($count>0){
			$user = DB::table('mnrce_admin_emp_epfs')->where('epf_no', $user)->get();
			foreach($user as $value){
				$user=$value->id;		
			}
		}
			else{
				$user=$data1;
				$imgEpf=$data2;
				$user = DB::table('mnrce_admin_emp_personals')->where('id', $user)->get();
				foreach($user as $value){
					$user=$value->id;		
					}	
		}
	}
	else {
		$user=$data1;
		//$user=91;;
		$imgEpf=$data2;
		$user = DB::table('mnrce_admin_emp_personals')->where('id', $user)->get();
		foreach($user as $value){
			$user=$value->id;		
		}
	}
	

	$data1 = DB::table('mnrce_admin_emp_epfs')
						->where('mnrce_admin_emp_epfs.id', $user)
						->join('mnrce_admin_emp_personals','mnrce_admin_emp_personals.id','mnrce_admin_emp_epfs.emp_id')
						->get();
						
	$data2 = DB::table('mnrce_admin_emp_contacts')->where('epf_id', $user)->get();
	
	$data3 = DB::table('mnrce_admin_emp_acd_ols')->where('epf_id', $user)->where('type', 'GCE O/L')->get();
	$count3 = DB::table('mnrce_admin_emp_acd_ols')->where('epf_id', $user)->where('type', 'GCE O/L')->count();
	
	$data4 = DB::table('mnrce_admin_emp_acd_ols')->where('epf_id', $user)->where('type', 'GCE A/L')->get();
	$count4 = DB::table('mnrce_admin_emp_acd_ols')->where('epf_id', $user)->where('type', 'GCE A/L')->count();
	
	$count5 = DB::table('mnrce_admin_emp_acd_basics')->where('epf_id', $user)->where('passgrade', 'Grade 5')->count();
	$count6 = DB::table('mnrce_admin_emp_acd_basics')->where('epf_id', $user)->where('passgrade', 'Grade 8')->count();
	
	$data7 = DB::table('mnrce_admin_emp_emer_contacts')->where('epf_id', $user)->get();
	
	$data8 = DB::table('mnrce_admin_emp_acd_highs')->where('epf_id', $user)->get();
	$count8 = DB::table('mnrce_admin_emp_acd_highs')->where('epf_id', $user)->count();
	
	$data9 = DB::table('mnrce_admin_emp_acd_profis')->where('epf_id', $user)->get();
	$count9 = DB::table('mnrce_admin_emp_acd_profis')->where('epf_id', $user)->count();		
	
	$data10 = DB::table('mnrce_admin_emp_work_expers')->where('epf_id', $user)->get();		
								
	$data11 = DB::table('mnrce_admin_emp_designations')->where('epf_id', $user)->where('revDate',null)
							->join('mnrce_admin_master_designations','mnrce_admin_master_designations.id','=','mnrce_admin_emp_designations.empDesig')
							->get();			
							
	$data12 = DB::table('mnrce_admin_emp_divisions')->where('epf_id', $user)->where('resdate',null)
						->join('mnrce_admin_master_projects','mnrce_admin_master_projects.Pcode','=','mnrce_admin_emp_divisions.divs')
						->get();		
						
	$data12i = DB::table('mnrce_admin_emp_locations')->where('epf_id', $user)
						->join('mnrce_admin_master_projects','mnrce_admin_master_projects.Pcode','=','mnrce_admin_emp_locations.locat')
						->orderBy('effdate','DESC')
						->get();	
						
	$data13 = DB::table('mnrce_admin_emp_locations')->where('epf_id', $user)->where('resdate',null)
						->join('mnrce_admin_master_projects','mnrce_admin_master_projects.Pcode','=','mnrce_admin_emp_locations.locat')
						->get();				

	$data14 = DB::table('mnrce_admin_emp_designations')->where('epf_id', $user)
						->join('mnrce_admin_master_designations','mnrce_admin_master_designations.id','=','mnrce_admin_emp_designations.empDesig')
						->orderBy('effDate','DESC')
						->get();		

	$data15 = DB::table('mnrce_admin_emp_trainings')->where('epf_id', $user)->orderBy('sdate','DESC')->get();		
																									
	$data16 = DB::table('mnrce_admin_salary_incriments')->where('epf_id', $user)->orderBy('edate','ASC')->get();	
																										
																										
	$data16i = DB::table('mnrce_admin_salary_incriments')->where('epf_id', $user)->orderBy('edate','DESC')->get();	
																										
	$data17 = DB::table('mnrce_admin_emp_relatives')->where('epf_id', $user)->get();		
																									
	$data18 = DB::table('mnrce_admin_emp_certificates')->where('epf_id', $user)->get();	
																										
	$data19 = DB::table('mnrce_admin_leave_requests')
						->where('epf_id', $user)
						->orderBy('id','ASC')
						->get();																										
	
?> 
<body class="hold-transition sidebar-mini">
<div class="wrapper">


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="../public/assets/images/emp/profile/<?php echo $imgEpf; ?>.jpg"
                       onerror="this.src='../public/assets/images/user.png'"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">									
                				@foreach($data1 as $value)
									{{$value->nameini}}
									@endforeach                      
									              </h3>

                <p class="text-muted text-center">
                				@foreach($data11 as $value)
									{{$value->name}}
									@endforeach                  
                </p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                  <p class=""> Appointed Date : </p>
                    <b>  	
                    			@foreach($data1 as $value)
										{{$value->appoint_date}}
									@endforeach   
						 </b> <a class="float-right"></a>
                  </li>                
                  <li class="list-group-item">
                  <p class=""> Division : </p>
                    <b>  	
                    			@foreach($data12 as $value)
										{{$value->Pname}}
									@endforeach   
						 </b> <a class="float-right"></a>
                  </li>
                  <li class="list-group-item">
                   <p> Location :</p> 
                    <b>
                    			@foreach($data13 as $value)
										{{$value->Pname}}
									@endforeach                    
                    </b> <a class="float-right"></a>
                  </li>
                  <li class="list-group-item">
                    <b>									
                    			@foreach($data2 as $value)
										{{$value->mobile1}}
									@endforeach  </b> 
                  </li>
                </ul>


              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card card-primary card-outline">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#personal" data-toggle="tab">Personal Data</a></li>
                  <li class="nav-item"><a class="nav-link" href="#contact" data-toggle="tab">Contact Details</a></li>
                  <li class="nav-item"><a class="nav-link" href="#Education" data-toggle="tab">Education</a></li>
                  <li class="nav-item"><a class="nav-link" href="#Work" data-toggle="tab">Employment History</a></li>
                  <li class="nav-item"><a class="nav-link" href="#divis" data-toggle="tab">Division History</a></li>
                  <li class="nav-item"><a class="nav-link" href="#desigs" data-toggle="tab">Designation History</a></li>
                  <li class="nav-item"><a class="nav-link" href="#train" data-toggle="tab">Training</a></li>
                  <li class="nav-item"><a class="nav-link" href="#sal" data-toggle="tab">Salary Increments</a></li>
                  <li class="nav-item"><a class="nav-link" href="#rel" data-toggle="tab">Relatives</a></li>
                  <li class="nav-item"><a class="nav-link" href="#hard" data-toggle="tab">Certificates</a></li>
                  <li class="nav-item"><a class="nav-link" href="#leave" data-toggle="tab">Leave</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="personal">
 								@include('reports.employee.profile.tabs.personal')
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="contact">

								@include('reports.employee.profile.tabs.contacts')
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="Education">
								@include('reports.employee.profile.tabs.edu')
                  </div>

                  <div class="tab-pane" id="Work">
								@include('reports.employee.profile.tabs.work')
                  </div>      
                  <div class="tab-pane" id="divis">
								@include('reports.employee.profile.tabs.divis')
                  </div> 
                  <div class="tab-pane" id="desigs">
								@include('reports.employee.profile.tabs.desig')
                  </div>    
                  <div class="tab-pane" id="train">
								@include('reports.employee.profile.tabs.training')
                  </div>  
                  <div class="tab-pane" id="sal">
								@include('reports.employee.profile.tabs.salaryinc')
                  </div> 
                  <div class="tab-pane" id="rel">
								@include('reports.employee.profile.tabs.emprelative')
                  </div>  
                  <div class="tab-pane" id="hard">
								@include('reports.employee.profile.tabs.certificate')
                  </div>             
                  <div class="tab-pane" id="leave">
								@include('reports.employee.profile.tabs.leave')
                  </div>                                                                                                                       
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


</body>
</html>
