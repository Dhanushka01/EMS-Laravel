@include('navbar.leftbar')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


			@if(Session::has('empsalinc'))
				<script type="text/javascript" >
					swal("Good Job !","{!! Session::pull('empsalinc') !!}","success",{
						button:"ok",					
					});
				</script>	
				Session::forget('empsalinc');		
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
                <h3 class="card-title">Upload Form</h3>               
              </div>
              <!-- /.card-header -->
              <div class="card-body">
					<form method="post" action="/regsalincupload" enctype="multipart/form-data">
						@csrf
						<div class="col-md-12 form-group">
						  <label for="formFile" class="form-label">Select the File</label>
						  <input class="form-control" type="file" id="excel" name="excel" required >
						</div>
						<div class="form-group" style="float: right;">
							<input type="reset" class="btn btn-secondary" value="Reset" name="reset" id="reset" />
							<input type="submit" class="btn btn-primary" value="upload" name="upload" id="upload" />
						</div>
					</form>
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
				url:'/ajaxGetUserData',
				success:function (result) {
					$('#uid').val(result['id']);
					$('#uepf').val(result['EpfNo']);
					$('#uuname').val(result['username']);
					$('#urole').val(result['RoleId']);
					$('#ustatus').val(result['Status']);
					//alert(result['EpfNo']);
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
											$data = DB::table('emppersonals')->where('sysuser','<>',NULL)->orderBy('EpfNo', 'ASC')->get();
											foreach($data as $key => $value){
												echo "<option value='".$value->EpfNo."'>".$value->EpfNo." | ".$value->nameini."</option>";											
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
                             <option value="D">Disabled</option>
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
