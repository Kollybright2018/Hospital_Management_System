<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script> -->

		<!-- bootstrap cdn -->
<!-- 	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"> -->
		<!-- font awesome cdn -->
	<!-- 	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> -->
			<!-- jquery cdn slim -->
	<!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.js" integrity="sha256-DrT5NfxfbHvMHux31Lkhxg42LY6of8TaYyK50jnxRnM=" crossorigin="anonymous"></script> -->
		<!-- Google Cdn -->
<!-- 	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 -->
</head>
<body>
  <nav class="navbar navbar-expand-lg navabr-info bg-info">
  	<h5 class="text-white"> Hospital Management System</h5>
  	<div class="mr-auto"></div>

  	<ul class="navbar-nav">
  		<?php if (isset($_SESSION['username'])){
  			$user = $_SESSION['username'];
  			echo '
  			<li class="nav-item"><a class="nav-link text-white" href="adminlogin.php">'. $user .'</a></li>
  			<li class="nav-item"><a class="nav-link text-white" href="logout.php">Logout</a></li>

  			';
  		}elseif (isset($_SESSION['doctor'])) {
        $doctor = $_SESSION['doctor'];

        echo '
        <li class="nav-item"><a class="nav-link text-white" href="adminlogin.php">'. $doctor .'</a></li>
        <li class="nav-item"><a class="nav-link text-white" href="logout.php">Logout</a></li>

        ';
      }
      else{ 
  			echo '
  			<li class="nav-item"><a class="nav-link text-white" href="adminlogin.php">Admin</a></li>
  			<li class="nav-item"><a class="nav-link text-white" href="doctorlogin.php">Doctor</a></li>
  	      	<li class="nav-item"><a class="nav-link text-white" href="#">Patient</a></li>
  			';

  		}
  		 ?>
  			

  		
  		
  	</ul>
  </nav>
</body>
</html>