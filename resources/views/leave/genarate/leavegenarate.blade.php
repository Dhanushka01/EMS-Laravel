@include('navbar.leftbar')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	@if(Session::has('lgen'))
		<script type="text/javascript" >
			swal("Good Job !","{!! Session::pull('lgen') !!}","success",{
				button:"ok",					
			});
		</script>	
		Session::forget('lgen');		
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
                <h3 class="card-title">Employee Leave Data</h3>
                <div style="float: right;">
                	<a href="employee-leave-genarate-function" >
							<button class="btn btn-primary" >Generate</button>   
						</a>             
                </div>               
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>EPF</th>
                          <th>Name</th>
                          <th>Leave Type</th>
                          <th>Amount</th>
                          <th>Apply Date</th>
                          <th>Exp Date</th>							                           
                        </tr>
                      </thead>
 								<?php
 									$date=date('Y-01-01');
									$data1 = DB::table('mnrce_admin_leave_genarates')
														->where('applyDate','>=',$date)																
														->orderBy('mnrce_admin_leave_genarates.epf_id', 'asc')
														->join('mnrce_admin_emp_epfs','mnrce_admin_emp_epfs.id','=','mnrce_admin_leave_genarates.epf_id')
														->join('mnrce_admin_emp_personals','mnrce_admin_emp_personals.id','=','mnrce_admin_emp_epfs.emp_id')
														->get();
														
									$count3 = DB::table('mnrce_admin_leave_genarates')->count();
									
								?>                     
								<tbody>
									@foreach($data1 as $value)
									<tr style="">
										<td>{{$loop->iteration}}</td>
										<td>{{$value->epf_no}}</td>	
										<td>{{$value->nameini}}</td>	
										<td>{{$value->ltype}}</td>	
										<td>{{$value->amount}}</td>
										<td>{{$value->applyDate}}</td>
										<td>{{$value->expDate}}</td>
																				
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
