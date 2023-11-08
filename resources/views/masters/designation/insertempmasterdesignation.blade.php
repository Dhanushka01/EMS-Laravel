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
                <h3 class="card-title">Employee Designation</h3>
                <div style="float: right;">
                	<a>
							<button class="btn btn-primary" onclick="showinsertmodel()" >New Designation</button>   
						</a>             
                </div>               
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Designation</th>
                          <th>Cadre</th>
						                           
                        </tr>
                      </thead>
 								<?php
 									$date=date('Y-01-01');
									$data1 = DB::table('mnrce_admin_master_designations')	
														->where('status','1')														
														->orderBy('name', 'ASC')
														->get();
														
									
								?>                     
								<tbody>
									@foreach($data1 as $value)
									<tr style="">
										<td>{{$loop->iteration}}</td>
										<td>{{$value->name}}</td>		
										<td>{{$value->cadre}}</td>		
																				
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
                	<h3 class="card-title">Designation Form</h3>
               	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
               		<span aria-hidden="true">&times;</span>
              		</button>
              </div>
               <form id="demo-form" data-parsley-validate action="master-designation-new" method="POST">
               @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="desig">New Designation</label>
                    <input type="text" class="form-control" name="desig" id="desig" placeholder="New Designation" required />
                  </div>
                  <div class="form-group">
                    <label for="desig">Cadre</label>
                    <input type="number" class="form-control" name="cadre" id="cadre" placeholder="Cadre" required min="1" />
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
<script type="text/javascript" >
$(document).ready(function(){	
		$('#all').change(function(){
		var all=$('#all').val();
		if(all=='all'){
			swal("Please Select a Job");	
		}
		else {
			
		}
		
	});
});
</script>

