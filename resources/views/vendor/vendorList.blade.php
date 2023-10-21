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
      @include('include.header')
      @include('include.navbar')
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
                        <tr>
                          <td>1</td>
                          <td><div class="btn-group">
                          <button class="btn btn-success dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Action
                          </button>
                          <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 35px, 0px); top: 0px; left: 0px; will-change: transform;">
                          <div class="dropdown-title">SH001MB</div>
                          <div class="dropdown-title">smitnayak000@gmail.com</div>
                          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#exampleModal">Reset Password</a>
                          <a class="dropdown-item" href="vendor_detail.php?venId=">Edit</a>
                          </div>
                          </div>
                          </td>
                          <td>SH001MB</td>
                          <td>Smit nayak</td>
                          <td>9512848128</td>
                          <td>smitnayak000@gmail.com</td>
                          <td>Shambhus Coffee bar</td>
                          <td>Restaurants</td>
                          <td><img alt="image" src="vendor/image/shop_logo/sclogo.jpeg" class="mr-3 user-img-radious-style user-list-img" width="50px" height="50px"></td>
                          <td><img alt="image" src="vendor/image/shop_cover/sccover.jpeg" class="mr-3 user-img-radious-style user-list-img" width="50px" height="50px"></td>
                          <td>6354212716</td>
                          <td>Kudasan Behind Pratik Mall, Kudasan, Gandhinagar, Gujarat 382421</td>
                          <td>Gandhinagar</td>
                          <td>Gujarat</td>
                          <td>India</td>
                          <td>
                          Plan name :GOLD<br>
                          Description :1799<br>
                          Amount :1799<br>
                          Day :365<br>
                          </td>
                          <td>6</td>
                          <td>2023-08-31 12:47:52</td>
                          <td>2027-07-26 12:47:52</td>
                          <td><a href=deactivate.php?user_id=".$data['id']." class='btn btn-icon icon-left btn-warning'><i class='fas fa-exclamation-triangle'></i>Deactivate</a></td>
                           <td>2022-09-05 19:15:34</td>
                          <td>2022-07-31 09:52:36</td>
                        </tr>
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
      @include('include.footer')
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