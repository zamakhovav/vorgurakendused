<?php

session_start();

$username = "";
$email = "";
$errors = array();

// if the register button is clicked $_POST['register'] - button id
if (isset($_POST['register'])) {
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password_1 = $_POST['password_1'];
  $password_2 = $_POST['password_2'];

  $_username = mysql_real_escape_string($username);
  $_email = mysql_real_escape_string($email);
  $_password_1 = mysql_real_escape_string($password_1);
  $_password_2 = mysql_real_escape_string($password_2);

  // ensure that form fields are filled properly
  if (empty($username)) {
    array_push($errors, "Username is required");
  }

  if (empty($email)) {
    array_push($errors, "Email is required");
  }

  if (empty($password_1)) {
    array_push($errors, "Password is required");
  }

  if ($password_1 != $password_2) {
    array_push($errors, "The two password do not match");
  }

  // if there are no errors, save user to database;
  if (count($errors) == 0) {
    $password = md5($password_1); //encrypt password before storing in database (security)

    $dbCon = mysqli_connect('localhost', 'st2014', 'progress', 'st2014') or die(mysqli_error());
    $sql = "INSERT INTO t164751v4_users (username, email, password) VALUES('$_username', '$_email', '$_password')";
    mysqli_query($dbCon, $sql);


    $_SESSION['username'] = $_username;
    $_SESSION['success'] = "You are now logged in!";
    header('location: index.php'); //redirect to home page
  }
}

 ?>

<!DOCTYPE html>
<html>
<title>Mini-reddit</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="colors.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
  html,body,h1,h2,h3,h4,h5 {
    font-family: "Open Sans", sans-serif
  }
</style>

<body class="w3-theme-l5">
<!-- Navbar -->
<div class="w3-top">
 <div class="w3-bar w3-theme-d2 w3-left-align w3-large">
  <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-theme-d2"><i class="fa fa-bars"></i></a>
  <a href="http://dijkstra.cs.ttu.ee/~vezama/prax4/" class="w3-bar-item w3-button w3-padding-large w3-theme-d4"><i class="fa fa-home w3-margin-right"></i></a>
  <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="News"><i class="fa fa-globe"></i></a>
  <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="Account Settings"><i class="fa fa-user"></i></a>
  <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="Messages"><i class="fa fa-envelope"></i></a>
  <a href="#" class="w3-bar-item w3-button w3-hide-small w3-right w3-padding-large w3-hover-white" title="My Account"><img src="girl.png" class="w3-circle" style="height:25px;width:25px" alt="Avatar"></a>
 </div>
</div>

<!-- Page Container -->
<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">
  <!-- The Grid -->
  <div class="w3-row">

    <!-- Middle Column -->
    <div class="w3-col">
      <div class="w3-row-padding">
        <div class="w3-col m12">
          <div class="w3-card w3-round w3-white">
            <div class="w3-container w3-padding">
              <center>
                <h4 class="w3-center">Sign up</h4>
                <p class="w3-center"><img src="man-2.png" class="w3-circle" style="height:106px;width:106px" alt="Avatar"></p>
                <!-- display validation errors here -->
                <?php include_once('errors.php'); ?>
                <form method="POST" action="register.php">
                <div class="input-group-reg w3-text-theme">
                  <label>Username</label>
                  <input type="text"  name="username">
                </div>
                <div class="input-group-reg w3-text-theme">
                  <label>Email</label>
                  <input type="text"  name="email">
                </div>
                <div class="input-group-reg w3-text-theme">
                  <label>Password</label>
                  <input type="password"  name="password_1">
                </div>
                <div class="input-group-reg w3-text-theme">
                  <label>Confirm password</label>
                  <input type="password"  name="password_2">
                </div>
                <div class="input-group-reg w3-text-theme">
                  <button type="submit" name="register" class="w3-button w3-theme">Register</button>
                </div>
              </form>
            </center>
          </div>
        </div>
      </div>
    </div>
    <!-- End Middle Column -->
    </div>

  <!-- End Grid -->
  </div>

<!-- End Page Container -->
</div>

</body>
</html>
