@include('navbar.leftbar')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


@if(Session::has('leaveReq'))
	<script type="text/javascript" >
		swal("Good Job !","{!! Session::pull('leaveReq') !!}","success",{
			button:"ok",					
		});
	</script>	
	Session::forget('leaveReq');		
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
                <h3 class="card-title">Leave Request <small>Admin Form</small></h3>
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
                          <th>Form ID</th>
                          <th>EPF</th>
                          <th>Name</th>
                          <th>Request Date</th>
                          <th>From</th>
                          <th>To</th>
                          <th>Leave</th>							                           
                          <th>Amount</th>		
                          <th>Arrangement</th>                          					                           
                          <th>Description</th>							                           
							                           
                          <th>Book Status</th>							                           
						                           
                        </tr>
                      </thead>
 								<?php
 									$date=date('Y-01-01');
									$data1 = DB::table('mnrce_admin_leave_requests')
														->where('reqDate','>=',$date)																																
														->where('leaveStatus', '1')
														->orderBy('leaveBookStatus', 'ASC')
														->join('mnrce_admin_emp_epfs','mnrce_admin_emp_epfs.id','=','mnrce_admin_leave_requests.epf_id')
														->join('mnrce_admin_emp_personals','mnrce_admin_emp_personals.id','=','mnrce_admin_emp_epfs.emp_id')
														->select('mnrce_admin_leave_requests.*','mnrce_admin_emp_personals.nameini','mnrce_admin_emp_epfs.epf_no')
														->get();
														
									$count3 = DB::table('mnrce_admin_leave_requests')->count();
									
									$data2=DB::table('mnrce_admin_leave_requests')
														->orderBy('id','DESC')
														->limit(1)
														->get();

									$count4 = DB::table('mnrce_admin_leave_requests')->count();
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
										<td>{{$value->v_id}}</td>	
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
													if($value->leaveBookStatus=='0') {
														echo "<p class='bg-secondary rounded-pill' style='text-align: center;' >Requested</p>";													
													}
													elseif($value->leaveBookStatus=='1') {
														echo "<p class='bg-success rounded-pill' style='text-align: center;' >Approved</p>";													
													}
													elseif($value->leaveBookStatus=='2') {
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
                	<h3 class="card-title">Leave Form</h3>
               	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
               		<span aria-hidden="true">&times;</span>
              		</button>
              </div>
               <form id="demo-form" data-parsley-validate action="employee-leave-request-admin" method="POST">
               @csrf
                <div class="card-body">
                <div class="row">
                  <div class="form-group col-md-3">
                    <label for="amount">ID</label>
                    <input type="text" class="form-control" name="vid" id="vid"  tabindex="-1"
                    value="
                    	<?php 
                    			if($count4==0){
                    					echo '1';
                    				}
                    			else{
                    				foreach($data2 as $key => $value2){
                    					$id=$value2->v_id+1;
                    					echo $id;
                    				}                   			
                    			}
                    	?> "
                    placeholder="Id" required />
                  </div>                
                  <div class="form-group col-md-3">
                    <label for="amount">Date</label>
                    <input type="date" class="form-control" name="date" id="date" readonly tabindex="-1"
                    value="<?php echo date('Y-m-d') ?>"
                    placeholder="from" required />
                  </div>                
                    <div class="form-group col-md-6">
                      <label for="epf">Select EPF No * :</label>
                         <select id="epf" class="form-control epfselect select2" required name="epf" >
                             	<option value="" selected>-- Select --</option>
									<?php
										$data = DB::table('mnrce_admin_emp_epfs')
																->where('resignDate',null)
																->join('mnrce_admin_emp_personals','mnrce_admin_emp_personals.id','mnrce_admin_emp_epfs.emp_id')
																->orderBy('mnrce_admin_emp_epfs.epf_no', 'ASC')
																->select('mnrce_admin_emp_epfs.*','mnrce_admin_emp_personals.nameini')
																->get();
										foreach($data as $key => $value){
											echo "<option value='".$value->id."'>".$value->epf_no." | ".$value->nameini."</option>";											
										}
									?>	                           
                         </select>
						 </div>
                  <div class="form-group col-md-4">
                    <label for="desig">Designation</label>
                    <input type="text" class="form-control" name="desig" id="desig" readonly tabindex="-1"
                    placeholder="Designation" required />
                  </div>  
                  <div class="form-group col-md-4">
                    <label for="amount">Division</label>
                    <input type="text" class="form-control" name="divi" id="divi" readonly tabindex="-1"
                    placeholder="Division" required />
                  </div>	
                  <div class="form-group col-md-4">
                    <label for="amount">Location</label>
                    <input type="text" class="form-control" name="locat" id="locat" readonly tabindex="-1"
                    placeholder="Location" required />
                  </div>                  					 
                  <div class="form-group col-md-3">
                    <label for="from">From</label>
                    <input type="date" class="form-control" name="from" id="from" 
                    placeholder="from" required />
                  </div>  
                  <div class="form-group col-md-3">
                    <label for="to">To</label>
                    <input type="date" class="form-control" name="to" id="to" 
                    placeholder="To" required />
                  </div>
                  <div class="form-group col-md-2">
                    <label for="amount">Leave Type</label>
                         <select id="ltype" class="form-control epfselect select2" required name="ltype" >
                             	<option value="" selected>-- Select --</option>
										<?php
											$data = DB::table('mnrce_admin_master_leave_types')->get();
											foreach($data as $key => $value){
												echo "<option value='".$value->ltype."'>".$value->ltype."</option>";											
											}
										?>		                           
                         </select>
                  </div>  
                  <div class="form-group col-md-2">
                    <label for="qty">Balance</label>
                    <input type="number" class="form-control" name="bal" id="bal" tabindex="-1"
                    placeholder="Balance" required min="1" max="365" readonly />
                  </div>                                    
                  <div class="form-group col-md-2">
                    <label for="qty">Qty</label>
                    <input type="number" class="form-control" name="qty" id="qty" step="0.5"
                    placeholder="Qty" required min="0" max="365" />
                  </div>
                                                                    
                </div>
                    <div class="form-group col-md-12">
                      <label for="epf">Arrangement for Work :</label>
                         <select id="aepf" class="form-control epfselect select2" name="aepf" >
                             	<option value="" selected>-- Select --</option>
									<?php
										$data = DB::table('mnrce_admin_emp_epfs')
																->where('resignDate',null)
																->join('mnrce_admin_emp_personals','mnrce_admin_emp_personals.id','mnrce_admin_emp_epfs.emp_id')
																->orderBy('mnrce_admin_emp_epfs.epf_no', 'ASC')
																->select('mnrce_admin_emp_epfs.*','mnrce_admin_emp_personals.nameini')
																->get();
										foreach($data as $key => $value){
											echo "<option value='".$value->id."'>".$value->epf_no." | ".$value->nameini."</option>";											
										}
									?>		                           
                         </select>
						 </div>
                  <div class="form-group">
                    <label for="remarks">Description</label>
                    <textarea class="form-control" name="remarks" id="remarks" placeholder="Description" required /></textarea>
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
<script src="../public/assets/leave/leaveRequest.js"></script> 
