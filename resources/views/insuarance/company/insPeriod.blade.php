@include('navbar.leftbar')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


@if(Session::has('period'))
	<script type="text/javascript" >
		swal("Good Job !","{!! Session::pull('period') !!}","success",{
			button:"ok",					
		});
	</script>	
	Session::forget('period');		
@endif	

@if(Session::has('periodE'))
	<script type="text/javascript" >
		swal("Try Again !","{!! Session::pull('periodE') !!}","error",{
			button:"ok",					
		});
	</script>	
	Session::forget('periodE');		
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
                <h3 class="card-title">Insurance Time Period</h3>
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
                          <th>Company</th>
                          <th>Type</th>
                          <th>From</th>
                          <th>To</th>


         

						                           
                        </tr>
                      </thead>
 								<?php
									$data1 = DB::table('ins_types')
														->join('ins_companies','ins_companies.id','=','ins_types.insid')
														->select('ins_types.*','ins_companies.comname')														
														->get();
														
									use Carbon\Carbon;
								?>                     
								<tbody>
									@foreach($data1 as $value)
									<tr style="">
										<td>{{$loop->iteration}}</td>
										<td>{{$value->comname}}</td>	
										<td>{{$value->type}}</td>														
										<td>{{$value->insfrom}}</td>														
										<td>{{$value->insto}}</td>														
													
														
													
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

    
     
<!-------------------------------------------- Insert Model --------------------------------------------- -->
        
<!-- Insert Model -->
<script type="text/javascript" >
	function showinsertmodel() {
		$('#modal-xl').modal('show');		
	}
</script>

<div class="modal fade show" id="modal-xl">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
        <div class="card card-primary">
             <div class="card-header">
                	<h3 class="card-title">Insurance Time Period </h3>
               	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
               		<span aria-hidden="true">&times;</span>
              		</button>
              </div>
				 <form id="demo-form" data-parsley-validate action="/insper" method="POST">
               @csrf
                <div class="card-body" style="display: ;">
	                <div class="row">
                  <div class="form-group col-md-6">
							<label for="from"> From </label>
							<input type="date" name="from" id="from" required="" class="form-control" value="<?php echo date('Y-01-01'); ?>" />                  
                  </div>
                  <div class="form-group col-md-6">
							<label for="from"> To </label>
							<input type="date" name="to" id="to" required="" class="form-control" value="<?php echo date('Y-12-31'); ?>" />                  
                  </div>	                  
                    <div class="form-group col-md-6">
                      <label for="epf">Insurance Company * :</label>
                         <select id="insc" class="form-control epfselect select2" required name="insc" >
                             <option value="">Select Insurance Company</option>
										<?php
											$data = DB::table('ins_companies')->get();
											foreach($data as $key => $value){
												echo "<option value='".$value->id."'>".$value->comname."</option>";											
											}
										?>		                           
                         </select>
						 </div>
                    <div class="form-group col-md-6">
                      <label for="epf">Plan</label>
                         <select id="type" class="form-control" required name="type" required="" >
                             <option value="Health">Health</option>
                             <option value="WCI">WCI</option>
                             <option value="PA">PA</option>
		                           
                         </select>
						 </div>	
	                  <div class="form-group col-md-4">
                        <label>Total Claiming Value<span class="required">*</span>
                        </label>
								<input type="number" step="0.01" id="val" name="val" required="required" class="form-control" min="0" >	                    
	                  </div>						                   	 
	                  
	                </div>
                </div>
                
                
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <input type="submit" name="submit" class="btn btn-warning" value="Save" >
            </div>
            </form>  
          </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
        <!-- /.modal-dialog -->
<script src="assets/insuarance/invoice.js"></script>




