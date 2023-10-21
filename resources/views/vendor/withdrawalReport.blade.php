<?php 
include('include/config.php');
@ob_start();
@session_start();
if(!isset($_SESSION['id']) || $_SESSION['id'] == "") 
 {
    header('location:login.php');
 }
 /*if(isset($_POST['submit']))
{  
   $start_date=trim($_POST['start_date']);  
   $end_date=trim($_POST['end_date']);
   
   $queryuser="select * from orders where orderdate>='".$start_date."' and orderdate<='".$end_date."' AND orderStatus IN ('1','2','3','4','5') order by orderId desc";
    $queryuserprofile=mysqli_query($conn,$queryuser);
  
   
}*/
 
       $queryuser="select * from users where id='0' order by id desc";
       $queryuserprofile=mysqli_query($conn,$queryuser);

  
  if(isset($_POST['submit'])){
   $start_date=trim($_POST['start_date']);  
   $end_date=trim($_POST['end_date']);
   
   $queryuser="select * from users where registerd_date>='".$start_date."' and registerd_date<='".$end_date."'  order by id desc";
    $queryuserprofile=mysqli_query($conn,$queryuser);
  }



?>
<!DOCTYPE html>
<html lang="en">


<!-- advance-table.html  21 Nov 2019 03:55:20 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Withdrawal Report's</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/css/app.min.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">
  
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
      <div class="main-content"><section class="section">
          <form method="post" enctype="multipart/form-data" action="#">
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Withdrawal Report's</h4>
                  </div>
                  <div class="card-body">
                     <div class="row">
                     <div class="form-group col-sm-2">
                      <label>Start Date</label>
                      <input type="date" name="start_date" class="form-control" required>
                    </div>
                    <div class="form-group col-sm-2">
                      <label>End Date</label>
                      <input type="date" name="end_date" class="form-control" required>
                    </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                      <div class="form-group">
                        <button class="btn btn-primary" name="submit">Upload</button>
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
                    <h4>Withdrawal Report's List</h4>
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table" id="tableExport">
                        <thead>
                        <tr>
                          <th>#</th>
                          <th>Image</th>
                          <th>Name</th>
                          <th>Mobile No</th>
                          <th>Email</th>
                          <th>Plan Details</th>
                          <th>Plan Date</th>
                          <th>Own_Referal_Code</th>
                          <th>status</th>
                          <th>Create Date</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                                                  $no=1;
                                                    while($data=mysqli_fetch_array($queryuserprofile))
                                                    {
                      
                                                            ?>
                        <tr>
                          <td><?=$no++;?></td>
                          <td><img alt="image" src="image/users_image/<?=$data['image'];?>" class="mr-3 user-img-radious-style user-list-img" width="50px" height="50px"></td>
                          <td><?=$data['user_name'];?></td>
                          <td><?=$data['mobile_no'];?></td>
                          <td><?=$data['email'];?></td>
                          <?php 
                          $queryPlan="select * from user_subscription where id='".$data['subsciptionId']."'";
                          $queryuserPlan=mysqli_query($conn,$queryPlan);
                          $dataPlan=mysqli_fetch_array($queryuserPlan);
                          ?>
                          <td>
                          Plan name :<?=$dataPlan['name'];?><br>
                          Description :<?=$dataPlan['description'];?><br>
                          Amount :<?=$dataPlan['amount'];?><br>
                          Day :<?=$dataPlan['day'];?><br>
                          </td>
                          <td>
                          Start date :<?=$data['plan_start_date'];?><br>
                          End Date :<?=$data['plan_end_date'];?><br></td>
                          <td><?=$data['own_referal_code'];?></td>
                          <td><?php 
                          if($data['status']=="1") 
  
                          echo 
                          "Activate";
                       
                          else 
                          echo 
                          "Deactivate";
                           ?></td>
                          <td><?=$data['registerd_date'];?></td>
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
  <script src="assets/bundles/jquery-ui/jquery-ui.min.js"></script>
  <!-- Page Specific JS File -->
  <script src="assets/js/page/advance-table.js"></script>
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="assets/js/custom.js"></script>
  
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


<!-- advance-table.html  21 Nov 2019 03:55:21 GMT -->
</html>
        