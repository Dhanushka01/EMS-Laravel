@include('navbar.leftbar')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


	@if(Session::has('eval'))
		<script type="text/javascript" >
			swal("Good Job !","{!! Session::pull('eval') !!}","success",{
				button:"ok",					
			});
		</script>	
		Session::forget('eval');		
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
                <h3 class="card-title">Employee Evaluation Form Submission</h3>
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
                          <th>Submit Date</th>
                          <th>Epf</th>
                          <th>Name</th>
                          <th>Type</th>
                          <th>Remarks</th>
                          <th>Received Date</th>
                          <th>Comments</th>
                          <th>Action</th>
      
                        </tr>
                      </thead>
 								<?php
									$data1 = DB::table('mnrce_admin_emp_evaluations')
														->join('mnrce_admin_emp_epfs','mnrce_admin_emp_epfs.id','=','mnrce_admin_emp_evaluations.epf_id')
														->join('mnrce_admin_emp_personals','mnrce_admin_emp_personals.id','=','mnrce_admin_emp_epfs.emp_id')
														->orderBy('created_at','DESC')
														->select('mnrce_admin_emp_evaluations.*','mnrce_admin_emp_personals.nameini','mnrce_admin_emp_epfs.epf_no')														
														->get();
														
									use Carbon\Carbon;
								?>                     
								<tbody>
									@foreach($data1 as $value)
									<tr style="">
										<td>{{$loop->iteration}}</td>
										<td>{{$value->subdate}}</td>	
										<td>{{$value->epf_no}}</td>														
										<td>{{$value->nameini}}</td>														
										<td>{{$value->type}}</td>														
										<td>{{$value->remark}}</td>														
										<td>{{$value->recive_date}}</td>														
										<td>{{$value->revive_remark}}</td>		
										<?php 
											if($value->recive_date==NULL) {
										?>		
												<td>
													<a onclick="showRecivemodel({{$value->id}})" class="btn btn-primary" >Received</a>
												</td>
										<?php
											}
											else {
												echo "<td>Form Received</td>";											
											}
										?>											
		
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
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
        <div class="card card-primary">
             <div class="card-header">
                	<h3 class="card-title">Evaluation Form Submission </h3>
               	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
               		<span aria-hidden="true">&times;</span>
              		</button>
              </div>
				 <form id="demo-form" data-parsley-validate action="employee-evaluation" method="POST">
               @csrf
                 <div class="card-body">
						<div class="row">
                    <div class="form-group col-md-4">
                        <label for="password" >Date <span class="required" style="color: red;">*</span></label>
                          <input id="ndate" class="form-control " name="ndate" value="<?php echo date('Y-m-d'); ?>"
                          type="date" autocomplete="off">
                    </div>				
					
	                <div class="form-group col-md-8">
	                  <label for="epf">Select EPF No * :</label>
	                         <select id="epf" class="form-control epfselect select2" multiple="multiple" required name="epf_[]">
	                             <option value="">Select EPF No..</option>
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
					      <label  for="user name">Designation
					      </label>
					        <input type="text" id="desig" name="desig"  class="form-control" readonly >
					    	</div>   
					     <div class="form-group col-md-4">
					      <label  for="user name">Salary Code
					      </label>
					        <input type="text" id="salc" name="salc"  class="form-control" readonly >
					    	</div>    
					    		
							<div class="form-group col-md-4">
								<label>Evaluation Type</label>
								<select class="form-control" name="type" id="type" required>
									<option value="">::Select ::</option>
									<option value="Salary Increment">Salary Increment</option>
									<option value="Promotion">Promotion</option>
									<option value="Permanent">Permanent</option>
								</select>
							</div>
	                <div class="form-group col-md-12">
	                  <label for="password" >Remarks</label>
	                    <textarea id="remarks" class="form-control " 
	                    name="remarks"></textarea>
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

     
<!-------------------------------------------- Update Model --------------------------------------------- -->
        
<!-- Insert Model -->
<script type="text/javascript" >
	function showRecivemodel(id) {
		$('#sepf').change();
		if(id==''||id==-1){
			swal("Please select  valid user !!!");	
		}				
		else {
			$.ajax({
				type:'GET',
				data:{id:id},
				dataType: 'json',
				url:'get-ajax-employee-evaluation-data-by-id',
				success:function (result) {
					$('#modal-receive').modal('show');
					$('#sepf').val(result['epf_id']).prop('selected', true);;
					$('#stype').val(result['type']);
					$('#sid').val(result['id']);
					
				}
			});		
		}
	}
</script>

	<div class="modal fade show" id="modal-receive">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
        <div class="card card-primary">
             <div class="card-header">
                	<h3 class="card-title">Evaluation Form Submission </h3>
               	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
               		<span aria-hidden="true">&times;</span>
              		</button>
              </div>
				 <form id="demo-form" data-parsley-validate action="employee-evaluation-receive" method="POST">
               @csrf
                 <div class="card-body">
						<div class="row">
                    <div class="form-group col-md-3">
                        <label for="password" >Received Date <span class="required" style="color: red;">*</span></label>
                          <input id="sdate" class="form-control " name="sdate" value="<?php echo date('Y-m-d'); ?>"
                          type="date" autocomplete="off">
                    </div>				
					
	                <div class="form-group col-md-6">
	                  <label for="epf">Select EPF No * :</label>
	                         <select id="sepf" class="form-control" required name="sepf" disabled="" >
	                             <option value="">Select EPF No..</option>
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
	                         <input type="hidden" name="sid" id="sid" />
	                </div>
							<div class="form-group col-md-3">
								<label>Evaluation Type</label>
								<select class="form-control" name="stype" id="stype" disabled>
									<option value="">::Select ::</option>
									<option value="Salary Increment">Salary Increment</option>
									<option value="Promotion">Promotion</option>
									<option value="Permanent">Permanent</option>
								</select>
							</div>
	                <div class="form-group col-md-12">
	                  <label for="password" >Remarks</label>
	                    <textarea id="sremarks" class="form-control " 
	                    name="sremarks"></textarea>
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
        


<script type="text/javascript" >
$(document).ready(function(){	
		$('#epf').change(function(){

		var epf=$('#epf').val();
		if(epf==''||epf==-1){
			swal("Please Enter  Valid Epf");	
		}
		else {

			$.ajax({
				type:'GET',
				data:{epf:epf},
				dataType: 'json',
				url:'get-ajax-designation-by-epf-id',
				success:function (result) {
						$('#desig').val(result[0]['name']);

						
				}	
			});
			$.ajax({
				type:'GET',
				data:{epf:epf},
				dataType: 'json',
				url:'get-ajax-salary-code-by-epf-id',
				success:function (result) {
						$('#salc').val(result[0]['salcode']);
						
				}	
			});			
		}
		
	});
});

</script>


