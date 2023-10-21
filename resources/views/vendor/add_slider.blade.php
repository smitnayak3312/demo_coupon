<!DOCTYPE html>
<html lang="en">


<!-- create-post.html  21 Nov 2019 04:05:02 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Slider</title>
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
                    <h4>Add Slider</h4>
                  </div>
                  <div class="card-body">
                    <div class="row">
                    <div class="form-group col-md-6">
                      <label>Slider Name</label>
                      <input type="text" name="name" class="form-control">
                    </div>
                    <div class="form-group col-md-6">
                      <label>Type</label>
                      <select name="select_type" class="form-control selectric" onchange="showDiv(this)" >
                      <option value="#">--Select Type--</option>
                      <option value="1">Shop/Vendor</option>
                      <option value="0">Category</option>
                      </select>
                    </div>
                    <div class="form-group col-md-6" style="display:none;" id="vendor">
                      <label>Select Vendor</label>
                      <select name="vendorId" class="form-control selectric" >
                      <option value="">--Select Vendor--</option>
                      
                      </select>
                    </div>
                    <div class="form-group col-md-6" style="display:none;" id="category">
                      <label>Select Category</label>
                      <select name="catId" class="form-control selectric">
                          <option value="">--Select Category--</option>
                      
                      </select>
                    </div>
                    
                    </div>
                    <div class="form-group">
                      <label class="col-form-label  col-12 col-md-3 col-lg-3">Slider Image</label>
                      <div class="col-sm-12 col-md-7">
                        <div id="image-preview" class="image-preview">
                          <label for="image-upload" id="image-label">Choose File</label>
                          <input type="file" name="image" id="image-upload" />
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
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
  <script type="text/javascript">
function showDiv(select){
   if(select.value==1){
       //category hide and vendor show 
    document.getElementById('vendor').style.display = "block";
    document.getElementById('category').style.display = "none";
   } else if(select.value==0){ 
      //category show and vendor hide 
    document.getElementById('category').style.display = "block";   
    document.getElementById('vendor').style.display = "none";
   }else{
       document.getElementById('vendor').style.display = "none";
        document.getElementById('category').style.display = "none";
   }
} 
</script>
</body>


<!-- create-post.html  21 Nov 2019 04:05:03 GMT -->
</html>