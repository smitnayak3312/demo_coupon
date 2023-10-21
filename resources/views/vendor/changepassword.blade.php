<?php 
include('include/config.php');
@ob_start();
@session_start();
if(!isset($_SESSION['id']) || $_SESSION['id'] == "") 
 {
    header('location:login.php');
 }
 $query = mysqli_query($conn,"SELECT * FROM admin WHERE id = '".$_SESSION['id']."'");
 $fetch_value=mysqli_fetch_array($query);
 if(isset($_POST['submit']))
{  
    $old_password=md5($_POST["old_password"]); 
   $password = md5($_POST["password"]);
   $password_confirm = md5($_POST["password_confirm"]); 
   if($fetch_value['password']==$old_password){
    if($password==$password_confirm){    
      $query = "update admin set password='".$password."' WHERE id = '".$_SESSION['id']."' ";
      if(mysqli_query($conn,$query))
      {
          //copy($temp,"img/products/".$newname);
          echo '<script>alert("Password Changed Successfully");</script>';
          echo '<script>window.location.href = "index.php";</script>';
      }else{
          echo '<script>alert("Failed Please try Again Letter");</script>';
          echo '<script>window.location.href = "changepassword.php";</script>';
          
      }
    }else{
        echo '<script>alert("Password and Confirm password should match!");</script>';
          echo '<script>window.location.href = "changepassword.php";</script>';
    }
    }else{
         echo '<script>alert("Incorrect old password!");</script>';
          echo '<script>window.location.href = "changepassword.php";</script>';
    }
 
}

?>
<!DOCTYPE html>
<html lang="en">


<!-- create-post.html  21 Nov 2019 04:05:02 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Change Password</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/css/app.min.css">
  <link rel="stylesheet" href="assets/bundles/summernote/summernote-bs4.css">
  <link rel="stylesheet" href="assets/bundles/jquery-selectric/selectric.css">
  <link rel="stylesheet" href="assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="assets/css/custom.css">
  <link rel='shortcut icon' type='image/x-icon' href='assets/img/666.png' />
</head>

<body>
  <div class="loader"></div>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <?php include('include/header.php'); ?>
      <?php include('include/navbar.php'); ?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <form method="post" enctype="multipart/form-data" action="#">
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Change Password</h4>
                  </div>
                  <div class="card-body">
                    <div class="row">
                    <div class="form-group col-md-6">
                      <label>Enter Old Password</label>
                      <input type="password"  name="old_password" class="form-control" required>
                    </div>
                    <div class="form-group col-md-6">
                      <label>Enter New Password</label>
                      <input type="password"  name="password" class="form-control" required>
                    </div>
                    </div>
                    <div class="row">
                    <div class="form-group col-md-6">
                      <label>Confirm Password</label>
                      <input type="password"  name="password_confirm" class="form-control" required>
                    </div>
                    </div>
                    <div class="form-group">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                      <div class="col-sm-12 col-md-7">
                        <button class="btn btn-primary" name="submit">Upload Password</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
        </section>
        
      </div>
      <?php include('include/footer.php'); ?>
    </div>
  </div>
  <!-- General JS Scripts -->
  <script src="assets/js/app.min.js"></script>
  <!-- JS Libraies -->
  <script src="assets/bundles/summernote/summernote-bs4.js"></script>
  <script src="assets/bundles/jquery-selectric/jquery.selectric.min.js"></script>
  <script src="assets/bundles/upload-preview/assets/js/jquery.uploadPreview.min.js"></script>
  <script src="assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
  <!-- Page Specific JS File -->
  <script src="assets/js/page/create-post.js"></script>
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="assets/js/custom.js"></script>
</body>


<!-- create-post.html  21 Nov 2019 04:05:03 GMT -->
</html>