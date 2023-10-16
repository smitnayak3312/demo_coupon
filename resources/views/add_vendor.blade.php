<?php 
include('include/config.php');
@ob_start();
@session_start();
if(!isset($_SESSION['id']) || $_SESSION['id'] == "") 
 {
    header('location:index.php');
 }

?>
<!DOCTYPE html>
<html lang="en">


<!-- forms-advanced-form.html  21 Nov 2019 03:54:41 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Add Vendor</title>
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
           <form method="post" enctype="multipart/form-data" action="pay_vendor.php">
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Add Vendor</h4>
                  </div>
                  <div class="card-body">
                     <div class="row">
                     <div class="form-group col-md-6">
                      <label>Vedor Name</label>
                      <input type="text" name="vendor_name"class="form-control">
                      </div>
                      <div class="form-group col-md-6">
                      <label>Mobile No</label>
                      <input type="number"  name="vendor_mobile" class="form-control">
                      </div>
                      </div>
                      <div class="row">
                     <div class="form-group col-md-6">
                      <label>Email</label>
                      <input type="email" name="email" class="form-control">
                      </div>
                      <div class="form-group col-md-6">
                      <label>Password</label>
                      <input type="password" name="password" class="form-control">
                      </div>
                      </div>
                      <div class="row">
                      <div class="form-group col-md-12">
                      <label>Select Plan</label>
                      <select name="subsciptionIdAmount" class="form-control selectric" required>
                      <option value="">--Select Plan--</option>
                      <?php
                      $query = "SELECT * FROM vendor_subscription where status='1'";
                      $query_run = mysqli_query($conn, $query);

                      while ($row = mysqli_fetch_array($query_run)) {
                      echo "<option value='".$row['id'].",".$row['amount'].",".$row['description']."'>Plan Name :".$row['name']." || Plan Description : ".$row['description']."</option>";
                      }

                      ?>
                      </select>
                      </div>
                      </div>
                      <div class="form-group col-md-5">
                      <label class="col-form-label text-md-right "></label>
                        <button class="btn btn-primary" name="submit">Submit</button>
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