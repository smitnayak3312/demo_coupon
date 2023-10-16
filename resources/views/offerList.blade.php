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
  <title>Offers List</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/css/app.min.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="assets/css/custom.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.css">
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
                    <h4>Offers List</h4>
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table" id="table_id">
                        <thead>
                        <tr>
                          <th>#</th>
                          <th>Coupon Code</th>
                          <th>Discount</th>
                          <th>User Limit Per Use</th>
                          <th>Start date</th>
                          <th>End Date </th>
                          <th>Status</th>
                          <th>Edit</th>
                          <th>Delete</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                                                  $no=1;
                                                    $queryuser="select * from offers order by id desc";
                                                    $queryuserprofile=mysqli_query($conn,$queryuser);
                                                    while($data=mysqli_fetch_array($queryuserprofile))
                                                    {
                      
                                                            ?>
                        <tr>
                          <td><?=$no++;?></td>
                          <td><?=$data['offerCode'];?></td>
                          <td><?=$data['discount'];?>%</td>
                          <td><?=$data['user_limit'];?></td>
                          <td><?=$data['start_date'];?></td>
                          <td><?=$data['end_date'];?></td>
                          
                          <td><?php 
                    if($data['status']=="1") 
  
                        // if a course is active i.e. status is 1 
                        // the toggle button must be able to deactivate 
                        // we echo the hyperlink to the page "deactivate.php"
                        // in order to make it look like a button
                        // we use the appropriate css
                        // red-deactivate
                        // green- activate
                        echo 
                      "<a href=activate.php?offerId=".$data['id']." class='btn btn-icon icon-left btn-success'><i class='fas fa-check'></i>Activate</a>";
                       
                        else 
                        echo 
                         "<a href=deactivate.php?offerId=".$data['id']." class='btn btn-icon icon-left btn-warning'><i class='fas fa-exclamation-triangle'></i>Deactivate</a>";
                        ?></td>
                        <td><a href="edit_offer.php?offerId=<?=$data['id'];?>" class="btn btn-primary">Edit</a></td>
                          <td><a href="delete.php?offerId=<?=$data['id'];?>" class="btn btn-danger">Delete</a></td>
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
  
  <script>$(document).ready( function () {
    $('#table_id').DataTable();
} );</script>
</body>


<!-- advance-table.html  21 Nov 2019 03:55:21 GMT -->
</html>