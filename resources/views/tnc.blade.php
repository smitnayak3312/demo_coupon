<?php 
include('include/config.php');
@ob_start();
@session_start();
if(!isset($_SESSION['id']) || $_SESSION['id'] == "") 
 {
    header('location:login.php');
 }
 if(isset($_POST['submit']))
{    
   $tnc=trim($_POST['tnc']);
  // $image=trim($_POST['image']);

   $query = "update admin set tnc='".$tnc."' where id='1'";
   $final=mysqli_query($conn,$query);
   if($final)
   {
       echo '<script>alert("Terms and condition update successfully");window.location.assign("tnc.php")</script>';
   }else{
    
       echo '<script>alert("Please Try Again Later");window.location.assign("tnc.php")</script>';
   
   }
   
}

 $fetch=mysqli_fetch_array(mysqli_query($conn,"select * from admin where id='1'"));
?>
<!DOCTYPE html>
<html lang="en">


<!-- forms-editor.html  21 Nov 2019 03:55:08 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Terms And Condition</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/css/app.min.css">
  <link rel="stylesheet" href="assets/bundles/summernote/summernote-bs4.css">
  <link rel="stylesheet" href="assets/bundles/codemirror/lib/codemirror.css">
  <link rel="stylesheet" href="assets/bundles/codemirror/theme/duotone-dark.css">
  <link rel="stylesheet" href="assets/bundles/jquery-selectric/selectric.css">
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
                    <h4>Terms & Condition</h4>
                  </div>
                  <div class="card-body">
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Terms & Condition</label>
                      <div class="col-sm-12 col-md-7">
                        <textarea name="tnc" rows="5" cols="5" class="form-control" required><?=$fetch['tnc'];?></textarea>
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
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
  <script src="assets/bundles/summernote/summernote-bs4.js"></script>
  <script src="assets/bundles/codemirror/lib/codemirror.js"></script>
  <script src="assets/bundles/codemirror/mode/javascript/javascript.js"></script>
  <script src="assets/bundles/jquery-selectric/jquery.selectric.min.js"></script>
  <script src="assets/bundles/ckeditor/ckeditor.js"></script>
  <!-- Page Specific JS File -->
  <script src="assets/js/page/ckeditor.js"></script>
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="assets/js/custom.js"></script>
</body>


<!-- forms-editor.html  21 Nov 2019 03:55:16 GMT -->
</html>