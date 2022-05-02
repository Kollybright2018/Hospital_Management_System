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
$select = mysqli_query($db, "SELECT * FROM doctor");

?>
<!DOCTYPE html>
<html>
<head>
	<title>All Doctor </title>
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
				include("../inc/sidebar.php");
				 ?>
 			</div>

 			<div class="col-md-10">
 				<h4 class="text-center"> All Doctor</h4>
 				<div class="col-md-12">
 					
 						
 							
 							
 							<table class="table table-bordered">
 								<tr>
 									<thead>
 										<th>ID</th>
 										<th>FULLNAME</th>
 										<th>USERNAME</th>
 										<th>EMAIL</th>
 										<th>PHONE</th>
 										<th>GENDER</th>
 										<th>COUNTRY</th>
 										<th>DATE REG</th>
 										<th>SALARY</th>
 										<th>STATUS</th>
 										<th>PROFILE</th>
 										<th>ACTION</th>
 									</thead>
 								</tr>
  							<?php $i=1; foreach ($select as $doctor ): ?>
  								
  							
 								<tr>
 									<tbody>
 										<td><?php echo $i; ?></td>
 										<td><?php echo $doctor['full_name'] ?></td>
 										<td><?php echo $doctor['username'] ?></td>
 										<td><?php echo $doctor['email'] ?></td>
 										<td><?php echo $doctor['phone_no'] ?></td>
 										<td><?php echo $doctor['gender'] ?></td>
 										<td><?php echo $doctor['country'] ?></td>
 										<td><?php echo $doctor['reg_date'] ?></td>
 										<td><?php echo $doctor['salary'] ?></td>
 										<td><?php echo $doctor['status'] ?></td>
 										<td> <img style="width: 80%;"src="image/<?php echo $doctor['profile'] ?>"></td>
 										<td><a class="btn btn-danger" href="veiw.php">Veiw </a></td>
 									</tbody>
 								</tr>
 							<?php $i++; endforeach ?>
 							</table>
 					</div>
 					
 				</div>
 				
 			</div>
 		</div>
 	</div>

 
 </div>
</body>
</html>