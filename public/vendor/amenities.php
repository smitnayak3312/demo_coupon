<?php 
include('include/config.php');
@ob_start();
@session_start();
if(!isset($_SESSION['id']) || $_SESSION['id'] == "") 
 {
    header('location:login.php');
 }

$getQuery = "SELECT * FROM amenities WHERE id = '".$_SESSION['id']."' ";

  $getResult = mysqli_query($conn,$getQuery);
  
 if(mysqli_num_rows($getResult) > 0){
    $vendorData = mysqli_fetch_array($getResult);
 }

 if(isset($_POST['submit']))
{    
   $parking=trim($_POST['parking']);
   $ac=trim($_POST['ac']);
   $wifi=trim($_POST['wifi']);
   $credit_card=trim($_POST['credit_card']);
   $debit_card=trim($_POST['debit_card']);
   $online_payment=trim($_POST['online_payment']);
   $jain_food=trim($_POST['jain_food']);
   $veg_non_veg=trim($_POST['veg_non_veg']);
   if(mysqli_num_rows($getResult) > 0){

   $query = "update amenities set parking='".$parking."',ac='".$ac."',wifi='".$wifi."',credit_card='".$credit_card."',debit_card='".$debit_card."',online_payment='".$online_payment."',jain_food='".$jain_food."',veg_non_veg='".$veg_non_veg."' where vendorId = '".$_SESSION['id']."'";

      if(mysqli_query($conn,$query))
      {
          echo '<script>alert("Amenities updated");</script>';
          echo '<script>window.location.href = "amenities.php";</script>';
            
      }
      else {
          echo '<script>alert("Failed");</script>';
          echo '<script>window.location.href = "amenities.php";</script>';
      }
   }else{
       $query = "insert into amenities set parking='".$parking."',ac='".$ac."',wifi='".$wifi."',credit_card='".$credit_card."',debit_card='".$debit_card."',online_payment='".$online_payment."',jain_food='".$jain_food."',veg_non_veg='".$veg_non_veg."',vendorId='".$_SESSION['id']."'";

      if(mysqli_query($conn,$query))
      {
          echo '<script>alert("Amenities updated");</script>';
          echo '<script>window.location.href = "amenities.php";</script>';
            
      }
      else {
          echo '<script>alert("Failed");</script>';
          echo '<script>window.location.href = "amenities.php";</script>';
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
  <title>Amenities</title>
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
              <div class="col-12 ">
                <div class="card">
                  <div class="card-header">
                    <h4>Amenities Details</h4>
                  </div>
                  <div class="card-body">

                    <div class="row">
                    <div class="form-group col-md-4">
                      <label>Parking </label>
                      <select name="parking" class="form-control selectric" required>
                    <option value="" <?php if($vendorData['parking'] == ''){?> selected <?php } ?>>Select Amenities Details</option>
                      <option value="true" <?php if($vendorData['parking'] == 'true'){?> selected <?php } ?>>Available</option>
                      <option value="false" <?php if($vendorData['parking'] == 'false'){?> selected <?php } ?>>Not Available</option>
                      </select>
                    </div>
                    <div class="form-group col-md-4">
                      <label>AC</label>
                      <select name="ac" class="form-control selectric" required>
                      <option value="" <?php if($vendorData['ac'] == ''){?> selected <?php } ?>>Select Amenities Details</option>
                      <option value="true" <?php if($vendorData['ac'] == 'true'){?> selected <?php } ?>>Available</option>
                      <option value="false" <?php if($vendorData['ac'] == 'false'){?> selected <?php } ?>>Not Available</option>
                      </select>
                    </div>
                    <div class="form-group col-md-4">
                      <label>WI-FI </label>
                      <select name="wifi" class="form-control selectric" required>
                      <option value="" <?php if($vendorData['wifi'] == ''){?> selected <?php } ?>>Select Amenities Details</option>
                      <option value="true" <?php if($vendorData['wifi'] == 'true'){?> selected <?php } ?>>Available</option>
                      <option value="false" <?php if($vendorData['wifi'] == 'false'){?> selected <?php } ?>>Not Available</option>
                      </select>
                    </div>

                    </div>
                    <div class="row">
                    <div class="form-group col-md-4">
                      <label>Credit Card </label>
                      <select name="credit_card" class="form-control selectric" required>
                    <option value="" <?php if($vendorData['credit_card'] == ''){?> selected <?php } ?>>Select Amenities Details</option>
                      <option value="true" <?php if($vendorData['credit_card'] == 'true'){?> selected <?php } ?>>Available</option>
                      <option value="false" <?php if($vendorData['credit_card'] == 'false'){?> selected <?php } ?>>Not Available</option>
                      </select>
                    </div>
                    <div class="form-group col-md-4">
                      <label>Debit Card</label>
                      <select name="debit_card" class="form-control selectric" required>
                      <option value="" <?php if($vendorData['debit_card'] == ''){?> selected <?php } ?>>Select Amenities Details</option>
                      <option value="true" <?php if($vendorData['debit_card'] == 'true'){?> selected <?php } ?>>Available</option>
                      <option value="false" <?php if($vendorData['debit_card'] == 'false'){?> selected <?php } ?>>Not Available</option>
                      </select>
                    </div>
                    <div class="form-group col-md-4">
                      <label>Online Payment</label>
                      <select name="online_payment" class="form-control selectric" required>
                      <option value="" <?php if($vendorData['online_payment'] == ''){?> selected <?php } ?>>Select Amenities Details</option>
                      <option value="true" <?php if($vendorData['online_payment'] == 'true'){?> selected <?php } ?>>Available</option>
                      <option value="false" <?php if($vendorData['online_payment'] == 'false'){?> selected <?php } ?>>Not Available</option>
                      </select>
                    </div>

                    </div>
                    <div class="row">
                   
                    <div class="form-group col-md-4">
                      <label>Jain Food</label>
                      <select name="jain_food" class="form-control selectric" required>
                      <option value="" <?php if($vendorData['jain_food'] == ''){?> selected <?php } ?>>Select Amenities Details</option>
                      <option value="true" <?php if($vendorData['jain_food'] == 'true'){?> selected <?php } ?>>Available</option>
                      <option value="false" <?php if($vendorData['jain_food'] == 'false'){?> selected <?php } ?>>Not Available</option>
                      </select>
                    </div>
                     <div class="form-group col-md-4">
                      <label>Veg/ Non-veg</label>
                      <select name="veg_non_veg" class="form-control selectric" >
                    <option value="false" <?php if($vendorData['veg_non_veg'] == 'false'){?> selected <?php } ?>>Select Amenities Details</option>
                      <option value="veg" <?php if($vendorData['veg_non_veg'] == 'veg'){?> selected <?php } ?>>Vegetarian</option>
                      <option value="non_veg" <?php if($vendorData['veg_non_veg'] == 'non_veg'){?> selected <?php } ?>>Non Vegetarian</option>
                      <option value="mix" <?php if($vendorData['veg_non_veg'] == 'mix'){?> selected <?php } ?>>Vegetarian / Non-Vegetarian</option>
                      </select>
                    </div>

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
  <script src="assets/bundles/jquery-selectric/jquery.selectric.min.js"></script>

  <script src="assets/bundles/upload-preview/assets/js/jquery.uploadPreview.min.js"></script>
  <script src="assets/bundles/upload-preview/assets/js/jquery.uploadPreviewTwo.min.js"></script>
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