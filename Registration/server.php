<?php
session_start();

// initializing variables
$fullname= "";
$email    = "";
$phonenumber="";
$whatsappnumber="";
$maritialstatus="";
$location="";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', 'sachin', 'sachin');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $fullname = mysqli_real_escape_string($db, $_POST['fullname']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $phonenumber = mysqli_real_escape_string($db, $_POST['phonenumber']);
  $whatsappnumber = mysqli_real_escape_string($db, $_POST['whatsappnumber']);
  $maritialstatus = mysqli_real_escape_string($db, $_POST['maritialstatus']);
  $location = mysqli_real_escape_string($db, $_POST['location']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($fullname)) { array_push($errors, "Name is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($phonenumber)) { array_push($errors, "Phone number is required"); }
  if (empty($maritialstatus)) { array_push($errors, "Marital Status is required"); }
  if (empty($location)) { array_push($errors, "Native Location is required"); }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM jobseekers WHERE email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
        if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	
  	$query = "INSERT INTO jobseekers (email, fullname, phonenumber, whatsappnumber, maritialstatus, location) 
  			  VALUES('$email', '$fullname', '$phonenumber','$whatsappnumber','$maritialstatus','$location')";
  	mysqli_query($db, $query);
  	$_SESSION['fullname'] = $fullname;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: index.php');
  }
}
?>
<!--
// LOGIN USER
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: index.php');
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}

?>-->