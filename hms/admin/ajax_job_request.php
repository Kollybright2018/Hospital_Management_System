<?php 
include ("../inc/db.php");
$select =  mysqli_query($db, "SELECT * FROM doctor WHERE status = 'Pending' ORDER BY reg_date ASC ");
$output  ="";


$output .="
			<table class= 'table table-bordered'>
					<thead>
						<th>ID</th>
						<th>Full Name</th>
						<th>Username</th>
						<th>Email</th>
						<th>Gender</th>
						<th>Country</th>
						<th>Phone No</th>
						<th> Registration Date</th>
						<th>Action </th>
				
	";
if (mysqli_num_rows($select)<1) {
	$output .="
		<tr>
		<td colspan ='8'> No Job Request </td>
		</tr>
	";	

	while ($row = mysqli_fetch_array($select)) {
		$output.= "
			<tr> 
			<td> ".$row['id']. " </td>
			<td> ".$row['full_name']. " </td>
			<td> ".$row['username']. " </td>
			<td> ".$row['email']. " </td>
			<td> ".$row['gender']. " </td>
			<td> ".$row['country']. " </td>
			<td> ".$row['phone_no']. " </td>
			<td> ".$row['reg_date']. " </td>
			<td>  <div class='col-md-12'>
 	<div class='row'>
 		<div class='col-md-6'>
 			<a href='#'><button class='btn btn-success'>Accept</button></a>
 		</div>

 		<div class='col-md-6'>
 			<a href='#'><button class='btn btn-danger'>Reject</button></a>
 		</div>
 	</div>
 </div>  </td>

			</tr>

		"; 
	}

	$output .= "
			</thead>
					
			</table>
";
echo($output);

}
 ?>

