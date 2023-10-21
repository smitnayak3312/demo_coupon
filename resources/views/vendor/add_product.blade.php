<?php 
include('include/config.php');
@ob_start();
@session_start();
if(!isset($_SESSION['id']) || $_SESSION['id'] == "") 
 {
    header('location:login.php');
 }
 if(isset($_POST['submit']))
{    
   
   $product_name=trim($_POST['product_name']);
   $description=trim($_POST['description']);
   $category_id=trim($_POST['category_id']);
   $subcategory_id=trim($_POST['subcategory_id']);
   $is_popular=trim($_POST['is_popular']);
   $product_type=trim($_POST['product_type']);
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
            move_uploaded_file($temp,"image/product_image/".$newname);
            $flag=1;
        } 
  }
  if($flag==1)
  { 
        
      $query = "insert into products set product_name='".$product_name."',description='".$description."',category_id='".$category_id."',subcategory_id='".$subcategory_id."',is_popular='".$is_popular."',product_type='".$product_type."',image='".$newname."'";
      if(mysqli_query($conn,$query))
      {
                $product_result = 0;
            
      }
      else {
                $product_result=1;
      }
  }

   $quantity = $_POST["quantity"];
   $quantity_unit_id = $_POST["quantity_unit_id"];
   $price = $_POST["price"];
   $sale_price = $_POST["sale_price"];
  
    foreach($quantity as $index => $quantity)
    {
        $v_quantity = $quantity;
        $v_quantity_unit_id = $quantity_unit_id[$index];
        $v_price = $price[$index];
        $v_sale_price = $sale_price[$index];

        $v_discount_percentage =   ($v_price-$v_sale_price);
        $v_discount_percentage=($v_discount_percentage/$v_price*100); 

        $fetch=mysqli_fetch_array(mysqli_query($conn,"SELECT id FROM `products` ORDER BY id DESC LIMIT 1"));
        $pro_id=$fetch['id'];

        // $s_otherfiled = $empid[$index];

        $query = "INSERT INTO product_variant (product_id,quantity,quantity_unit_id,price,sale_price,discount_percentage,cate_id) VALUES ('$pro_id','$v_quantity','$v_quantity_unit_id','$v_price','$v_sale_price','$v_discount_percentage','$category_id')";
        if(mysqli_query($conn,$query))
      {
          
                $product_variant = 0;
            
      }
      else {
                $product_variant=1;
      }

    } 
    
    
    if ($product_result == 0 && $product_variant == 0) {
                //copy($temp,"img/products/".$newname);
          echo '<script>alert("Product Add Successfully");</script>';
          echo '<script>window.location.href = "productlist.php";</script>';
            } else {
                //copy($temp,"img/products/".$newname);
          echo '<script>alert("Failed ");</script>';
          echo '<script>window.location.href = "add_product.php";</script>';
            }
   
}

?>

<!DOCTYPE html>
<html lang="en">


<!-- forms-advanced-form.html  21 Nov 2019 03:54:41 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Product Add</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/css/app.min.css">
  <link rel="stylesheet" href="assets/bundles/bootstrap-daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="assets/bundles/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
  <link rel="stylesheet" href="assets/bundles/select2/dist/css/select2.min.css">
  <link rel="stylesheet" href="assets/bundles/jquery-selectric/selectric.css">
  <link rel="stylesheet" href="assets/bundles/bootstrap-timepicker/css/bootstrap-timepicker.min.css">
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
              <div class="col-12 ">
                <div class="card">
                  <div class="card-header">
                    <h4>Add product</h4>
                  </div>
                  <div class="card-body">
                    <div class="row">
                    <div class="form-group col-md-5">
                      <label>Product Name</label>
                      <input type="text" name="product_name" class="form-control" required>
                    </div>
                    <div class="form-group col-md-5">
                      <label>Description</label>
                      <textarea name="description" rows="5" cols="5" class="form-control"></textarea>
                    </div>
                    
                    </div>

                    <div class="row">
                    <div class="form-group col-md-5">
                      <label>Select Main Category</label>
                      <select name="category_id" class="form-control selectric" required>
                      <option value="">--Select Category--</option>
                      <?php
                      $query = "SELECT id,name FROM category where status='1'";
                      $query_run = mysqli_query($conn, $query);

                      while ($row = mysqli_fetch_array($query_run)) {
                      echo "<option value='".$row['id']."'>".$row['name']."</option>";
                      }

                      ?>
                      </select>
                    </div>
                    <div class="form-group col-md-5">
                      <label>Select Sub Category</label>
                      <select name="subcategory_id" class="form-control selectric">
                       <option value="">---Select Sub Category---</option> 
                      <?php
                      $query = "SELECT id,name FROM subcategory where status='1'";
                      $query_run = mysqli_query($conn, $query);

                      while ($row = mysqli_fetch_array($query_run)) {
                      echo "<option value='".$row['id']."'>".$row['name']."</option>";
                      }

                      ?>
                      </select>
                    </div>

                    </div>

                    <div class="row">
                    <div class="form-group col-md-5">
                      <label>Is Popular </label>
                      <select name="is_popular" class="form-control selectric" required>
                      
                      <option value="true">Yes</option>
                      <option value="false">No</option>
                      </select>
                    </div>
                    <div class="form-group col-md-5">
                      <label>Select Product Type</label>
                      <select name="product_type" class="form-control selectric">
                       <option value="none">None</option>
                       <option value="veg">Veg</option> 
                       <option value="nonveg">Non-Veg</option>
                      </select>
                    </div>

                    </div>

                    <div class="row">

                    <div class="form-group col-md-5">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Product Image</label>
                      <div class="col-sm-12 col-md-7">
                        <div id="image-preview" class="image-preview">
                          <label for="image-upload" id="image-label">Choose File</label>
                          <input type="file" name="image" id="image-upload" required />
                        </div>
                      </div>
                    </div>
                    </div>

                    <table class="table table-bordered table-hover" id="add_more_visitor">
                    <th>Qauntity</th>
                    <th>Unit</th>
                    <th>MRP</th>
                    <th>Sale Price (Final Price)</th>
                    <th>Add / Delete</th>
                    <tr>
                    <td><input type="number" name="quantity[]" min="0" placeholder="Enter Quantity" class="form-control " required /></td>
                    <td>
                      <select name="quantity_unit_id[]" class="form-control selectric" required>
                      <option value="g">Gram (g)</option>
                      <option value="kg">Kilogram (kg)</option>
                      <option value="ml">Mililiter (ml)</option>
                      <option value="ltr">Liter (ltr)</option>
                      <option value="pack">Pack (pack)</option>
                      <option value="pc">Piece (pc)</option>
                      <option value="m">Meter (m)</option>
                      <option value="S">Small (S)</option>
                      <option value="M">Medium (M)</option>
                      <option value="L">Large (L)</option>
                      <option value="XS">Extra Small (XS)</option>
                      <option value="XL">Extra Large (XL)</option>
                      <option value="XXL">Double Extra Large (XXL)</option>
                      <option value="XXXL">Triple Extra Large (XXXL)</option>

                      </select>
                    </td>
                    <td><input type="number" name="price[]" min="0" placeholder="Enter Price" class="form-control " required /></td>
                    <td><input type="number" name="sale_price[]" min="0" placeholder="Enter Sale Price" class="form-control" required /></td>

                    <td><button type="button" name="add" id="add" class="btn btn-primary">Add</button></td>  
                    </tr>
                    </table>

                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right "></label>
                      <div class="col-sm-12 col-md-7">
                        <button class="btn btn-primary" name="submit">Submit</button>
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
      <footer class="main-footer">
        <div class="footer-left">
          <a href="#">Star Panel Developers</a></a>
        </div>
        <div class="footer-right">
        </div>
      </footer>
    </div>
  </div>
  <!-- General JS Scripts -->
  <script src="assets/js/app.min.js"></script>
  <!-- JS Libraies -->
  <script src="assets/bundles/cleave-js/dist/cleave.min.js"></script>
  <script src="assets/bundles/cleave-js/dist/addons/cleave-phone.us.js"></script>
  <script src="assets/bundles/jquery-pwstrength/jquery.pwstrength.min.js"></script>
  <script src="assets/bundles/bootstrap-daterangepicker/daterangepicker.js"></script>
  <script src="assets/bundles/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
  <script src="assets/bundles/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
  <script src="assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
  <script src="assets/bundles/select2/dist/js/select2.full.min.js"></script>
  <script src="assets/bundles/jquery-selectric/jquery.selectric.min.js"></script>

  <script src="assets/bundles/upload-preview/assets/js/jquery.uploadPreview.min.js"></script>
  <!-- Page Specific JS File -->
  <script src="assets/js/page/forms-advanced-forms.js"></script>
  <script src="assets/js/page/create-post.js"></script>
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="assets/js/custom.js"></script>
  <script type="text/javascript">
$(document).ready(function(){

var i = 1;

$("#add").click(function(){
i++;
$('#add_more_visitor').append('<tr id="row'+i+'"><td><input type="number" name="quantity[]" min="0" placeholder="Enter Quantity" class="form-control " required /></td> <td> <select name="quantity_unit_id[]" class="form-control selectric" required> <option value="g">Gram (g)</option> <option value="kg">Kilogram (kg)</option> <option value="ml">Mililiter (ml)</option> <option value="ltr">Liter (ltr)</option> <option value="pack">Pack (pack)</option> <option value="pc">Piece (pc)</option> <option value="m">Meter (m)</option> <option value="S">Small (S)</option> <option value="M">Medium (M)</option> <option value="L">Large (L)</option> <option value="XS">Extra Small (XS)</option> <option value="XL">Extra Large (XL)</option> <option value="XXL">Double Extra Large (XXL)</option> <option value="XXXL">Triple Extra Large (XXXL)</option> </select> </td> <td><input type="number" name="price[]" min="0" placeholder="Enter Price" class="form-control " required /></td> <td><input type="number" name="sale_price[]" min="0" placeholder="Enter Sale Price" class="form-control" required /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
});

$(document).on('click', '.btn_remove', function(){  
var button_id = $(this).attr("id");   
$('#row'+button_id+'').remove();  
});
});
</script>
<!--<script>
    function addpercentage(){
     var price = $("#price").val();
     var discount_price = $("#discount_price").val(); 
       var discount_percentage =   (price-discount_price);
    $("#discount_percentage").val(discount_percentage/price*100) 
    }
  </script>-->
  
</body>


<!-- forms-advanced-form.html  21 Nov 2019 03:55:08 GMT -->
</html>