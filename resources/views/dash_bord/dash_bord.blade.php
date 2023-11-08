 @include('navbar.leftbar')
 
 
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">

      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                 <?php
                    $data1 = DB::table('mnrce_admin_emp_epfs')->where('resignDate', null)->count();
                 ?>
                <h3>{{$data1}}</h3>

                <p>Available Employees</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="/empbasiclist" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                  <?php
                    $data1 = DB::table('mnrce_admin_emp_personals')->where('gender', 'M')->count();
                  ?>              
                <h3>{{$data1}}</h3>

                <p>Male Employees</p>
              </div>
              <div class="icon">
                 <span class="iconify" data-icon="foundation:male" data-inline="false"></span>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                  <?php
                    $data1 = DB::table('mnrce_admin_emp_personals')->where('gender', 'F')->count();
                  ?>              
                 <h3>{{$data1}}</h3>

                <p>Female Employees</p>
              </div>
              <div class="icon">
                <span class="iconify" data-icon="foundation:female" data-inline="false"></span>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
            <!-- Auto Refresh the Div -->
         <script>
            $(document).ready(function(){
             $("#piechart_3d1").load(location.href + " #piechart_3d1");
                setInterval(function() {
                    $("#piechart_3d1").load(location.href + " #piechart_3d1");
                }, 500);
            });
         
        </script>             

          <div class="inner" id="piechart_3d1">
            <h3><?php echo date('H:i:s'); ?></h3>
            <p><?php echo date('Y-m-d') ?></p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->

      </div>
        <!-- /.row -->
          
          <!-- .Pie Chart  for employee gender-->
          <div class="row">

 
 
           <div class="card card-primary col-md-4">
              <div class="card-header">
                <h3 class="card-title">Employee Categories</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <?php
          $data1 = DB::table('mnrce_admin_emp_designations')
                    ->where('revDate',NULL)
                    ->selectRaw('count(id) as tcount, empType as empType')
                    ->groupBy('empType')
                    ->get();  
              ?>
          <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
              <script type="text/javascript">
                google.charts.load("current", {packages:["corechart"]});
                google.charts.setOnLoadCallback(drawChart);
                function drawChart() {
                   var data = new google.visualization.DataTable();
                   data.addColumn('string', 'Topping');
                   data.addColumn('number', 'Slices');
                   data.addRows([
              @foreach($data1 as $data)
                    ['{{$data->empType}}',{{$data->tcount}}],
              
              @endforeach
              
              
                   ]);
                        
                  var options = {
                       
                     is3D: true,
                   
                  };
          
                  var chart = new google.visualization.PieChart(document.getElementById('piechart_3d-c'));
                  chart.draw(data, options);
                }
              </script>              
              <div class="card-body" style="display: block;"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
              <div id="piechart_3d-c" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 489px;" class="chartjs-render-monitor" width="489" height="250"></div>
              </div>
              <!-- /.card-body -->
            </div>
                       
            
      <div class="card card-primary col-md-8">
              <div class="card-header">
                <h3 class="card-title">Recruitment s </h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <?php
          $data2 = DB::table('mnrce_admin_emp_epfs')
                    ->selectRaw('EXTRACT(year FROM appoint_date) AS year,count(id) AS emp_count')
                    ->groupBy('year')
                    ->orderBy('year','DESC')
                    ->get();  
              ?>

          <script language = "JavaScript">
             function drawDistrictChart() {
                var data = google.visualization.arrayToDataTable([
                   ['Year', 'Staff'],
                @foreach($data2 as $data2)
                      ['{{$data2->year}}',{{$data2->emp_count}}],
                @endforeach               
                ]);
          
                var options = {'title': 'Recruitments of staff',
                          'hAxis': {title: 'Year', titleTextStyle: {color: 'Black'}},
                          'width':800,
                          'is3D': true,
                             'sliceVisibilityThreshold': .2,                    
                          
                          }; 
          
                var chart = new google.visualization.ColumnChart(document.getElementById('piechart_3d2'));
                chart.draw(data, options);
             }
             google.charts.setOnLoadCallback(drawDistrictChart);
          </script>             
              <div class="card-body" style="display: block;"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
              <div id="piechart_3d2" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 489px;" class="chartjs-render-monitor" width="489" height="250"></div>
              </div>
              <!-- /.card-body -->
            </div>
                        
        </div>        
        <!-- Main row -->
      <div class="row">
      <div class="card card-primary col-md-12" >
              <div class="card-header">
                <h3 class="card-title">Recruitment s By Districts </h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <?php
          $data3 = DB::table('mnrce_admin_emp_contacts')
                    ->selectRaw('count(districk) AS count_total,districk')
                    ->groupBy('districk')
                    ->orderBy('count_total','DESC')
                    ->get();  
              ?>

          <script language = "JavaScript">
             function drawDistrictChart() {
                var data = google.visualization.arrayToDataTable([
                   ['Year', 'Staff'],
                @foreach($data3 as $data3)
                      ['{{$data3->districk}}',{{$data3->count_total}}],
                @endforeach               
                ]);
          
                var options = {'title': 'Recruitments of staff',
                           'hAxis': {
                              title: 'Districts', 
                              titleTextStyle: {color: 'black'}, 
                              top:55,
                              height:'140%'
                          },  
                          'width':1200,
                          
                          'is3D': true,
                             'sliceVisibilityThreshold': .2,                    

                          }; 
          
                var chart = new google.visualization.ColumnChart(document.getElementById('piechart_3d3'));
                chart.draw(data, options);
             }
             google.charts.setOnLoadCallback(drawDistrictChart);
          </script>             
              <div class="card-body" style="display: block;"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
              <div id="piechart_3d3" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 489px;" class="chartjs-render-monitor" width="489" height="250"></div>
              </div>
              <!-- /.card-body -->
            </div>      
      
      </div>
      
      <!-- /.Start events row -->
      <div class="row">
      <div id="calbox" class="card card-danger col-md-6" style="">
              <div class="card-header">
                <h3 class="card-title"> <i class="fa fa-birthday-cake" aria-hidden="true"></i> &nbsp;
                    Birthdays &nbsp; <?php echo date('Y-m-d') ?> </h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>      

                  <?php
                    $date=date('m-d');
                    $data3 = DB::table('mnrce_admin_emp_personals')
                          ->where('dob', 'like','%'.$date)
                          ->join('mnrce_admin_emp_contacts','mnrce_admin_emp_contacts.epf_id','mnrce_admin_emp_personals.id')
                          ->join('mnrce_admin_emp_epfs','mnrce_admin_emp_epfs.emp_id','mnrce_admin_emp_personals.id')
                          ->join('mnrce_admin_emp_designations','mnrce_admin_emp_designations.epf_id','mnrce_admin_emp_epfs.id')
                          ->join('mnrce_admin_master_designations','mnrce_admin_master_designations.id','mnrce_admin_emp_designations.empDesig')
                          ->select('mnrce_admin_emp_personals.*','mnrce_admin_emp_contacts.mobile1','mnrce_admin_emp_epfs.epf_no','mnrce_admin_master_designations.name')
                          ->get();

                    
                  ?>                
                <div class="card-body calbody secondrowminheight" style="padding-top: 7px;">
                    <span id="ContentPlaceHolderRight_LabelCalendarEvents">
                    @foreach($data3 as $value3)
                    <div class="row calevent"> 

                      <div class="col-md-2 col-2">
                          <img class="img-size-50 mr-3 img-circle" 
                          src="../public/assets/images/emp/profile/{{$value3->epf_no}}.jpg" 
                           onerror="this.src='../public/assets/images/user.png'"
                          alt="" > 
                      </div> 
                      <div class="col-md-2 col-2">{{$value3->epf_no}}</div> 
                      <div class="col-md-4 col-4">{{$value3->nameini}}</div> 
                      <div class="col-md-4 col-4">{{$value3->mobile1}}</div> 
                    </div>
                    <hr>
            @endforeach                       
                    </span>

                    
                </div>
            </div>      
            </div>      
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>