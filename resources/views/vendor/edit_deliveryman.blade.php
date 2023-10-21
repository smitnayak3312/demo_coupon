<?php 
include('include/config.php');
@ob_start();
@session_start();
if(!isset($_SESSION['id']) || $_SESSION['id'] == "") 
 {
    header('location:index.php');
 }
 $id=trim($_GET['delivery_man_id']);
 $fetch=mysqli_fetch_array(mysqli_query($conn,"select * from delivery_man where id='".$id."'"));
 if(isset($_POST['submit']))
{    
   $first_name=trim($_POST['first_name']);
   $sur_name=trim($_POST['sur_name']);
   $mobile_number=trim($_POST['mobile_number']);
   $email=trim($_POST['email']);
   $password = md5($_POST["password"]);
   $address=trim($_POST['address']);
    
      $query = "update delivery_man set first_name='".$first_name."',sur_name='".$sur_name."',mobile_number='".$mobile_number."',email='".$email."',password='".$password."',address='".$address."'";
      if(mysqli_query($conn,$query))
      {
          //copy($temp,"img/products/".$newname);
          echo '<script>alert("Deliver Man Create successfully");</script>';
          echo '<script>window.location.href = "delivery_man.php";</script>';
      }
  
   
}

?>
<!DOCTYPE html>
<html lang="en">


<!-- forms-advanced-form.html  21 Nov 2019 03:54:41 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Update Driver</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/css/app.min.css">
  <link rel="stylesheet" href="assets/bundles/bootstrap-daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="assets/bundles/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
  <link rel="stylesheet" href="assets/bundles/select2/dist/css/select2.min.css">
  <link rel="stylesheet" href="assets/bundles/jquery-selectric/selectric.css">
  <link rel="stylesheet" href="assets/bundles/bootstrap-timepicker/css/bootstrap-timepicker.min.css">
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
              <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                  <div class="card-header">
                    <h4>Update Driver</h4>
                  </div>
                  <div class="card-body">
                    <div class="form-group">
                      <label>First Name</label>
                      <input type="text" value="<?=$fetch['first_name'];?>" name="first_name" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <label>Surname</label>
                      <input type="text" value="<?=$fetch['sur_name'];?>" name="sur_name" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <label>Mobile No</label>
                      <input type="text" value="<?=$fetch['mobile_number'];?>" name="mobile_number" class="form-control" required>
                    </div>
                    <div class="form-group">
                     <label>Email</label>
                      <input type="text" value="<?=$fetch['email'];?>" name="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <label>Password</label>
                      <input type="text"  name="password" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <label>Address</label>
                      <input type="text" value="<?=$fetch['address'];?>" name="address" class="form-control" required>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right "></label>
                      <div class="col-sm-12 col-md-7">
                        <button class="btn btn-primary" name="submit">Submit</button>
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
  <script src="assets/bundles/cleave-js/dist/cleave.min.js"></script>
  <script src="assets/bundles/cleave-js/dist/addons/cleave-phone.us.js"></script>
  <script src="assets/bundles/jquery-pwstrength/jquery.pwstrength.min.js"></script>
  <script src="assets/bundles/bootstrap-daterangepicker/daterangepicker.js"></script>
  <script src="assets/bundles/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
  <script src="assets/bundles/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
  <script src="assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
  <script src="assets/bundles/select2/dist/js/select2.full.min.js"></script>
  <script src="assets/bundles/upload-preview/assets/js/jquery.uploadPreview.min.js"></script>
  <script src="assets/bundles/jquery-selectric/jquery.selectric.min.js"></script>
  <!-- Page Specific JS File -->

  <script src="assets/js/page/forms-advanced-forms.js"></script>

  <script src="assets/js/page/create-post.js"></script>
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="assets/js/custom.js"></script>
</body>


<!-- forms-advanced-form.html  21 Nov 2019 03:55:08 GMT -->
</html>