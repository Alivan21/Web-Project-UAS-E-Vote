<?php
if (isset($_POST["submit"])) {
  $username = $_POST["username"];
  $password = $_POST["pw"];

  require_once 'dbh.inc.php';
  require_once 'functions.inc.php';

  if (emptyInputLogin($username, $password) !== false) {
    header("location: ../login-admin.php?error=emptyinput");
    exit();
  }

  loginAdmin($conn, $username, $password);
} else {
  header("location: ../login-admin.php");
  exit();
}
