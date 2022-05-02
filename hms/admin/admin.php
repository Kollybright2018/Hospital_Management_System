<?php 
session_start(); 
if (isset($_SESSION['username'])==0) {
	header("location:../index.php");
}
include("../inc/db.php");
	 $message = "";	

if (isset($_POST['add'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	$image    = $_FILES['img']['name'];
	$error = array();
	$select = mysqli_query($db, "SELECT username FROM admin WHERE username = '$username'");
	$count =mysqli_num_rows($select);
	if ($count>0) {
		$error['u'] ="Username Already Taken Try Another Username";
	}else{
		$insert =mysqli_query($db, "INSERT INTO admin(username, password, profile)
			value('$username', md5('$password'), '$image')");
		     $message="Admin Added Successfully"; 
			if ($insert) {
				move_uploaded_file($_FILES['img']['tmp_name'], "image/$image");
			}
	}

}


//delete admin
if (isset($_GET['id'])) {
	
	$id = $_GET['id'];
	$delete = mysqli_query($db, "DELETE FROM admin WHERE id = '$id'");
	
	 	 $message= "Deleted Successfully";
}
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
 							<h5 class="text-center"> All Admin</h5>
 							<?php if (isset($message)): ?>
 									<div class="alert alert-info alert-dismissible">
 										<button type="btn" class="close" data-dismiss="alert">&times;</button>
 										<strong class="text-center"><?php echo $message; ?> </strong>
 									</div>
 									<?php else: ?>
 										<div class="alert alert-success alert-dismissible">
 										<button type="btn" class="close" data-dismiss="alert">&times;</button>
 										<strong class="text-center"><?php echo $message; ?> </strong>
 									</div>
 								<?php endif ?>

								<?php
								$ad = $_SESSION['username'];
								$select = mysqli_query($db, "SELECT * FROM admin WHERE username != '$ad' ");
								$output = "";
								$count = mysqli_num_rows ($select);
									
									if ($count <1):  ?>
									<div class="text-center"><h5>No New Admin</h5></div>
									<?php else: ?>
 							<table class="table table-bordered">
 								
 								<thead>
 									<th>ID</th>
 									<th>Username</th>
 									<th style="width: 10% ;">Action</th>
 								</thead>
 									
 										<?php foreach ($select as $admin): ?>
 											
 									<tr>
 										<td><?php echo  $admin['id']; ?></td>
 										<td> <?php echo $admin['username']; ?></td>
 										<td>
 											<a href='admin.php?id=<?php echo $admin['id'] ?>'><button id="$id" class="btn btn-danger remove">Remove</button></a>
 										</td>
 									</tr>
 								<?php endforeach ?>
 									<?php endif; ?>
 							</table>
 						</div>

 						<div class="col-md-6">
 							
 							<div class="card">
 								<div class="card-header">
 									<h5 class="text-center"> Add Admin</h5>
 								</div>
 								<div class="card-body">
 									<?php if (isset($error['u'])): ?>
 							  						<div class="alert alert-danger data-dismissible">
 							  						<button type="button" data-dismiss="alert" class="close">&times;</button>
 							  						<strong><?php echo $error['u']; ?> </strong>	
 							  					</div>
 							  					<?php endif; ?>
 									<form method="post" class="form my-2" enctype="multipart/form-data">
 							  				
 							  				

 							  					<div class="form-group">
 							  						<label>Username</label>
 							  						<input type="input" name="username" class="form-control" placeholder="Enter Username" autocomplete="off" required>
 							  					</div>
 							  					<div class="form-group">
 							  						<label>Password</label>
 							  						<input type="Password" name="password" class="form-control" placeholder="Enter Password" autocomplete="off" required>
 							  					</div>

 							  					<div class="form-group">
 							  						<label>Add Admin image</label>
 							  						<input type="file" name="img" class="form-control" required>
 							  					</div>


 							  					<input type="submit" name="add" value="Add New Admin" class="btn btn-success">
 							  					
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