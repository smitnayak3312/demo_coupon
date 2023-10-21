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
	//introscreen List
	if (isset($_GET['intro_id'])){

		$c_id=$_GET['intro_id'];

		// SQL query that sets the status
		// to 1 to indicate activation.
		$sql="UPDATE `introscreen` SET
			`status`=1 WHERE id='$c_id'";

		// Execute the query
		mysqli_query($conn,$sql);

	header('location: introscreenList.php');

	}
    //edit coupon List
	if (isset($_GET['coupontype_id'])){

		$c_id=$_GET['coupontype_id'];

		// SQL query that sets the status
		// to 1 to indicate activation.
		$sql="UPDATE `coupon_type` SET
			`status`=1 WHERE id='$c_id'";

		// Execute the query
		mysqli_query($conn,$sql);

	header('location: coupontypeList.php');

	}
	
	if (isset($_GET['notiId'])){

		$notiId=$_GET['notiId'];

		// SQL query that sets the status
		// to 1 to indicate activation.
		$sql="UPDATE `notification` SET
			`status`=1 WHERE id='$notiId'";

		// Execute the query
		mysqli_query($conn,$sql);

	header('location: notificationList.php');

	}

	//request Id 
	if (isset($_GET['requestId'])&&isset($_GET['vendorId']) &&isset($_GET['amount'])){

		$requestId=$_GET['requestId'];
		$vendorId=$_GET['vendorId'];
		$amount=$_GET['amount'];

		// SQL query that sets the status
		// to 1 to indicate activation.
		$sql="UPDATE `vendor_withdrawal_history` SET
			`status`=2,`update_date`=now() WHERE id='$requestId'";

		$sql_two="UPDATE `wallet` SET
			`total_amount`=total_amount+$amount WHERE vendorId='$vendorId'";

		// Execute the query
		mysqli_query($conn,$sql);
		mysqli_query($conn,$sql_two);

	header('location: withdrawalList.php');

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
	if (isset($_GET['rateId'])){

		$rateId=$_GET['rateId'];

		// SQL query that sets the status
		// to 1 to indicate activation.
		$sql="UPDATE `ratings` SET
			`status`=1 WHERE id='$rateId'";

		// Execute the query
		mysqli_query($conn,$sql);

	header('location: showRatings.php');

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
	
	
	//offer List
	if (isset($_GET['offerId'])){

		$offerId=$_GET['offerId'];

		// SQL query that sets the status
		// to 1 to indicate activation.
		$sql="UPDATE `offers` SET
			`status`=1 WHERE id='$offerId'";

		// Execute the query
		mysqli_query($conn,$sql);

	header('location: offerList.php');

	}
	

	
?>
