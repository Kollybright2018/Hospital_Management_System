<?php 
session_start();
if (isset($_SESSION['patient'])==0) {
	header("location:../index.php");
}
include ("../inc/db.php");
 
if (isset($_POST['submit'])) {
	$title = mysqli_real_escape_string($db, $_POST['title']);
	$msg = mysqli_real_escape_string($db, $_POST['msg']);
	$username = $_SESSION['patient'];
	$insert = mysqli_query($db, "INSERT INTO report(title, message, username, date_send)
	VALUES('$title', '$msg', '$username', NOW())	");
	if ($insert) {
		echo '<Script> alert("Thanks Report Submitted");  </Script>';
	}else{
		die('error arise'. mysqli_error($db));
	}
}



 ?>




<!DOCTYPE html>
<html>
<head>
	<title> Patient Dashboard </title>
	<?php 
include("../inc/head.php");
 ?>

</head>
<body>
<?php 
include("../inc/header.php");
 ?>

<div class="container">
	 <div class="col-md-12"> 
		<div class="row">
			<!-- sidebar -->
			<div class="col-md-2 pt-2 bg-info" style="margin-left: -195px ;">
				<!-- sidebar navbar -->
				<?php 
				include("../inc/sidebar.php");
				 ?>
				<!-- end sidebar nav -->
			</div>
			<!--End sidebar -->
			<div class="col-md-10">
				<h4 class="my-2 text-center display-2">Admin Dahboard</h4>
				<div class="col-md-12">
					<div class="row ">
						<div class="col-md-3 bg-info mx-3 my-2 " style="height: 150px">
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-8 pt-2"> 
										<h5 class="" style="color: white">My Profile</h5>
									</div>


									<div class="col-md-4 pt-2  my-2">
										<span><a href="profile.php"><i class="fa fa-user-circle fa-3x" style="color: white;"></i></a></span>
									</div>
								</div>
							</div>
						</div>


						<div class="col-md-3 bg-success mx-3 my-2" style="height: 150px">
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-8 pt-2"> 
										
										<h5 class="" style="color: white">Book Appointment</h5>

									</div>
									<div class="col-md-4 pt-2">
										<span><a href="#"><i class="fa fa-calendar-plus fa-3x" style="color: white;"></i></a></span>
									</div>
								</div>
							</div>
						</div>


						<div class="col-md-3 bg-warning my-2 mx-3 " style="height: 150px">
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-8 pt-2"> 
										<h5 class="" style="color: white">My invoice</h5>
										
									</div>
									<div class="col-md-4 pt-2 ">
										<span><a href="#"><i class="fa fa-procedures fa-3x" style="color: white;"></i></a></span>
									</div>
								</div>
							</div>
						</div>

			
			
						<div class="col-md-12 pt-4">
							<div class="row">
								<div class="col-md-8 offset-3" >
									<div class="card">
										<div class="card-header"><h2 class="text-center">Send a Report</h2> </div>
										<div class="card-body">
											<form method="post" class="form my-2">
										
												<div class="form-group">
													<label>Title</label>
													<input type="input" name="title" class="form-control" placeholder="Enter Username" autocomplete="off" required>
												</div>
												<div class="form-group">
													<label>Message</label>
													<input type="input" name="msg" class="form-control" placeholder="Enter a Report" autocomplete="off" required>
												</div>
												<input type="submit" name="submit" value="Send Report" class="btn btn-success">
												
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				
			</div>
				

			</div>
		</div>


 	</div> 
	

</div>

</body>
</html>