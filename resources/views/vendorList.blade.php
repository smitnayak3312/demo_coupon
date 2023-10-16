<?php
@ob_start();
@session_start();
include('include/config.php');
if(!isset($_SESSION['id']) || $_SESSION['id'] == "") 
{
    header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">


<!-- advance-table.html  21 Nov 2019 03:55:20 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Vendor List</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/css/app.min.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="assets/css/custom.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.css">
  
  <link rel="stylesheet" href="assets/bundles/datatables/datatables.min.css">
  <link rel="stylesheet" href="assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
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
          <div class="section-body">
            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>User List</h4>
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table" id="tableExport">
                        <thead>
                        <tr>
                          <th>#</th>
                          <th>Action</th>
                          <th>Unique Code</th>
                          <th>Vendor Name</th>
                          <th>Vendor Mobile No</th>
                          <th>Vendor Email</th>
                          <th>Business Name</th>
                          <th>Category Name</th>
                          <th>Business Logo Image</th>
                          <th>Business Cover Image</th>
                          <th>Business Mobile No</th>
                          <th>Business Address</th>
                          <th>City</th>
                          <th>State</th>
                          <th>Country</th>
                          <th>Subscription Details</th>
                          <th>Subscription Time</th>
                          <th>Plan Start Date</th>
                          <th>Plan End Date</th>
                          <th>Status</th>
                          <th>Update Date</th>
                          <th>Create Date</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                                                  $no=1;
                                                    $queryuser="select * from vendors order by id asc";
                                                    $queryuserprofile=mysqli_query($conn,$queryuser);
                                                    while($data=mysqli_fetch_array($queryuserprofile))
                                                    {
                      
                                                            ?>
                        <tr>
                          <td><?=$no++;?></td>
                          <td><div class="btn-group">
                          <button class="btn btn-success dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Action
                          </button>
                          <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 35px, 0px); top: 0px; left: 0px; will-change: transform;">
                          <div class="dropdown-title"><?=$data['unique_code'];?></div>
                          <div class="dropdown-title"><?=$data['email'];?></div>
                          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#exampleModal">Reset Password</a>
                          <a class="dropdown-item" href="vendor_detail.php?venId=<?=$data['id'];?>">Edit</a>
                          </div>
                          </div>
                          </td>
                          <td><?=$data['unique_code'];?></td>
                          <td><?=$data['vendor_name'];?></td>
                          <td><?=$data['vendor_mobile'];?></td>
                          <td><?=$data['email'];?></td>
                          <td><?=$data['shop_name'];?></td>
                          <?php 
                          $querycateId="select * from category where id='".$data['categoryId']."'";
                          $querycatePlan=mysqli_query($conn,$querycateId);
                          $cateId=mysqli_fetch_array($querycatePlan);
                          ?>
                          <td><?=$cateId['name'];?></td>
                          <td><img alt="image" src="vendor/image/shop_logo/<?=$data['shop_logo'];?>" class="mr-3 user-img-radious-style user-list-img" width="50px" height="50px"></td>
                          <td><img alt="image" src="vendor/image/shop_cover/<?=$data['shop_cover'];?>" class="mr-3 user-img-radious-style user-list-img" width="50px" height="50px"></td>
                          <td><?=$data['mobile_no'];?></td>
                          <td><?=$data['address'];?></td>
                          <?php 
                          //city name get query
                          $querycityId="select * from city where id='".$data['cityId']."'";
                          $querycityPlan=mysqli_query($conn,$querycityId);
                          $citiesId=mysqli_fetch_array($querycityPlan);
                          //state name get query
                          $querystateId="select * from states where id='".$data['stateId']."'";
                          $querystatePlan=mysqli_query($conn,$querystateId);
                          $staId=mysqli_fetch_array($querystatePlan);
                          //country name get query
                          $querycountryId="select * from countries where id='".$data['countryId']."'";
                          $querycountryPlan=mysqli_query($conn,$querycountryId);
                          $counId=mysqli_fetch_array($querycountryPlan);

                          //subscription details get query
                          $queryPlan="select * from vendor_subscription where id='".$data['subsciptionId']."'";
                          $queryPlanDetails=mysqli_query($conn,$queryPlan);
                          $dataPlan=mysqli_fetch_array($queryPlanDetails);
                          ?>
                          <td><?=$citiesId['name'];?></td>
                          <td><?=$staId['name'];?></td>
                          <td><?=$counId['name'];?></td>
                          <td>
                          Plan name :<?=$dataPlan['name'];?><br>
                          Description :<?=$dataPlan['description'];?><br>
                          Amount :<?=$dataPlan['amount'];?><br>
                          Day :<?=$dataPlan['day'];?><br>
                          </td>
                          <td><?=$data['subs_time'];?></td>
                          <td><?=$data['plan_start_date'];?></td>
                          <td><?=$data['plan_end_date'];?></td>
                          <td><?php 
                          if($data['status']=="1") 
  
                          echo 
                          "<a href=activate.php?user_id=".$data['id']." class='btn btn-icon icon-left btn-success'><i class='fas fa-check'></i>Activate</a>";
                       
                          else 
                          echo 
                          "<a href=deactivate.php?user_id=".$data['id']." class='btn btn-icon icon-left btn-warning'><i class='fas fa-exclamation-triangle'></i>Deactivate</a>";
                           ?></td>
                           <td><?=$data['update_date'];?></td>
                          <td><?=$data['create_date'];?></td>
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
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="formModal"
          aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="formModal">Reset Password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form method="post" enctype="multipart/form-data" action="resetPassword.php">
                  <div class="form-group"><!--style="display: none;"-->
                    <label>Email Id</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                      </div>
                      <input type="email" class="form-control" placeholder="Enter email id" name="email" required />
                    </div>
                  </div>
                  <div class="form-group"><!--style="display: none;"-->
                    <label>Unique Code</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                      </div>
                      <input type="text" class="form-control" placeholder="Ente unique code" name="unique_code" required/>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Enter New Password</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                      </div>
                      <input type="password" class="form-control" required placeholder="Password" name="password">
                    </div>
                  </div>
                  
                  <button type="submit" name="submit" class="btn btn-primary m-t-15 waves-effect">Submit</button>
                </form>
              </div>
            </div>
            
          </div>
        </div>
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


<!-- advance-table.html  21 Nov 2019 03:55:21 GMT -->
</html>