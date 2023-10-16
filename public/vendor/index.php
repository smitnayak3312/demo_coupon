<?php
@ob_start();
@session_start();
include('include/config.php');
if(!isset($_SESSION['id']) || $_SESSION['id'] == "") 
{
    header('location:login.php');
}

    //Total Count
    $query_one = "SELECT * FROM users where referal_code='".$_SESSION['referal_code']."'";
    $result_one = mysqli_query($conn, $query_one);
    $usersCount = mysqli_num_rows($result_one);

    $query_two = "SELECT SUM(coupon_use_no) as coupontotal FROM `coupon_history` where vendorId='".$_SESSION['id']."'";
    $result_two = mysqli_query($conn, $query_two);
    $sumCoupon = mysqli_fetch_array($result_two);

    $query_three = "SELECT * FROM coupon where vendorId='".$_SESSION['id']."'";
    $result_three = mysqli_query($conn, $query_three);
    $totalCoupon = mysqli_num_rows($result_three);

    $query_four = "SELECT SUM(amount) as totAMount FROM vendor_withdrawal_history where vendorId='".$_SESSION['id']."' and type='Credit'";
    $result_four = mysqli_query($conn, $query_four);
    $TotalAmount = mysqli_fetch_array($result_four);

    //Total Count Completed

    //Month Wise Count Start
    $no="-1 Months";
    $curDate=date('Y-m-d h:i:sa');
    $monthDate=date('Y-m-d h:i:sa',strtotime($no));

    $query_five = "SELECT * FROM users where referal_code='".$_SESSION['referal_code']."' and registerd_date>='".$monthDate."' and registerd_date<='".$curDate."'";
    $result_five = mysqli_query($conn, $query_five);
    $completed = mysqli_num_rows($result_five);

    $query_six = "SELECT SUM(coupon_use_no) as monthcoupontotal FROM `coupon_history` where vendorId='".$_SESSION['id']."' and create_date>='".$monthDate."' and create_date<='".$curDate."'";
    $result_six = mysqli_query($conn, $query_six);
    $monthSum = mysqli_fetch_array($result_six);

    $query_seven = "SELECT * FROM coupon where vendorId='".$_SESSION['id']."' and create_date>='".$monthDate."' and create_date<='".$curDate."'";
    $result_seven = mysqli_query($conn, $query_seven);
    $MonthCoupon = mysqli_num_rows($result_seven);

    $query_eight= "SELECT SUM(amount) as monthtotAMount FROM vendor_withdrawal_history where vendorId='".$_SESSION['id']."' and type='Credit' and create_date>='".$monthDate."' and create_date<='".$curDate."'";
    $earn = mysqli_query($conn, $query_eight);
    $monthAmount = mysqli_fetch_array($earn);

    //Month Wise Count End


   /* 



    $query_five = "SELECT * FROM orders where orderStatus='5'";
    $result_five = mysqli_query($conn, $query_five);
    $completed = mysqli_num_rows($result_five);

    $query_six = "SELECT * FROM orders where orderStatus='6'";
    $result_six = mysqli_query($conn, $query_six);
    $rejected = mysqli_num_rows($result_six);

    $query_seven = "SELECT * FROM orders where orderStatus IN ('1','2','3','4','5')";
    $result_seven = mysqli_query($conn, $query_seven);
    $total_orders = mysqli_num_rows($result_seven); 

    */

   // $query_eight= "SELECT SUM(finalTotal) FROM `orders` WHERE orderStatus IN ('1','2','3','4','5');";
   // $earn = mysqli_query($conn, $query_eight);
    //$total_orders = mysqli_num_rows($result_seven);

    
?>
<!DOCTYPE html>
<html lang="en">


<!-- index.html  21 Nov 2019 03:44:50 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Dashboard</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/css/app.min.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  
  <link rel="stylesheet" href="assets/bundles/izitoast/css/iziToast.min.css">
  <link rel="stylesheet" href="assets/css/components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="assets/css/custom.css">
  <link rel='shortcut icon' type='image/x-icon' href='assets/img/666.png' />
  
  <script type="text/javascript">

function my_code(){
  iziToast.info({
    title: 'Hello Sir!',
    message: 'Thanks You For Using My Coupon Software',
    position: 'topRight'
  });
}

window.onload=my_code();
</script>
</head>

<body onLoad="my_code()";>
  <div class="loader"></div>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <?php include('include/header.php'); ?>
      <?php include('include/navbar.php'); ?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="row ">
              <div class="col-xl-3 col-lg-6">
                <div class="card l-bg-green">
                  <div class="card-statistic-3">
                    <div class="card-icon card-icon-large"><i class="fa fa-award"></i></div>
                    <div class="card-content">
                      <h4 class="card-title">Total Coupon</h4>
                      <h5><span><i class="fa fa-arrow-up"></i> <?php echo $totalCoupon  ?> </span></h5>
                      <p class="mb-0 text-sm">
                        
                        <span class="text-nowrap">Last Months : <?php echo $MonthCoupon ?> </span>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-lg-6">
                <div class="card l-bg-cyan">
                  <div class="card-statistic-3">
                    <div class="card-icon card-icon-large"><i class="fa fa-briefcase"></i></div>
                    <div class="card-content">
                      <h4 class="card-title">Coupon Usages</h4>
                      <h5><span><i class="fa fa-arrow-up"></i> <?php echo $sumCoupon['coupontotal'] ?></span></h5>
                      <p class="mb-0 text-sm">
                        <span class="text-nowrap">Last Month : <?php if($monthSum['monthcoupontotal']>0){ ?>
                          <?php echo $monthSum['monthcoupontotal']; ?>
                          <?php } else {?>
                            0
                          <?php } ?> </span>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-lg-6">
                <div class="card l-bg-purple">
                  <div class="card-statistic-3">
                    <div class="card-icon card-icon-large"><i class="fa fa-globe"></i></div>
                    <div class="card-content">
                      <h4 class="card-title">Users</h4>
                      <h5><span><i class="fa fa-arrow-up"></i> <?php echo $usersCount ?></span></h5>
                      <p class="mb-0 text-sm">
                        <span class="text-nowrap">Last Months : <?php echo $completed ?> </span>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-lg-6">
                <div class="card l-bg-orange">
                  <div class="card-statistic-3">
                    <div class="card-icon card-icon-large"><i class="fa fa-money-bill-alt"></i></div>
                    <div class="card-content">
                      <h4 class="card-title">Total Earning</h4>
                      <h5><span><i class="fa fa-arrow-up"></i> <?php echo $TotalAmount['totAMount'] ?></span></h5>
                      <p class="mb-0 text-sm">
                        <span class="text-nowrap">Last Month : <?php if($monthAmount['monthtotAMount']>0){ ?>
                          <?php echo $monthAmount['monthtotAMount']; ?>
                          <?php } else {?>
                            0
                          <?php } ?> </span>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <!--
          <div class="row">
            <div class="col-12 col-sm-12 col-lg-12">
              <div class="card ">
                <div class="card-header">
                  <h4>Earning chart</h4>
                  <div class="card-header-action">
                    <a href="#" class="btn btn-primary">View All</a>
                  </div>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-lg-9">
                      <div id="chart1"></div>
                      <div class="row mb-0">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                          <div class="list-inline text-center">
                            <div class="list-inline-item p-r-30"><i data-feather="arrow-up-circle"
                                class="col-green"></i>
                              <h5 class="m-b-0">INR 11,014</h5>
                              <p class="text-muted font-14 m-b-0">Weekly Earnings</p>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                          <div class="list-inline text-center">
                            <div class="list-inline-item p-r-30"><i data-feather="arrow-up-circle"
                                class="col-orange"></i>
                              <h5 class="m-b-0">INR 44,057</h5>
                              <p class="text-muted font-14 m-b-0">Monthly Earnings</p>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                          <div class="list-inline text-center">
                            <div class="list-inline-item p-r-30"><i data-feather="arrow-up-circle"
                                class="col-green"></i>
                              <h5 class="mb-0 m-b-0">INR 7,48,697</h5>
                              <p class="text-muted font-14 m-b-0">Yearly Earnings</p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-3">
                      <div class="row mt-5">
                        <div class="col-7 col-xl-7 mb-3">Total Earnings</div>
                        <div class="col-5 col-xl-5 mb-3">
                          <span class="text-big">INR 48,697</span>
                        </div>
                        <div class="col-7 col-xl-7 mb-3">Total Withdrawal</div>
                        <div class="col-5 col-xl-5 mb-3">
                          <span class="text-big">INR 25,312</span>
                        </div>
                        <div class="col-7 col-xl-7 mb-3">Pending Withdrawal Amount</div>
                        <div class="col-5 col-xl-5 mb-3">
                          <span class="text-big">INR 3,200</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          -->
          <div class="row">
            <div class="col-md-6 col-lg-12 col-xl-6">
              <!-- Support tickets -->
              <!-- Support tickets -->
            </div>
            <div class="col-md-6 col-lg-12 col-xl-6">
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
  <script src="assets/bundles/apexcharts/apexcharts.min.js"></script>
  <!-- Page Specific JS File -->
  
  <script src="assets/bundles/izitoast/js/iziToast.min.js"></script>
  <!-- Page Specific JS File -->
  <script src="assets/js/page/toastr.js"></script>
  <script src="assets/js/page/index.js"></script>
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="assets/js/custom.js"></script>
</body>


<!-- index.html  21 Nov 2019 03:47:04 GMT -->
</html>