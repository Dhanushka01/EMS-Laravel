@include('navbar.leftbar')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


@if(Session::has('insreq'))
	<script type="text/javascript" >
		swal("Good Job !","{!! Session::pull('insreq') !!}","success",{
			button:"ok",					
		});
	</script>	
	Session::forget('insreq');		
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
                <h3 class="card-title">Insurance Claim Request</h3>
                <div style="float: right;">
                	<a>
							<button class="btn btn-primary" onclick="showinsertmodel()" >New Request</button>   
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
                          <th>Insurance Type</th>
                          <th>Policy No</th>
                          <th>Accident Time</th>
                          <th>Remarks</th>
                          <th>Dio. Card</th>
                          <th>Bank Pass Book</th>
                          <th>Pay Sheet</th>
                          <th>Leave Sheet</th>
                          <th>Status</th>
         

						                           
                        </tr>
                      </thead>
 								<?php
									$data1 = DB::table('ins_claimrequests')
														->join('emppersonals','emppersonals.id','=','ins_claimrequests.epf_id')
														->select('ins_claimrequests.*','emppersonals.nameini','emppersonals.EpfNo')														
														->get();
														
									
								?>                     
								<tbody>
									@foreach($data1 as $value)
									<tr style="">
										<td>{{$loop->iteration}}</td>
										<td>{{$value->EpfNo}}</td>	
										<td>{{$value->nameini}}</td>	
										<td>{{$value->ins}}</td>											
										<td>{{$value->policy}}</td>				
										<td>{{$value->accTime}}</td>				
										<td>{{$value->remark}}</td>				
										<td>
											<?php
												if($value->dio=='Y') {
													echo "<i class='fa fa-check' style='color: green;'  aria-hidden='true'></i>";													
												}
												else {
													echo "<i class='fa fa-times' style='color: red;'  aria-hidden='true'></i>";													
												}											
											?>										
											</td>			
										<td>
											<?php
												if($value->bank=='Y') {
													echo "<i class='fa fa-check' style='color: green;'  aria-hidden='true'></i>";													
												}
												else {
													echo "<i class='fa fa-times' style='color: red;'  aria-hidden='true'></i>";													
												}											
											?>										
										
										</td>				
										<td>
											<?php
												if($value->pay=='Y') {
													echo "<i class='fa fa-check' style='color: green;'  aria-hidden='true'></i>";													
												}
												else {
													echo "<i class='fa fa-times' style='color: red;'  aria-hidden='true'></i>";													
												}											
											?>										
										</td>				
										<td>											
										<?php
												if($value->leav=='Y') {
													echo "<i class='fa fa-check' style='color: green;'  aria-hidden='true'></i>";													
												}
												else {
													echo "<i class='fa fa-times' style='color: red;'  aria-hidden='true'></i>";													
												}											
											?>
										</td>				
										<td>
											<?php

												if($value->status=='A') {
													echo "<p class='bg-success rounded-pill' style='text-align: center;' >Accepted</p>";													
												}
												elseif($value->status=='R') {
													echo "<p class='bg-secondary rounded-pill' style='text-align: center;' >Requested</p>";													
												}
												elseif($value->status=='B') {
													echo "<p class='bg-danger rounded-pill' style='text-align: center;' >Rejected</p>";													
												}	
																																					
											?>
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
                	<h3 class="card-title">Claim Request Form</h3>
               	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
               		<span aria-hidden="true">&times;</span>
              		</button>
              </div>
              <form id="demo-form2" action="/insReq" method="post" data-parsley-validate class="form-horizontal form-label-left">
               @csrf
                <div class="card-body" style="display: ;">
	                <div class="row">
	                  <div class="form-group col-md-12">
                        <label>Request Date <span class="required">*</span>
                        </label>
								<input id="rdate" class="form-control" type="date" name="rdate" value="<?php echo date('Y-m-d'); ?>" required >                   
	                  </div>	                
                    <div class="form-group col-md-12">
                      <label for="epf">Select EPF No * :</label>
                         <select id="epf" class="form-control epfselect select2" required name="epf" >
                             <option value="">Select EPF No..</option>
										<?php
											$year=date('Y');
											$data1 = DB::table('ins_assigns')

															->join('emppersonals','emppersonals.id','=','ins_assigns.epf_id')
															->get();
											$data= $data1->unique('EpfNo');				
											foreach($data as $key => $value){
												echo "<option value='".$value->id."'>".$value->EpfNo." | ".$value->fullname."</option>";											
											}
										?>		                           
                         </select>
						 </div>
	                  <div class="form-group col-md-12">
                        <label>Insurance <span class="required">*</span>
                        </label>
								<select class="form-control" name="type" id="type">
									<option value="">Select</option>
									<option value="Health">Health</option>
									<option value="WCI">WCI</option>
									<option value="PA">PA</option>
								</select>                   
	                  </div>						 
	 	               <div class="form-group col-md-12">
                        <label>Policy Number <span class="required">*</span>
                        </label>
								<input id="pol" class="form-control" type="text" name="pol" required >                   
	                  </div>		  
 	               <div class="form-group col-md-12">
                        <label>Accident time <span class="required">*</span>
                        </label>
								<input id="acctime" class="form-control" type="datetime-local" name="accTime" required >                   
	                  </div>	                                                    
	                  <div class="form-group col-md-12">
                        <label>Accident Details<span class="required">*</span>
                        </label>
								<textarea class="form-control" type="text" name="remark" required></textarea>                   
	                  </div>
								<div style="border-top: solid 1px" class="col-md-12"></div>
								<br>
		                  	<div class="form-group col-md-12">
		                  		 <label> Dio Card : <input type="checkbox" class="" name="dio"  value="Y" required /> </label>
		                  	</div>
		                  	<div class="form-group col-md-12">
		                  		 <label> Bank Pass Book : <input type="checkbox" class="" name="bank"  value="Y" required /> </label>
		                  	</div>	  
		                  	<div class="form-group col-md-12">
		                  		 <label> Pay Sheet : <input type="checkbox" class="" name="pay" value="Y" /> </label>
		                  	</div> 	                  	                	
		                  	<div class="form-group col-md-12">
		                  		 <label> Leave Sheet : <input type="checkbox" class="" name="leave" value="Y" /> </label>
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
        </div>
        <!-- /.modal-dialog -->


