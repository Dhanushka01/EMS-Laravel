@include('navbar.leftbar')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


	@if(Session::has('empDiv'))
		<script type="text/javascript" >
			swal("Good Job !","{!! Session::pull('empDiv') !!}","success",{
				button:"ok",					
			});
		</script>	
		Session::forget('empDiv');		
	@endif
	
	@if(Session::has('dupuser'))
		<script type="text/javascript" >
			swal("Try Again !!!","{!! Session::pull('dupuser') !!}","error",{
				button:"ok",					
			});
		</script>	
		Session::forget('dupuser');		
	@endif	


<body class="hold-transition sidebar-mini">
<div class="wrapper" >



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">

      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content" >
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title">Employee Division/ Transfer</h3>
                <div style="float: right;">
                	<a>
							<button class="btn btn-primary" onclick="showinsertmodel()" >Assign</button>   
						</a>             
                </div>               
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Effective Date</th>
                          <th>EPF</th>
                          <th>Name</th>
                          <th>Division</th>
                          <th>Location</th>

         

						                           
                        </tr>
                      </thead>
 								<?php
									$data1 = DB::table('mnrce_admin_emp_divisions')
														->where('mnrce_admin_emp_divisions.resdate',NULL)
														->join('mnrce_admin_emp_epfs','mnrce_admin_emp_epfs.id','=','mnrce_admin_emp_divisions.epf_id')
														->join('mnrce_admin_emp_personals','mnrce_admin_emp_personals.id','=','mnrce_admin_emp_epfs.emp_id')
														->join('mnrce_admin_master_projects','mnrce_admin_master_projects.Pcode','=','mnrce_admin_emp_divisions.divs')
														->select('mnrce_admin_emp_divisions.*','mnrce_admin_emp_personals.nameini','mnrce_admin_emp_epfs.epf_no','mnrce_admin_master_projects.Pname')														
														->get();
														
									
								?>                     
								<tbody>
									@foreach($data1 as $value)
									<?php
									$data2 = DB::table('mnrce_admin_emp_locations')
														->where('epf_id',$value->epf_id)
														->where('mnrce_admin_emp_locations.resdate',NULL)
														->join('mnrce_admin_master_projects','mnrce_admin_master_projects.Pcode','=','mnrce_admin_emp_locations.locat')													
														->get();
									?>					
									<tr style="">
										<td>{{$loop->iteration}}</td>
										<td>{{$value->effdate}}</td>
										<td>{{$value->epf_no}}</td>	
										<td>{{$value->nameini}}</td>	
										<td>{{$value->Pname}}</td>	
										@foreach($data2 as $value2)
											<td>{{$value2->Pname}}</td>	

										@endforeach	
																	
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
                	<h3 class="card-title">Employee Division/ Transfer</h3>
               	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
               		<span aria-hidden="true">&times;</span>
              		</button>
              </div>
               <form id="demo-form2" action="employee-division" method="post" data-parsley-validate class="form-horizontal form-label-left">
               @csrf
                <div class="card-body">
						<div class="row">
	                <div class="form-group col-md-12">
                      <label for="epf">Select Date * :</label>
                      <input type="date" id="" class="form-control" name="date" required />
						 </div>					
                <div class="form-group col-md-12">
                  <label for="epf">Select EPF No * :</label>
                  <select class="select2" multiple="multiple" data-placeholder="Select a State" style="width: 100%;" required name="epf_[]">
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

						 <div class="form-group col-md-6">
                      <label for="div">Division</label>
                      <select id="div" name="div" class="form-control js-example-basic-single select2" required>

							<?php
								$data = DB::table('mnrce_admin_master_projects')->where('admin', 'like','%H%')->orderBy('Pname','ASC')->get();
								foreach($data as $key => $value){
									echo "<option value='".$value->Pcode."'>".$value->Pname."</option>";											
								}
							?>                      	
                          </select>
						 </div>                
						 <div class="form-group col-md-6">
                      <label for="locat">Location</label>
                      <select id="locat" name="locat" class="form-control select2" >
                      	<option value="">:: Select ::</option>
							<?php
								$data1 = DB::table('mnrce_admin_master_projects')->where('admin', 'not like','%H%')->orderBy('Pname','ASC')->get();
								foreach($data1 as $key => $value){
									echo "<option value='".$value->Pcode."'>".$value->Pname."</option>";											
								}
							?>                       
                          </select>
						 </div>                
						<div class="form-group col-md-12">
                      <label for="epf">Document Ref</label>
                      <input type="text" id="ref" class="form-control" name="ref" value="-" />
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


