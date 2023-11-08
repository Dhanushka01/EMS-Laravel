@include('navbar.leftbar')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


			@if(Session::has('empinsass'))
				<script type="text/javascript" >
					swal("Good Job !","{!! Session::pull('empinsass') !!}","success",{
						button:"ok",					
					});
				</script>	
				Session::forget('empinsass');		
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
                <h3 class="card-title">Assign Insurance</h3>
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
                          <th>EPF</th>
                          <th>Name</th>
                          <th>Company</th>
                          <th>Year</th>
                          <th>Policy </th>
                          <th>Type</th>
                          <th>Plan</th>
                          <th>Category</th>
                       	 <th>Action</th> 
         

						                           
                        </tr>
                      </thead>
 								<?php
									$data1 = DB::table('ins_assigns')
														->join('emppersonals','emppersonals.id','=','ins_assigns.epf_id')
														->join('ins_companies','ins_companies.id','=','ins_assigns.insid')
														->select('ins_assigns.*','emppersonals.nameini','ins_companies.comname',
														'emppersonals.EpfNo')	
														->orderBy('updated_at','ASC')													
														->get();
														
									
								?>                     
								<tbody>
									@foreach($data1 as $value)
									<tr style="">
										<td>{{$loop->iteration}}</td>
										<td>{{$value->EpfNo}}</td>	
										<td>{{$value->nameini}}</td>											
										<td>{{$value->comname}}</td>					
										<td>{{$value->year}}</td>					
										<td>{{$value->policy}}</td>					
										<td>{{$value->type}}</td>					
										<td>
											<?php

													if($value->plan=='1') {
														echo "<p class='' style='text-align: left;' >Plan 01</p>";													
													}
													elseif($value->plan=='2') {
														echo "<p class=' style='text-align: left;' >Plan 02</p>";													
													}	
													elseif($value->plan=='3') {
														echo "<p class='' style='text-align: left;' >Plan 03</p>";													
													}
													else {
														echo "<p class='' style='text-align: left;' >N/A</p>";
													}																																						
											
											?>
										</td>					
										<td>
												<?php

													if($value->category=='FS') {
														echo "<p class='' style='text-align: left;' >Family Single</p>";													
													}
													elseif($value->category=='FM') {
														echo "<p class=' style='text-align: left;' >Family Married</p>";													
													}	
													elseif($value->category=='I') {
														echo "<p class='' style='text-align: left;' >Individual</p>";													
													}
													else {
														echo "<p class='' style='text-align: left;' >N/A</p>";
													}																																						
												?>										
										
										</td>	

										<td>				
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
				url:'/ajaxGetInsAssignData',
				success:function (result) {
					$('#did').val(result['id']);

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
                	<h3 class="card-title">Delete Entry</h3>
               	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
               		<span aria-hidden="true">&times;</span>
              		</button>
              </div>
               <form id="demo-form" data-parsley-validate action="/deleteInsAssign" method="POST">
               @csrf
                <input type="hidden" name="did" id="did"/>      
                <label class="form-control">Are You Sure?</label>
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
     
     
<!-------------------------------------------- Insert Model --------------------------------------------- -->
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
                	<h3 class="card-title">Insurance Assign Form</h3>
               	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
               		<span aria-hidden="true">&times;</span>
              		</button>
              </div>
               <form id="demo-form" data-parsley-validate action="/empins2" method="POST">
               @csrf
                  <div class="card-body">
                  <div class="row">               
                    <div class="form-group col-md-12">
                      <label for="epf">Select EPF No * :</label>
                         <select id="epf" class="form-control epfselect select2" required name="epf_[]" >
                             
										<?php
											$data = DB::table('emppersonals')->orderBy('EpfNo', 'ASC')->get();
											foreach($data as $key => $value){
												echo "<option value='".$value->id."'>".$value->EpfNo." | ".$value->nameini."</option>";											
											}
										?>		                           
                         </select>
						 </div>
                    <div class="form-group col-md-12">
                      <label for="epf">Insurance Company * :</label>
                         <select id="insc" class="form-control epfselect select2" required name="insc" >
                             <option value="">Select Insurance Company</option>
										<?php
											$d1=date('Y-01-01');
											$d2=date('Y-12-31');
											$data1 = DB::table('ins_types')

															->join('ins_companies','ins_companies.id','=','ins_types.insid')	
															
															->get();
											$data = $data1->unique('insid');				
											foreach($data as $key => $value){
												echo "<option value='".$value->id."'>".$value->comname."</option>";											
											}
										?>		                           
                         </select>
						 </div>
                    <div class="form-group col-md-12">
                      <label for="epf">Insurance Type * :</label>
                         <select id="inst" class="form-control" required name="inst" >
                             <option value="">Select Type</option>		                           
                         </select>
						 </div>						 						 
						 </div>						 						 
						<div class="row" id="health"> 	
						 <div class="form-group col-md-12">
						 	<label> Select Plan </label>
						 	<select id="plan" name="plan" class="form-control" required >
								<option value="">Select</option>
								<option value="1"> Plan 1</option>						 	
								<option value="2"> Plan 2</option>						 	
								<option value="3" selected> Plan 3</option>						 	
								<option value="4"> Plan 4</option>						 	
						 	</select>
						 </div>
						 <div class="form-group col-md-12">
						 	<label> Select Catagory </label>
						 	<select id="cat" name="cat" class="form-control" required>
								<option value="FS">Family - Single</option>
								<option value="FM">Family - Married</option>
								<option value="I"> Individual </option>						 	
						 	</select>
						 </div>						 
						</div>
						<div id="showrelative" class="form-group col-md-12">
							
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







<script type="text/javascript" >

$(document).ready(function(){	
		$('#epf').change(function(){
			$('#health').hide();
			$('#showrelative').hide();
		var epf=$('#epf').val();
		//alert(insc);
		if(insc==''||insc==-1){
			swal("Please Select A Employee");	
		}
		else {
			$.ajax({
				type:'GET',
				data:{epf:epf},
				//dataType: 'json',
				url:'/ajaxGetInsRel',
				success:function (result) {
					$('#showrelative').show();
					$('#showrelative').html(result);
				}	
			});
			
		}
		
	});
});

$(document).ready(function(){	
		$('#insc').change(function(){
			$('#health').hide();
		var insc=$('#insc').val();
		//alert(insc);
		if(insc==''||insc==-1){
			swal("Please Select Valid Insurance Company");	
		}
		else {
			$.ajax({
				type:'GET',
				data:{insc:insc},
				//dataType: 'json',
				url:'/ajaxInsTypes',
				success:function (result) {
					$('#inst').html(result);
				}	
			});
			
		}
		
	});
});
$(document).ready(function(){	
		$('#health').hide();

		
		$('#inst').change(function(){
		$('#health').hide();	
		var inst=$('#inst').val();
		//alert(insc);
		if(inst==''||inst==-1){
			swal("Please Select Valid Insurance Company");	
		}
		else {
			if (inst=='Health') {
				$('#health').show();

				

			}
			else {
				$('#health').hde();

			}
			
		}
		
	});
});
</script>
