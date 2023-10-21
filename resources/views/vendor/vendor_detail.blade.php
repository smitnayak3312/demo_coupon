<?php 
include('include/config.php');
@ob_start();
@session_start();
if(!isset($_SESSION['id']) || $_SESSION['id'] == "") 
 {
    header('location:login.php');
 }
 $venId=$_GET['venId'];

$getQuery = "SELECT * FROM vendors WHERE id = '".$venId."' ";

  $getResult = mysqli_query($conn,$getQuery);
   if(mysqli_num_rows($getResult) > 0){
    $vendorData = mysqli_fetch_array($getResult);
 }
 
 
 $getQueryTwo = "SELECT * FROM amenities WHERE id = '".$venId."' ";

  $getResultTwo = mysqli_query($conn,$getQueryTwo);
  
 if(mysqli_num_rows($getResult) > 0){
    $amenitiesData = mysqli_fetch_array($getResultTwo);
 }
   
if(isset($_POST['vendorSubmit']))
{    
   
   $vendor_name=trim($_POST['vendor_name']);
   $vendor_mobile=trim($_POST['vendor_mobile']);
   $email=trim($_POST['email']);
   
      $query = "update vendors set vendor_name='".$vendor_name."',vendor_mobile='".$vendor_mobile."',email='".$email."' where id = '".$venId."'";
      if(mysqli_query($conn,$query))
      {
                echo '<script>alert("Vendor detail updated");</script>';
          echo '<script>window.location.href = "vendorList.php";</script>';
            
      }
      else {
          echo '<script>alert("Failed");</script>';
          echo '<script>window.location.href = "vendorList.php";</script>';
      }
  

   
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
   
      $query = "update vendors set shop_name='".$shop_name."',categoryId='".$categoryId."',mobile_no='".$mobile_no."',address='".$address."',countryId='".$countryId."',stateId='".$stateId."',cityId='".$cityId."',note='".$note."' where id = '".$venId."'";
      if(mysqli_query($conn,$query))
      {
                echo '<script>alert("Shop detail updated");</script>';
          echo '<script>window.location.href = "vendorList.php";</script>';
            
      }
      else {
          echo '<script>alert("Failed ");</script>';
          echo '<script>window.location.href = "vendorList.php";</script>';
      }
  

   
}

if(isset($_POST['amenities']))
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

   $query = "update amenities set parking='".$parking."',ac='".$ac."',wifi='".$wifi."',credit_card='".$credit_card."',debit_card='".$debit_card."',online_payment='".$online_payment."',jain_food='".$jain_food."',veg_non_veg='".$veg_non_veg."' where vendorId = '".$venId."'";

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
       $query = "insert into amenities set parking='".$parking."',ac='".$ac."',wifi='".$wifi."',credit_card='".$credit_card."',debit_card='".$debit_card."',online_payment='".$online_payment."',jain_food='".$jain_food."',veg_non_veg='".$veg_non_veg."',vendorId='".$venId."'";

      if(mysqli_query($conn,$query))
      {
          echo '<script>alert("Amenities updated");</script>';
          echo '<script>window.location.href = "vendorList.php";</script>';
            
      }
      else {
          echo '<script>alert("Failed");</script>';
          echo '<script>window.location.href = "vendorList.php";</script>';
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
  <title>Vendor Details</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/css/app.min.css">
  <link rel="stylesheet" href="assets/bundles/bootstrap-daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="assets/bundles/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
  <link rel="stylesheet" href="assets/bundles/select2/dist/css/select2.min.css">
  <link rel="stylesheet" href="assets/bundles/jquery-selectric/selectric.css">
  <link rel="stylesheet" href="assets/bundles/bootstrap-timepicker/css/bootstrap-timepicker.min.css">
  <link rel="stylesheet" href="assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">
  <!-- Template CSS -->
   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.css">
  
  <link rel="stylesheet" href="assets/bundles/datatables/datatables.min.css">
  <link rel="stylesheet" href="assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
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
                    <h4>Vendor Details</h4>
                  </div>
                  <div class="card-body">
                    <div class="row">
                    <div class="form-group col-md-6">
                      <label>Vendor Name</label>
                      <input type="text" name="vendor_name" value="<?php echo $vendorData['vendor_name'];?>" class="form-control" required>
                    </div>
                    <div class="form-group col-md-6">
                      <label>Email</label>
                      <input type="email" name="email" value="<?php echo $vendorData['email'];?>" class="form-control" required>
                    </div>
                    </div>
                    <div class="row">
                    <div class="form-group col-md-6">
                      <label>Mobile No</label>
                      <input type="number" name="vendor_mobile" value="<?php echo $vendorData['vendor_mobile'];?>" class="form-control" required>
                    </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right "></label>
                      <div class="col-sm-12 col-md-7">
                        <button class="btn btn-primary" name="vendorSubmit">Submit</button>
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
              <div class="col-6 col-md-6 col-lg-6">
                <div class="card">
                  <div class="card-header">
                    <h4>Coupon History List</h4>
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table" id="tableExport">
                        <thead>
                        <tr>
                          <th>#</th>
                          <!--<th>Image</th>-->
                          <th>User Name</th>
                          <th>Coupon Name</th>
                          <th>Coupon Description</th>
                          <th>Coupon Use No</th>
                          <th>Date</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                                                  $no=1;
                                                    $queryuser="( SELECT CH.id,CH.vendorId,CH.couponId,CH.coupon_name,CH.coupon_description,CH.coupon_use_no,CH.create_date,U.user_name FROM coupon_history CH INNER JOIN users U ON U.id=CH.userId WHERE CH.vendorId='". $venId."' ORDER BY create_date DESC) UNION ALL ( SELECT PAG.id,PAG.vendorId,PAG.couponId,PAG.coupon_name,PAG.coupon_description,PAG.coupon_use_no,PAG.create_date,U.user_name FROM pay_as_you_go_coupon_history PAG INNER JOIN users U ON U.id=PAG.userId WHERE PAG.vendorId='". $venId."' ORDER BY create_date DESC )";
                                                    $queryuserprofile=mysqli_query($conn,$queryuser);
                                                    while($data=mysqli_fetch_array($queryuserprofile))
                                                    {
                      
                                                            ?>
                        <tr>
                          <td><?=$no++;?></td>
                         <!-- <td><img alt="image" src="image/users_image/<?=$data['image'];?>" class="mr-3 user-img-radious-style user-list-img" width="50px" height="50px"></td>-->
                          <td>
                            <?=$data['user_name'];?></td>
                          <td><?=$data['coupon_name'];?></td>
                          <td><?=$data['coupon_description'];?></td>
                          <td><?=$data['coupon_use_no'];?></td>
                          <td><?=$data['create_date'];?></td>
                        </tr>
                        <?php } ?>
                      </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-6 col-md-6 col-lg-6">
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
                                                    $queryuser="SELECT * FROM `transaction_history_vendor` where vendorId='". $venId."' ORDER BY purchase_date DESC ";
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
              
              <div class="col-6 col-md-6 col-lg-6">
                <div class="card">
                  <div class="card-header">
                    <h4>Ameinities</h4>
                  </div>
                  <div class="card-body">
                    <form method="post" enctype="multipart/form-data" action="#">
                    <div class="row">
                    <div class="form-group col-md-4">
                      <label>Parking </label>
                      <select name="parking" class="form-control selectric" required>
                    <option value="" <?php if($amenitiesData['parking'] == ''){?> selected <?php } ?>>Select Amenities Details</option>
                      <option value="true" <?php if($amenitiesData['parking'] == 'true'){?> selected <?php } ?>>Available</option>
                      <option value="false" <?php if($amenitiesData['parking'] == 'false'){?> selected <?php } ?>>Not Available</option>
                      </select>
                    </div>
                    <div class="form-group col-md-4">
                      <label>AC</label>
                      <select name="ac" class="form-control selectric" required>
                      <option value="" <?php if($amenitiesData['ac'] == ''){?> selected <?php } ?>>Select Amenities Details</option>
                      <option value="true" <?php if($amenitiesData['ac'] == 'true'){?> selected <?php } ?>>Available</option>
                      <option value="false" <?php if($amenitiesData['ac'] == 'false'){?> selected <?php } ?>>Not Available</option>
                      </select>
                    </div>
                    <div class="form-group col-md-4">
                      <label>WI-FI </label>
                      <select name="wifi" class="form-control selectric" required>
                      <option value="" <?php if($amenitiesData['wifi'] == ''){?> selected <?php } ?>>Select Amenities Details</option>
                      <option value="true" <?php if($amenitiesData['wifi'] == 'true'){?> selected <?php } ?>>Available</option>
                      <option value="false" <?php if($amenitiesData['wifi'] == 'false'){?> selected <?php } ?>>Not Available</option>
                      </select>
                    </div>

                    </div>
                    <div class="row">
                    <div class="form-group col-md-4">
                      <label>Credit Card </label>
                      <select name="credit_card" class="form-control selectric" required>
                    <option value="" <?php if($amenitiesData['credit_card'] == ''){?> selected <?php } ?>>Select Amenities Details</option>
                      <option value="true" <?php if($amenitiesData['credit_card'] == 'true'){?> selected <?php } ?>>Available</option>
                      <option value="false" <?php if($amenitiesData['credit_card'] == 'false'){?> selected <?php } ?>>Not Available</option>
                      </select>
                    </div>
                    <div class="form-group col-md-4">
                      <label>Debit Card</label>
                      <select name="debit_card" class="form-control selectric" required>
                      <option value="" <?php if($amenitiesData['debit_card'] == ''){?> selected <?php } ?>>Select Amenities Details</option>
                      <option value="true" <?php if($amenitiesData['debit_card'] == 'true'){?> selected <?php } ?>>Available</option>
                      <option value="false" <?php if($amenitiesData['debit_card'] == 'false'){?> selected <?php } ?>>Not Available</option>
                      </select>
                    </div>
                    <div class="form-group col-md-4">
                      <label>Online Payment</label>
                      <select name="online_payment" class="form-control selectric" required>
                      <option value="" <?php if($amenitiesData['online_payment'] == ''){?> selected <?php } ?>>Select Amenities Details</option>
                      <option value="true" <?php if($amenitiesData['online_payment'] == 'true'){?> selected <?php } ?>>Available</option>
                      <option value="false" <?php if($amenitiesData['online_payment'] == 'false'){?> selected <?php } ?>>Not Available</option>
                      </select>
                    </div>

                    </div>
                    <div class="row">
                   
                    <div class="form-group col-md-4">
                      <label>Jain Food</label>
                      <select name="jain_food" class="form-control selectric" required>
                      <option value="" <?php if($amenitiesData['jain_food'] == ''){?> selected <?php } ?>>Select Amenities Details</option>
                      <option value="true" <?php if($amenitiesData['jain_food'] == 'true'){?> selected <?php } ?>>Available</option>
                      <option value="false" <?php if($amenitiesData['jain_food'] == 'false'){?> selected <?php } ?>>Not Available</option>
                      </select>
                    </div>
                     <div class="form-group col-md-4">
                      <label>Veg/ Non-veg</label>
                      <select name="veg_non_veg" class="form-control selectric" >
                    <option value="false" <?php if($amenitiesData['veg_non_veg'] == 'false'){?> selected <?php } ?>>Select Amenities Details</option>
                      <option value="veg" <?php if($amenitiesData['veg_non_veg'] == 'veg'){?> selected <?php } ?>>Vegetarian</option>
                      <option value="non_veg" <?php if($amenitiesData['veg_non_veg'] == 'non_veg'){?> selected <?php } ?>>Non Vegetarian</option>
                      <option value="mix" <?php if($amenitiesData['veg_non_veg'] == 'mix'){?> selected <?php } ?>>Vegetarian / Non-Vegetarian</option>
                      </select>
                    </div>

                    </div>


                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right "></label>
                      <div class="col-sm-12 col-md-7">
                        <button class="btn btn-primary" name="amenities">Submit</button>
                      </div>
                    </div>
                     </form>
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
  <!-- Page Specific JS File -->
  <script src="assets/js/page/forms-advanced-forms.js"></script>
  <script src="assets/js/page/create-post.js"></script>
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="assets/js/custom.js"></script>
  <script src="assets/js/app.min.js"></script>
  <!-- JS Libraies -->
  <script src="assets/bundles/jquery-ui/jquery-ui.min.js"></script>
  <!-- Page Specific JS File -->
  <script src="assets/js/page/advance-table.js"></script>
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="assets/js/custom.js"></script>
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