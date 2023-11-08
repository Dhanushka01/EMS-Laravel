
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>EMS | Login</title>

    <!-- Bootstrap -->
    <link href="public/assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="public/assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="public/assets/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="public/assets/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="public/assets/build/css/custom.min.css" rel="stylesheet">
 
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  @if(Session::has('login'))
    <script type="text/javascript" >

      alert('Username & password combination is incorrect !!!');

    </script> 
    Session::forget('login');   
  @endif    
  @if(Session::has('login1'))
    <script type="text/javascript" >

      alert('Your account is disabled. Please contact system administrator. !!!');

    </script> 
    Session::forget('login1');    
  @endif     
  @if(Session::has('login2'))
    <script type="text/javascript" >

      alert('Your account is temporary locked. Please contact system administrator. !!!');

    </script> 
    Session::forget('login2');    
  @endif    
  </head>

  <body class="login">

    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>
  
      <div class="login_wrapper">
        <div class="animate form login_form">
        <img src="public/assets/images/img.png" alt="..."  class="center">
        
     <div class="background">
      <div class="transbox">  
      
          <section class="login_content">

            <form method="POST" action="index.php/userlogin">
          <!--<h1>E M S</h1>-->
              <h1>Login Form</h1>
              @csrf
              <div>
                <input type="text" name="username" class="form-control" placeholder="Username" required="" autocomplete="off" />
              </div>
              <div>
                <input type="password" name="password" class="form-control" placeholder="Password" required="" autocomplete="off" />
              </div>
              <div>
                
                <input class="btn btn-primary" type="submit" name="submit" value="Login" style="vertical-align:middle">
                <input class="btn btn-danger" type="reset" name="reset" value="Reset" style="vertical-align:middle">
              </div>
              </form>
      </div>
      </div>

              <div class="clearfix"></div>
              <div class="separator">
                
                </p>

                <div class="clearfix"></div>
                

                <div>
                <center>  <h1><i class="fa fa-laptop"></i> EMS - IT</h1></center>
                 <center> <p>©2023 All Rights Reserved.</p></center> 
                </div>
              </div>
            </form>
          </section>
        </div>

       
          </section>
          </div>
          </div>

   
  </body>
</html>


<style type="text/css">
.center {
  display: block;
  margin-left: auto;
  margin-right: auto;
  margin-bottom: 10px;
  width: 150px;
  height: 150px;
 
  
}

.button {
  display: inline-block;
  border-radius: 18px;
  background-color: #fff;
  border: 1px solid #c8c8c8;
  color: black;
  text-align: center;
  font-size: 36px;
  padding: 10px;
  width: 80px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;
  
}

.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.button:hover span {
  padding-right: 25px;
  color: ;  
}

.button:hover span:after {
  opacity: 1;
  right: 0;
}

.login_content form input[type="text"], .login_content form input[type="email"], .login_content form input[type="password"]{
border-radius: 18px;
background-color: whitesmoke; 
color: black;
margin-left: 15px;
width: 90%;
font-weight: bold;
}


.center:hover {
  -ms-transform: scale(1.2); /* IE 9 */
  -webkit-transform: scale(1.2); /* Safari 3-8 */
  transform: scale(1.2); 
}

body, html {
  
  margin-top: -20px;
  color: whitesmoke;
  text-shadow: 2px 2px black;
   background-image: url("public/assets/images/img3.jpg");
   background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 100%;
}

div.background {
 
  border: 1px solid black;
  border-radius: 8px;
}

div.transbox {
  margin: 5px;
  background-color: black;
  border: 1px solid black ;
  opacity: 0.6;
  border-radius: 8px;

}



</style>
