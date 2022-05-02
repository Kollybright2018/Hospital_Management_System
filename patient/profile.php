<?php 
session_start();
if (isset($_SESSION['patient'])==0) {
	header("location:../index.php");
}
include ("../inc/db.php");

$doctor = $_SESSION['patient'];
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Patient Profile</title>
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
				<div class="container-fluid">
					
				<h4 class="my-2 text-center display-2">MY PROFILE</h4>
				<div class=" col-md-12">
					<div class="row">
							<?php
							
							$select = mysqli_query($db, "SELECT * FROM patient WHERE username = '$patient'"); 
							$get = mysqli_fetch_assoc($select);
							if (isset($_POST['update'])) {
							 	$img = $_FILES['img']['name'];
							 	$update = mysqli_query($db, "UPDATE patient SET profile = '$img' WHERE username = '$patient'");
							 	if ($update) {
							 	move_uploaded_file($_FILES['img']['tmp_name'],  "image/$img");
							 	$message = "Picture Change Successfully";
							 	$alert  = "success";
							 	}else{
							 		$message = "Network Error";
							 		$alert  = "danger";
							 	}

							 } ?>

						<div class="col-md-5">
							<h2 class="text-center"> Change Profile Picture</h2>
							<div class="card">
								<img src="image/<?php echo $get['profile'] ?>" class="card-img-top">
								<div class="card-body">
									<form class="form" method="POST" enctype="multipart/form-data">
										<input type="file" name="img" class="form-control my-2"required>
										<input type="submit" name="update" class="btn btn-success">
									</form>
								</div>

							 </div>
							 <table class="table">
							 	
							 </table>
						</div>

						<div class="col-md-3"></div>

						<div class="col-md-4">
							<?php 

							if (isset($_POST['uname'])) {
								$uname =$_POST['uname'];
								$update = mysqli_query($db, "UPDATE patient SET username ='$uname' WHERE username ='$pateint' ");
								if ($update) {
										$_SESSION['doctor'] = $uname;
										echo ' <script> alert("username changed Successfully"); </script>';
								}else{
									die(mysqli_error($db));
								}
							}
							 ?>
							
							<h3 class="text-center">Change Username</h3>
							<form method="POST"  class="form my-4">
								<div class="form-group">
											<label> Change Username</label>
											<input type="input" name="uname" class="form-control my-2" value="<?php echo htmlentities($patient, ENT_QUOTES, 'utf-8') ?>" required>
								</div>
						
								<input type="submit" name="changed" class="btn btn-success">
							</form>
							<?php 
							$user = mysqli_query($db, "SELECT * FROM patient WHERE username ='$patient'");
							$fetch = mysqli_fetch_assoc($user);
							$oldp= $fetch['password'];
							if (isset($_POST['pass'])) {
								$o_pass = md5($_POST['o_pass']);
								$n_pass =$_POST['n_pass'];
								$n_pass1 = $_POST['n_pass1'];
								if ($oldp != $o_pass) {
								 	$mes = "Old password is  not correct";
								 	echo ' <script> alert("Old password is  not correct"); </script>';
								 }elseif ($n_pass != $n_pass1) {
								 	$mes = "New Password Does not match";
								 	echo ' <script> alert("New Password Does not match"); </script>';
								 }else{
								 	$update= mysqli_query($db, "UPDATE patient SET password= md5('$n_pass') WHERE username ='$patient'");
								 	echo ' <script> alert("Password changed Successfully"); </script>';
								 } 
							}

							 ?>


							<h3 class="text-center">Change Password</h3>
							<form class="form" method="POST">
								<div class="form-group">
									<label>Old Password</label>
									<input type="Password" name="o_pass" class="form-control" placeholder="Old Password"  required>
								</div>
								<div class="form-group">
									<label>New Password</label>
									<input type="Password" name="n_pass" class="form-control" placeholder="New Password"required>
								</div>
								<div class="form-group">
									<label>Confirm Password</label>
									<input type="Password" name="n_pass1" class="form-control" placeholder="Confirm Password"required>
								</div>
								<input value="Change Password" class="btn btn-info" type="submit" name="pass" >
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

</body>
</html>