<?php 
session_start();
session_destroy();
session_unset($_SESSION['username']);
session_unset($_SESSION['doctor']) ; 
session_unset($_SESSION['email'] ) ;       
session_unset($_SESSION['fname'] ) ;      
header("location:../index.php");



 ?>