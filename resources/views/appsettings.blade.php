<?php 
include('include/config.php');
@ob_start();
@session_start();
if(!isset($_SESSION['id']) || $_SESSION['id'] == "") 
 {
    header('location:login.php');
 }
 
 $id=trim($_GET['appsettingId']);
 $getsettingQuery = "SELECT * FROM setting WHERE id = '".$id."' ";

  $getsettingsResult = mysqli_query($conn,$getsettingQuery);

  if(mysqli_num_rows($getsettingsResult) > 0){
    $settingsData = mysqli_fetch_array($getsettingsResult);
    $settingId = $settingsData['id'];
    $registration = $settingsData['registration'];
    $login = $settingsData['login'];
    $maintenance = $settingsData['maintenance'];
    $splash_text= $settingsData['splash_text'];
    $splash_text_color= $settingsData['splash_text_color'];
    $splash_screen_color = $settingsData['splash_screen_color'];
    $logo = $settingsData['logo'];
    if($logo != ''){
      $logo = "image/logo_image/".$logo;
    }
   
    }
 
 
 if(isset($_POST['submit']))
{  
   $registration=trim($_POST['registration']); 
   $login=trim($_POST['login']); 
   $maintenance=trim($_POST['maintenance']); 
   $splash_text=trim($_POST['splash_text']); 
   $splash_text_color=trim($_POST['splash_text_color']); 
   $splash_screen_color=trim($_POST['splash_screen_color']); 
  // $urlspd="https://starpaneldevelopers.com/oyee/home_slider/";
   $newname='';
   $flag=1;
    if($_FILES['logo']['name'] != '')
  {
        $filename=$_FILES['logo']['name'];
        $size=$_FILES['logo']['size'];
        $temp=$_FILES['logo']['tmp_name'];
        $type=$_FILES['logo']['type'];
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
            move_uploaded_file($temp,"image/logo_image/".$newname);
            $flag=1;
        } 
  }
 
 // $result=$urlspd.$newname;
  if($flag==1)
  { 
        
      $query = "update setting set registration='".$registration."',login='".$login."',maintenance='".$maintenance."',splash_text='".$splash_text."',splash_text_color='".$splash_text_color."',splash_screen_color='".$splash_screen_color."'";
      if($newname != ''){
      $query .= ",logo='".$newname."'";
    }

    $query .= " WHERE id = '".$id."'";
      if(mysqli_query($conn,$query))
      {
          //copy($temp,"img/products/".$newname);
          echo '<script>alert("App settings update Successfully");</script>';
          echo '<script>window.location.href = "appsettings.php?appsettingId=1";</script>';
      }else{
           echo '<script>alert("Upload Failed ");</script>';
          echo '<script>window.location.href = "appsettings.php?appsettingId=1";</script>';
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
                    <h4>App Settings</h4>
                  </div>
                  <div class="card-body">
                     <div class="row">
                     <div class="form-group col-md-4">
                      <label>Registration</label>
                      <select name="registration" class="form-control selectric">
                       <option value="true" <?php if($registration == 'true'){?> selected <?php } ?>>On</option>
                      <option value="false" <?php if($registration == 'false'){?> selected <?php } ?>>Off</option>
                      </select>
                    </div>
                    <div class="form-group col-md-4">
                      <label>Login</label>
                      <select name="login" class="form-control selectric">
                       <option value="true" <?php if($login == 'true'){?> selected <?php } ?>>On</option>
                      <option value="false" <?php if($login == 'false'){?> selected <?php } ?>>Off</option>
                      </select>
                    </div>
                    <div class="form-group col-md-4">
                      <label>Maintenance</label>
                      <select name="maintenance" class="form-control selectric">
                       <option value="true" <?php if($maintenance == 'true'){?> selected <?php } ?>>On</option>
                      <option value="false" <?php if($maintenance == 'false'){?> selected <?php } ?>>Off</option>
                      </select>
                    </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                      <label>Splash text </label>
                      <input type="text" name="splash_text" value="<?php echo $splash_text;?>" class="form-control">
                    </div>
                     <div class="form-group col-md-4">
                      <label>Splash Screen color</label>
                      <input type="color" name="splash_screen_color" value="<?php echo $splash_screen_color;?>" class="form-control">
                    </div>
                    <div class="form-group col-md-4">
                      <label>Splash text color</label>
                      <input type="color" name="splash_text_color" value="<?php echo $splash_text_color;?>" class="form-control">
                    </div>
                    </div>
                    
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Logo</label>
                      <div class="col-sm-12 col-md-7">
                        <div id="image-preview" class="image-preview" style='background: url("<?php echo $logo;?>"); background-position: center center; background-size: cover;'>>
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