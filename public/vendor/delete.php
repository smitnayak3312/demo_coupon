<?php
@ob_start();
@session_start();
include('include/config.php');
if(!isset($_SESSION['id']) || $_SESSION['id'] == "") 
{
	header('location:login.php');
}

//Category List
	if (isset($_GET['category_id'])){

		$c_id=$_GET['category_id'];

		// SQL query that sets the status
		// to 1 to indicate activation.
		$sql="DELETE FROM `category` WHERE  id='".$c_id."'";

		// Execute the query
		mysqli_query($conn,$sql);

	header('location: category.php');

	}

	//Subcategory List
	if (isset($_GET['subcategory_id'])){

		$c_id=$_GET['subcategory_id'];

		// SQL query that sets the status
		// to 1 to indicate activation.
		$sql="DELETE FROM `subcategory` WHERE  id='".$c_id."'";

		// Execute the query
		mysqli_query($conn,$sql);

	header('location: subcategory.php');

	}
	//Slider List
	if (isset($_GET['slider_id'])){

		$c_id=$_GET['slider_id'];

		// SQL query that sets the status
		// to 1 to indicate activation.
		$sql="DELETE FROM `slider` WHERE  id='".$c_id."'";

		// Execute the query
		mysqli_query($conn,$sql);

	header('location: slider.php');

	}
	//Deliveryman List
	if (isset($_GET['delivery_man_id'])){

		$c_id=$_GET['delivery_man_id'];

		// SQL query that sets the status
		// to 1 to indicate activation.
		$sql="DELETE FROM `delivery_man` WHERE  id='".$c_id."'";

		// Execute the query
		mysqli_query($conn,$sql);

	header('location: delivery_man.php');

	}

	//Coupon List
	if (isset($_GET['coupon_id'])){

		$c_id=$_GET['coupon_id'];

		// SQL query that sets the status
		// to 1 to indicate activation.
		$sql="DELETE FROM `coupon` WHERE  id='".$c_id."'";

		// Execute the query
		mysqli_query($conn,$sql);

	header('location: couponList.php');

	}
	//Products List
	if (isset($_GET['product_id'])){

		$c_id=$_GET['product_id'];

		// SQL query that sets the status
		// to 1 to indicate activation.
		$sql="DELETE FROM `products` WHERE  id='".$c_id."'";

		// Execute the query
		mysqli_query($conn,$sql);

	header('location: productlist.php');

	}
	//Home Category List
	if (isset($_GET['homecategory_id'])){

		$c_id=$_GET['homecategory_id'];

		// SQL query that sets the status
		// to 1 to indicate activation.
		$sql="DELETE FROM `home_category` WHERE  id='".$c_id."'";

		// Execute the query
		mysqli_query($conn,$sql);

	header('location: productlist.php');

	}
	
	if (isset($_GET['menuId'])){

		$c_id=$_GET['menuId'];

		// SQL query that sets the status
		// to 1 to indicate activation.
		$sql="DELETE FROM `menu` WHERE  id='".$c_id."'";

		// Execute the query
		mysqli_query($conn,$sql);

	header('location: menuList.php');

	}
	
	if (isset($_GET['edittimeId'])){

		$c_id=$_GET['edittimeId'];

		// SQL query that sets the status
		// to 1 to indicate activation.
		$sql="DELETE FROM `timing` WHERE md5(id)='".$c_id."'";

		// Execute the query
		mysqli_query($conn,$sql);

	header('location: timing.php');

	}



?>