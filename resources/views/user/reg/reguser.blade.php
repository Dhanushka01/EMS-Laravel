@include('navbar.leftbar')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


			@if(Session::has('user1'))
				<script type="text/javascript" >
					swal("Good Job !","{!! Session::pull('user1') !!}","success",{
						button:"ok",					
					});
				</script>	
				Session::forget('user1');		
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
                <h3 class="card-title">System Users</h3>
                <div style="float: right;">
                	<a>
							<button class="btn btn-primary" onclick="showinsertmodel()" >New User</button>   
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
                          <th>User Name</th>
                          <th>Created_at</th>
                          <th>Role</th>
                          <th>Status</th>
                          <th>Action</th>
         

						                           
                        </tr>
                      </thead>
 								<?php
									$data1 = DB::table('mnrce_admin_users')
														->join('mnrce_admin_emp_epfs','mnrce_admin_emp_epfs.emp_id','=','mnrce_admin_users.epf_id')
														->join('mnrce_admin_emp_personals','mnrce_admin_emp_personals.id','=','mnrce_admin_emp_epfs.emp_id')
														->select('mnrce_admin_users.*','mnrce_admin_emp_personals.nameini','mnrce_admin_emp_epfs.epf_no')														
														->get();
														

								?>                     
								<tbody>
									@foreach($data1 as $value)
									<tr style="">
										<td>{{$loop->iteration}}</td>
										<td>{{$value->epf_no}}</td>	
										<td>{{$value->nameini}}</td>											
										<td>{{$value->username}}</td>				
										<td>
											{{ $value->created_at}}									
										</td>				
										<td>
											<?php
													if($value->role_id=='1') {
														echo "<p class='bg-danger rounded-pill' style='text-align: center;' >Super User</p>";													
													}
											?>										
										</td>	
										<td>
												<?php

													if($value->user_status=='A') {
														echo "<p class='bg-success rounded-pill' style='text-align: center;' >Active</p>";													
													}
													elseif($value->user_status=='L') {
														echo "<p class='bg-secondary rounded-pill' style='text-align: center;' >Locked</p>";													
													}
													elseif($value->user_status=='D') {
														echo "<p class='bg-danger rounded-pill' style='text-align: center;' >Disabled</p>";													
													}	
																																						
												?>
										</td>		
										<td>
											<a href="#"><i class="fas fa-edit" onclick="showupdatemodel({{$value->id}})" ></i></a>

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
                	<h3 class="card-title">User Registration Form</h3>
               	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
               		<span aria-hidden="true">&times;</span>
              		</button>
              </div>
               <form id="demo-form" data-parsley-validate action="user-reg" method="POST">
               @csrf
                <div class="card-body">
                <div class="row">
                  <div class="form-group col-md-12">
                    <label for="desig">Select EPF Number<span class="required">*</span></label>
                         <select id="" class="form-control epfselect select2" required name="epf" >
                             <option value="">Select EPF No..</option>
										<?php
											$data = DB::table('mnrce_admin_emp_personals')
																		->join('mnrce_admin_emp_epfs','mnrce_admin_emp_epfs.emp_id','mnrce_admin_emp_personals.id')
																		->where('sys_user','0')
																		->orderBy('epf_no', 'ASC')
																		->get();
											foreach($data as $key => $value){
												echo "<option value='".$value->emp_id."'>".$value->epf_no." | ".$value->fullname."</option>";											
											}
										?>		                           
                         </select>
                  </div>
                      <div class="form-group col-md-12">
                        <label  for="user name">User Name <span class="required">*</span>
                        </label>
                          <input type="text" id="" name="uname" required="required" class="form-control" autocomplete="off">
                      </div>
                      
                      <div class="form-group col-md-12">
                        <label for="password" >Password <span class="required">*</span></label>
                          <input id="psw" class="form-control password" type="password" name="psw" autocomplete="off">
                      </div>
                      
                       <div class="form-group col-md-12">
                        <label  for="status">Access Level<span class="required">*</span>
                        </label>
                         <select id="" class="form-control" required name="role">
                             <option value="">Select Role</option>
                             <option value="1">Role 1</option>
                             <option value="2">Role 2</option>
                             <option value="3">Role 3</option>
                         </select>
                      </div>
                      
                       <div class="form-group col-md-12">
                        <label for="status">User Status<span class="required">*</span>
                        </label>
                         <select id="" class="form-control" required name="status">
                             <option value="">Select Status..</option>
                             <option value="A">Active</option>
                             <option value="L">Lock</option>
                             <option value="D">Disabled</option>
                         </select>
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


<!-- Update Model -->
<script type="text/javascript" >
	function showupdatemodel(id) {
		if(id==''||id==-1){
			swal("Please select  valid user !!!");	
		}				
		else {
			$.ajax({
				type:'GET',
				data:{id:id},
				dataType: 'json',
				url:'get-user-data',
				success:function (result) {
					$('#uid').val(result['id']);
					$('#uepf').val(result['epf_id']);
					$('#uuname').val(result['username']);
					$('#urole').val(result['role_id']);
					$('#ustatus').val(result['user_status']);
				}
			});						
		}
		
		$('#modal-update').modal('show');		
	}
</script>

      <div class="modal fade" id="modal-update">
        <div class="modal-dialog">
        <div class="modal-content">
        <div class="card card-primary">
             <div class="card-header">
                	<h3 class="card-title">User Update Form</h3>
               	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
               		<span aria-hidden="true">&times;</span>
              		</button>
              </div>
               <form id="demo-form" data-parsley-validate action="/updateUser" method="POST">
               @csrf
                <div class="card-body">
                <div class="row">
                  <div class="form-group col-md-12">
                    <label for="desig">Select EPF Number<span class="required">*</span></label>
                         <select id="uepf" class="form-control epfselect" name="uepf" disabled >
                             <option value="">Select EPF No..</option>
										<?php
											$data =DB::table('mnrce_admin_emp_personals')
																		->join('mnrce_admin_emp_epfs','mnrce_admin_emp_epfs.emp_id','mnrce_admin_emp_personals.id')
																		->where('sys_user','1')
																		->orderBy('epf_no', 'ASC')
																		->get();
											foreach($data as $key => $value){
												echo "<option value='".$value->emp_id."'>".$value->epf_no." | ".$value->nameini."</option>";											
											}
										?>		                           
                         </select>
                         <input type="hidden" id="uid" name="uid" />
                  </div>
                      <div class="form-group col-md-12">
                        <label  for="user name">User Name <span class="required">*</span>
                        </label>
                          <input type="text" id="uuname" name="uuname" required="required" class="form-control" autocomplete="off">
                      </div>

                       <div class="form-group col-md-12">
                        <label  for="status">Access Level<span class="required">*</span>
                        </label>
                         <select id="urole" class="form-control" required name="urole">
                             <option value="">Select Role</option>
                             <option value="1">Super User</option>
                             <option value="2">Role 2</option>
                             <option value="3">Role 3</option>
                         </select>
                      </div>
                      
                       <div class="form-group col-md-12">
                        <label for="status">User Status<span class="required">*</span>
                        </label>
                         <select id="ustatus" class="form-control" required name="ustatus">
                             <option value="">Select Status..</option>
                             <option value="A">Active</option>
                             <option value="L">Lock</option>
                             <option value="D">Disable</option>
                         </select>
                      </div>
                  
                </div>
                </div>
                
                
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <input type="submit" name="submit" class="btn btn-warning" value="Update" >
            </div>
            </form>  
          </div>
          </div>
          <!-- /.modal-content -->
        </div>
        </div>
        <!-- /.modal-dialog -->
