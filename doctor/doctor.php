<?php 
session_start();
if (isset($_SESSION['doctor'])==0) {
	header("location:../index.php");
}
include ("../inc/db.php");
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Da</title>
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
										<h5 class="" style="color: white">0</h5>
										<h5 class="" style="color: white">Total </h5>
										<h5 class="" style="color: white">Appointment</h5>

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
										<h5 class="" style="color: white">0</h5>
										<h5 class="" style="color: white">Total </h5>
										<h5 class="" style="color: white">Patient</h5>
									</div>
									<div class="col-md-4 pt-2 ">
										<span><a href="#"><i class="fa fa-procedures fa-3x" style="color: white;"></i></a></span>
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