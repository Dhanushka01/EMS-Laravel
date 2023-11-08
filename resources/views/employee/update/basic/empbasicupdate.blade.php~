<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

@include('navbar.leftbar')
			@if(Session::has('emp'))
				<script type="text/javascript" >
					swal("Good Job !","{!! Session::pull('emp') !!}","success",{
						button:"ok",					
					});
				</script>	
				Session::forget('emp');		
			@endif
			
			@if(Session::has('noemp'))
				<script type="text/javascript" >
					swal("Try Again !!!","{!! Session::pull('noemp') !!}","error",{
						button:"ok",					
					});
				</script>	
				Session::forget('noemp');		
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
            <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title">Employee Update Form</h3>
              </div>
              <div class="card-body p-0">
                <div class="bs-stepper">
                  <div class="bs-stepper-header" role="tablist">
                    <!-- your steps here -->
                    <div class="step" data-target="#basic-part">
                      <button type="button" class="step-trigger" role="tab" aria-controls="basic-part" id="logins-part-trigger">
                        <span class="bs-stepper-circle">1</span>
                        <span class="bs-stepper-label">Basic Information</span>
                      </button>
                    </div>
                    <div class="line"></div>
                    <div class="step" data-target="#contact-part">
                      <button type="button" class="step-trigger" role="tab" aria-controls="contact-part" id="information-part-trigger">
                        <span class="bs-stepper-circle">2</span>
                        <span class="bs-stepper-label">Contact Details</span>
                      </button>
                    </div>                                   
                  </div>
                  
 <!-- your steps content here -->                 
                  <div class="bs-stepper-content">
 						<form class="" method="POST" action="employee-update" id="form"  >
                       @csrf                    
                    <div id="basic-part" class="content" role="tabpanel" aria-labelledby="basic-part-trigger">
							 @include('employee.update.basic.tab.basic')
                       <div class="card-footer float-right">
                      	<input type="button" class="btn btn-primary" onclick="stepper.next()" value="Next">
                    	  </div>
                    </div>
                    
                    
                    <div id="contact-part" class="content" role="tabpanel" aria-labelledby="information-part-trigger">
								@include('employee.update.basic.tab.contact')
								
                   <div class="card-footer float-right">     
                      <input type="button" class="btn btn-primary" onclick="stepper.previous()" value="Previous">
                      
                      <input type="submit" class="btn btn-primary" value="Finish">
                      
                    	</div>
                   </div>
                    
                   </form>                   
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
              </div>
            </div>
            <!-- /.card -->
          </div>
        </div>

      </div>
    </section>

  </div>

</div>


</body>               
        
        
        