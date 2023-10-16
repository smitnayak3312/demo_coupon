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
   $issue_type=trim($_POST['issue_type']);  
   $subject=trim($_POST['subject']);
   $message=trim($_POST['message']);  

   $query = "insert into support set vendorId = '".$_SESSION['id']."',issue_type='".$issue_type."',subject='".$subject."',message='".$message."',create_date=now(),type='2'";
   if(mysqli_query($conn,$query))
      {
          //copy($temp,"img/products/".$newname);
          echo '<script>alert("Ticket Create Successfully");</script>';
          echo '<script>window.location.href = "supportlist.php";</script>';
      }else{
          echo '<script>alert("Failed");</script>';
          echo '<script>window.location.href = "supportlist.php";</script>';
      }
    
   
}

?>
<!DOCTYPE html>
<html lang="en">


<!-- create-post.html  21 Nov 2019 04:05:02 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Create Ticket</title>
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
                    <h4>Create Ticket</h4>
                  </div>
                  <div class="card-body">
                     <div class="row">
                     <div class="form-group col-md-6">
                      <label>Issue Tye</label>
                      <select name="issue_type" required class="form-control selectric">
                        <option value="1">Bug</option>
                        <option value="2">Feature</option>
                        <option value="3">Payment Issue</option>
                        <option value="4">User Issue</option>
                        <option value="5">Others</option>
                      </select>
                    </div>
                      <div class="form-group col-md-6">
                      <label>Subject</label>
                      <input type="text" name="subject" required class="form-control">
                      </div>
                      </div>
                      <div class="row">
                      <div class="form-group col-md-12">
                      <label>Message</label>
                      <textarea type="text" name="message" required class="form-control"></textarea>
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