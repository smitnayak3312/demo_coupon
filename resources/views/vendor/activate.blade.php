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
			`status`=0 WHERE id='$c_id'";

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
			`status`=0 WHERE id='$c_id'";

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
			`status`=0 WHERE id='$c_id'";

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
			`status`=0 WHERE id='$c_id'";

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
			`status`=0 WHERE id='$c_id'";

		// Execute the query
		mysqli_query($conn,$sql);

	header('location: coupontypeList.php');

	}

	//Delivery Man List
	if (isset($_GET['notiId'])){

		$notiId=$_GET['notiId'];

		// SQL query that sets the status
		// to 1 to indicate activation.
		$sql="UPDATE `notification` SET
			`status`=0 WHERE id='$notiId'";

		// Execute the query
		mysqli_query($conn,$sql);

	header('location: notificationList.php');

	}
	
	//Coupon List
	if (isset($_GET['coupon_id'])){

		$c_id=$_GET['coupon_id'];

		// SQL query that sets the status
		// to 1 to indicate activation.
		$sql="UPDATE `coupon` SET
			`status`=0 WHERE id='$c_id'";

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
			`status`=0 WHERE id='$rateId'";

		// Execute the query
		mysqli_query($conn,$sql);

	header('location: showRatings.php');

	}

	//request Id 
	if (isset($_POST['requestId'])&&isset($_POST['paymentId'])&&(!empty($_POST['transactionId']))){

		$requestId=$_POST['requestId'];
		$paymentId=$_POST['paymentId'];
		$transactionId=$_POST['transactionId'];

		// SQL query that sets the status
		// to 1 to indicate activation.
		$vendorQuery = "SELECT * FROM vendor_withdrawal_history WHERE transactionId = '".$transactionId."' AND id = '".$requestId."'  ";

  		$getResult = mysqli_query($conn,$vendorQuery);

  		if(mysqli_num_rows($getResult) > 0){
		$sql="UPDATE `vendor_withdrawal_history` SET
			`status`=1,`paymentId`='".$paymentId."',`update_date`=now() WHERE id='$requestId'";

			

		// Execute the query
		mysqli_query($conn,$sql);

		header('location: withdrawal.php');
		}else{
			echo '<script>alert("Please Check Id And Transaction Id");</script>';
          	echo '<script>window.location.href = "withdrawal.php";</script>';
		}

	}
	
	//Support List
	if (isset($_GET['support_id'])){

		$c_id=$_GET['support_id'];

		// SQL query that sets the status
		// to 1 to indicate activation.
		$sql="UPDATE `support` SET
			`status`=0 WHERE id='$c_id'";

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
			`status`=0 WHERE id='$c_id'";

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
			`status`=0 WHERE id='$offerId'";

		// Execute the query
		mysqli_query($conn,$sql);

	header('location: offerList.php');

	}


?>
