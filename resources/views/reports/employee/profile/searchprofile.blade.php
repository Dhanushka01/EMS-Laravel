<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

@include('navbar.leftbar')


@if(Session::has('mdesig'))
	<script type="text/javascript" >
		swal("Good Job !","{!! Session::pull('mdesig') !!}","success",{
			button:"ok",					
		});
	</script>	
	Session::forget('mdesig');		
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
  <div class="content-wrapper">

    <section class="content-header">
      <div class="container-fluid">

      </div>
    </section>


    <section class="content">
      <div class="container-fluid">
        <div class="row">

          <div class="col-md-12">

            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Employee Profile <small></small></h3>
              </div>

               <form id="demo-form" data-parsley-validate action="employee-profile" method="POST">
               @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="desig">Select EPF Number</label>
                         <select id="epfno" class="form-control select2" required name="epfno">
                             <option value="">Select EPF No..</option>
									<?php
										$data = DB::table('mnrce_admin_emp_epfs')
																
																->join('mnrce_admin_emp_personals','mnrce_admin_emp_personals.id','mnrce_admin_emp_epfs.emp_id')
																->orderBy('mnrce_admin_emp_epfs.epf_no', 'ASC')
																->select('mnrce_admin_emp_epfs.*','mnrce_admin_emp_personals.fullname')
																->get();
										foreach($data as $key => $value){
											echo "<option value='".$value->id."'>".$value->epf_no." | ".$value->fullname."</option>";											
										}
									?>		                           
                         </select>
                  </div>
                </div>


                <div class="card-footer">
                	<div class="float-right">
                 	 <button type="reset" class="btn btn-warning">Reset</button>
                 	 <button type="submit" class="btn btn-success">Search</button>
                  </div>
                </div>
              </form>
            </div>


          </div>

        </div>

      </div>
    </section>

  </div>

</div>


</body>
<script src="assets/designation/custom/mempdesig.js"></script> 
