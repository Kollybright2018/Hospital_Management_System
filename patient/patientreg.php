
<?php 
session_start();
include("../inc/db.php");
if(isset($_POST['create'])){
  $fname = $_POST['fname'];
  $username = $_POST['username'];
  $email = $_POST['email'];
  $gender = $_POST['gender'];
  $phone_no = $_POST['phone_no'];
  $country = $_POST['country'];
  $password = $_POST['password'];
  $con_password = $_POST['con_password'];
  $error = array(); 
  if ( ($password != $con_password) ) {
      $error['reg'] = "Password does not match" ;
  }else{

    $select = mysqli_query($db, "SELECT * FROM patient WHERE  email = '$email'");
    $count = mysqli_num_rows($select);
    if ($count > 0) {
         $error['reg'] = "User Already Exist" ;   
    }else{
      $insert =mysqli_query($db, "INSERT INTO patient (full_name, username, email, gender, phone_no, country, password, reg_date, profile) VALUES ('$fname', '$username', '$email', '$gender', '$phone_no', '$country', md5('$password'),  NOW(), 'bright.jpg')");
      if($insert){
       echo "<script > alert('Doctor application done')</script>";
       header("location:patientlogin.php");
      }else{
         die(mysqli_error($db) );
      }

    }
  }
}

 ?>

<!DOCTYPE html>
<html>
<head>

	<title>Patient Registration</title>
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
  			<h4 class="text-center">Patient Registration</h4>
        <?php if (isset($error['reg'])): ?>
          <div class="alert alert-danger data-dismissible">
            <button class="close" data-dismiss="alert" >&times;</button>
            <strong> <?php print_r($error['reg']) ;?></strong>
          </div>          
        <?php endif ?>
  				<form method="POST" class="form my-2">
  		
  					<?php if (isset($error['admin'])): ?>
  						<div class="alert alert-danger data-dismissible">
  						<button type="button" data-dismiss="alert" class="close">&times;</button>
  						<strong><?php echo $error['admin']; ?> </strong>	
  					</div>
  					<?php endif; ?>
  					<div class="form-group">
  						<label>Full Name</label>
  						<input type="input" name="fname" class="form-control" placeholder="Enter Full Name" autocomplete="off" required value="<?php if(isset($_POST['fname'])){echo($_POST['fname']);} ?>">

  					</div>

              <div class="form-group">
              <label>Username:</label>
              <input type="input" name="username" class="form-control" placeholder="Enter Username" autocomplete="off" required value="<?php if(isset($_POST['fname'])){echo($_POST['username']);} ?>">
            </div>

              <div class="form-group">
              <label>Email:</label>
              <input type="email" name="email" class="form-control" placeholder="Enter Email" autocomplete="off" required value="<?php if(isset($_POST['fname'])){echo($_POST['email']);} ?>">
            </div>

             <div class="form-group">
              <label>Gender:</label>
              <select name="gender" class="form-control">
                <option>Select Gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
              </select>
            </div>

          
         <div class="form-group">
              <label>Phone No</label>
              <input type="number" name="phone_no" class="form-control" placeholder="Enter phone no" autocomplete="off" required value="<?php if(isset($_POST['fname'])){echo($_POST['phone_no']);} ?>">
            </div>

              <div class="form-group">
              <label>Country:</label>
              <select name="country" class="form-control">
                <option>Select Gender</option>
                <option value="Nigeria">Nigeria</option>
                <option value="Canada">Canada</option>
                <option value="India">Indian</option>
                <option value="Ghana">Ghana</option>
              </select>
            </div>

              <div class="form-group">
              <label>Password</label>
              <input type="Password" name="password" class="form-control" placeholder="Enter Password" autocomplete="off" required >
            </div>

            <div class="form-group">
              <label>Confirm Password</label>
              <input type="Password" name="con_password" class="form-control" placeholder="Enter Password" autocomplete="off" required >
            </div>

  					<input type="submit" name="create" value="Create Account" class="btn btn-success">
  					 
  				</form>
          <p class="text-center">Already a Memeber Click <a href="patientlogin.php">Here</a> To Log in</p>
  			</div>

        <!--End Of Login -->

        <div class="col-md-3">
          
        </div>
  		</div>
  	</div>
  </div>
</body>
</html>