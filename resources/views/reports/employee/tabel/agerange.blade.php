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
                <h3 class="card-title">Employee Age Range</h3>
              </div>
              <!-- /.card-header -->

              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped" style="width: 100%">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th colspan="2">Range</th>
                          <th></th>
                          <th>Count</th>

                        </tr>
                      </thead>
 								<?php
 									$d1=date('Y-m-d', strtotime('-20 years'));
 									$d2=date('Y-m-d', strtotime('-25 years'));
 									$d3=date('Y-m-d', strtotime('-30 years'));
 									$d4=date('Y-m-d', strtotime('-35 years'));
 									$d5=date('Y-m-d', strtotime('-40 years'));
 									$d6=date('Y-m-d', strtotime('-45 years'));
 									$d7=date('Y-m-d', strtotime('-50 years'));
 									$d8=date('Y-m-d', strtotime('-55 years'));
 									$d9=date('Y-m-d', strtotime('-60 years'));
 									$d10=date('Y-m-d', strtotime('-65 years'));

 									
									$c1 = DB::table('emppersonals')
															->where('resignDate',NULL)
															->where('dob','<=',$d1)
															->where('dob','>',$d2)
															->join('edesignations','edesignations.epf_id','emppersonals.id')
															->where('revDate',NULL)
															->where('empType','<>','Daily Basis')
															->count();
															
									$c2 = DB::table('emppersonals')
															->where('resignDate',NULL)
															->where('dob','<=',$d2)
															->where('dob','>',$d3)
															->join('edesignations','edesignations.epf_id','emppersonals.id')
															->where('revDate',NULL)
															->where('empType','<>','Daily Basis')
															->count();																					

									$c3 = DB::table('emppersonals')
															->where('resignDate',NULL)
															->where('dob','<=',$d3)
															->where('dob','>',$d4)
															->join('edesignations','edesignations.epf_id','emppersonals.id')
															->where('revDate',NULL)
															->where('empType','<>','Daily Basis')
															->count();	
									$c4 = DB::table('emppersonals')
															->where('resignDate',NULL)
															->where('dob','<=',$d4)
															->where('dob','>',$d5)
															->join('edesignations','edesignations.epf_id','emppersonals.id')
															->where('revDate',NULL)
															->where('empType','<>','Daily Basis')
															->count();																															

									$c5 = DB::table('emppersonals')
															->where('resignDate',NULL)
															->where('dob','<=',$d5)
															->where('dob','>',$d6)
															->join('edesignations','edesignations.epf_id','emppersonals.id')
															->where('revDate',NULL)
															->where('empType','<>','Daily Basis')
															->count();																															

									$c6 = DB::table('emppersonals')
															->where('resignDate',NULL)
															->where('dob','<=',$d6)
															->where('dob','>',$d7)
															->join('edesignations','edesignations.epf_id','emppersonals.id')
															->where('revDate',NULL)
															->where('empType','<>','Daily Basis')
															->count();																															

									$c7 = DB::table('emppersonals')
															->where('resignDate',NULL)
															->where('dob','<=',$d7)
															->where('dob','>',$d8)
															->join('edesignations','edesignations.epf_id','emppersonals.id')
															->where('revDate',NULL)
															->where('empType','<>','Daily Basis')
															->count();																															
									$c8 = DB::table('emppersonals')
															->where('resignDate',NULL)
															->where('dob','<=',$d8)
															->where('dob','>',$d9)
															->join('edesignations','edesignations.epf_id','emppersonals.id')
															->where('revDate',NULL)
															->where('empType','<>','Daily Basis')
															->count();																															
									$c9 = DB::table('emppersonals')
															->where('resignDate',NULL)
															->where('dob','<=',$d9)
															->where('dob','>',$d10)
															->join('edesignations','edesignations.epf_id','emppersonals.id')
															->where('revDate',NULL)
															->where('empType','<>','Daily Basis')
															->count();		
									$c10 = DB::table('emppersonals')
															->where('resignDate',NULL)
															->where('dob','<=',$d10)
															->join('edesignations','edesignations.epf_id','emppersonals.id')
															->where('revDate',NULL)
															->where('empType','<>','Daily Basis')
															->count();																																																																											
         
								?>                     
								<tbody>

									<tr style=""><td>1</td> <td>{{$d1}}</td><td>{{$d2}}</td><td>20-25</td><td>{{$c1}}</td> </tr>
									<tr style=""><td>2</td> <td>{{$d2}}</td><td>{{$d3}}</td><td>25-30</td><td>{{$c2}}</td> </tr>
									<tr style=""><td>3</td> <td>{{$d3}}</td><td>{{$d4}}</td><td>30-35</td><td>{{$c3}}</td> </tr>
									<tr style=""><td>4</td> <td>{{$d4}}</td><td>{{$d5}}</td><td>35-40</td><td>{{$c4}}</td> </tr>
									<tr style=""><td>5</td> <td>{{$d5}}</td><td>{{$d6}}</td><td>40-45</td><td>{{$c5}}</td> </tr>
									<tr style=""><td>6</td> <td>{{$d6}}</td><td>{{$d7}}</td><td>45-50</td><td>{{$c6}}</td> </tr>
									<tr style=""><td>7</td> <td>{{$d7}}</td><td>{{$d8}}</td><td>50-55</td><td>{{$c7}}</td> </tr>
									<tr style=""><td>8</td> <td>{{$d8}}</td><td>{{$d9}}</td><td>55-60</td><td>{{$c8}}</td> </tr>
									<tr style=""><td>9</td> <td>{{$d9}}</td><td>{{$d10}}</td><td>60-65</td><td>{{$c9}}</td> </tr>
									<tr style=""><td>10</td> <td>{{$d9}}</td><td></td><td>65++</td><td>{{$c10}}</td> </tr>
									
									
									
							
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
