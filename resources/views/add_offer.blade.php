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
   $offerCode=trim($_POST['offerCode']);
   $discount=trim($_POST['discount']);
   $min_price=trim($_POST['min_price']);
   $offer_detail=trim($_POST['offer_detail']);
   $user_limit=trim($_POST['user_limit']);
   $start_date=trim($_POST['start_date']);
   $end_date=trim($_POST['end_date']);

   $ucount=mysqli_num_rows(mysqli_query($conn,"select * from offers where  offerCode='".$offerCode."'"));
    
   if($ucount >= 1)
    {
        echo '<script>alert("Offer Already Created Please Check Offer Code ");</script>';
          echo '<script>window.location.href = "add_offer.php";</script>';
    }
    else{
  
   $query = "insert into offers set offerCode='".$offerCode."',discount='".$discount."',offer_detail='".$offer_detail."',min_price='".$min_price."',user_limit='".$user_limit."',start_date='".$start_date."',end_date='".$end_date."'";
      if(mysqli_query($conn,$query))
      {
          //copy($temp,"img/products/".$newname);
          echo '<script>alert("Offer Create successfully");</script>';
          echo '<script>window.location.href = "add_offer.php";</script>';
      }else{
           echo '<script>alert("Failed To create offer");</script>';
          echo '<script>window.location.href = "add_offer.php";</script>';
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
  <title>Create Offer</title>
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
                    <h4>Create Offer</h4>
                  </div>
                  <div class="card-body">
                    <div class="form-group">
                      <label>Offer Code</label>
                      <input type="text" name="offerCode" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <label>Discount(Percentage)</label>
                      <input type="number" name="discount" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <label>Offer Description</label>
                      <input type="text" name="offer_detail" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <label>Min Purchase Price</label>
                      <input type="text" name="min_price" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <label>Limit For Same User</label>
                      <input type="number" name="user_limit" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <label>Start Date</label>
                      <input type="date" name="start_date" class="form-control" required> <!--type="datetime-local"-->
                    </div>
                    <div class="form-group">
                      <label>End Date</label>
                      <input type="date" name="end_date" class="form-control" required>
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