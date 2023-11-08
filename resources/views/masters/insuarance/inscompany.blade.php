@include('navbar.leftbar')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

@if(Session::has('inscomp'))
	<script type="text/javascript" >
		swal("Good Job !","{!! Session::pull('inscomp') !!}","success",{
			button:"ok",					
		});
	</script>	
	Session::forget('inscomp');		
@endif	
@if(Session::has('inscompE'))
	<script type="text/javascript" >
		swal("Error !","{!! Session::pull('inscompE') !!}","error",{
			button:"ok",					
		});
	</script>	
	Session::forget('inscompE');		
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
                <h3 class="card-title">Insurance Company</h3>
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
                          <th>Registration Number</th>
                          <th>Policy number</th>
                          <th>Company</th>
                          <th>Contact Person</th>
                          <th>Contact</th>
                          <th>Mobile</th>
                          <th>Email</th>
                          <th>Address</th>

						                           
                        </tr>
                      </thead>
 								<?php
									$data1 = DB::table('mnrce_admin_ins_companies')	
															->get();
														
									
								?>                     
								<tbody>
									@foreach($data1 as $value)
									<tr style="">
										<td>{{$loop->iteration}}</td>
										<td>{{$value->rn}}</td>		
										<td>{{$value->pn}}</td>		
										<td>{{$value->comname}}</td>			
										<td>{{$value->conp}}</td>			
										<td>{{$value->cntact_no}}</td>			
										<td>{{$value->conpno}}</td>			
										<td>{{$value->email}}</td>			
										<td>{{$value->address}}</td>			
																				
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
                	<h3 class="card-title">Insurance Company Registration Form</h3>
               	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
               		<span aria-hidden="true">&times;</span>
              		</button>
              </div>
              <form id="demo-form2" action="master-ins-company-new" method="post" data-parsley-validate class="form-horizontal form-label-left">
               @csrf
                <div class="card-body" style="display: ;">
	                <div class="row">
	                  <div class="form-group col-md-12">
                        <label>Register No<span class="required">*</span>
                        </label>
								<input type="text" id="rn" name="rn" required="required" class="form-control" >	                    
	                  </div>
	                  <div class="form-group col-md-12">
                        <label>Policy No<span class="required">*</span>
                        </label>
								<input type="text" id="pn" name="pn" required="required" class="form-control" >	                    
	                  </div>	                  
	                  <div class="form-group col-md-12">
                        <label>Company<span class="required">*</span>
                        </label>
								<input id="name" class="form-control" type="text" name="name" required="" >                   
	                  </div>
	
						                   	 
	                  <div class="form-group col-md-6">
                        <label>Contact Number<span class="required">*</span>
                        </label>
								<input type="tel" id="tel" name="tel" required="required" class="form-control" >	                    
	                  </div>
	                  <div class="form-group col-md-6">
                        <label>Email<span class="required">*</span>
                        </label>
								<input type="email" id="" name="email" required="required" class="form-control" >	                    
	                  </div>	
	                  <div class="form-group col-md-6">
                        <label>Contact Person<span class="required">*</span>
                        </label>
								<input type="text" id="cp" name="cp" required="required" class="form-control" >	                    
	                  </div>
	                  <div class="form-group col-md-6">
                        <label>Mobile<span class="required">*</span>
                        </label>
								<input type="tel" id="cpm" name="cpm" required="required" class="form-control" >	                    
	                  </div>	                                    
	                  <div class="form-group col-md-12">
                        <label>Address <span class="required">*</span>
                        </label>
								<textarea class="form-control" type="text" name="add" ></textarea>                   
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


