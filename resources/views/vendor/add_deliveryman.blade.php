<?php 
include('include/config.php');
@ob_start();
@session_start();
if(!isset($_SESSION['id']) || $_SESSION['id'] == "") 
 {
    header('location:index.php');
 }
 if(isset($_POST['submit']))
{    
   $first_name=trim($_POST['first_name']);
   $sur_name=trim($_POST['sur_name']);
   $mobile_number=trim($_POST['mobile_number']);
   $email=trim($_POST['email']);
   $password = md5($_POST["password"]);
   $address=trim($_POST['address']);
  
   $newname='';
   $newname_two='';
   $newname_three='';
   $flag=1;

    if($_FILES['image']['name'] != '' || $_FILES['image_two']['name'] != ''|| $_FILES['image_three']['name'] != '')
  {
        $filename=$_FILES['image']['name'];
        $size=$_FILES['image']['size'];
        $temp=$_FILES['image']['tmp_name'];
        $type=$_FILES['image']['type'];
        $ext=strtolower(end(explode('.',$filename)));
        $extension=array("jpeg","jpg","png");
        $newname=rand().'.'.$ext;
        
        $filename_two=$_FILES['image_two']['name'];
        $size=$_FILES['image_two']['size'];
        $temp_two=$_FILES['image_two']['tmp_name'];
        $type=$_FILES['image_two']['type'];
        $ext_two=strtolower(end(explode('.',$filename_two)));
        $extension=array("jpeg","jpg","png");
        $newname_two=rand().'.'.$ext_two;

        $filename_three=$_FILES['image_three']['name'];
        $size=$_FILES['image_three']['size'];
        $temp_three=$_FILES['image_three']['tmp_name'];
        $type=$_FILES['image_three']['type'];
        $ext_three=strtolower(end(explode('.',$filename_three)));
        $extension=array("jpeg","jpg","png");
        $newname_three=rand().'.'.$ext_three;
        
        if(!in_array($ext,$extension))
        {
            echo '<script>alert("please select Jpeg,Jpg,Png image");</script>';
            $flag=0;
        }else
        if($size > 5120000)
        {
            echo '<script>alert("please upload below 5mb");</script>';
            $flag=0;
        }else
        {
            move_uploaded_file($temp,"image/driver_image/".$newname);
             move_uploaded_file($temp_two,"image/driver_image/".$newname_two);
             move_uploaded_file($temp_three,"image/driver_image/".$newname_three);
          
            $flag=1;
        } 
  }
 

  if($flag==1)
  { 
        
      $query = "insert into delivery_man set first_name='".$first_name."',sur_name='".$sur_name."',mobile_number='".$mobile_number."',email='".$email."',password='".$password."',address='".$address."',license_image='".$newname."',driver_image='".$newname_two."',vehicle_image='".$newname_three."'";
      if(mysqli_query($conn,$query))
      {
          //copy($temp,"img/products/".$newname);
          echo '<script>alert("Deliver Man Create successfully");</script>';
          echo '<script>window.location.href = "delivery_man.php";</script>';
      }
  }
   
}

?>
<!DOCTYPE html>
<html lang="en">


<!-- forms-advanced-form.html  21 Nov 2019 03:54:41 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Create Driver</title>
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
                    <h4>Create Driver</h4>
                  </div>
                  <div class="card-body">
                    <div class="form-group">
                      <label>First Name</label>
                      <input type="text" name="first_name" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <label>Surname</label>
                      <input type="text" name="sur_name" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <label>Mobile No</label>
                      <input type="text" name="mobile_number" class="form-control" required>
                    </div>
                    <div class="form-group">
                     <label>Email</label>
                      <input type="text" name="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <label>Password</label>
                      <input type="text" name="password" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <label>Address</label>
                      <input type="text" name="address" class="form-control" required>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Driver Image(Required)</label>
                      <div class="col-sm-12 col-md-7">
                        <div id="image-preview" class="image-preview">
                          <label for="image-upload" id="image-label">Choose File</label>
                          <input type="file" name="image_two" id="image-upload" required />
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                       <label>License Image</label>
                      <input type="file" name="image" class="form-control">
                    </div>
                    <div class="form-group">
                       <label>Vehicle Image</label>
                      <input type="file" name="image_three" class="form-control">
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
      <footer class="main-footer">
        <div class="footer-left">
          <a href="#">Star Panel Developers</a></a>
        </div>
        <div class="footer-right">
        </div>
      </footer>
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