

<!DOCTYPE html>
<html>
<head>
	<title>HMS Homepage</title>
		<?php 
include("inc/head.php");
 ?>
</head>
<body>
	<!-- header -->
<?php include("inc/header.php");?>

		<!-- container -->
		<div class="container mt-3">
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-3 mx-1 shadow ">
						<img src="img/info.png " style="width:100%;">

							<h5 class="text-center">For More Information </h5>
						<a class="" href="#"> <button class="btn btn-success ml-5"> Click Here</button></a>
					</div>

					<div class="col-md-4 mx-1 shadow ">
						<img src="img/patient.jpg" style= "width:100%;" >

						<h5 class="text-center">Create Your Account To serve You better</h5>
						<a class="" href="#"> <button class="btn btn-success ml-3"> Create Account </button></a>
					</div>

					<div class="col-md-4 mx-1 shadow ">
						<img src="img/doctor.jpg"  style= "width: 100%;">

						<h5 class="text-center">We Are Looking Doctor</h5>
						<a class="" href="doctorreg.php"> <button class="btn btn-success ml-5"> Apply Now !!! </button></a>
					</div>
				</div>
				
			</div>
		</div>
</body>
</html>