
<?php 
session_start();
include("inc/db.php");
//= s
if (isset($_POST['login'])) {
	
	$username = $_POST['username'];
	$password = $_POST['password'];
	$error = array();
	$select = mysqli_query($db, "SELECT * FROM doctor WHERE username = '$username' AND password = md5('$password')");
	$count =mysqli_num_rows($select);
  $get = mysqli_fetch_assoc($select);
	if ($count ==0) {
		$error['doctor'] = "Incorrect Username  Or Password";
	}elseif ($get['status']==="pending") {
    $error['doctor'] = "Your Request is on pending wait for Admin for Approval";
  }elseif ($get['status']==="rejected") {
    echo ' <script>alert("sorry Application Rejected"); </script> ';
    header("location:index.php");
  }else{
  	echo ' <script>alert("You are Welcome"); </script> ';
		 $_SESSION['doctor'] = $username;
     $_SESSION['image'] = $get['profile'];
		header("location:doctor/index.php");
	 }


}else{

}

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Doctor Apply and Login</title>
    <?php 
include("inc/head.php");
 ?>
</head>
<body style="background-image: url(img/background.jpg);background-size: cover; background-repeat: no-repeat;">
  <?php include("inc/header.php"); ?>
  <div class="container pt-3">
  	<div class="col-md-12">
  		<div class="row">
  			<div class="col-md-3">
  				
  			</div>
          <!-- Login -->
        <div class="col-md-6 card">
  			<h4 class="text-center">Doctors Login</h4>
  				<form method="post" class="form my-2">
  				
  					<?php if (isset($error['doctor'])): ?>
  						<div class="alert alert-danger data-dismissible">
  						<button type="button" data-dismiss="alert" class="close">&times;</button>
  						<strong><?php echo $error['doctor']; ?> </strong>	
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
          <p class="text-center">You dont Have account Before Click <a href="doctorreg.php">Here</a> To Apply</p>
  			</div>

        <!--End Of Login -->

        <div class="col-md-3">
          
        </div>
  		</div>
  	</div>
  </div>
</body>
</html>