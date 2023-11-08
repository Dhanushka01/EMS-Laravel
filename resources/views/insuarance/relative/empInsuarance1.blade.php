@include('navbar.leftbar')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


@if(Session::has('empinsrel'))
	<script type="text/javascript" >
		swal("Good Job !","{!! Session::pull('empinsrel') !!}","success",{
			button:"ok",					
		});
	</script>	
	Session::forget('empinsrel');		
@endif	
@if(Session::has('mdesigD'))
	<script type="text/javascript" >
		swal("Error !","{!! Session::pull('mdesigD') !!}","error",{
			button:"ok",					
		});
	</script>	
	Session::forget('mdesigD');		
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
                <h3 class="card-title">Relatives</h3>
                <div style="float: right;">
                	<a>
							<button class="btn btn-primary" onclick="showinsertmodel()" >New Relative</button>   
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
                          <th>NIC</th>
                          <th>DOB</th>
								  <th>Age</th>
                          <th>Relation</th>
                          <th>Name</th>
                          <th>DOB</th>
                          <th>Age</th>
                          <th>Status</th>
                          <th>Action</th>

         

						                           
                        </tr>
                      </thead>
 								<?php
									$data1 = DB::table('empinsuarances')
														->join('emppersonals','emppersonals.id','=','empinsuarances.epf_id')
														->select('empinsuarances.*','emppersonals.nameini','emppersonals.EpfNo',
														'emppersonals.nic','emppersonals.dob')														
														->get();
														
									use Carbon\Carbon;
								?>                     
								<tbody>
									@foreach($data1 as $value)
									<tr style="">
										<td>{{$loop->iteration}}</td>
										<td>{{$value->EpfNo}}</td>	
										<td>{{$value->nameini}}</td>														
										<td>{{$value->nic}}</td>														
										<td>{{$apoi1=$value->dob}}</td>	
										<td>
										<?php
											$date = Carbon::parse($apoi1);
											$now = Carbon::now();
									
											$diff = $date->diff($now)->format('%y years, %m months and %d days');
										
										?>										
										{{$diff}} 
										</td>																							
										<td>{{$value->rel}}</td>														
										<td>{{$value->relname}}</td>														
													
										<td>{{$apoi=$value->reldob}}</td>														
										<td>
										<?php
											$date = Carbon::parse($apoi);
											$now = Carbon::now();
									
											$diff = $date->diff($now)->format('%y years, %m months and %d days');
										
										?>										
										{{$diff}} 
										</td>	
										<td>
												<?php

													if($value->relstatus=='A') {
														echo "<p class='bg-success rounded-pill' style='text-align: center;' >Active</p>";													
													}
													elseif($value->relstatus=='D') {
														echo "<p class='bg-danger rounded-pill' style='text-align: center;' >Deleted</p>";													
													}	
																																						
												?>										
										
										</td>													
										<td>
										<a href="#" onclick='showeditmodel("{{$value->id}}")' ><i class="fas fa-edit"></i></a>
										<a href="#" onclick='showdeletemodel("{{$value->id}}")' ><i class="fa fa-ban" style="color: red;" aria-hidden="true"></i></a>
										
										
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

<!-------------------------------------------- Delete Model --------------------------------------------- -->
<script type="text/javascript" >
	function showdeletemodel(id) {
		$('#modal-delete').modal('show');		
		
		if(id==''||id==-1){
			swal("Please Select  Valid Employee");	
		}
		else {
			$.ajax({
				type:'GET',
				data:{id:id},
				dataType: 'json',
				url:'/ajaxGetRelationData',
				success:function (result) {
					$('#did').val(result['id']);
					$('#dname').val(result['relname']);
					$('#dnic').val(result['relnic']);
					$('#ddob').val(result['reldob']);
					$('#drelation').val(result['rel']);
				}	
			});
			
		}
	}
</script>

      <div class="modal fade" id="modal-delete">
        <div class="modal-dialog">
        <div class="modal-content">
        <div class="card card-danger">
             <div class="card-header">
                	<h3 class="card-title">Delete Relatives</h3>
               	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
               		<span aria-hidden="true">&times;</span>
              		</button>
              </div>
               <form id="demo-form" data-parsley-validate action="/deleteInsRelatve" method="POST">
               @csrf
                      <div class="form-group col-md-12">
                        <label  for="user name">Name <span class="required">*</span>
                        </label>
                          <input type="text" id="dname" name="dname" required="required" class="form-control" autocomplete="off">
                          <input type="hidden" id="did" name="did" required="required" class="form-control" autocomplete="off">
                      </div>
                      <div class="form-group col-md-12">
                        <label  for="user name">NIC 
                        </label>
                          <input type="text" id="dnic" name="nic" class="form-control" autocomplete="off">
                      </div>                

                      <div class="form-group col-md-12">
                        <label  for="user name">DOB <span class="required">*</span>
                        </label>
                          <input type="date" id="ddob" name="ddob" required="required" class="form-control" autocomplete="off">
                      </div>
                      <div class="form-group col-md-12">
                        <label  for="user name">Relation <span class="required">*</span>
                        </label>
                         <select id="drelation" class="form-control" required name="drelation" >
									<option value="Mother">Mother</option>
									<option value="Father">Father</option>
									<option value="Wife">Wife</option>
									<option value="Husband">Husband</option>
									<option value="Child">Child</option>                           
                         </select>                          
                      </div>                      
                
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <input type="submit" name="submit" class="btn btn-danger" value="Delete" >
            </div>
            </form>  
          </div>
          </div>
          <!-- /.modal-content -->
        </div>
        </div>


<!-------------------------------------------- Edit Model --------------------------------------------- -->
<script type="text/javascript" >
	function showeditmodel(id) {
		$('#modal-insert').modal('show');		
		
		if(id==''||id==-1){
			swal("Please Select  Valid Employee");	
		}
		else {
			$.ajax({
				type:'GET',
				data:{id:id},
				dataType: 'json',
				url:'/ajaxGetRelationData',
				success:function (result) {

					$('#id').val(result['id']);
					$('#name').val(result['relname']);
					$('#nic').val(result['relnic']);
					$('#dob').val(result['reldob']);
					$('#relation').val(result['rel']);
				}	
			});
			
		}
	}
</script>

      <div class="modal fade" id="modal-insert">
        <div class="modal-dialog">
        <div class="modal-content">
        <div class="card card-primary">
             <div class="card-header">
                	<h3 class="card-title">Update Relatives</h3>
               	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
               		<span aria-hidden="true">&times;</span>
              		</button>
              </div>
               <form id="demo-form" data-parsley-validate action="/updInsRelatve" method="POST">
               @csrf
                      <div class="form-group col-md-12">
                        <label  for="user name">Name <span class="required">*</span>
                        </label>
                          <input type="text" id="name" name="name" required="required" class="form-control" autocomplete="off">
                          <input type="hidden" id="id" name="id" required="required" class="form-control" autocomplete="off">
                      </div>
                      <div class="form-group col-md-12">
                        <label  for="user name">NIC 
                        </label>
                          <input type="text" id="nic" name="nic" class="form-control" autocomplete="off">
                      </div>                

                      <div class="form-group col-md-12">
                        <label  for="user name">DOB <span class="required">*</span>
                        </label>
                          <input type="date" id="dob" name="dob" required="required" class="form-control" autocomplete="off">
                      </div>
                      <div class="form-group col-md-12">
                        <label  for="user name">Relation <span class="required">*</span>
                        </label>
                         <select id="relation" class="form-control" required name="relation" >
									<option value="Mother">Mother</option>
									<option value="Father">Father</option>
									<option value="Wife">Wife</option>
									<option value="Husband">Husband</option>
									<option value="Child">Child</option>                           
                         </select>                          
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
                	<h3 class="card-title">Relation Form</h3>
               	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
               		<span aria-hidden="true">&times;</span>
              		</button>
              </div>
 <form id="demo-form" data-parsley-validate action="/newInsRelatve" method="POST">
               @csrf
                  <div class="card-body">
                    <div class="form-group col-md-12">
                      <label for="epf">Select EPF No * :</label>
                         <select id="epf" class="form-control epfselect select2" required name="epf" >
                             <option value="">Select EPF No..</option>
										<?php
											$data = DB::table('emppersonals')->orderBy('EpfNo', 'ASC')->get();
											foreach($data as $key => $value){
												echo "<option value='".$value->id."'>".$value->EpfNo." | ".$value->fullname."</option>";											
											}
										?>		                           
                         </select>
						 </div>	
						                

                <div class="x_panel">

                  <div class="x_content">
				
					<table class="table table-bordered table-hover" id="invoiceItem">	
						<tr>
							<th width="2%"><input id="checkAll" class="formcontrol" type="checkbox"></th>
							<th >Relation</th>
							<th >Full Name</th>
							<th >NIC</th>
							<th >DOB</th>								
							<!-- <th ></th> -->
						</tr>							
						<tr>
							<td><input class="itemRow" type="checkbox"></td>
							
							<td>
								<select name="relation_[]" id="relation" required class="form-control quantity">
									<option value="">Select</option>
									<option value="Mother">Mother</option>
									<option value="Father">Father</option>
									<option value="Wife">Wife</option>
									<option value="Husband">Husband</option>
									<option value="Child">Child</option>
								</select>
							</td>
							<td><input type="text" tabindex="-1" name="name_[]" id="name_1" required class="form-control" autocomplete="off"></td>			
							<td><input type="text" tabindex="-1" name="nic_[]" id="nic_1" class="form-control" autocomplete="off" ></td>
							<td><input type="date" name="dob_[]" id="dob_1" required class="form-control" autocomplete="off" step="0.01"></td>
					<!--		<td><button class="btn btn-success" id="addRows" type="button"> Add</button></td>
					-->						
						</tr>						
					</table>
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




