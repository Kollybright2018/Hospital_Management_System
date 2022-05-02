<?php 
session_start();
if (isset($_SESSION['username'])==0) {
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
	<!-- <div class="col-md-12"> -->
		<div class="row">
			<!-- sidebar -->
			<div class="col-md-2 pt-2 bg-info" style="margin-left: -115px ;">
				<!-- sidebar navbar -->
				<?php 
				include("sidebar.php");
				 ?>
				<!-- end sidebar nav -->
			</div>
			<!--End sidebar -->

			<div class="col-md-10">
				<h4 class="my-2">Admin Dahboard</h4>
				<div class="col-md-12  my-5">
					<div class="row">
					<div class="col-md-3 bg-success mx-2" style="height: 130px; ">
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-9">
									<?php 
									$ad = mysqli_query($db, "SELECT * FROM admin");
									$num = mysqli_num_rows($ad);

									 ?>
									<h5 class="my-2 text-center text-white" style="font-size: 30px" ><?php echo $num; ?></h5>
									<h5 class="text-white">Total</h5>
									<h5 class="text-white">Admin</h5>
								</div>

								<div class="col-md-3">
									<a href="admin.php">
									<i class="fa fa-users-cog fa-3x my-4 pr-3 "  style="color: white;"  ></i>	
									</a>
									
								</div>
							</div>
							
						</div>
						
					</div>

					<div class="col-md-3 bg-info mx-2" style="height: 130px; ">
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-9">
									<h5 class="my-2 text-center text-white" style="font-size: 30px" >0</h5>
									<h5 class="text-white">Total</h5>
									<h5 class="text-white">Doctor</h5>
								</div>

								<div class="col-md-3">
									<a href="">
									<i class="fa fa-user-md fa-4x my-4 pr-3 "  style="color: white;"  ></i>	
									</a>
									
								</div>
							</div>
							
						</div>
						
					</div>

					<div class="col-md-3 bg-warning mx-2" style="height: 130px; ">

						<div class="col-md-12">
							<div class="row">
								<div class="col-md-9">
									<h5 class="my-2 text-center text-white" style="font-size: 30px" >0</h5>
									<h5 class="text-white">Total</h5>
									<h5 class="text-white">Patient</h5>
								</div>

								<div class="col-md-3">
									<a href="">
									<i class="fa fa-procedures fa-3x my-4 pr-3 "  style="color: white;"  ></i>	
									</a>
									
								</div>
							</div>
							
						</div>
					</div>

					<div class="col-md-3 bg-danger mx-2 my-2" style="height: 130px; ">

						<div class="col-md-12">
							<div class="row">
								<div class="col-md-9">
									<h5 class="my-2 text-center text-white" style="font-size: 30px" >0</h5>
									<h5 class="text-white">Total</h5>
									<h5 class="text-white">Report</h5>
								</div>

								<div class="col-md-3">
									<a href="">
									<i class="fa fa-flag fa-3x my-4 pr-3 "  style="color: white;"  ></i>	
									</a>
									
								</div>
							</div>
							
						</div>
					</div>

					<div class="col-md-3 bg-warning mx-2 my-2" style="height: 130px; ">
						<div class="col-md-12">
							<div class="row">
								<?php 
									$req =mysqli_query($db, "SELECT * FROM doctor WHERE status= 'pending' ");
									$count =mysqli_num_rows($req);
								 ?>
								<div class="col-md-9">
									<h5 class="my-2 text-center text-white" style="font-size: 30px" ><?php echo($count) ;?></h5>
									<h5 class="text-white">Total</h5>
									<h5 class="text-white">Job Request</h5>
								</div>

								<div class="col-md-3">
									<a href="job_request.php">
									<i class="fa fa-book-open fa-3x my-4 pr-3 "  style="color: white;"  ></i>	
									</a>
									
								</div>
							</div>
							
						</div>
						
					</div>

					<div class="col-md-3 bg-success mx-2 my-2" style="height: 130px; ">

						<div class="col-md-12">
							<div class="row">
								<div class="col-md-9">
									<h5 class="my-2 text-center text-white" style="font-size: 30px" >0</h5>
									<h5 class="text-white">Total</h5>
									<h5 class="text-white">Income</h5>
								</div>

								<div class="col-md-3">
									<a href="">
									<i class="fa fa-money-check-alt fa-3x my-4 pr-3 "  style="color: white;"  ></i>	
									</a>
									
								</div>
							</div>
							
						</div>
					</div>
				</div>
				
				</div>
				

			</div>

		</div>
<!-- 	</div> -->
	
</div>

</body>
</html>