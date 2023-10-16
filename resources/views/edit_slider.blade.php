<?php 
include('include/config.php');
@ob_start();
@session_start();
if(!isset($_SESSION['id']) || $_SESSION['id'] == "") 
 {
    header('location:login.php');
 }
 
 $id=trim($_GET['slider_id']);
 $getsliderQuery = "SELECT * FROM slider WHERE id = '".$id."' ";

  $getsliderResult = mysqli_query($conn,$getsliderQuery);

  if(mysqli_num_rows($getsliderResult) > 0){
    $sliderData = mysqli_fetch_array($getsliderResult);
    $sliderId = $sliderData['id'];
    $sliderType = $sliderData['type'];
    $vendorId = $sliderData['vendorId'];
    $sliderName = $sliderData['name'];
    $sliderImage = $sliderData['image'];
    if($sliderImage != ''){
      $sliderImage = "image/slider_image/".$sliderImage;
    }
   
    }
 
 if(isset($_POST['submit']))
{  
   $name=trim($_POST['name']);
   $catId=trim($_POST['catId']); 
   $select_type=trim($_POST['select_type']);
   $vendorId=trim($_POST['vendorId']);
  // $urlspd="https://starpaneldevelopers.com/oyee/home_slider/";
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
            move_uploaded_file($temp,"image/slider_image/".$newname);
            $flag=1;
        } 
  }
 
 // $result=$urlspd.$newname;
  if($flag==1)
  { 
        
      $query = "update slider set name='".$name."',type='".$select_type."'";
      if($newname != ''){
      $query .= ",image='".$newname."'";
    }
    if($select_type==1){
          $query .= ",vendorId='".$vendorId."'";
      }else if($select_type==0){
          $query .= ",vendorId='".$catId."'";
      }

    $query .= " WHERE id = '".$id."'";
      if(mysqli_query($conn,$query))
      {
          //copy($temp,"img/products/".$newname);
          echo '<script>alert("Slider Edit Successfully");</script>';
          echo '<script>window.location.href = "slider.php";</script>';
      }else{
           echo '<script>alert("Failed");</script>';
          echo '<script>window.location.href = "slider.php";</script>';
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
                    <h4>Edit Slider</h4>
                  </div>
                  <div class="card-body">
                    <div class="row">
                    <div class="form-group col-md-6">
                      <label>Slider Name</label>
                      <input type="text"  name="name" class="form-control" value="<?php echo $sliderName;?>" required>
                    </div>
                    <div class="form-group col-md-6">
                      <label>Type</label>
                      <select name="select_type" class="form-control selectric" onchange="showDiv(this)">
                      <option value="1" <?php if($sliderType == '1'){?> selected <?php } ?>>Shop/Vendor</option>
                      <option value="0" <?php if($sliderType == '0'){?> selected <?php } ?>>Category</option>
                      </select>
                    </div>
                    <div class="form-group col-md-6" style="display:none;" id="vendor">
                      <label>Select Vendor</label>
                      <select name="vendorId" class="form-control selectric" >
                      <option value="">--Select Vendor--</option>
                      <?php
                      $query = "SELECT id,vendor_name FROM vendors where status='1'";
                      $query_run = mysqli_query($conn, $query);

                       while ($row = mysqli_fetch_array($query_run)) {?>
                        <option value='<?php echo $row['id']; ?>' <?php if($vendorId == $row['id']){?> selected <?php } ?>><?php echo $row['vendor_name'];?></option>
                      <?php
                      }

                      ?>
                      </select>
                    </div>
                    <div class="form-group col-md-6" style="display:none;" id="category">
                      <label>Select Category</label>
                      <select name="catId" class="form-control selectric">
                          <option value="">--Select Category--</option>
                      <?php
                      $query = "SELECT id,name FROM category where status='1'";
                      $query_run = mysqli_query($conn, $query);
                      while ($row = mysqli_fetch_array($query_run)) {?>
                        <option value='<?php echo $row['id']; ?>' <?php if($vendorId == $row['id']){?> selected <?php } ?>><?php echo $row['name'];?></option>
                      <?php
                      }

                      ?>
                      </select>
                    </div>
                    
                    </div>
                    <div class="form-group col-md-5">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Slider Image</label>
                      <div class="col-sm-12 col-md-7">
                        <div id="image-preview" class="image-preview" style='background: url("<?php echo $sliderImage;?>"); background-position: center center; background-size: cover;'>
                          <label for="image-upload" id="image-label">Choose File</label>
                          <input type="file" name="image" id="image-upload" <?php if($sliderImage == ""){?> required <?php } ?>/>
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