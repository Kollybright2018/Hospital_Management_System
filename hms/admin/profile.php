<?php 
session_start(); 
if (isset($_SESSION['username'])==0) {
	header("location:../index.php");
}
include("../inc/db.php");
	 $message = "";
	 $array ="";
	 $error = array();	
	 $user = $_SESSION['username'];
	 $mes = "";

?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin </title>
		<?php 
	include("../inc/head.php");
	 ?>
</head>
<body>
<?php 
include("../inc/header.php");
 ?>

 <div class="container-fluid">
 	<div class="col-md-12">
 		<div class="row ">
 			<div class="col-md-2  bg-info" style="margin-left: -50px ;">
 				
 					<?php 
				include("sidebar.php");
				 ?>
 			</div>

 			<div class="col-md-10">
 				<div class="col-md-12">
 					<div class="row pt-2">
 						<div class="col-md-6 pt-2">
 							<h4 class="text-center"> Admin Profile</h4>
 							<?php 
 								$image = $_SESSION['image'];
 								if (isset($_POST['update'])) {
 									$image  = $_FILES['image']['name'];
 									$query=mysqli_query($db, "UPDATE admin set profile ='$image'  WHERE  username = '$user'");
 									if ($query) {
 										move_uploaded_file($_FILES['image']['tmp_name'], "image/$image");
 											$message= "Image Change Successfully";
 											$alert = "success";
 									}else{
										$message = "Try Again Error Occur";
										$alert = "danger";
 									}
 								}

 							 ?>

 							 <?php if (isset($message)): ?>
								<div class="alert-dismissible alert alert-<?php echo $alert?> ">
									<button type="button" class="close" data-dismiss="alert">&times;</button>
									<span class="text-center"><?php echo $message; ?></div></span>		 	
 							 <?php endif ?>
 							<div class="card">
 								<img class="card-img-top my-3" src="image/<?php echo $image ?>" style="height: 200px;width: 50%; margin: auto">
 								<div class="card-body">
 									<form class="form" method="POST" enctype="multipart/form-data">
 										<div class="form-group">
 											<label>Change Image</label>
 											<input type="file" name="image" class="form-control" required>
 										</div>
 										<input type="submit" value="Update" class="btn btn-success" name="update">
 										
 									</form>
 								</div>

 							</div>
 							
 						</div>

 						<div class="col-md-6">
 						<h4 class="text-center"> Admin Profile</h4>
 							<?php 
 								$user= $_SESSION['image'];
 								if (isset($_POST['change'])) {
 									$username  = $_POST['username'];
 									$select =mysqli_query($db, "SELECT * FROM admin") ;
 									$query=mysqli_query($db, "UPDATE admin set username ='$username'  WHERE  username = '$user'");
 									$count  = mysqli_num_rows($select);
 									if ($count>0) {
 										$mes = "Username Already Exist";
 										$alert = "danger";
 										# code...
 									}else{
 											if ($query) {
										    $_SESSION['username'] = $username;
 									 		$mes= "username Change Successfully";
 									 		$alert = "success";
 											}
 									}
 									// if ($count>0) {
 									//     $_SESSION['username'] = $username;
 									// 		$message= "username";
 									// 		$alert = "success";
 									// }else{

										// $message = "Try Again Error Occur";
										// $alert = "danger";
 									// }
 								}

 							 ?>

 							 <?php if (isset($mes)): ?>
								<div class="alert-dismissible alert alert-<?php echo $alert?> ">
									<button type="button" class="close" data-dismiss="alert">&times;</button>
									<span class="text-center"><?php echo $mes; ?></div></span>		 	
 							 <?php endif ?>
 							<div class="card">

 								<div class="card-body">
 									<form class="form" method="POST" enctype="multipart/form-data">
 										<div class="form-group">
 											<label>User</label>
 											<input type="text" name="username" class="form-control" placeholder="Enter new Username" required>
 										</div>
 										<input type="submit" value="Change" class="btn btn-success" name="change">
 										
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