<?php 
include('include/config.php');
@ob_start();
@session_start();
if(!isset($_SESSION['id']) || $_SESSION['id'] == "") 
 {
    header('location:login.php');
 }
 
 $id=trim($_GET['coupontype_id']);
 $getsliderQuery = "SELECT * FROM coupon_type WHERE id = '".$id."' ";

  $getsliderResult = mysqli_query($conn,$getsliderQuery);

  if(mysqli_num_rows($getsliderResult) > 0){
    $introData = mysqli_fetch_array($getsliderResult);
    //$introId = $introData['id'];
    $name = $introData['name'];
    $introImage = $introData['image'];
    if($introImage != ''){
      $introImage = "image/coupon_image/".$introImage;
    }
   
    }
    
 if(isset($_POST['submit']))
{  
   $name=trim($_POST['name']); 
   $newname='';
   $flag=1;
    if($_FILES['image']['name'] != '')
  {
        $filename=$_FILES['image']['name'];
        $size=$_FILES['image']['size'];
        $temp=$_FILES['image']['tmp_name'];
        $type=$_FILES['image']['type'];
        $ext=strtolower(end(explode('.',$filename)));
        $extension=array("jpeg","jpg","png");
        $newname=rand().'.'.$ext;        
        if(!in_array($ext,$extension))
        {
            echo '<script>alert("please select Jpeg,Jpg,Png image");</script>';
            $flag=0;
        }else
        if($size > 5120000)
        {
            echo '<script>alert("please upload below 5mb");</script>';
            $flag=0;
        }else
        {
            move_uploaded_file($temp,"image/coupon_image/".$newname);
            $flag=1;
        } 
  }
 
 // $result=$urlspd.$newname;
  if($flag==1)
  { 
        
      $query = "update coupon_type set name='".$name."'";
      if($newname != ''){
      $query .= ",image='".$newname."'";
    }

    $query .= " WHERE id = '".$id."'";
      if(mysqli_query($conn,$query))
      {
          //copy($temp,"img/products/".$newname);
          echo '<script>alert("Update Successfully");</script>';
          echo '<script>window.location.href = "coupontypeList.php";</script>';
      }else{
           echo '<script>alert("Update Failed ");</script>';
          echo '<script>window.location.href = "coupontypeList.php";</script>';
      }
  }
   
}

?>
<!DOCTYPE html>
<html lang="en">


<!-- create-post.html  21 Nov 2019 04:05:02 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Edit Coupon Type</title>
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
      <?php include('include/header.php'); ?>
      <?php include('include/navbar.php'); ?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <form method="post" enctype="multipart/form-data" action="#">
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Edit Coupon Type</h4>
                  </div>
                  <div class="card-body">
                     <div class="row">
                     <div class="form-group col-md-5">
                      <label>Coupon Type Name</label>
                      <input type="text" name="name" value="<?php echo $name;?>" class="form-control">
                    </div>
                    </div>
                    
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Coupon Type Image</label>
                      <div class="col-sm-12 col-md-7">
                        <div id="image-preview" class="image-preview" style='background: url("<?php echo $introImage;?>"); background-position: center center; background-size: cover;'>
                          <label for="image-upload" id="image-label">Choose File</label>
                          <input type="file" name="image" id="image-upload" />
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
      <?php include('include/footer.php'); ?>
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