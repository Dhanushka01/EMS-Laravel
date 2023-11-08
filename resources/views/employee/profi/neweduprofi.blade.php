<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>	
	
	@include('navbar.leftbar');
	
	@if(Session::has('empPRO'))
		<script type="text/javascript" >
			swal("Good Job !","{!! Session::pull('empPRO') !!}","success",{
				button:"ok",					
			});
		</script>	
		Session::forget('empPRO');		
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
  <div class="content-wrapper">

    <section class="content">
      <div class="container-fluid">
        <div class="row">

          <div class="col-md-12">

            <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title">Professional Qualification Form <small>Employee Data </small></h3>
              </div>

               <form id="demo-form2" action="employee-acd-profi-new" method="post" data-parsley-validate class="form-horizontal form-label-left">
               @csrf
                <div class="card-body">
                	<div class="row">
	                  <div class="form-group">
	                    <label for="desig">Select Epf Number</label>
	                   <select id="epf" class="form-control epfselect select2" required name="epf">
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
                  </div>
      <div class="row">
      	<div class="form-group col-md-3">
      	<center><label>Title</label></center>
        <input id="result1" class="form-control "  name="pct_[]" placeholder="" required='' type="text">
      </div>    
      
      <div class="form-group col-md-3">
      	<center><label>Institute Name</label></center>
        <input id="result1" class="form-control "  name="pins_[]" placeholder="" required='' type="text">
      </div>    
      
      <div class="form-group col-md-3">
      	<center><label>Registration Date</label></center>
        <input id="result1" class="form-control "  name="pyear_[]" placeholder="" required='' type="date">
      </div>    
      <div class="form-group col-md-3">
      	<center><label>Expiry Date</label></center>
        <input id="result1" class="form-control "  name="eyear_[]" placeholder="" required=''  type="date">
      </div>                                          
      </div>
      <div class="row">
      <div class="form-group col-md-3">
        <center><label>Title</label></center>
        <input id="result1" class="form-control "  name="pct_[]" placeholder=""  type="text">
      </div>    
      
      <div class="form-group col-md-3">
        <center><label>Institute Name</label></center>
        <input id="result1" class="form-control "  name="pins_[]" placeholder=""  type="text">
      </div>    
      
      <div class="form-group col-md-3">
        <center><label>Registration Date</label></center>
        <input id="result1" class="form-control "  name="pyear_[]" placeholder=""  type="date">
      </div>
      <div class="form-group col-md-3">
      	<center><label>Expiry Date</label></center>
        <input id="result1" class="form-control "  name="eyear_[]" placeholder=""  type="date">
      </div>                         
      </div>
      <div class="row">   
      <div class="form-group col-md-3">
        <center><label>Title</label></center>
        <input id="result1" class="form-control "  name="pct_[]" placeholder=""  type="text">
      </div>    
      
      <div class="form-group col-md-3">
        <center><label>Institute Name</label></center>
        <input id="result1" class="form-control "  name="pins_[]" placeholder=""  type="text">
      </div>    
      
      <div class="form-group col-md-3">
        <center><label>Registration Date</label></center>
        <input id="result1" class="form-control "  name="pyear_[]" placeholder=""  type="date">
      </div>
      <div class="form-group col-md-3">
      	<center><label>Expiry Date</label></center>
        <input id="result1" class="form-control "  name="eyear_[]" placeholder=""  type="date">
      </div>                          
      </div> 	                  

      <div class="row">
      	<div class="form-group col-md-3">
      	<center><label>Title</label></center>
        <input id="result1" class="form-control "  name="pct_[]" placeholder=""  type="text">
      </div>    
      
      <div class="form-group col-md-3">
      	<center><label>Institute Name</label></center>
        <input id="result1" class="form-control "  name="pins_[]" placeholder=""  type="text">
      </div>    
      
      <div class="form-group col-md-3">
      	<center><label>Registration Date</label></center>
        <input id="result1" class="form-control "  name="pyear_[]" placeholder=""  type="date">
      </div>    
      <div class="form-group col-md-3">
      	<center><label>Expiry Date</label></center>
        <input id="result1" class="form-control "  name="eyear_[]" placeholder=""  type="date">
      </div>                                          
      </div>
      <div class="row">
      <div class="form-group col-md-3">
        <center><label>Title</label></center>
        <input id="result1" class="form-control "  name="pct_[]" placeholder=""  type="text">
      </div>    
      
      <div class="form-group col-md-3">
        <center><label>Institute Name</label></center>
        <input id="result1" class="form-control "  name="pins_[]" placeholder=""  type="text">
      </div>    
      
      <div class="form-group col-md-3">
        <center><label>Registration Date</label></center>
        <input id="result1" class="form-control "  name="pyear_[]" placeholder=""  type="date">
      </div>
      <div class="form-group col-md-3">
      	<center><label>Expiry Date</label></center>
        <input id="result1" class="form-control "  name="eyear_[]" placeholder=""  type="date">
      </div>                         
      </div>
      <div class="row">   
      <div class="form-group col-md-3">
        <center><label>Title</label></center>
        <input id="result1" class="form-control "  name="pct_[]" placeholder=""  type="text">
      </div>    
      
      <div class="form-group col-md-3">
        <center><label>Institute Name</label></center>
        <input id="result1" class="form-control "  name="pins_[]" placeholder=""  type="text">
      </div>    
      
      <div class="form-group col-md-3">
        <center><label>Registration Date</label></center>
        <input id="result1" class="form-control "  name="pyear_[]" placeholder=""  type="date">
      </div>
      <div class="form-group col-md-3">
      	<center><label>Expiry Date</label></center>
        <input id="result1" class="form-control "  name="eyear_[]" placeholder=""  type="date">
      </div>                          
      </div>                  
						
                </div>


                <div class="card-footer">
                	<div class="float-right">
                 	 <button type="reset" class="btn btn-warning">Reset</button>
                 	 <button type="submit" class="btn btn-success">Submit</button>
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