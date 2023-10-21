<?php
    @ob_start();
    @session_start();
    include('include/config.php');
    if(!isset($_SESSION['id']) || $_SESSION['id'] == "") 
    {
    	header('location:login.php');
    }

    $variantId=trim($_GET['variantId']);
    $deleteVariantQuery=mysqli_query($conn,"UPDATE `product_variant` SET `status` = '0' WHERE  id='".$variantId."'");
    if($deleteVariantQuery)
    {
        echo 1;
        exit;
    }
    else{
        echo 0;
        exit;
    }

 
?>