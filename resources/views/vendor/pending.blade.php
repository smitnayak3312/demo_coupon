<?php
@ob_start();
@session_start();
include('include/config.php');
if(!isset($_SESSION['id']) || $_SESSION['id'] == "") 
{
    header('location:login.php');
}
    $id=trim($_GET['oid']);
    $query_one = "SELECT * FROM orders where orderId='".$id."'";
    $result_one = mysqli_query($conn, $query_one);
    $orderdetails = mysqli_fetch_array($result_one);
    $address_id=$orderdetails['address'];

    $query_two = "SELECT * FROM address where id='$address_id'";
    $result_two = mysqli_query($conn, $query_two);
    $userdetails = mysqli_fetch_array($result_two);

    if(isset($_POST['submit']))
{  
   $paymentStatus=trim($_POST['paymentStatus']);  
   $orderStatus=trim($_POST['orderStatus']);

      $query = "update orders set paymentStatus='".$paymentStatus."',orderStatus='".$orderStatus."' where orderId='".$id."'";
      if(mysqli_query($conn,$query))
      {
          //copy($temp,"img/products/".$newname);
          echo '<script>alert("Order Update Successfully");</script>';
          echo '<script>window.location.href = "acceptlist.php";</script>';
      }
  
   
}

?>
<!DOCTYPE html>
<html lang="en">


<!-- advance-table.html  21 Nov 2019 03:55:20 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Pending </title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/css/app.min.css">
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
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Order Details</h4>
                  </div>
                  <div class="table-responsive">
                      <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                        <thead>
                          <tr class="text-center">
                            <th>Order Id</th>
                            <th>Payament Status</th>
                            <th>Order Status</th>
                            <th>Order Date</th>
                            <th>Payment Method</th>
                          </tr>
                        </thead>
                        <tbody>
                    <tr class="text-center">
                    <td><?=$orderdetails['orderId'];?></td>  
                    <td><?php 
                          if($orderdetails['paymentStatus']=="1"){ 
                           echo "<div class='badge badge-pill badge-success mb-1'>Paid</div>";
                          }elseif ($orderdetails['paymentStatus']=="0") {
                           echo "<div class='badge badge-pill badge-danger mb-1'>UnPaid</div>";
                          }?>
                          </td>
                          <td><?php 
                          if($orderdetails['orderStatus']=="1"){ 
                           echo "<div class='badge badge-pill badge-warning mb-1'>Pending</div>";
                          }elseif ($orderdetails['orderStatus']=="2") {
                           echo "<div class='badge badge-pill badge-info mb-1'>Accept</div>";
                          }
                          elseif ($orderdetails['orderStatus']=="3") {
                           echo "<div class='badge badge-pill badge-primary mb-1 '>Processing</div>";
                          }
                          elseif ($orderdetails['orderStatus']=="4") {
                           echo "<div class='badge badge-pill badge-primary mb-1'>Out Of Delivery</div>";
                          }
                          elseif ($orderdetails['orderStatus']=="5") {
                           echo "<div class='badge badge-pill badge-success mb-1 '>Completed</div>";
                          }
                          elseif ($orderdetails['orderStatus']=="6") {
                           echo "<div class='badge badge-pill badge-danger mb-1 '>Rejected</div>";
                          }

                          ?>
                    </td>
                    <td><?=$orderdetails['orderDate']; ?></td>
                    <td><?=$orderdetails['paymentMethod'];?></td>
                  </tr></tbody>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                        <thead>
                          <tr>
                            <th class="text-center">
                              #
                            </th>
                            <th>Image</th>
                            <th>Product Name</th>
                            
                             <th>Product Price</th>
                            <th>Product Quantity</th>
                            <th>Unit</th>
                           
                            <th>Product Total</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php
                                                  $no=1;
                                                    $queryuser="select * from orderItems where orderId='".$id."'";
                                                    $queryuserprofile=mysqli_query($conn,$queryuser);
                                                    while($data=mysqli_fetch_array($queryuserprofile))
                                                    {
                      
                                                            ?>
                        <tr>
                          <td><?=$no++;?></td>
                          <?php 
                          $pid=trim($data['productId']);
                          $fetch_product=mysqli_fetch_array(mysqli_query($conn,"select product_name,image from products where id='".$pid."'")); 
                          ?>
                          <td><img alt="image" src="image/product_image/<?=$fetch_product['image'];?>" class="mr-3 user-img-radious-style user-list-img" width="50px" height="50px"></td>
                          <td><?=$fetch_product['product_name'];?></td>
                          <?php 
                          $pvid=trim($data['productVariantId']);
                          $fetch=mysqli_fetch_array(mysqli_query($conn,"select quantity_unit_id from product_variant where id='".$pvid."'")); 
                          ?>
                          
                          <td><?=$data['productPrice'];?></td>
                          <td><?=$data['productQuantity'];?></td>
                          <td><?=$fetch['quantity_unit_id'];?></td>
                          <td><?=$data['productTotal'];?></td>
                         
                          
                        </tr>
                        
                        <?php } ?>
                      </tbody>
                        <tr>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td>Subtotal :</td>
                          <td><?=$orderdetails['subTotal'];?></td>
                          
                        </tr>
                        <tr>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td>Coupon Discount :</td>
                          <td><?=$orderdetails['couponAmount'];?></td>
                          
                        </tr>
                        <tr>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td>Tax :</td>
                          <td><?=$orderdetails['taxAmount'];?></td>
                          
                        </tr>
                        <tr>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td>Total</td>
                          <td><?=$orderdetails['finalTotal'];?></td>
                        </tr>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Contact Information-->
            <div class="row">
             <div class="col-12 col-sm-6 col-lg-7">
                <div class="card">
                  <div class="card-header">
                    <h4>Customer Information</h4>
                  </div>
                  <div class="card-body">
                    <ul class="list-unstyled list-unstyled-border">
                      <li class="media">
                        <div class="media-body">
                          <h3><?=$userdetails['name']; ?></h3>
                          <p>Type Of Address : <?=$userdetails['type_of_address']; ?></p>
                          <p>Contact No : <?=$userdetails['contact_no']; ?></p>
                          <p>Address : <?=$userdetails['address']; ?></p>
                          <p>Pin Code : <?=$userdetails['pin_code']; ?></p>
                          <p>Alternate No : <?=$userdetails['alternate_no']; ?></p>
                        </div>
                      </li>
                    </ul>
                  </div>

                </div>
              </div>
              
              <div class="col-12 col-sm-6 col-lg-4">
                <div class="card">
                  <div class="card-header">
                    <h4>Update Status</h4>
                  </div>
                  <form method="post" enctype="multipart/form-data" action="#">
                  <div class="form-group col-md-7">
                      <label>Payament Status</label>
                      
                      <?php
                      $query = "SELECT * FROM orders where orderId='".$id."'";
                      $query_run = mysqli_query($conn, $query);
                      $row = mysqli_fetch_array($query_run);
                      $paymentStatus = $row['paymentStatus'];
                      $orderStatus = $row['orderStatus'];
                      ?>
                      <select name="paymentStatus" class="form-control selectric">
                    
                      <option value="1" <?php if($paymentStatus == '1'){?> selected <?php } ?>>Paid</option>
                      <option value="0" <?php if($paymentStatus == '0'){?> selected <?php } ?>>Unpaid</option>
                      </select>
                  </div>
                  <div class="form-group col-md-7">
                      <label>Order Status</label>
                      <select name="orderStatus" class="form-control selectric">
                      
                      <option value="1" <?php if($orderStatus == '1'){?> selected <?php } ?>>Pending</option>
                      <option value="2" <?php if($orderStatus == '2'){?> selected <?php } ?>>Accept</option>
                      <option value="3" <?php if($orderStatus == '3'){?> selected <?php } ?>>Processing</option>
                      <option value="4" <?php if($orderStatus == '4'){?> selected <?php } ?>>Out Of Delivery</option>
                      <option value="5" <?php if($orderStatus == '5'){?> selected <?php } ?>>Completed</option>
                      <option value="6" <?php if($orderStatus == '6'){?> selected <?php } ?>>Rejected</option>

                     
                      </select>
                      <br>
                      <div class="col-sm-12 col-md-7 | text-center">
                        <button class="btn btn-primary" name="submit">Update</button>
                      </div>
                      </div>
                  
                      <br>
                  
                </div>
              </div>
            </form>
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
</body>


<!-- advance-table.html  21 Nov 2019 03:55:21 GMT -->
</html>
        