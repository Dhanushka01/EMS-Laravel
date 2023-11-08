@include('navbar.leftbar')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	@if(Session::has('empAppr'))
		<script type="text/javascript" >
			swal("Good Job !","{!! Session::pull('empAppr') !!}","success",{
				button:"ok",					
			});
		</script>	
		Session::forget('empAppr');		
	@endif

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
                <h3 class="card-title">Employee Leave Data Approval</h3>
               
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>EPF</th>
                          <th>Name</th>
                          <th>Request Date</th>
                          <th>From</th>
                          <th>To</th>
                          <th>Leave</th>							                           
                          <th>Amount</th>							                           
                          <th>Arrangement</th>							                           
                          <th>Description</th>							                           
                          <th>Status</th>							                           
                          <th>Action</th>							                           
                        </tr>
                      </thead>
 								<?php
 									$date=date('Y-01-01');
									$data1 = DB::table('mnrce_admin_leave_requests')
														->where('reqDate','>=',$date)																																
														->orderBy('leaveStatus', 'ASC')
														->join('mnrce_admin_emp_epfs','mnrce_admin_emp_epfs.id','=','mnrce_admin_leave_requests.epf_id')
														->join('mnrce_admin_emp_personals','mnrce_admin_emp_personals.id','=','mnrce_admin_emp_epfs.emp_id')
														->select('mnrce_admin_leave_requests.*','mnrce_admin_emp_personals.nameini','mnrce_admin_emp_epfs.epf_no')
														->get();
														
									//$count3 = DB::table('leave_requests')->count();
									
								?>                     
								<tbody>
									@foreach($data1 as $value)
										<?php
											$data2 = DB::table('mnrce_admin_emp_epfs')
																->where('mnrce_admin_emp_epfs.id',$value->w_arrange)
																->join('mnrce_admin_emp_personals','mnrce_admin_emp_personals.id','=','mnrce_admin_emp_epfs.emp_id')
														
																->get();										
										?>	
																			
									<tr style="">
										<td>{{$loop->iteration}}</td>
										<td>{{$value->epf_no}}</td>	
										<td>{{$value->nameini}}</td>	
										<td>{{$value->reqDate}}</td>	
										<td>{{$value->leaveFrom}}</td>	
										<td>{{$value->leaveTo}}</td>	
										<td>{{$value->leaveType}}</td>	
										<td>{{$value->leaveQty}}</td>
										<td><?php 
											foreach($data2 as $key=>$value2){
												echo $value2->epf_no." | ";											
												echo $value2->nameini;											
											}											
										?></td>	
										<td>{{$value->description}}</td>
										<td>
												<?php
													if($value->leaveStatus=='0') {
														echo "<p class='bg-secondary rounded-pill' style='text-align: center;' >Requested</p>";													
													}
													elseif($value->leaveStatus=='1') {
														echo "<p class='bg-success rounded-pill' style='text-align: center;' >Approved</p>";													
													}
													elseif($value->leaveStatus=='2') {
														echo "<p class='bg-danger rounded-pill' style='text-align: center;' >Rejected</p>";													
													}																										
												?>
										</td>
										<?php 
											if($value->leaveStatus=='0') {
										?>		
												<td><a href="/leaveApprove/{{$value->id}}/{{$value->epf_no}}/1" class="btn btn-primary" >Approve</a>
												<a href="/leaveApprove/{{$value->id}}/{{$value->epf_no}}/2" class="btn btn-warning" >Reject</a>
												</td>
										<?php
											}
											else {
												echo "<td></td>";											
											}
										?>
																				
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
