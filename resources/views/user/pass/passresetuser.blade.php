<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

@include('navbar.leftbar')


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
                <h3 class="card-title">Password Rest <small>Master Data</small></h3>
              </div>

               <form id="demo-form" data-parsley-validate action="user-pass-reset-2" method="POST">
               @csrf
                <div class="card-body">
                      <div class="form-group col-md-6">
                        <label for="user name">User Name <span class="required">*</span>
                        </label>
                          <input type="text" name="uname" required="required" value="{{session('uname')}}" readonly
                          class="form-control" autocomplete="off">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="password" >New Password <span class="required">*</span></label>
                          <input id="psw" class="form-control password" type="password" name="psw" autocomplete="off" required="">

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
<script src="assets/designation/custom/mempdesig.js"></script> 
