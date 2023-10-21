<?php
@ob_start();
@session_start();
include('include/config.php');
if(!isset($_SESSION['id']) || $_SESSION['id'] == "") 
{
    header('location:login.php');

}
	if ((!empty($_POST['email']))&&(!empty($_POST['unique_code']))&&(!empty($_POST['password']))){

		$email=$_POST['email'];
		$unique_code=$_POST['unique_code'];
		$password=md5($_POST['password']);

		// SQL query that sets the status
		// to 1 to indicate activation.
		$vendorQuery = "SELECT * FROM vendors WHERE email = '".$email."' AND unique_code = '".$unique_code."'  ";

  		$getResult = mysqli_query($conn,$vendorQuery);

  		if(mysqli_num_rows($getResult) > 0){
		$sql="UPDATE `vendors` SET `password`='".$password."',`update_date`=now() WHERE email='$email'";

			

		// Execute the query
		if(mysqli_query($conn,$sql)){
			echo '<script>alert("Password Changed Successfully");</script>';
          	echo '<script>window.location.href = "vendorList.php";</script>';

		}else{
			echo '<script>alert("Failed");</script>';
          	echo '<script>window.location.href = "vendorList.php";</script>';
		}
		}else{
			echo '<script>alert("Please Check Email-Id And Unique Code");</script>';
          	echo '<script>window.location.href = "vendorList.php";</script>';
		}

	}

?>