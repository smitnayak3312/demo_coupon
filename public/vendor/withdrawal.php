<?php 
include('include/config.php');
@ob_start();
@session_start();
if(!isset($_SESSION['id']) || $_SESSION['id'] == "") 
 {
    header('location:login.php');
 }
 $getbankQuery = "SELECT * FROM wallet WHERE vendorId = '".$_SESSION['id']."' ";

  $getbankResult = mysqli_query($conn,$getbankQuery);

  if(mysqli_num_rows($getbankResult) > 0){
    $bankData = mysqli_fetch_array($getbankResult);
    $total_amount = $bankData['total_amount'];
   
 }
 $getBank = "SELECT * FROM bank_detail WHERE vendorId = '".$_SESSION['id']."' ";

  $bankResult = mysqli_query($conn,$getBank);
  if(mysqli_num_rows($bankResult) > 0){
    $dataBank = mysqli_fetch_array($bankResult);
    $bankName = $dataBank['bank_name'];
    $bankacNo = $dataBank['bank_ac_no'];
    $bankIfsc = $dataBank['bank_ifsc'];
    $bankAddress = $dataBank['bank_address'];
    $bankAcHolderName = $dataBank['ac_holder_name'];
   
 }

    $dataBank = mysqli_fetch_array($bankResult);
   
 if(isset($_POST['submit']))
{  
    $query_one = "SELECT * FROM vendor_withdrawal_history where vendorId = '".$_SESSION['id']."' and status='0'";
    $result_one = mysqli_query($conn, $query_one);
    $pending = mysqli_num_rows($result_one);
    if($pending>0) 
    {
          echo '<script>alert("Already Requested");</script>';
          echo '<script>window.location.href = "transactionList.php";</script>';
          exit;
    } 

   $amount=trim($_POST['amount']); 
   $transactionId=rand(111111,999999).time();

   if ($total_amount>=$amount && $amount>=100) {

   $tranHistory = "insert into vendor_withdrawal_history set vendorId='".$_SESSION['id']."',bank_name='".$bankName."',bank_ifsc='".$bankIfsc."',bank_address='".$bankAddress."',bank_ac_no='".$bankacNo."',ac_holder_name='".$bankAcHolderName."',transactionId='".$transactionId."',amount='".$amount."',type='Debit'";

   $query = "update wallet set total_amount=total_amount-'".$amount."' where vendorId = '".$_SESSION['id']."'";

   if(mysqli_query($conn,$query)&&mysqli_query($conn,$tranHistory))
      {
          //copy($temp,"img/products/".$newname);
          echo '<script>alert("Withdrawal Request successfully");</script>';
          echo '<script>window.location.href = "transactionList.php";</script>';
      }else{
          echo '<script>alert("Failed");</script>';
          echo '<script>window.location.href = "withdrawal.php";</script>';

    }
  }else{
          echo '<script>alert("Low Wallet Balance");</script>';
          echo '<script>window.location.href = "withdrawal.php";</script>';
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
                    <h4></h4>
                  </div>
                  <div class="form-group">
                      <div class="col-6">
                       
                    <?php if ($total_amount>=500) { ?>
                    <h3>Wallet Balance :   <lable style="color: green;"><?php echo $total_amount;?> INR</lable></h3>
                    <?php } else {?>
                    <h3>Wallet Balance :   <lable style="color: red;"><?php echo $total_amount;?> INR</lable></h3>
                    <?php } ?>
                    <ol>
                      <li>Minimum withdrawal amount is 100 INR. </li>
                      <li>Please Add First Your Bank details</li>
                      <li>Note* 3</li>
                    </ol>
                    </div>
                    </div>
                  <div class="card-body">
                     <div class="row">
                     <div class="form-group col-md-6">
                      <label>Amount</label>
                      <input type="number" min="100" name="amount" class="form-control">
                      </div>
                      </div>
                      <?php if(mysqli_num_rows($bankResult) > 0) { ?>
                      <div class="form-group col-md-5">
                      <label class="col-form-label text-md-right "></label>
                        <button class="btn btn-primary" name="submit">Submit</button>
                      </div>
                      <?php } else { ?>
                      <div class="form-group col-md-5">
                      <h5><lable style="color: red;">*Please enter bank details first!</lable></h5>
                      </div>
                    <?php } ?>
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