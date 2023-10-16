<?php 
include('include/config.php');
@ob_start();
@session_start();
if(!isset($_SESSION['id']) || $_SESSION['id'] == "") 
 {
    header('location:login.php');
 }

 $getQuery = "SELECT * FROM vendors WHERE id = '".$_SESSION['id']."' ";

  $getResult = mysqli_query($conn,$getQuery);
  $vendorData = mysqli_fetch_array($getResult);
 
 if(isset($_POST['submit']))
{  

   $shop_name=trim($_POST['shop_name']);
   $categoryId=trim($_POST['categoryId']);
   $mobile_no=trim($_POST['mobile_no']);
   $address=trim($_POST['address']);
   $countryId=trim($_POST['countryId']);
   $stateId=trim($_POST['stateId']);
   $cityId=trim($_POST['cityId']);
   $note=trim($_POST['note']);
   
      $query = "update vendors set shop_name='".$shop_name."',categoryId='".$categoryId."',mobile_no='".$mobile_no."',address='".$address."',countryId='".$countryId."',stateId='".$stateId."',cityId='".$cityId."',note='".$note."' where id = '".$_SESSION['id']."'";

      if(mysqli_query($conn,$query))
      {
          //copy($temp,"img/products/".$newname);
          echo '<script>alert("Bank Detail Update Successfully");</script>';
          echo '<script>window.location.href = "bankDetail.php";</script>';
      }else{
          echo '<script>alert("Failed");</script>';
          echo '<script>window.location.href = "bankDetail.php";</script>';
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
                      <label>Shop Name</label>
                      <input type="text" name="shop_name" value="<?php echo $vendorData['shop_name'];?>" class="form-control" required>
                    </div>
                    <div class="form-group col-md-6">
                      <label>Select Category</label>
                      <select name="categoryId" class="form-control selectric" required>
                      <option value="">--Select Category--</option>
                      <?php
                      $query = "SELECT id,name FROM category where status='1'";
                      $query_run = mysqli_query($conn, $query);

                      while ($row = mysqli_fetch_array($query_run)) {?>
                        <option value='<?php echo $row['id']; ?>' <?php if($vendorData['categoryId'] == $row['id']){?> selected <?php } ?>><?php echo $row['name'];?></option>
                      <?php
                      }

                      ?>
                      </select>
                    </div>
                    
                    </div>

                    <div class="row">
                    
                    <div class="form-group col-md-6">
                      <label>Mobile No</label>
                      <input type="number" name="mobile_no" value="<?php echo $vendorData['mobile_no'];?>" class="form-control" required>
                    </div>
                    <div class="form-group col-md-6">
                      <label>Address</label>
                      <textarea type="text" name="address" class="form-control" required><?php echo $vendorData['address'];?></textarea>
                    </div>

                    </div>

                    <div class="row">
                    <div class="form-group col-md-4">
                      <label>Country</label>
                      <select name="countryId" class="form-control selectric" required>
                      <option value="">--Select Country--</option>
                      <?php
                      $query = "SELECT * FROM countries where id='101' order by name asc";
                      $query_run = mysqli_query($conn, $query);

                      while ($row = mysqli_fetch_array($query_run)) {?>
                        <option value='<?php echo $row['id']; ?>' <?php if($vendorData['countryId'] == $row['id']){?> selected <?php } ?>><?php echo $row['name'];?></option>
                      <?php
                      }

                      ?>
                      </select>
                    </div>
                    <div class="form-group col-md-4">
                      <label>State</label>
                      <select name="stateId" class="form-control selectric" required>
                      <option value="">--Select State--</option>
                      <?php
                      $query = "SELECT * FROM states order by name asc";
                      $query_run = mysqli_query($conn, $query);

                      while ($row = mysqli_fetch_array($query_run)) {?>
                        <option value='<?php echo $row['id']; ?>' <?php if($vendorData['stateId'] == $row['id']){?> selected <?php } ?>><?php echo $row['name'];?></option>
                      <?php
                      }

                      ?>
                      </select>
                    </div>
                    <div class="form-group col-md-4">
                      <label>City</label>
                      <select name="cityId" class="form-control selectric" required>
                      <option value="">--Select City--</option>
                      <?php
                      $query = "SELECT * FROM city order by name asc";
                      $query_run = mysqli_query($conn, $query);

                      while ($row = mysqli_fetch_array($query_run)) {?>
                        <option value='<?php echo $row['id']; ?>' <?php if($vendorData['cityId'] == $row['id']){?> selected <?php } ?>><?php echo $row['name'];?></option>
                      <?php
                      }

                      ?>
                      </select>
                    </div>
                    
                    </div>
                    <div class="row">
                    <div class="form-group col-md-12">
                      <label>Note*</label>
                      <textarea type="text" name="note" class="form-control" required>"<?php echo $vendorData['note'];?></textarea>
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