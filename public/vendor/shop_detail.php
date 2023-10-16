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

   $shopLogo = $vendorData['shop_logo'];
    if($shopLogo != ''){
      $shopLogo = "image/shop_logo/".$shopLogo;
    }

    $shopCover = $vendorData['shop_cover'];
    if($shopCover != ''){
      $shopCover = "image/shop_cover/".$shopCover;
    }

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
          echo '<script>alert("Shop detail updated");</script>';
          echo '<script>window.location.href = "shop_detail.php";</script>';
            
      }
      else {
          echo '<script>alert("Failed ");</script>';
          echo '<script>window.location.href = "shop_detail.php";</script>';
      }
  }

   
if(isset($_POST['logosubmit']))
{    
   $newname='';
   $flag=1;
    if($_FILES['image']['name'] != '')
  {
        $filename=$_FILES['image']['name'];
        $size=$_FILES['image']['size'];
        $temp=$_FILES['image']['tmp_name'];
        $type=$_FILES['image']['type'];
        $ext=strtolower(end(explode('.',$filename)));
        $extension=array("jpeg","jpg","png");
        $newname=rand().'.'.$ext;

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
            move_uploaded_file($temp,"image/shop_logo/".$newname);
            $flag=1;
        } 
  }


      if($flag==1)
  { 
   
      if($newname != ''){
      $query = "update vendors set  shop_logo='".$newname."' where id = '".$_SESSION['id']."'";
    }
      if(mysqli_query($conn,$query))
      {
          echo '<script>alert("Shop detail updated");</script>';
          echo '<script>window.location.href = "shop_detail.php";</script>';
            
      }
      else {
          echo '<script>alert("Failed ");</script>';
          echo '<script>window.location.href = "shop_detail.php";</script>';
      }
  }else{

      echo '<script>alert("Failed ");</script>';
      echo '<script>window.location.href = "shop_detail.php";</script>';

  }

   
}
if(isset($_POST['coversubmit']))
{    
   $newname='';
   $flag=1;
    if($_FILES['image']['name'] != '')
  {
        $filename=$_FILES['image']['name'];
        $size=$_FILES['image']['size'];
        $temp=$_FILES['image']['tmp_name'];
        $type=$_FILES['image']['type'];
        $ext=strtolower(end(explode('.',$filename)));
        $extension=array("jpeg","jpg","png");
        $newname=rand().'.'.$ext;

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
            move_uploaded_file($temp,"image/shop_cover/".$newname);
            $flag=1;
        } 
  }


      if($flag==1)
  { 
   
      if($newname != ''){
      $query = "update vendors set  shop_cover='".$newname."' where id = '".$_SESSION['id']."'";
    }
      if(mysqli_query($conn,$query))
      {
          echo '<script>alert("Shop detail updated");</script>';
          echo '<script>window.location.href = "shop_detail.php";</script>';
            
      }
      else {
          echo '<script>alert("Failed ");</script>';
          echo '<script>window.location.href = "shop_detail.php";</script>';
      }
  }else{

      echo '<script>alert("Failed ");</script>';
      echo '<script>window.location.href = "shop_detail.php";</script>';

  }

   
}

?>

<!DOCTYPE html>
<html lang="en">


<!-- forms-advanced-form.html  21 Nov 2019 03:54:41 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Shop Details</title>
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
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.css">
  
  <link rel="stylesheet" href="assets/bundles/datatables/datatables.min.css">
  <link rel="stylesheet" href="assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
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
                    <h4>Shop Details</h4>
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
                    <div class="form-group col-md-4">
                      <label>Days</label>
                      <select name="day" class="form-control selectric" multiple required>
                      <option value="">--Select Days--</option>
                      <option value="1">Monday</option>
                      <option value="2">Tuesday</option>
                      <option value="3">Wednesday</option>
                      <option value="4">Thursday</option>
                      <option value="5">Friday</option>
                      <option value="6">Saturday</option>
                      <option value="7">Sunday</option>
                      </select>
                    </div>
                    <div class="form-group col-md-4">
                      <label>Opening Time</label>
                       <input type="time" name="opening_time" class="form-control" required>
                    </div>
                    <div class="form-group col-md-4">
                      <label>Closing Time</label>
                       <input type="time" name="closing_time" class="form-control" required>
                    </div>
                    
                    </div>
                    <div class="row">
                    <div class="form-group col-md-12">
                      <label>Note*</label>
                      <textarea type="text" name="note" class="form-control" required><?php echo $vendorData['note'];?></textarea>
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
        <section class="section">
           
          <div class="section-body">
            <div class="row">
              <div class="col-6 ">
                <div class="card">
                  <div class="card-header">
                    <h4>Change Shop Logo</h4>
                  </div>
                   <form method="post" enctype="multipart/form-data" action="#">
                  <div class="card-body">
                   
                    <div class="row">
                      <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Shop Logo</label>
                      <div class="col-sm-12 col-md-7">
                        <div id="image-preview" class="image-preview" style='background: url("<?php echo $shopLogo;?>"); background-position: center center; background-size: cover;' >
                          <label for="image-upload" id="image-label">Choose File</label>
                          <input type="file" name="image" id="image-upload" <?php if($shopLogo == ""){?> required <?php } ?> />
                        </div>
                      </div>
                    </div>

                    </div>
                    

                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right "></label>
                      <div class="col-sm-12 col-md-7">
                        <button class="btn btn-primary" name="logosubmit">Upload</button>
                      </div>
                    </div>
                    </form>
                  </div>
                </div>
            </div>
            <div class="col-6 ">
                <div class="card">
                  <div class="card-header">
                    <h4>Change Cover Image</h4>
                  </div>
                  <form method="post" enctype="multipart/form-data" action="#">
                  <div class="card-body">

                    <div class="row">

                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Cover Image</label>
                      <div class="col-sm-12 col-md-7">
                        <div id="image-preview" class="image-preview" style='background: url("<?php echo $shopCover;?>"); background-position: center center; background-size: cover;' >
                          <label for="image-upload" id="image-label">Choose File</label>
                          <input type="file" name="image" id="image-upload" <?php if($shopCover == ""){?> required <?php } ?> />
                        </div>
                      </div>
                    </div>

                    </div>

                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right "></label>
                      <div class="col-sm-12 col-md-7">
                        <button class="btn btn-primary" name="coversubmit">Upload</button>
                      </div>
                    </div>
                  </div>
                  </form>
                </div>
            </div>
          </div>
          </div>
        </form>
        </section>
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Transaction History List</h4>
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table" id="tableExport">
                        <thead>
                        <tr>
                          <th>#</th>
                          <!--<th>Image</th>-->
                          <th>Subscription Name</th>
                          <th>Description</th>
                          <th>Amount</th>
                          <th>Order Id</th>
                          <th>Razorpay Payment Id</th>
                          <th>Purchase Date</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                                                  $no=1;
                                                    $queryuser="SELECT * FROM `transaction_history_vendor` where vendorId='".$_SESSION['id']."' ORDER BY purchase_date DESC ";
                                                    $queryuserprofile=mysqli_query($conn,$queryuser);
                                                    while($data=mysqli_fetch_array($queryuserprofile))
                                                    {
                      
                                                            ?>
                        <tr>
                          <td><?=$no++;?></td>
                          <?php $fetchPlan=mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM `vendor_subscription` where id='". $data['subsciptionId']."' "));?>
                          <td><?=$fetchPlan['name'];?></td>
                          <td><?=$fetchPlan['description'];?></td>
                          <td><?=$fetchPlan['amount'];?></td>
                          <td><?=$data['order_id'];?></td>
                          <td><?=$data['razorpay_payment_id'];?></td>
                          <td><?=$data['purchase_date'];?></td>
                        </tr>
                        <?php } ?>
                      </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              
            </div>
          </div>
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
  
  <!-- New Added-->
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.js"></script>
  
   <script src="assets/bundles/datatables/datatables.min.js"></script>
  <script src="assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
  <script src="assets/bundles/datatables/export-tables/dataTables.buttons.min.js"></script>
  <script src="assets/bundles/datatables/export-tables/buttons.flash.min.js"></script>
  <script src="assets/bundles/datatables/export-tables/jszip.min.js"></script>
  <script src="assets/bundles/datatables/export-tables/pdfmake.min.js"></script>
  <script src="assets/bundles/datatables/export-tables/vfs_fonts.js"></script>
  <script src="assets/bundles/datatables/export-tables/buttons.print.min.js"></script>
  <script src="assets/js/page/datatables.js"></script>
  
</body>


<!-- forms-advanced-form.html  21 Nov 2019 03:55:08 GMT -->
</html>