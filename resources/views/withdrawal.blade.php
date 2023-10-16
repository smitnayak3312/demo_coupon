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
  <title>Wallet</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/css/app.min.css">
  <link rel="stylesheet" href="assets/bundles/prism/prism.css">
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
                    <h4>Transaction List</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                        <thead>
                          <tr>
                            <th class="text-center">
                              #
                            </th>
                            <th>Transaction Id</th>
                            <th>Type</th>
                            <th>Bank Details</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Action</th>
                            <th>Date</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php
                                                  $no=1;
                                                    $queryuser="select * from vendor_withdrawal_history where status='0' order by id desc";
                                                    $queryuserprofile=mysqli_query($conn,$queryuser);
                                                    while($data=mysqli_fetch_array($queryuserprofile))
                                                    {
                      
                                                            ?>
                        <tr>
                          <td><?=$no++;?></td>
                          <td onkeyup='swap_val(this.value);'><?=$data['transactionId'];?></td>
                          <td><?=$data['type'];?></td>
                          <td>
                          Ac Holder Name :<?=$data['ac_holder_name'];?><br>
                          Bank Name :<?=$data['bank_name'];?><br>
                          Bank A/C :<?=$data['bank_ac_no'];?><br>
                          Bank IFSC :<?=$data['bank_ifsc'];?><br>
                          Bank Address :<?=$data['bank_address'];?><br></td>
                          <td><?=$data['amount'];?></td>

                          
                          <td><?php 
                          if($data['status']=="0"){ 
                           echo "<div class='badge badge-pill badge-warning mb-1'>Pending</div>";
                          }elseif ($data['status']=="1") {
                           echo "<div class='badge badge-pill badge-info mb-1'>Approved</div>";
                          }
                          elseif ($data['status']=="2") {
                           echo "<div class='badge badge-pill badge-danger mb-1 '>Rejected</div>";
                          }

                          ?></td>
                          <td><div class="btn-group">
                      <button class="btn btn-success dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Action
                      </button>
                      <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 35px, 0px); top: 0px; left: 0px; will-change: transform;">
                        <div class="dropdown-title">request Id :<?=$data['id'];?></div>
                        <div class="dropdown-title">TID :<?=$data['transactionId'];?></div>
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#exampleModal">Accept</a>
                        <a class="dropdown-item" href="deactivate.php?requestId=<?=$data['id'];?>&amount=<?=$data['amount'];?>&vendorId=<?=$data['vendorId'];?>">Rejected</a>
                      </div>
                        </div></td>
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
                <h5 class="modal-title" id="formModal">Payment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form method="post" enctype="multipart/form-data" action="activate.php">
                  <div class="form-group"><!--style="display: none;"-->
                    <label>Id</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                      </div>
                      <input type="text" class="form-control" placeholder="Enter id" name="requestId"/>
                    </div>
                  </div>
                  <div class="form-group"><!--style="display: none;"-->
                    <label>Transaction Id</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                      </div>
                      <input type="text" class="form-control" placeholder="Ente transaction id" name="transactionId"/>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Add Payment Id</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                      </div>
                      <input type="text" class="form-control" required placeholder="Enter payment id" name="paymentId">
                    </div>
                  </div>
                  
                  <button name="submit" class="btn btn-primary m-t-15 waves-effect">Submit</button>
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
  <script>       
   swap_val = function  (val){
            var input = document.getElementById("transactionId");
            input.value = val;
        }
 </script>
  <!-- JS Libraies -->
  <script src="assets/bundles/prism/prism.js"></script>
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
        