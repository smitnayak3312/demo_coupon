	<?php 
	include('include/config.php');
$queryuser="select * from user where id='".$_SESSION['id']."'";
$queryuserprofile=mysqli_query($conn,$queryuser);
$data=mysqli_fetch_array($queryuserprofile); 
?>
		<div class="col-sm-4">
			<div class="profile-sidebar">
				<!-- SIDEBAR USERPIC -->
			
				<!-- END SIDEBAR USERPIC -->
				<!-- SIDEBAR USER TITLE -->
				<div class="profile-usertitle">
					<div class="profile-usertitle-name">
					Welcome <?=$data['name'];?>
					</div>
			
				<!-- END SIDEBAR USER TITLE -->
				<!-- SIDEBAR BUTTONS -->
					
				</div>
				
				<!-- END SIDEBAR BUTTONS -->
				<!-- SIDEBAR MENU -->
				<div class="profile-usermenu">
					<ul class="nav">
						<li class="active">
							<a href="<?=$Baseurl?>profile.php">
							<i class="glyphicon glyphicon-home"></i>
							Overview </a>
						</li>
						<li>
							<a href="<?=$Baseurl?>view_profile.php">
							<i class="glyphicon glyphicon-user"></i>
							 View Profile </a>
						</li>
					
					  	<li>
                        <a href="<?=$Baseurl?>formlist.php">
						<i class="glyphicon glyphicon-th"></i>Form List</a>
						</li>
						<li>
					    
						<li>
                        <a href="<?=$Baseurl?>change-password.php">
						<i class="glyphicon glyphicon-th"></i>Change Password</a>
						</li>
						<li>
						    
						    
							<a href="<?=$Baseurl?>logout.php">
						    <i class="fa fa-sign-out"></i>
							Log out </a>
						</li>
					</ul>
			     </div>
			</div>
		</div>
		