
<?php 
session_start();
include("inc/db.php");
//= s
if (isset($_POST['login'])) {
	
	$username = $_POST['username'];
	$password = $_POST['password'];
	$error = array();
	$select = mysqli_query($db, "SELECT * FROM admin WHERE username = '$username' AND password = md5('$password')");
	$count =mysqli_num_rows($select);
  $get = mysqli_fetch_assoc($select);
	if ($count ==0) {
		$error['admin'] = "Incorrect Username  Or Password";
	}else{
	//	echo ' <script>alert("Invalid uername or password"); </script> ';
		 $_SESSION['username'] = $username;
     $_SESSION['image'] = $get['profile'];
		header("location:admin/index.php");
	 }


}else{

}

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin login page</title>
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

  			<div class="col-md-6 jumbotron">
  				<img src="img/admin.jpg" class="col-sm-10 rounded-circle">
  				<form method="post" class="form my-2">
  				
  					<?php if (isset($error['admin'])): ?>
  						<div class="alert alert-danger data-dismissible">
  						<button type="button" data-dismiss="alert" class="close">&times;</button>
  						<strong><?php echo $error['admin']; ?> </strong>	
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
  			</div>
  		</div>
  	</div>
  </div>
</body>
</html>