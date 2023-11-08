@include('navbar.leftbar')
	<?php
	if(!empty($_POST['filter'])) {
	
			$from=$_POST['from'];
			$to=$_POST['to'];



		$type=$_POST['type'];
		
		$desig=$_POST['designation'];

			if($type=='All' and $desig=='All' and !empty($from) and !empty($to))  {
				$data1 = DB::table('mnrce_admin_emp_designations')
											->whereNotNull('aExpDate')
											->whereNull('revDate')
											->where('aExpDate','>',$from)
											->where('aExpDate','<',$to)
											->orderBy('aExpDate', 'ASC')
											->join('mnrce_admin_emp_epfs','mnrce_admin_emp_epfs.id','=','mnrce_admin_emp_designations.epf_id')
											->join('mnrce_admin_emp_personals','mnrce_admin_emp_personals.id','=','mnrce_admin_emp_epfs.emp_id')
											->join('mnrce_admin_master_designations','mnrce_admin_master_designations.id','=','mnrce_admin_emp_designations.empDesig')
											->get();				
			}
			elseif($type=='All' and $desig=='All' and empty($from) and empty($to)) {
				$data1 = DB::table('mnrce_admin_emp_designations')
											->whereNotNull('aExpDate')
											->whereNull('revDate')
											->orderBy('aExpDate', 'ASC')
											->join('mnrce_admin_emp_epfs','mnrce_admin_emp_epfs.id','=','mnrce_admin_emp_designations.epf_id')
											->join('mnrce_admin_emp_personals','mnrce_admin_emp_personals.id','=','mnrce_admin_emp_epfs.emp_id')
											->join('mnrce_admin_master_designations','mnrce_admin_master_designations.id','=','mnrce_admin_emp_designations.empDesig')
											->get();			
			}
			elseif($type=='All' and $desig!='All' and !empty($from) and !empty($to)) {
				$data1 = DB::table('mnrce_admin_emp_designations')
											->whereNotNull('aExpDate')
											->whereNull('revDate')
											->where('empDesig','=',$desig)
											->where('aExpDate','>',$from)
											->where('aExpDate','<',$to)
											->orderBy('aExpDate', 'ASC')
											->join('mnrce_admin_emp_epfs','mnrce_admin_emp_epfs.id','=','mnrce_admin_emp_designations.epf_id')
											->join('mnrce_admin_emp_personals','mnrce_admin_emp_personals.id','=','mnrce_admin_emp_epfs.emp_id')
											->join('mnrce_admin_master_designations','mnrce_admin_master_designations.id','=','mnrce_admin_emp_designations.empDesig')
											->get();			
			}
			elseif($type=='All' and $desig!='All' and empty($from) and empty($to)) {
				$data1 = DB::table('mnrce_admin_emp_designations')
											->whereNotNull('aExpDate')
											->whereNull('revDate')
											->where('empDesig','=',$desig)
											->orderBy('aExpDate', 'ASC')
											->join('mnrce_admin_emp_epfs','mnrce_admin_emp_epfs.id','=','mnrce_admin_emp_designations.epf_id')
											->join('mnrce_admin_emp_personals','mnrce_admin_emp_personals.id','=','mnrce_admin_emp_epfs.emp_id')
											->join('mnrce_admin_master_designations','mnrce_admin_master_designations.id','=','mnrce_admin_emp_designations.empDesig')
											->get();				
			}
			elseif($type!='All' and $desig=='All' and !empty($from) and !empty($to)) {
				$data1 = DB::table('mnrce_admin_emp_designations')
											->whereNotNull('aExpDate')
											->whereNull('revDate')
											->where('empType','=',$type)
											->where('aExpDate','>',$from)
											->where('aExpDate','<',$to)
											->orderBy('aExpDate', 'ASC')
											->join('mnrce_admin_emp_epfs','mnrce_admin_emp_epfs.id','=','mnrce_admin_emp_designations.epf_id')
											->join('mnrce_admin_emp_personals','mnrce_admin_emp_personals.id','=','mnrce_admin_emp_epfs.emp_id')
											->join('mnrce_admin_master_designations','mnrce_admin_master_designations.id','=','mnrce_admin_emp_designations.empDesig')
											->get();		
			}
			elseif($type!='All' and $desig=='All' and empty($from) and empty($to)) {
				$data1 = DB::table('mnrce_admin_emp_designations')
											->whereNotNull('aExpDate')
											->whereNull('revDate')
											->where('empType','=',$type)
											->orderBy('aExpDate', 'ASC')
											->join('mnrce_admin_emp_epfs','mnrce_admin_emp_epfs.id','=','mnrce_admin_emp_designations.epf_id')
											->join('mnrce_admin_emp_personals','mnrce_admin_emp_personals.id','=','mnrce_admin_emp_epfs.emp_id')
											->join('mnrce_admin_master_designations','mnrce_admin_master_designations.id','=','mnrce_admin_emp_designations.empDesig')
											->get();				
			}			
			elseif($type!='All' and $desig!='All' and !empty($from) and !empty($to)) {
				$data1 = DB::table('mnrce_admin_emp_designations')
											->whereNotNull('aExpDate')
											->whereNull('revDate')
											->where('empType','=',$type)
											->where('empDesig','=',$desig)
											->where('aExpDate','>',$from)
											->where('aExpDate','<',$to)											
											->orderBy('aExpDate', 'ASC')
											->join('mnrce_admin_emp_epfs','mnrce_admin_emp_epfs.id','=','mnrce_admin_emp_designations.epf_id')
											->join('mnrce_admin_emp_personals','mnrce_admin_emp_personals.id','=','mnrce_admin_emp_epfs.emp_id')
											->join('mnrce_admin_master_designations','mnrce_admin_master_designations.id','=','mnrce_admin_emp_designations.empDesig')
											->get();				
			}
			elseif($type!='All' and $desig!='All' and empty($from) and empty($to)) {
				$data1 = DB::table('mnrce_admin_emp_designations')
											->whereNotNull('aExpDate')
											->whereNull('revDate')
											->where('empType','=',$type)
											->where('empDesig','=',$desig)											
											->orderBy('aExpDate', 'ASC')
											->join('mnrce_admin_emp_epfs','mnrce_admin_emp_epfs.id','=','mnrce_admin_emp_designations.epf_id')
											->join('mnrce_admin_emp_personals','mnrce_admin_emp_personals.id','=','mnrce_admin_emp_epfs.emp_id')
											->join('mnrce_admin_master_designations','mnrce_admin_master_designations.id','=','mnrce_admin_emp_designations.empDesig')
											->get();				
			}								
		}
		
		else {
			//when the Filters are not applied
			$data1 = DB::table('mnrce_admin_emp_designations')
										->whereNotNull('aExpDate')
										->whereNull('revDate')
										->whereNull('revDate')
										->orderBy('aExpDate', 'ASC')
										->join('mnrce_admin_emp_epfs','mnrce_admin_emp_epfs.id','=','mnrce_admin_emp_designations.epf_id')
										->join('mnrce_admin_emp_personals','mnrce_admin_emp_personals.id','=','mnrce_admin_emp_epfs.emp_id')
										->join('mnrce_admin_master_designations','mnrce_admin_master_designations.id','=','mnrce_admin_emp_designations.empDesig')
										->get();			
		}
		$_POST['filter']=NULL;
		

									
		//$count3 = DB::table('emppersonals')->count();
		use Carbon\Carbon;
	?> 
<body class="hold-transition sidebar-mini">
<div class="wrapper">



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">

      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title">Employee Agreement Data</h3>
              </div>
              <div class="card-body">
              	<form method="POST" action="<?php //echo $_SERVER['PHP_SELF']; ?>">
              		@csrf
						<div class="row">
							<div class="col-md-3 form-group">
								<select class="form-control" name="type" id="type">	
									<option value="All" >ALL</option>								
                            <option value="TRAINEE">Trainee</option>
                            <option value="PROBATION">Probation</option>
                            <option value="CONTRACT">Contract Basis</option>
                            <option value="DAILY BASIS">Daily Basis</option>
                            <option value="FREELANCER">Freelance</option>
                            <option value="LABOR CONTRACT">Labor Contract</option>
                            <option value="INTERNSHIP">Internship</option>							
																
								</select>								
	
							</div>
							<div class="col-md-3 form-group">
								<select class="form-control select2" name="designation" id="designation">
									<option value="All">All</option>
							<?php
								$designation=DB::table('mnrce_admin_master_designations')->get();
								foreach($designation as $key=>$value){
									echo "<option value='".$value->id."' >".$value->name."</option>";								
								}
							?>									
								</select>
							</div>							
							<div class="col-md-3 form-group">
								<input class="form-control" type="date" name="from" id="from" />
							</div>
							<div class="col-md-3 form-group">
								<input class="form-control" type="date" name="to" id="to" />
							</div>
							<div class="col-md-3 form-group">
								<input class="form-control" type="submit" name="filter" id="filter" value="Filter" />
							</div>														
						</div>
					</form>					              
              </div>              
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped" style="width: 100%">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>EPF</th>
                          <th>Name</th>
                          <th>Designation</th>
                          <th>Age</th>

                          <th>Type</th>
                          <th>Appointment Date</th> 
                          <th>Agreement Exp. Date</th>              
                          <th>Status</th>
                        </tr>
                      </thead>                    
								<tbody>
									@foreach($data1 as $value)
									<tr style="">
										<td>{{$loop->iteration}}</td>
										<td>{{$value->epf_no}}</td>	
										<td>{{$value->nameini}}</td>	
										<td>{{$value->name}}</td>	
										<?php
											$bdate=$value->dob;
											
											$date = Carbon::parse($bdate);
											$now = Carbon::now();
											
											$diff1 = $date->diff($now)->format('%y Years and %m months');
										//	$diff1 = $date->diff($now)->format('%y');
									
										?>										
										<td>{{$diff1}}</td>	


										<td>{{$value->empType}}</td>

										
										<td>{{$apoi=$value->appoint_date}}</td>
										<td>{{$apoi1=$value->aExpDate}}</td>

										

										<?php
									$date = Carbon::parse($apoi);
									$now = Carbon::now();
									
									$diff = $date->diff($now)->format('%y years, %m months and %d days');
									/*
									$diff2=$diff1/365.25;
									$diff =round($diff2, 0);
									*/										
										?>
																														
										
										<td>
											<?php 
												$date=date('Y-m-d');
												if($apoi1<$date) {	
													echo "<p class='bg-danger'>Expired</p>";												
												}
												else {
													echo "<p class='bg-success'>Available</p>";	
													
												}											
											?>										
										</td>																			
									</tr>
									
									@endforeach								
								</tbody>                      
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

</body>
</html>

