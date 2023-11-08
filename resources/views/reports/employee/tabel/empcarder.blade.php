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
                <h3 class="card-title">Employee Carder</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Designation</th>
                          <th>SOR Carder</th>
                          <th>Current Carder</th>
                          <th>To Fill</th>
                        </tr>
                      </thead>
 								<?php
									$data1 = DB::table('mnrce_admin_master_designations')->orderBy('name', 'asc')->get();
								//	$count3 = DB::table('emppersonals')->count();
								//	use Carbon\Carbon;
								?>                     
								<tbody>
									@foreach($data1 as $value)
									<?php
										$id=$value->id;
										
										$data1 = DB::table('mnrce_admin_emp_designations')
															->where('empDesig',$id)
															->where('revDate', null)
															->count();
										
										$ava=$value->cadre-$data1;
									?>
									<tr style="">
										<td>{{$loop->iteration}}</td>
										<td>{{$value->name}}</td>	
										<td>{{$value->cadre}}</td>	
										<td>{{$data1}}</td>									
										<td>@if($ava==0)
												Filled
											@elseif($ava>0)
												{{$ava}}
											@else
												{{$ava}}
											@endif	
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
