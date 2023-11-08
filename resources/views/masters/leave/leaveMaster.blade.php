@include('navbar.leftbar')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

@if(Session::has('LeaveType'))
	<script type="text/javascript" >
		swal("Good Job !","{!! Session::pull('LeaveType') !!}","success",{
			button:"ok",					
		});
	</script>	
	Session::forget('LeaveType');		
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
                <h3 class="card-title">Leave Master</h3>
                <div style="float: right;">
                	<a>
							<button class="btn btn-primary" onclick="showinsertmodel()" >New</button>   
						</a>             
                </div>               
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Leave Type</th>
                          <th>Max leave</th>
                          <th>Remarks</th>
						                           
                        </tr>
                      </thead>
 								<?php
									$data1 = DB::table('mnrce_admin_master_leave_types')	
														->get();
														
									
								?>                     
								<tbody>
									@foreach($data1 as $value)
									<tr style="">
										<td>{{$loop->iteration}}</td>
										<td>{{$value->ltype}}</td>		
										<td>{{$value->max}}</td>		
										<td>{{$value->description}}</td>			
																				
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
                	<h3 class="card-title">Issuance Company Registration Form</h3>
               	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
               		<span aria-hidden="true">&times;</span>
              		</button>
              </div>
               <form id="demo-form" data-parsley-validate action="master-leave-new" method="POST">
               @csrf
                <div class="card-body">
                <div class="row">
                  <div class="form-group col-md-12">
                    <label for="ltype">Leave type</label>
                    <input type="text" class="form-control" name="ltype" id="ltype" placeholder="Leave Type" required />
                  </div>
                  <div class="form-group col-md-12">
                    <label for="amount">Maximum available leaves per year</label>
                    <input type="number" class="form-control" name="amount" id="amount" 
                    placeholder="Max Available Leave" required min="-1" max="366" />
                  </div>                  
                </div>

                  <div class="form-group col-md-12">
                    <label for="remarks">Description</label>
                    <textarea class="form-control" name="remarks" id="remarks" placeholder="Description" required /></textarea>
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


