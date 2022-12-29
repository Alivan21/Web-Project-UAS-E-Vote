<?php
require_once 'dbh.inc.php';
require_once 'functions.inc.php';
if (isset($_POST['vote1'])) {
  vote($conn, 1);
  header("location:../index.php");
}

if (isset($_POST['vote2'])) {
  vote($conn, 2);
  header("location:../index.php");
}
