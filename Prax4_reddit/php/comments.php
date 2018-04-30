<?php

session_start();

$errors = array();

// if the register button is clicked $_POST['register'] - button id
function setComments() {
  if (isset($_POST['comment'])) {
}

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
