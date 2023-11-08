<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MNRCE |EMS</title>
	
	@include('navbar.link')

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="">
<!--- Enter Wrapper div above -->
  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="../public/assets/images/img.png" alt="MNRCE-logo" height="120" width="120">
  </div>

  <!-- Navbar -->
	@include('navbar.topbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="dash-board" class="brand-link">
      <img src="../public/assets/images/img.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">EMS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../public/assets/images/emp/profile/{{session('uname')}}.jpeg" class="img-circle elevation-2" alt="User Image"
          onerror="this.src='../public/assets/images/profile.jpg';" />
        </div>
        <div class="info">
          <a href="employee-profile" class="d-block">
                <span>Welcome,<br>{{session('name')}}</span> 
            </a>          
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="dash-board" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Home
               
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Users
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="user-reg" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Registration</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="user-pass-reset" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Reset Password</p>
                </a>
              </li>
            </ul>
          </li>          
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Masters
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="master-designation-new" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Designation</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="master-salarycode-new" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Salary Codes</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="master-project-new" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Projects</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="master-leave-new" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Leave</p>
                </a>
              </li>              
              <li class="nav-item">
                <a href="master-ins-company-new" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Insurance Company</p>
                </a>
              </li>                            
            </ul>
          </li>
          
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Employee
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="employee-register" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Registration</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="employee-acd-ol-new" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>O/L</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="employee-acd-al-new" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>A/L</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="employee-acd-higher-new" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Higher Education</p>
                </a>
              </li>              

              <li class="nav-item">
                <a href="employee-acd-profi-new" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Prof. Qualifications</p>
                </a>
              </li>               
              
               <li class="nav-item">
                <a href="employee-work-new" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Work Experience</p>
                </a>
              </li>              
               <li class="nav-item">
                <a href="employee-train-new" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>MNRCE Training</p>
                </a>
              </li>  
               <li class="nav-item">
                <a href="employee-status" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Employee Status</p>
                </a>
              </li>                          
            </ul>
          </li>          
          <li class="nav-item">
            <a href="employee-designation" class="nav-link">
              <i class="nav-icon fas fa-user-tie"></i>
              <p>
                Designation
               
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="employee-division" class="nav-link">
              <i class="nav-icon fas fa-building"></i>
              <p>
                Division
               
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="employee-evaluation" class="nav-link">
              <i class="nav-icon fas fa-building"></i>
              <p>
                Evaluation
               
              </p>
            </a>
          </li>          
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Salary
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="employee-salary-increment" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Increment</p>
                </a>
              </li>

            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-ambulance"></i>
              <p>
                Insurance
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/insper" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Set Period</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/empins1" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Relatives</p>
                </a>
              </li>              
              <li class="nav-item">
                <a href="/empins2" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Assign Insurance</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/insreq" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Request For Claim</p>
                </a>
              </li> 
              <li class="nav-item">
                <a href="/insres" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Claim</p>
                </a>
              </li>                           
            </ul>
          </li> 
          
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-umbrella-beach"></i>
              
              <p>
                Leave
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="employee-leave-genarate" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Generate</p>
                </a>
              </li>

            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="employee-leave-request-admin" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Request Admin</p>
                </a>
              </li>
            </ul>                        
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="employee-leave-request" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Request</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="employee-leave-adjust" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Adjust</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="employee-leave-approve" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Approve</p>
                </a>
              </li>
            </ul>   
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="employee-leave-book" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Book</p>
                </a>
              </li>
            </ul>                                 
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-hand-holding-usd"></i>
              
              <p>
                Loan
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Check</p>
                </a>
              </li>

            </ul>            
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/loanIssue" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Issue A Loan</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Settle a Loan</p>
                </a>
              </li>
            </ul>   
                                 
          </li>               
                    
          <li class="nav-header">UPDATE</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Update
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="employee-update" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Employee</p>
                </a>
              </li>
            </ul>
          </li>  
          <li class="nav-header">REPORTS</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-file "></i>
              <p>
                Reports
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="employee-search-profile" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Profile</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="employee-basic-data" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Basic Data</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="employee-contact-data" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Employee</p>
                </a>
              </li>              
              <li class="nav-item">
                <a href="employee-carder" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Carder</p>
                </a>
              </li>   
              <li class="nav-item">
                <a href="employee-agreement" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Agreements</p>
                </a>
              </li>              
               
              <li class="nav-item">
                <a href="employee-leave-balance" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Leave Balance</p>
                </a>
              </li>                          
            </ul>
          </li>  

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->

  <!-- /.content-wrapper -->


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<script type="text/javascript" >
	// For F2 Key
	document.onkeyup = KeyCheck;
	function KeyCheck(e){
	   var KeyID = (window.event) ? event.keyCode : e.keyCode;
	   if(KeyID == 113){
			showinsertmodel();
	   }
	}
</script>
@include('navbar.script')
</body>
</html>
