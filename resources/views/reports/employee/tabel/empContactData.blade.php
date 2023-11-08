@include('navbar.leftbar')

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
                <h3 class="card-title">Employee Contact Data</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                     <table id="example1" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>EPF</th>
                          <th>Name</th>
                          <th>Appointment</th>
                          <th>Designation</th>
                          <th>Department</th>
                          <th>Location</th>
                          <th>NIC</th>
                          <th>Gender</th>
                          <th>Address</th>
                          <th>Mobile 1</th>
                          <th>Mobile 2</th>
                          <th>Land Line</th>
                        </tr>
                      </thead>
								<?php
									
									$data1 = DB::table('mnrce_admin_emp_epfs')
														->join('mnrce_admin_emp_personals','mnrce_admin_emp_personals.id','mnrce_admin_emp_epfs.emp_id')
														->join('mnrce_admin_emp_contacts','mnrce_admin_emp_contacts.epf_id','mnrce_admin_emp_epfs.emp_id')
														->join('mnrce_admin_emp_divisions','mnrce_admin_emp_divisions.epf_id','mnrce_admin_emp_epfs.emp_id')
														->join('mnrce_admin_master_projects','mnrce_admin_master_projects.Pcode','mnrce_admin_emp_divisions.divs')
														->join('mnrce_admin_emp_designations','mnrce_admin_emp_designations.epf_id','mnrce_admin_emp_epfs.emp_id')
														->join('mnrce_admin_master_designations','mnrce_admin_master_designations.id','mnrce_admin_emp_designations.empDesig')
														->orderBy('epf_no', 'asc')
														->get();
														
									//$count3 = DB::table('emppersonals')->count();
									//print_r($data1);
									
								?>
								<tbody>
									@foreach($data1 as $value)
										@php
	

											$data4=DB::table('mnrce_admin_emp_locations')
														->where('epf_id',$value->emp_id)
														->where('resdate',null)
														->join('mnrce_admin_master_projects','mnrce_admin_master_projects.Pcode','=','mnrce_admin_emp_locations.locat')
														->get();																											
		
										@endphp
									<tr style="">
										<td>{{$loop->iteration}}</td>
										<td>{{$value->epf_no}}</td>	
										<td>{{$value->nameini}}</td>	
										<td>{{$value->appoint_date}}</td>	
										<td>
													{{$value->name}}
											
										</td>	
										
										<td>
													{{$value->Pname}}

										</td>	
										<td>@foreach($data4 as $value4)
													{{$value4->Pname}}
											@endforeach	
										</td>											
										<td>{{$value->nic}}</td>
										
										<td>
											@if($value->gender=='M')
												Male
											@else
												Female
											@endif		
										</td>																												
										<td>{{$value->add1}}</td>
										<td>{{$value->mobile1}}</td>
										<td>{{$value->mobile2}}</td>
										<td>{{$value->homephone}}</td>
																				
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
