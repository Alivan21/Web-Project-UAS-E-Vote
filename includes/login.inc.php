<?php
if (isset($_POST["submit"])) {
  $nim = $_POST["nim"];
  $password = $_POST["pw"];

  require_once 'dbh.inc.php';
  require_once 'functions.inc.php';

  if (emptyInputLogin($nim, $password) !== false) {
    header("location: ../login.php?error=emptyinput");
    exit();
  }

  loginUser($conn, $nim, $password);
} else {
  header("location: ../login.php");
  exit();
}
