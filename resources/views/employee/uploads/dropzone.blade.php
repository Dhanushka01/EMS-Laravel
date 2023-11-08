@include('navbar.leftbar')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />


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
                <h3 class="card-title">Profile Picture Upload</h3>               
              </div>
              <!-- /.card-header -->
              <div class="card-body">
					<form method="post" action="/dropzone" class="dropzone dz-clickable" enctype="multipart/form-data">
						@csrf
							<div><h3></h3></div>
							<div class="dz-default dz-message">
								<span>Drop Here</span>							
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


