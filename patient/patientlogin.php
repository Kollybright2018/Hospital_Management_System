
<?php 
session_start();
include("../inc/db.php");
//= s
if (isset($_POST['login'])) {
	
	$username = $_POST['username'];
	$password = $_POST['password'];
	$error = array();
	$select = mysqli_query($db, "SELECT * FROM patient WHERE username = '$username' AND password = md5('$password')");
	$count =mysqli_num_rows($select);
  $get = mysqli_fetch_assoc($select);
	if ($count ==0) {
		$error['patient'] = "Incorrect Username  Or Password";
	}else{
  	echo ' <script>alert("You are Welcome"); </script> ';
		 $_SESSION['patient'] = $username;
     $_SESSION['image'] = $get['profile'];
		header("location:patient.php");
	 }


}else{

}

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>PatientLogin</title>
    <?php 
include("../inc/head.php");
 ?>
</head>
<body style="background-image: url(img/background.jpg);background-size: cover; background-repeat: no-repeat;">
  <?php include("../inc/header.php"); ?>
  <div class="container pt-3">
  	<div class="col-md-12">
  		<div class="row">
  			<div class="col-md-3">
  				
  			</div>
          <!-- Login -->
        <div class="col-md-6 card">
  			<h4 class="text-center">Patient Login</h4>
  				<form method="post" class="form my-2">
  				
  					<?php if (isset($error['patient'])): ?>
  						<div class="alert alert-danger data-dismissible">
  						<button type="button" data-dismiss="alert" class="close">&times;</button>
  						<strong><?php echo $error['patient']; ?> </strong>	
  					</div>
  					<?php endif; ?>
  					<div class="form-group">
  						<label>Username</label>
  						<input type="input" name="username" class="form-control" placeholder="Enter Username" autocomplete="off" required>
  					</div>
  					<div class="form-group">
  						<label>Password</label>
  						<input type="Password" name="password" class="form-control" placeholder="Enter Password" autocomplete="off" required>
  					</div>
  					<input type="submit" name="login" value="Login" class="btn btn-success">
  					
  				</form>
          <p class="text-center">You dont Have account Before Click <a href="patientreg.php">Here</a> To Apply</p>
  			</div>

        <!--End Of Login -->

        <div class="col-md-3">
          
        </div>
  		</div>
  	</div>
  </div>
</body>
</html>