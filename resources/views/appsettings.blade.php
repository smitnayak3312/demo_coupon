<!DOCTYPE html>
<html lang="en">


<!-- create-post.html  21 Nov 2019 04:05:02 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>App Settings</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/css/app.min.css">
  <link rel="stylesheet" href="assets/bundles/summernote/summernote-bs4.css">
  <link rel="stylesheet" href="assets/bundles/jquery-selectric/selectric.css">
  <link rel="stylesheet" href="assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">
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
      @include('include.header')
      @include('include.navbar')
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <form method="post" enctype="multipart/form-data" action="#">
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>App Settings</h4>
                  </div>
                  <div class="card-body">
                     <div class="row">
                     <div class="form-group col-md-4">
                      <label>Registration</label>
                      <select name="registration" class="form-control selectric">
                       <option value="true">On</option>
                     
                      </select>
                    </div>
                    <div class="form-group col-md-4">
                      <label>Login</label>
                      <select name="login" class="form-control selectric">
                       <option value="true" >On</option>
                      
                      </select>
                    </div>
                    <div class="form-group col-md-4">
                      <label>Maintenance</label>
                      <select name="maintenance" class="form-control selectric">
                      <option value="false" >Off</option>
                      </select>
                    </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                      <label>Splash text </label>
                      <input type="text" name="splash_text" value="hello splash text" class="form-control">
                    </div>
                     <div class="form-group col-md-4">
                      <label>Splash Screen color</label>
                      <input type="color" name="splash_screen_color" value="#000000" class="form-control">
                    </div>
                    <div class="form-group col-md-4">
                      <label>Splash text color</label>
                      <input type="color" name="splash_text_color" value="#FFFFFF" class="form-control">
                    </div>
                    </div>
                    
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Logo</label>
                      <div class="col-sm-12 col-md-7">
                        <div id="image-preview" class="image-preview" style='background: url("#"); background-position: center center; background-size: cover;'>>
                          <label for="image-upload" id="image-label">Choose File</label>
                          <input type="file" name="logo" id="image-upload" />
                        </div>
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                      <div class="col-sm-12 col-md-7">
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
        
      </div>
      @include('include.footer')
    </div>
  </div>
  <!-- General JS Scripts -->
  <script src="assets/js/app.min.js"></script>
  <!-- JS Libraies -->
  <script src="assets/bundles/summernote/summernote-bs4.js"></script>
  <script src="assets/bundles/jquery-selectric/jquery.selectric.min.js"></script>
  <script src="assets/bundles/upload-preview/assets/js/jquery.uploadPreview.min.js"></script>
  <script src="assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
  <!-- Page Specific JS File -->
  <script src="assets/js/page/create-post.js"></script>
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="assets/js/custom.js"></script>
</body>


<!-- create-post.html  21 Nov 2019 04:05:03 GMT -->
</html>