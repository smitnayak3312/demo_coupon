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
   
   $day=trim($_POST['day']);
   $start_time=trim($_POST['start_time']);
   $end_time=trim($_POST['end_time']);
   
        
      $query = "insert into timing set day='".$day."',start_time='".$start_time."',end_time='".$end_time."',vendorId='".$_SESSION['id']."'";
      if(mysqli_query($conn,$query))
      {
                echo '<script>alert("Shop Time Successfully Added");</script>';
                echo '<script>window.location.href = "timing.php";</script>';
            
      }
      else {
                echo '<script>alert("Shop Time Successfully Added");</script>';
                echo '<script>window.location.href = "timing.php";</script>';
      }
  }

   

?>

<!DOCTYPE html>
<html lang="en">


<!-- forms-advanced-form.html  21 Nov 2019 03:54:41 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Shop Time Management</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/css/app.min.css">
  <link rel="stylesheet" href="assets/bundles/bootstrap-daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="assets/bundles/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
  <link rel="stylesheet" href="assets/bundles/select2/dist/css/select2.min.css">
  <link rel="stylesheet" href="assets/bundles/jquery-selectric/selectric.css">
  <link rel="stylesheet" href="assets/bundles/bootstrap-timepicker/css/bootstrap-timepicker.min.css">
  <link rel="stylesheet" href="assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.css">
  
  <link rel="stylesheet" href="assets/bundles/datatables/datatables.min.css">
  <link rel="stylesheet" href="assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
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
                    <h4>Add Time</h4>
                  </div>
                  <div class="card-body">
                    <div class="row">
                    <div class="form-group col-md-4">
                      <label>Select Day</label>
                      <select name="day" class="form-control selectric" required>
                      <option value="Monday">Monday</option>
                      <option value="Tuesday">Tuesday</option>
                      <option value="Wednesday">Wednesday</option>
                      <option value="Thursday">Thursday</option>
                      <option value="Friday">Friday</option>
                      <option value="Saturday">Saturday</option>
                      <option value="Sunday">Sunday</option>
                      </select>
                      </div>
                    <div class="form-group col-md-4">
                      <label>Description</label>
                       <input type="time" name="start_time" class="form-control" required>
                    </div>
                    <div class="form-group col-md-4">
                      <label>Description</label>
                       <input type="time" name="end_time" class="form-control" required>
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
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                   <h4>Shop Time Management List</h4>
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table" id="tableExport">
                        <thead>
                        <tr>
                          <th style="width:10%">SR NO</th>
                          <th>Day</th>
                          <th>Start Time</th>
                          <th>End Time</th>
                          <th>Edit</th>
                          <th>Delete</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                                                  $no=1;
                                                    $queryuser="select * from timing where vendorId='".$_SESSION['id']."'";
                                                    $queryuserprofile=mysqli_query($conn,$queryuser);
                                                    while($data=mysqli_fetch_array($queryuserprofile))
                                                    {
                      
                                                            ?>
                        <tr>
                          <td><?=$no++;?></td>
                          <td><?=$data['day'];?></td>
                          <td><?=$data['start_time'];?></td>
                          <td><?=$data['end_time'];?></td>
                          <td><a href="editTiming.php?edittimeId=<?=md5($data['id']);?>" class="btn btn-primary">Edit</a></td>
                          <td><a href="delete.php?edittimeId=<?=md5($data['id']);?>" class="btn btn-danger">Delete</a></td>
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
  <!-- Custom JS File -->
  
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
  
<!--<script>
    function addpercentage(){
     var price = $("#price").val();
     var discount_price = $("#discount_price").val(); 
       var discount_percentage =   (price-discount_price);
    $("#discount_percentage").val(discount_percentage/price*100) 
    }
  </script>-->
  
</body>


<!-- forms-advanced-form.html  21 Nov 2019 03:55:08 GMT -->
</html>