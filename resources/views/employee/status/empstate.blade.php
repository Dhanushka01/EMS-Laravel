@include('navbar.leftbar')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@if(Session::has('empSt'))
	<script type="text/javascript" >
		swal("Good Job !","{!! Session::pull('empSt') !!}","success",{
			button:"ok",					
		});
	</script>	
	Session::forget('empSt');		
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
                <h3 class="card-title">Employee State Change</h3>
                <div style="float: right;">
                	<a>
							<button class="btn btn-primary" onclick="showinsertmodel()" >State</button>   
						</a>             
                </div>               
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Epf</th>
                          <th>Name</th>
                          <th>Appointment Date</th>
                          <th>Designation</th>
                          <th>Date</th>
                          <th>Remarks</th>
                          <th>Status</th>      
                        </tr>
                      </thead>
 								<?php
 									
									$data1 = DB::table('mnrce_admin_emp_statuses')
														->join('mnrce_admin_emp_epfs','mnrce_admin_emp_epfs.id','mnrce_admin_emp_statuses.epf_id')
														->join('mnrce_admin_emp_personals','mnrce_admin_emp_personals.id','mnrce_admin_emp_epfs.emp_id')
														->join('mnrce_admin_emp_designations','mnrce_admin_emp_designations.epf_id','mnrce_admin_emp_statuses.epf_id')
														->join('mnrce_admin_master_designations','mnrce_admin_master_designations.id','mnrce_admin_emp_designations.empDesig')
														->select('mnrce_admin_emp_epfs.*','mnrce_admin_emp_personals.nameini','mnrce_admin_master_designations.name','mnrce_admin_emp_statuses.sdate')
														->orderBy('mnrce_admin_emp_statuses.sdate','DESC')	
														->get();
														
									
								?>                     
								<tbody>
									@foreach($data1 as $value)
									<tr style="">
										<td>{{$loop->iteration}}</td>
										<td>{{$value->epf_no}}</td>		
										<td>{{$value->nameini}}</td>		
										<td>{{$value->appoint_date}}</td>		
										<td>{{$value->name}}</td>		
										<td>{{$value->sdate}}</td>		
										<td>{{$value->remarks}}</td>		
										<td>
												@if($value->emp_status==0)
													<span class="border border-danger rounded-pill" style="color: red;"> &nbsp;Resigned&nbsp; </span>										
												@elseif($value->emp_status==1)
													<span class="border border-success rounded-pill" > &nbsp; Available &nbsp; </span>
												@elseif($value->emp_status==2)
													<span class="border border-warning rounded-pill" > &nbsp; Permanent Disabled &nbsp; </span>
												@elseif($value->emp_status==3)
													<span class="border border-primary rounded-pill" > &nbsp; Vacation of Post &nbsp; </span>													
												@elseif($value->emp_status==4)
													<span class="border border-info rounded-pill" > &nbsp; Retired &nbsp; </span>													
												@elseif($value->emp_status==5)
													<span class="border border-secondary rounded-pill" > &nbsp; Interdict &nbsp; </span>																																																
												@elseif($value->emp_status==6)
													<span class="border border-secondary rounded-pill" > &nbsp; Contract Termination &nbsp; </span>	
												@elseif($value->emp_status==7)
													<span class="border border-danger rounded-pill" > &nbsp; Death &nbsp; </span>																										
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
                	<h3 class="card-title">Employee State Change</h3>
               	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
               		<span aria-hidden="true">&times;</span>
              		</button>
              </div>
                <form id="demo-form2" action="employee-status" method="post" data-parsley-validate class="form-horizontal form-label-left">
               @csrf
                <div class="card-body">
						<div class="row">
	                <div class="form-group col-md-6">
                      <label for="epf">Select Date * :</label>
                      <input type="date" id="" class="form-control" name="date" 
								value="{{date('Y-m-d')}}"	                      
                      required />
						 </div>
						 
						 <div class="form-group col-md-6">
                      <label for="nid">Status :</label>
                      <select id="tofemp" name="type" class="form-control" required>
                            <option value="">:: Select ::</option>
									<?php
										$data = DB::table('mnrce_admin_master_emp_statuses')
																->where('status',0)
																->get();
										foreach($data as $key => $value){
											echo "<option value='".$value->id."'>".$value->description."</option>";											
										}
									?>                            
                          </select>
						 </div> 						 
						 					
                <div class="form-group col-md-12">
                  <label for="epf">Select EPF No * :</label>
                  <select class="select2"  data-placeholder="Select a State" style="width: 100%;" required name="epf">
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
					<div class="form-group col-md-12">
						<label for="remarks" >Remarks </label>
						<textarea name="remarks" id="remarks" class="form-control"></textarea>
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