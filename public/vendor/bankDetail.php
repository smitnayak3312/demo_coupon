<?php 
include('include/config.php');
@ob_start();
@session_start();
if(!isset($_SESSION['id']) || $_SESSION['id'] == "") 
 {
    header('location:login.php');
 }
 $getbankQuery = "SELECT * FROM bank_detail WHERE vendorId = '".$_SESSION['id']."' ";

  $getbankResult = mysqli_query($conn,$getbankQuery);

  if(mysqli_num_rows($getbankResult) > 0){
    $bankData = mysqli_fetch_array($getbankResult);
    $ac_holder_nameData = $bankData['ac_holder_name'];
    $bank_nameData = $bankData['bank_name'];
    $bank_ac_noData = $bankData['bank_ac_no'];
    $bank_ifscData = $bankData['bank_ifsc'];
    $bank_addressData = $bankData['bank_address'];
    $mobile_noData = $bankData['mobile_no'];
   
 }
 
 if(isset($_POST['submit']))
{  

   if(mysqli_num_rows($getbankResult) > 0){ 
   $ac_holder_name=trim($_POST['ac_holder_name']);  
   $bank_name=trim($_POST['bank_name']);
   $bank_ac_no=trim($_POST['bank_ac_no']);  
   $bank_ifsc=trim($_POST['bank_ifsc']);
   $bank_address=trim($_POST['bank_address']);  
   $mobile_no=trim($_POST['mobile_no']);

   $query = "update bank_detail set ac_holder_name='".$ac_holder_name."',bank_name='".$bank_name."',bank_ac_no='".$bank_ac_no."',bank_ifsc='".$bank_ifsc."',bank_address='".$bank_address."',mobile_no='".$mobile_no."',update_date=now() where vendorId = '".$_SESSION['id']."'";
   if(mysqli_query($conn,$query))
      {
          //copy($temp,"img/products/".$newname);
          echo '<script>alert("Bank Detail Update Successfully");</script>';
          echo '<script>window.location.href = "bankDetail.php";</script>';
      }else{
          echo '<script>alert("Failed");</script>';
          echo '<script>window.location.href = "bankDetail.php";</script>';
      }
    }else{
      $ac_holder_name=trim($_POST['ac_holder_name']);  
   $bank_name=trim($_POST['bank_name']);
   $bank_ac_no=trim($_POST['bank_ac_no']);  
   $bank_ifsc=trim($_POST['bank_ifsc']);
   $bank_address=trim($_POST['bank_address']);  
   $mobile_no=trim($_POST['mobile_no']);

   $query = "insert into bank_detail set ac_holder_name='".$ac_holder_name."',bank_name='".$bank_name."',bank_ac_no='".$bank_ac_no."',bank_ifsc='".$bank_ifsc."',bank_address='".$bank_address."',mobile_no='".$mobile_no."',vendorId = '".$_SESSION['id']."'";
   if(mysqli_query($conn,$query))
      {
          //copy($temp,"img/products/".$newname);
          echo '<script>alert("Bank Detail Add Successfully");</script>';
          echo '<script>window.location.href = "bankDetail.php";</script>';
      }else{
          echo '<script>alert("Failed");</script>';
          echo '<script>window.location.href = "bankDetail.php";</script>';
      }


    }
   
}

?>
<!DOCTYPE html>
<html lang="en">


<!-- create-post.html  21 Nov 2019 04:05:02 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Edit Bank Detail</title>
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
                    <h4>Edit Bank Details</h4>
                  </div>
                  <div class="card-body">
                     <div class="row">
                     <div class="form-group col-md-6">
                      <label>Account Holder Name (Same As Passbook Name)</label>
                      <input type="text" name="ac_holder_name" value="<?php echo $ac_holder_nameData;?>" class="form-control">
                      </div>
                      <div class="form-group col-md-6">
                      <label>Bank Name</label>
                      <input type="text" name="bank_name" value="<?php echo $bank_nameData;?>"  class="form-control">
                      </div>
                      </div>
                      <div class="row">
                     <div class="form-group col-md-6">
                      <label>Bank Account No</label>
                      <input type="text" name="bank_ac_no" value="<?php echo $bank_ac_noData;?>"  class="form-control">
                      </div>
                      <div class="form-group col-md-6">
                      <label>Bank IFSC Code</label>
                      <input type="text" name="bank_ifsc" value="<?php echo $bank_ifscData;?>" class="form-control">
                      </div>
                      </div>
                      <div class="row">
                     <div class="form-group col-md-6">
                      <label>Bank Address</label>
                      <textarea type="text" name="bank_address" class="form-control"><?php echo $bank_addressData;?></textarea>
                      </div>
                      <div class="form-group col-md-6">
                      <label>Mobile No</label>
                      <input type="text" name="mobile_no" value="<?php echo $mobile_noData;?>" class="form-control">
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