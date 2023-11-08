<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>	
	
	@include('navbar.leftbar');
	
	@if(Session::has('empOL'))
		<script type="text/javascript" >
			swal("Good Job !","{!! Session::pull('empOL') !!}","success",{
				button:"ok",					
			});
		</script>	
		Session::forget('empOL');		
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
                <h3 class="card-title">O/L Form <small>Employee Data </small></h3>
              </div>

               <form id="demo-form2" action="employee-acd-ol-new" method="post" data-parsley-validate class="form-horizontal form-label-left">
               @csrf
                <div class="card-body">
                	<div class="row">
	                  <div class="form-group">
	                    <label for="desig">Select Epf Number</label>
	                   <select id="epf" class="form-control epfselect select2" required="" name="epf">
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
					       <div class="form-group col-md-4">
					         <label  for="name">Index Number: <span class=""></span>
					         </label>
					           <input id="ino" class="form-control " name="index" placeholder="" required="" type="text">
								</div>
							 <div class="form-group col-md-4">
					         <label  for="name">Year <span class=""></span>
					         </label>
					           <input id="year" class="form-control" min="1960" max="2050" name="year" placeholder="" required="" type="number">
					 
					      </div>
						</div>
						
	<div class="row">
	   <div class="form-group">
	   	<center><label >Subject</label></center>
	     <input id="s1" class="form-control"  name="subo_[]" 
 
	     required='' 	type="text">
	   </div>
	   <div class="col-md-1 col-sm-3 col-xs-12">
	  <center> <label>Grade</label></center>	
	     <input id="g1" class="form-control"  name="gro_[]" 
	    
	    required='' type="text">
	   </div>
	    <div class="col-md-2 col-sm-2 col-xs-12">
	   </div>
	  	
	  	<div class="form-group">
	   	<center><label>Subject</label></center>
	     <input id="s2" class="form-control"  name="subo_[]" 

	      type="text">
	   </div>
	   <div class="col-md-1 col-sm-3 col-xs-12">
	  <center> <label>Grade</label></center>	
	     <input id="g2" class="form-control"  name="gro_[]"  
	     
	     type="text">
	   </div>                        
	   
	   
	<div class="col-md-1 col-sm-1 col-xs-12">
	   <label></label>
	   </div>
	   <div class="form-group">
	   	<center><label>Subject</label></center>
	     <input id="s3" class="form-control"  name="subo_[]" 

	      type="text">
	   </div>
	   <div class="col-md-1 col-sm-3 col-xs-12">
	  <center> <label>Grade</label></center>	
	     <input id="g3" class="form-control"  name="gro_[]" 
	     
	      type="text">
	   </div>
	    <div class="col-md-2 col-sm-2 col-xs-12">
	   </div>
	  								<div class="form-group">
	   	<center><label>Subject</label></center>
	     <input id="s4" class="form-control"  name="subo_[]" 

	      type="text">
	   </div>
	   <div class="col-md-1 col-sm-3 col-xs-12">
	  <center> <label>Grade</label></center>	
	     <input id="g4" class="form-control"  name="gro_[]" placeholder="" type="text">
	   </div>                        
	
	
	<div class="col-md-1 col-sm-1 col-xs-12">
	   
	   </div>
	   <div class="form-group">
	   	<center><label>Subject</label></center>
	     <input id="s5" class="form-control"  name="subo_[]" 

	       type="text">
	   </div>
	   <div class="col-md-1 col-sm-3 col-xs-12">
	  <center> <label>Grade</label></center>	
	     <input id="g5" class="form-control"  name="gro_[]" placeholder="" type="text">
	   </div>
	    <div class="col-md-2 col-sm-2 col-xs-12">
	   </div>
	  								<div class="form-group">
	   	<center><label>Subject</label></center>
	     <input id="s6" class="form-control"  name="subo_[]" 

	      type="text">
	   </div>
	   <div class="col-md-1 col-sm-3 col-xs-12">
	  <center> <label>Grade</label></center>	
	     <input id="g6" class="form-control"  name="gro_[]" placeholder="" type="text">
	   </div>                        
	   
	   
	   <div class="col-md-1 col-sm-1 col-xs-12">
	   
	   </div>
	   <div class="form-group">
	   	<center><label>Subject</label></center>
	     <input id="s7" class="form-control"  name="subo_[]" placeholder="" type="text">
	   </div>
	   <div class="col-md-1 col-sm-3 col-xs-12">
	  <center> <label>Grade</label></center>	
	     <input id="g7" class="form-control"  name="gro_[]" placeholder="" type="text">
	   </div>
	    <div class="col-md-2 col-sm-2 col-xs-12">
	   </div>
	  								<div class="form-group">
	   	<center><label>Subject</label></center>
	     <input id="s8" class="form-control"  name="subo_[]" placeholder="" type="text">
	   </div>
	   <div class="col-md-1 col-sm-3 col-xs-12">
	  <center> <label>Grade</label></center>	
	     <input id="g8" class="form-control"  name="gro_[]" placeholder="" type="text">
	   </div>                        
	   
	   
	   <div class="col-md-1 col-sm-1 col-xs-12">
	   
	   </div>
	   <div class="form-group">
	   	<center><label>Subject</label></center>
	     <input id="s9" class="form-control"  name="subo_[]" placeholder="" type="text">
	   </div>
	   <div class="col-md-1 col-sm-3 col-xs-12">
	  <center> <label>Grade</label></center>	
	     <input id="g9" class="form-control"  name="gro_[]" placeholder="" type="text">
	   </div>
	    <div class="col-md-2 col-sm-2 col-xs-12">
	   </div>
	  								<div class="form-group">
	   	<center><label>Subject</label></center>
	     <input id="s10" class="form-control"  name="subo_[]" placeholder="" type="text">
	   </div>
	   <div class="col-md-1 col-sm-3 col-xs-12">
	  <center> <label>Grade</label></center>	
	     <input id="g10" class="form-control"  name="gro_[]" placeholder="" type="text">
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