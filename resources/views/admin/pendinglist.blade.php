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
  <title>Pending List</title>
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
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Pending List</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                        <thead>
                          <tr>
                            <th class="text-center">
                              #
                            </th>
                            <th>Order Id</th>
                            <th>User Name</th>
                            <th>Total Amount</th>
                            <th>Payment Status</th>
                            <th>Status</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php
                                                  $no=1;
                                                    $queryuser="select orderId,userId,paymentStatus,finalTotal,address,orderStatus from orders where orderStatus=1 order by orderId desc";
                                                    $queryuserprofile=mysqli_query($conn,$queryuser);
                                                    while($data=mysqli_fetch_array($queryuserprofile))
                                                    {
                      
                                                            ?>
                        <tr>
                          <td><?=$no++;?></td>
                          <td><?=$data['orderId'];?></td>
                          <?php 
                          $id=trim($data['userId']);
                          $fetch=mysqli_fetch_array(mysqli_query($conn,"select * from users where id='".$id."'")); 
                          ?>
                          <td><?=$fetch['name'];?></td>
                          <td><?=$data['finalTotal'];?></td>
                          <td><?php 
                          if($data['paymentStatus']=="1"){ 
                           echo "<div class='badge badge-pill badge-success mb-1'>Paid</div>";
                          }elseif ($data['paymentStatus']=="0") {
                           echo "<div class='badge badge-pill badge-danger mb-1'>UnPaid</div>";
                          }?>
                          </td>
                          <td><?php 
                          if($data['orderStatus']=="1"){ 
                           echo "<div class='badge badge-pill badge-warning mb-1'>Pending</div>";
                          }elseif ($data['orderStatus']=="2") {
                           echo "<div class='badge badge-pill badge-info mb-1'>Accept</div>";
                          }
                          elseif ($data['orderStatus']=="3") {
                           echo "<div class='badge badge-pill badge-primary mb-1 '>Processing</div>";
                          }
                          elseif ($data['orderStatus']=="4") {
                           echo "<div class='badge badge-pill badge-primary mb-1'>Out Of Delivery</div>";
                          }
                          elseif ($data['orderStatus']=="5") {
                           echo "<div class='badge badge-pill badge-success mb-1 '>Completed</div>";
                          }
                          elseif ($data['orderStatus']=="6") {
                           echo "<div class='badge badge-pill badge-danger mb-1 '>Rejected</div>";
                          }

                          ?></td>
                          <td><a href="pending.php?oid=<?=$data['orderId'];?>" class="btn btn-primary">Edit</a></td>
                          
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
        