<!DOCTYPE html>
<html lang="en">
  <head>
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    
  </head>

    <body class="nav-md">   
    <div class="container body">
    <div class="main_container">
    
			@include('dash');			
        <div class="right_col" role="main">
          <div class="">
           
            <div class="clearfix"></div>

            <div class="row">

              <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="background">
                    <div class="transbox"> 
  
                  <div class="x_content">
 					<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Employee Data <small>Contact</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                     
                    </p>
                    <table id="datatable-buttons" class="table table-bordered table-striped example1">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>EPF</th>
                          <th>Name</th>
                          <th>DOB</th>
                          <th>Age (Years)</th>
                          <th>NID</th>
                          <th>Gender</th>
                          <th>Address</th>
                          <th>Mobile 1</th>
                          <th>Mobile 2</th>
                          <th>Land Line</th>
                        </tr>
                      </thead>
								<?php
									
									$data1 = DB::table('emppersonals')
																	->join('empcontacts','empcontacts.epf_id','=','emppersonals.id')->orderBy('emppersonals.EpfNo', 'asc')->get();
									$count3 = DB::table('emppersonals')->count();
									//print_r($data1);
									
									use Carbon\Carbon;
								?>
								<tbody>
									@foreach($data1 as $value)
									<tr style="">
										<td>{{$loop->iteration}}</td>
										<td>{{$value->EpfNo}}</td>	
										<td>{{$value->fullname}}</td>	
										<td>{{$dob=$value->dob}}</td>
									<?php
										$date = Carbon::parse($dob);
										$now = Carbon::now();
									
										$diff1 = $date->diffInDays($now);
										$diff2=$diff1/365.25;
										$diff =round($diff2, 0);										
										?>
										<td>{{$diff}}</td>
										<td>{{$value->nic}}</td>
										
										<td>
											@if($value->gender=='M')
												Male
											@else
												Female
											@endif		
										</td>																												
										<td>{{$value->add1}}</td>
										<td>{{$value->mobile1}}</td>
										<td>{{$value->mobile2}}</td>
										<td>{{$value->homephone}}</td>
																				
									</tr>
									
									@endforeach								
								</tbody>
  
                      
                    </table>
                  </div>
                </div>
              </div>                   

                  </div>
                </div>
              </div>
            </div>
				</div>
			</div>
		</div>
	</div>
</div>

        </body>
        </html>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": false,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      "responsive": true,
    });
  });
</script>        
