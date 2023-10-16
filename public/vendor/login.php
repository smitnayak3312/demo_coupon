<?php 

@ob_start();
@session_start();
include("include/config.php");
$error_msg=$nameerr=$passerr=$error='';
if(isset($_POST["login"]))
{
if(empty($_POST['email']) || empty($_POST['password'])) {
$error = "Username or Password is invalid";
}
else
{

$email= trim($_POST['email']);
$password = md5($_POST["password"]);
$email = stripslashes($email);
$password = stripslashes($password);
if(empty($email))
{
$error_msg= "please enter name";
}
elseif(empty($password))
{
$error_msg= "please enter password";
}
else
{
$query=mysqli_query($conn,"select id,unique_code,email,vendor_name,password from vendors where email='".$email."' and password='".$password."'");

$fetch_value=mysqli_fetch_array($query);
$fetch_num=mysqli_num_rows($query);

if($fetch_num==1)
{
$_SESSION['id']=$fetch_value['id'];
$_SESSION['referal_code']=$fetch_value['unique_code'];
$_SESSION['username']=$fetch_value['vendor_name'];
header("location:index.php");
}
else
{
//$error_msg="Incorrect Password / Id not Active";
           echo " <script type='text/javascript'>

            function my_code(){
              iziToast.error({
                title: 'Hello Sir!',
                message: 'Incorrect Password / Id not Active',
                position: 'topRight'
              });
            }
            
            window.onload=my_code();
            </script>";

}
}
}
}?>
<!DOCTYPE html>
<html lang="en">


<!-- auth-login.html  21 Nov 2019 03:49:32 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Mycoupon Login</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/css/app.min.css">
  <link rel="stylesheet" href="assets/bundles/bootstrap-social/bootstrap-social.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">
  
  <link rel="stylesheet" href="assets/bundles/izitoast/css/iziToast.min.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="assets/css/custom.css">
  
  <link rel='shortcut icon' type='image/x-icon' href='assets/img/666.png' />
</head>

<body onLoad="my_code()";>
  <div class="loader"></div>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="card card-primary">
              <div class="card-header">
                <h4>Login</h4>
              </div>
              <div class="card-body">
                <form method="post" enctype="multipart/form-data" class="needs-validation" novalidate="">
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus>
                    <div class="invalid-feedback">
                      Please fill in your email
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="d-block">
                      <label for="password" class="control-label">Password</label>
                      </div>
                    <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                    <div class="invalid-feedback">
                      please fill in your password
                    </div>
                  </div>
                  <div class="form-group">
                    <button type="submit" name="login" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Login
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- General JS Scripts -->
  <script src="assets/js/app.min.js"></script>
  <!-- JS Libraies -->
  <!-- Page Specific JS File -->
  <!-- Template JS File -->
  
  <!-- JS Libraies -->
  <script src="assets/bundles/izitoast/js/iziToast.min.js"></script>
  <!-- Page Specific JS File -->
  <script src="assets/js/page/toastr.js"></script>
  <script src="assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="assets/js/custom.js"></script>
  
</body>


<!-- auth-login.html  21 Nov 2019 03:49:32 GMT -->
</html>