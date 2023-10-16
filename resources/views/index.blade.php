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
    message: 'Thanks You For Using SPIPL Software',
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
      @include('include.header')
      @include('include.navbar')
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
                      <h5><span><i class="fa fa-arrow-up"></i> 0 </span></h5>
                      <p class="mb-0 text-sm">
                        
                        <span class="text-nowrap">Last Months : 0 </span>
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
                      <h4 class="card-title">Total Vendors </h4>
                      <h5><span><i class="fa fa-arrow-up"></i> 0</span></h5>
                      <p class="mb-0 text-sm">
                        <span class="text-nowrap">Last Month : 0 </span>
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
                      <h4 class="card-title">Total Users</h4>
                      <h5><span><i class="fa fa-arrow-up"></i> 0</span></h5>
                      <p class="mb-0 text-sm">
                        <span class="text-nowrap">Last Months : 0 </span>
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
                      <h5><span><i class="fa fa-arrow-up"></i> 0</span></h5>
                      <p class="mb-0 text-sm">
                        <span class="text-nowrap">Last Month : 0 </span>
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