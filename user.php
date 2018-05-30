<?php
session_start();

// initializing variables
$firstname = "";
$lastname = "";
$gender = "";
$language= "";
$username = "";
$email    = "";
//$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'webapplication');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $firstname = mysqli_real_escape_string($db, $_POST['firstname']);
  $lastname = mysqli_real_escape_string($db, $_POST['lastname']);
  $gender = mysqli_real_escape_string($db, $_POST['gender']);
  $language = mysqli_real_escape_string($db, $_POST['language']);
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($firstname)) { array_push($errors, "firstname is required"); }
  if (empty($lastname)) { array_push($errors, "lastname is required"); }
  if (empty($gender)) { array_push($errors, "gender is required"); }
  if (empty($language)) { array_push($errors, "language is required"); }
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE firstname='$firstname' OR username='$username' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['firstname'] === $firstname) {
      array_push($errors, "firstname already exists");
    }

    if ($user['username'] === $username) {
      array_push($errors, "username already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO users (fistname, lastname, gender, language, username, password) 
  			  VALUES('$firstname','$lastname','$gender','$language','$username','$password')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: index.php');
  }
