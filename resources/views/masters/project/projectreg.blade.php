@include('navbar.leftbar')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

@if(Session::has('mdesig'))
	<script type="text/javascript" >
		swal("Good Job !","{!! Session::pull('mdesig') !!}","success",{
			button:"ok",					
		});
	</script>	
	Session::forget('mdesig');		
@endif	
@if(Session::has('mdesigD'))
	<script type="text/javascript" >
		swal("Error !","{!! Session::pull('mdesigD') !!}","error",{
			button:"ok",					
		});
	</script>	
	Session::forget('mdesigD');		
@endif

<script src="assets/designation/custom/mempdesig.js"></script> 

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
                <h3 class="card-title">Divisions and Locations</h3>
                <div style="float: right;">
                	<a>
							<button class="btn btn-primary" onclick="showinsertmodel()" >New Project</button>   
						</a>             
                </div>               
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Code</th>
                          <th>Project</th>
                          <th>Location</th>
                          <th>Province</th>
						                           
                        </tr>
                      </thead>
 								<?php
									$data1 = DB::table('mnrce_admin_master_projects')	
																	->where('comDate',NULL)														
																	->orderBy('Pname', 'ASC')
																	->get();
														
									
								?>                     
								<tbody>
									@foreach($data1 as $value)
									<tr style="">
										<td>{{$loop->iteration}}</td>
										<td>{{$value->Pcode}}</td>		
										<td>{{$value->Pname}}</td>		
										<td>{{$value->Locat}}</td>		
										<td>{{$value->Provi}}</td>		
																				
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
<!-- Insert Model -->
<script type="text/javascript" >
	function showinsertmodel() {
		$('#modal-insert').modal('show');		
	}
</script>

      <div class="modal fade" id="modal-insert">
        <div class="modal-dialog">
        <div class="modal-content">
        <div class="card card-primary">
             <div class="card-header">
                	<h3 class="card-title">Project Registration Form</h3>
               	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
               		<span aria-hidden="true">&times;</span>
              		</button>
              </div>
			<form id="demo-form2" action="" method="post" data-parsley-validate class="form-horizontal form-label-left">
               @csrf
                <div class="card-body">
	                <div class="row">
	                  <div class="form-group col-md-12">
                        <label>Project Code <span class="required">*</span>
                        </label>
								<input type="text" id="" name="uname" required="required" class="form-control" autocomplete="off">	                    
	                  </div>
	                  <div class="form-group col-md-12">
                        <label>Project Name <span class="required">*</span>
                        </label>
								<input id="psw" class="form-control" type="text" name="psw" autocomplete="off">                   
	                  </div>	 
	                  <div class="form-group col-md-12">
                        <label>Work Order Number<span class="required">*</span>
                        </label>
								<input type="text" id="" name="uname" required="required" class="form-control" autocomplete="off">	                    
	                  </div>
	                  <div class="form-group col-md-12">
                        <label> Province<span class="required">*</span>
                        </label>
								<select name="a7" id="a7" class="form-control select2">
									<option value="">Select a Province</option>
									<option value="Western">1: Western</option>
									<option value="Central">2: Central</option>
									<option value="Southern">3: Southern</option>
									<option value="Northern">4: Northern</option>
									<option value="Eastern">5: Eastern</option>
									<option value="North-Western">6: North-Western</option>
									<option value="North-Central">7: North-Central</option>
									<option value="Uva">8: Uva</option>
									<option value="Sabaragamuwa">9: Sabaragamuwa</option>
								</select>               
	                  </div>
	                  <div class="form-group col-md-12">
                        <label>Remarks <span class="required">*</span>
                        </label>
								<textarea class="form-control" type="text" name="psw" autocomplete="off"></textarea>                   
	                  </div>	 
	                  <div class="form-group col-md-12">
                        <label>Project Complete Date<span class="required">*</span>
                        </label>
								<input type="date" id="" name="uname" required="required" class="form-control" autocomplete="off">	                    
	                  </div>	                  	                                   
	                </div>
                </div>
                
                
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <input type="submit" name="save" class="btn btn-warning" value="Save" >
            </div>
            </form>  
          </div>
          </div>
          <!-- /.modal-content -->
        </div>
        </div>
        <!-- /.modal-dialog -->


