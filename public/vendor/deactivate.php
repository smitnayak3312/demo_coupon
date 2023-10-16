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
		$sql="UPDATE `category` SET
			`status`=1 WHERE id='$c_id'";

		// Execute the query
		mysqli_query($conn,$sql);

	header('location: category.php');
	}

	//Sub Category List
	if (isset($_GET['subcategory_id'])){

		$c_id=$_GET['subcategory_id'];

		// SQL query that sets the status
		// to 1 to indicate activation.
		$sql="UPDATE `subcategory` SET
			`status`=1 WHERE id='$c_id'";

		// Execute the query
		mysqli_query($conn,$sql);

	header('location: subcategory.php');

	}

	//Slider List
	if (isset($_GET['slider_id'])){

		$c_id=$_GET['slider_id'];

		// SQL query that sets the status
		// to 1 to indicate activation.
		$sql="UPDATE `slider` SET
			`status`=1 WHERE id='$c_id'";

		// Execute the query
		mysqli_query($conn,$sql);

	header('location: slider.php');

	}

	//Delivery Man List
	if (isset($_GET['delivery_man_id'])){

		$c_id=$_GET['delivery_man_id'];

		// SQL query that sets the status
		// to 1 to indicate activation.
		$sql="UPDATE `delivery_man` SET
			`status`=1 WHERE id='$c_id'";

		// Execute the query
		mysqli_query($conn,$sql);

	header('location: delivery_man.php');

	}
	
	//Coupon List
	if (isset($_GET['coupon_id'])){

		$c_id=$_GET['coupon_id'];

		// SQL query that sets the status
		// to 1 to indicate activation.
		$sql="UPDATE `coupon` SET
			`status`=1 WHERE id='$c_id'";

		// Execute the query
		mysqli_query($conn,$sql);

	header('location: couponList.php');

	}
	//Products List
	if (isset($_GET['product_id'])){

		$c_id=$_GET['product_id'];

		// SQL query that sets the status
		// to 1 to indicate activation.
		$sql="UPDATE `products` SET
			`status`=1 WHERE id='$c_id'";

		// Execute the query
		mysqli_query($conn,$sql);

	header('location: productlist.php');

	}
	
	//Support List
	if (isset($_GET['support_id'])){

		$c_id=$_GET['support_id'];

		// SQL query that sets the status
		// to 1 to indicate activation.
		$sql="UPDATE `support` SET
			`status`=1 WHERE id='$c_id'";

		// Execute the query
		mysqli_query($conn,$sql);

	header('location: supportlist.php');

	}
	
	//User List
	if (isset($_GET['user_id'])){

		$c_id=$_GET['user_id'];

		// SQL query that sets the status
		// to 1 to indicate activation.
		$sql="UPDATE `users` SET
			`status`=1 WHERE id='$c_id'";

		// Execute the query
		mysqli_query($conn,$sql);

	header('location: userlist.php');

	}
	

	
?>
