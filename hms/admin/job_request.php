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
				<h4 class="my-2 text-center ">Job Request</h4>
			
				<div class="" id="show">
					
				</div>

				</div>
				

				<script>
					$(document).ready(function(){
						show();
						function show(){
							$.ajax({
								url:"ajax_job_request.php",
								method:"POST",
								success:function(data){
									$("#show").html(data);
								}


							})
						}
					});

				</script>
			</div>

		</div>
<!-- 	</div> -->
	
</div>

</body>
</html>