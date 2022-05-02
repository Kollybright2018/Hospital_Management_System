<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'registration');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO users (username, email, password) 
  			  VALUES('$username', '$email', '$password')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: index.php');
  }
}

// ... 

// if (isset($_POST['add'])) {
//   $username = $_POST['username'];
//   $password = $_POST['password'];
//   $image    = $_FILES['img']['name'];
//   $error = array();
//   $select = mysqli_query($db, "SELECT username FROM admin WHERE username = '$username'");
//   $count =mysqli_num_rows($select);
//   if ($count>0) {
//     $error['u'] ="Username Already Taken Try Another Username";
//   }else{
//     $insert =mysqli_query($db, "INSERT INTO admin(username, password, profile)
//       value('$username', md5('$password'), '$image')");
//          $message="Admin Added Successfully"; 
//       if ($insert) {
//         move_uploaded_file($_FILES['img']['tmp_name'], "image/$image");
//       }
//   }

// }



if (isset($_POST['apply'])) {
  $fname = mysqli_real_escape_string($db, $_POST['fname']);
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $gender = mysqli_real_escape_string($db, $_POST['gender']);
  $country = mysqli_real_escape_string($db, $_POST['country']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
  $con_password = mysqli_real_escape_string($db, $_POST['con_password']);
  $phone = mysqli_real_escape_string($db, $_POST['phone']);
  $error  = array();

 // if ($password != $con_password ) {
 //      $error['reg'] = "Password Does not Match"; }
 //  $error = array();
 //  $select = mysqli_query($db, "SELECT * FROM doctor WHERE email = '$email' OR username = '$username'");
 //  $user = mysqli_fetch_assoc($select);

  // if ($user) {
  //   if ($user['email'] === $email) {
  //         $error['reg'] = "Email Already Exist"; }
  //  if ($user['username'] === $username) {
  //         $error['reg'] = "Username Already Exist"; }
  //          }
       
                // if (count($error)==0) {
              if ($password != $con_password) {
                   $error['reg'] ="password Does not Match";
                       }else{
                        $error['reg'] ="done";

                        $insert = mysqli_query($db, "INSERT INTO doctor(full_name, username, email, phone_no)
                          VALUES('$fname', '$username', '$email', '$phone')"); 
      //                         $insert =mysqli_query($db, "INSERT INTO doctor(full_name, username, email, gender, country, password, phone_no, , ,  ) 
      // VALUES('$fname', '$username','$email','$gender','$country', md5('$password'), '$phone_no',    )");
                       }
        //     echo     "<script> alert('You have  Apply Successfully ')</script>";
        //  header("location:doctorlogin.php");
        // $_SESSION['fname'] = $fname;
        // $_SESSION['email'] = $email;
        // $_SESSION['username'] =$username;   
   // else{ }
   //        } 
  
 }
