@include('navbar.leftbar')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


@if(Session::has('empDes'))
	<script type="text/javascript" >
		swal("Good Job !","{!! Session::pull('empDes') !!}","success",{
			button:"ok",					
		});
	</script>	
	Session::forget('empDes');		
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
                <h3 class="card-title">Employee Designation/ Promotion</h3>
                <div style="float: right;">
                	<a>
							<button class="btn btn-primary" onclick="showinsertmodel()" >Assign</button>   
						</a> 
                	<a>
							<button class="btn btn-primary" onclick="showPromotionmodel()" >Promotion</button>   
						</a>						  
                	<a>
							<button class="btn btn-primary" onclick="showAgreementmodel()" >Extend Agreement</button>   
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
                          <th>Type</th>
                          <th>Category</th>
                          <th>Designation</th>
                          <th>Salary Code</th>
                          <th>Next Promotion</th>
                          <th>Agreement Exp date</th>

         

						                           
                        </tr>
                      </thead>
 								<?php
									$data1 = DB::table('mnrce_admin_emp_designations')
														->where('mnrce_admin_emp_designations.revDate',NULL)
														->join('mnrce_admin_emp_epfs','mnrce_admin_emp_epfs.id','=','mnrce_admin_emp_designations.epf_id')
														->join('mnrce_admin_emp_personals','mnrce_admin_emp_personals.id','=','mnrce_admin_emp_epfs.emp_id')
														->join('mnrce_admin_master_designations','mnrce_admin_master_designations.id','=','mnrce_admin_emp_designations.empDesig')
														->join('mnrce_admin_master_salary_codes','mnrce_admin_master_salary_codes.id','=','mnrce_admin_emp_designations.empSalCode')
														->select('mnrce_admin_emp_designations.*','mnrce_admin_emp_personals.nameini','mnrce_admin_emp_epfs.epf_no','mnrce_admin_master_salary_codes.salcode','mnrce_admin_master_salary_codes.opt','mnrce_admin_master_designations.name')														
														->get();
														
									
								?>                     
								<tbody>
									@foreach($data1 as $value)
									<tr style="">
										<td>{{$loop->iteration}}</td>
										<td>{{$value->effDate}}</td>
										<td>{{$value->epf_no}}</td>	
										<td>{{$value->nameini}}</td>	
										<td>{{$value->empType}}</td>	
										<td>{{$value->EmpCat}}</td>	
										<td>{{$value->name}}</td>	
										<td>{{$value->salcode}}({{$value->opt}})</td>	
										<td>	@if(!isset($value->nextPromotion))
													NA
												@else
													{{$value->nextPromotion}}
												@endif										
										</td>		
										<td>{{$value->aExpDate}}</td>							
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
                	<h3 class="card-title">Employee Designation/ Promotion</h3>
               	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
               		<span aria-hidden="true">&times;</span>
              		</button>
              </div>
               <form id="demo-form2" action="employee-designation" method="post" data-parsley-validate class="form-horizontal form-label-left">
               @csrf
                <div class="card-body">
						<div class="row">
	                <div class="form-group col-md-12">
                      <label for="epf">Effective Date * :</label>
                      <input type="date" id="" class="form-control" name="date" 
								value="<?php echo date('Y-m-d') ?>"                      
                      required />
						 </div>					
                <div class="form-group col-md-12">
                  <label for="epf">Select EPF No * :</label>
                  <select class="select2" multiple="multiple" data-placeholder="Select a Employee" style="width: 100%;" required name="epf_[]">
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
                      <label for="nid">Type Of Employment :</label>
                      		<select id="tofemp" name="type" class="form-control" required>
                            <option value="" selected >:: Select ::</option>
                            <option value="TRAINEE">Trainee</option>
                            <option value="PROBATION">Probation</option>
                            <option value="PERMANENT">Permanent</option>
                            <option value="CONTRACT">Contract Basis</option>
                            <option value="DAILY BASIS">Daily Basis</option>
                            <option value="FREELANCER">Freelance</option>
                            <option value="LABOR CONTRACT">Labor Contract</option>
                            <option value="INTERNSHIP">Internship</option>
                            <option value="SERVICE AGREEMENT">Service Agreement</option>
                            <option value="INDEPENDENT DRIVERS">Independent Drivers</option>
                          </select>
						 </div>                
						 <div class="form-group col-md-6">
                      <label for="nid">Employment Category :</label>
                      	<select id="" name="cat" class="form-control" required>
                            <option value="" selected >:: Select ::</option>
                            
                            <option disabled>----------Executives---------- </option>
                            
                            <option value="Senior Manager">Senior Manager</option>
                            <option value="Manager">Manager</option>
                            <option value="Engineer">Engineer</option>
                            <option value="Junior Engineer">Junior Engineer</option>
                            <option value="Junior Manager">Junior Manager</option>
                            <option value="Consultant">Consultant</option>
                            <option value="Coordinator">Coordinator</option>

                            <option disabled>---------------- </option>

                            <option value="Associate Officer">Associate Officer</option>
                            <option value="Management Assistant (MA 1-2)">Management Assistant (MA 1-2)</option>
                            <option value="Management Assistant (MA 2-2)">Management Assistant (MA 2-2)</option>
                            <option value="Management Assistant (MA 3)">Management Assistant (MA 3)</option>
                            <option value="Primary Level Skilled (PL-3)">Primary Level Skilled (PL-3)</option>
                            <option value="Primary Level Semi-Skilled (PL-2)">Primary Level Semi-Skilled (PL-2)</option>
                            <option value="Primary Level Unskilled (PL-1)">Primary Level Unskilled (PL-1)</option>

                          </select>
						 </div>
						<div id="emptype" class="row col-md-12">
								<div class="form-group col-md-6">
									<label> Agreement Expire Date </label>
									<input type="date" class="form-control" name="aedate" id="aedate" />
								</div>		
								<div class="form-group col-md-6">
									<label> Request Letter </label>
                      		<select id="" name="arname" class="form-control">
                            <option value="" selected>Select</option>
                            <option value="Y">Available</option>
                            <option value="N">Not Available</option>
                          	</select>									
								</div>												
						</div>
       
						<div class="form-group col-md-12">
	                      <label for="nid">Designation :</label>
                         <select id="" name="desig" class="form-control epfselect js-example-basic-multiple select2" required  >
                             
										<?php
											$data = DB::table('mnrce_admin_master_designations')->orderBy('name', 'ASC')->get();
											foreach($data as $key => $value){
												echo "<option value='".$value->id."'>".$value->name."</option>";											
											}
										?>		                           
                         </select>
							 </div>    
							<div class="form-group col-md-12">
	                      <label for="">Salary Code :</label>
                         <select id="" name="sal" class="form-control epfselect js-example-basic-multiple select2" required >
                             <option value="" >:: Select ::</option>
										<?php
											$data = DB::table('mnrce_admin_master_salary_codes')->where('revdate',null)->get();
											foreach($data as $key => $value){
												$tot1=$value->bsal+$value->costl+($value->ir1*$value->yr1)+($value->ir2*$value->yr2)+($value->ir3*$value->yr3)+($value->ir4*$value->yr4)+($value->ir5*$value->yr5);
												$tot=number_format($tot1, $decimals = 2);
												echo "<option value='".$value->id."'>".$value->salcode." --- ".$value->opt." --- ".$tot."</option>";											
											}
										?>		                           
                         </select>
							 </div>
						<div id="promotion" class="row col-md-12">
								<div class="form-group col-md-6">
									<label> Next Promotion Date </label>
									<input type="date" class="form-control" name="nxtpro" id="nxtpro" />
								</div>		
												
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
        
        
<!--================================================================================================== -->
        
<script type="text/javascript" >
$(document).ready(function(){	
	$('#emptype').hide();
	$('#tofemp').change(function(){
		var empType=$('#tofemp').val();
		if (empType == 'PERMANENT' || empType == 'PROBATION') {
			$('#emptype').show();
			$('#promotion').show();
		}
		else {
			$('#emptype').hide();
			$('#promotion').hide();
			
		}
		if (empType == 'PERMANENT') {
			$('#emptype').hide();

		}
		else {
			$('#emptype').show();
			
		}				
	});	
		
});

</script>

<!-- ========================================Agreement============================================================ -->

<script type="text/javascript" >
	function showAgreementmodel() {
		$('#modal-agreement').modal('show');		
	}
</script>

      <div class="modal fade" id="modal-agreement">
        <div class="modal-dialog">
        <div class="modal-content">
        <div class="card card-primary">
             <div class="card-header">
                	<h3 class="card-title">Employee Agreement Extend</h3>
               	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
               		<span aria-hidden="true">&times;</span>
              		</button>
              </div>
               <form id="demo-form2" action="employee-extend-agreements" method="post" data-parsley-validate class="form-horizontal form-label-left">
               @csrf
                <div class="card-body">
						<div class="row">
	                <div class="form-group col-md-12">
                      <label> Agreement Renew Date </label>
                      <input type="date" id="" class="form-control" name="adate" required />
						 </div>					
                <div class="form-group col-md-12">
                  <label for="epf">Select EPF No * :</label>
                  <select class="select2" multiple="multiple" data-placeholder="Select a State" style="width: 100%;" required name="aepf_[]">
										<?php
											$data = DB::table('mnrce_admin_emp_designations')
															->where('aExpDate','<>',null)
															->where('revDate',null)
															 ->join('mnrce_admin_emp_epfs', 'mnrce_admin_emp_epfs.id', '=', 'mnrce_admin_emp_designations.epf_id')
															 ->join('mnrce_admin_emp_personals', 'mnrce_admin_emp_personals.id', '=', 'mnrce_admin_emp_epfs.emp_id')
															->orderBy('mnrce_admin_emp_designations.epf_id', 'ASC')
															->select('mnrce_admin_emp_epfs.*','mnrce_admin_emp_personals.nameini')
															->get();
											foreach($data as $key => $value){
												echo "<option value='".$value->id."'>".$value->epf_no." | ".$value->nameini."</option>";											
											}
										?>
                  </select>
                </div>	

								<div class="form-group col-md-6">
									<label> Agreement Expire Date </label>
									<input type="date" class="form-control" name="aedate2" id="aedate" />
								</div>		
								<div class="form-group col-md-6">
									<label> Request Letter </label>
                      		<select id="" name="aDocRef2" class="form-control" required>
                            <option value="Y">Available</option>
                            <option value="N">Not Available</option>
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
  <!-- .End of the modal -->      
  

<!-- =============================================PROMOTION============================================================= -->

<script type="text/javascript" >
	function showPromotionmodel() {
		$('#modal-promotion').modal('show');		
	}
</script>

      <div class="modal fade" id="modal-promotion">
        <div class="modal-dialog">
        <div class="modal-content">
        <div class="card card-primary">
             <div class="card-header">
                	<h3 class="card-title">Employee Promotion</h3>
               	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
               		<span aria-hidden="true">&times;</span>
              		</button>
              </div>
              <form id="demo-form2" action="" method="post" data-parsley-validate class="form-horizontal form-label-left">
               @csrf
                <div class="card-body">
						<div class="row">
	                <div class="form-group col-md-12">
                      <label for="epf">Effective Date * :</label>
                      <input type="date" id="" class="form-control" name="pramo_date" value="<?php echo date('Y-m-d') ?>" required />
						 </div>	
	                <div class="form-group col-md-12" style="align-content: ">
                      <label for="pro">Promotion </label>
                      <input type="radio" id="pro" class="per" name="pramo_type" value="Promotion" required />
                      
                      <label for="per">&nbsp &nbsp &nbsp &nbsp Permanent </label>
                      <input type="radio" id="per" class="per" name="pramo_type" value="PERMANENT" required />
						 </div>						 				
                <div class="form-group col-md-12">
                  <label for="epf">Select EPF No * :</label>
                  <select class="select2" data-placeholder="Select a Employee" 
                  			style="width: 100%;" required name="pramo_epf" id="pramo_epf">
                  				
                  </select>
                </div>	

						 <div class="form-group col-md-6">
                      <label for="nid">Type Of Employment :</label>
                      <select id="pramo_type" name="pramo_type2" class="form-control" required>
                            <option value="" selected >:: Select ::</option>
                            <option value="TRAINEE">Trainee</option>
                            <option value="PROBATION">Probation</option>
                            <option value="PERMANENT">Permanent</option>
                            <option value="CONTRACT BASIS">Contract Basis</option>
                            <option value="SERVICE AGREEMENT">Service Agreement</option>
                            <option value="INDEPENDENT DRIVERS">Independent Drivers</option>
                          </select>
						 </div>                
						 <div class="form-group col-md-6">
                      <label for="nid">Employment Category :</label>
                      <select id="pramo_cat" name="pramo_cat" class="form-control" required>
                            <option value="" selected >:: Select ::</option>
                            <option disabled>----------Executives---------- </option>
                            <option value="Senior Manager">Senior Manager</option>
                            <option value="Manager">Manager</option>
                            <option value="Engineer">Engineer</option>
                            <option value="Junior Engineer">Junior Engineer</option>
                            <option value="Junior Manager">Junior Manager</option>
                            <option value="Consultant">Consultant</option>
                            <option value="Coordinator">Coordinator</option>

                            <option disabled>---------------- </option>

                            <option value="Associate Officer">Associate Officer</option>
                            <option value="Management Assistant (MA 1-2)">Management Assistant (MA 1-2)</option>
                            <option value="Management Assistant (MA 2-2)">Management Assistant (MA 2-2)</option>
                            <option value="Management Assistant (MA 3)">Management Assistant (MA 3)</option>
                            <option value="Primary Level Skilled (PL-3)">Primary Level Skilled (PL-3)</option>
                            <option value="Primary Level Semi-Skilled (PL-2)">Primary Level Semi-Skilled (PL-2)</option>
                            <option value="Primary Level Unskilled (PL-1)">Primary Level Unskilled (PL-1)</option>
                          </select>
						 </div>

						 
						 
						                 
						<div class="form-group col-md-12">
	                      <label for="nid">Designation :</label>
                         <select id="pramo_desig" name="pramo_desig" class="form-control js-example-basic-multiple select2" required  >
                             
										<?php
											$data = DB::table('mnrce_admin_master_designations')->orderBy('name', 'ASC')->get();
											foreach($data as $key => $value){
												echo "<option value='".$value->id."'>".$value->name."</option>";											
											}
										?>		                           
                         </select>
							 </div>    
							<div class="form-group col-md-12">
	                      <label for="">Salary Code :</label>
                         <select id="pramo_sal_code" name="pramo_sal_code" class="form-control epfselect js-example-basic-multiple select2" required >
                             <option value="" >:: Select ::</option>
										<?php
											$data = DB::table('mnrce_admin_master_salary_codes')->where('revdate',null)->get();
											foreach($data as $key => $value){
												$tot1=$value->bsal+$value->costl+($value->ir1*$value->yr1)+($value->ir2*$value->yr2)+($value->ir3*$value->yr3)+($value->ir4*$value->yr4)+($value->ir5*$value->yr5);
												$tot=number_format($tot1, $decimals = 2);
												echo "<option value='".$value->id."'>".$value->salcode." --- ".$value->opt." --- ".$tot."</option>";											
											}
										?>		                           
                         </select>
							 </div>
						<div id="" class="row col-md-12">
								<div class="form-group col-md-6">
									<label> Next Promotion Date </label>
									<input type="date" class="form-control" name="pramo_next" id="pramo_next" value="<?php echo date('Y-m-d', strtotime('+5 years')); ?>" />
								</div>														
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
  <!-- .End of the modal -->  
<script type="text/javascript" >

$(document).ready(function(){	
	$("input[name='pramo_type']").change(function(){
	//	$("input[name='pramo_type']").val('');
		var pramo_type=$("input[type='radio'][name='pramo_type']:checked").val();

		
		if(pramo_type==''||pramo_type==-1){
			swal("Please select a valid type");	
		}
		else {
			$.ajax({
				type:'GET',
				data:{pramo_type:pramo_type},
				//dataType: 'json',
				url:'get-ajax-employee-evaluation-list',
				success:function (result) {
					//alert(result);
					$('#pramo_epf').html(result);
				}
			});						
		}
		
	});	
});	


$(document).ready(function(){	
	$('#pramo_epf').change(function(){
		var epf=$('#pramo_epf').val();
		//alert(pramo_epf);
		
		if(pramo_epf==''||pramo_epf==-1){
			swal("Please Enter  Valid Employee");	
		}
		else {
			$.ajax({
				type:'GET',
				data:{epf:epf},
				dataType: 'json',
				url:'get-ajax-designation-by-epf-id',
				success:function (result) {
					//alert(result[0]['EmpCat']);
					$('#pramo_type').val(result[0]['empType']);
					$('#pramo_cat').val(result[0]['EmpCat']);
					$('#pramo_desig').val(result[0]['empDesig']);
					$('#pramo_desig').trigger('change');
					$('#pramo_sal_code').val(result[0]['empSalCode']);
					$('#pramo_sal_code').trigger('change');										
				}
			});						
		}
		
	});	
});	
</script>    

