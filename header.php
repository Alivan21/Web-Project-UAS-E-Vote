<?php
include_once 'includes/dbh.inc.php';
session_start();
if (empty($_SESSION["userid"])) {
} else {
  $userState = $_SESSION["userid"];
  $sqlStatus = mysqli_query($conn, "SELECT * FROM user WHERE ID_USER = '$userState'");
  $statusVote = 0;
  while ($row = $sqlStatus->fetch_assoc()) {
    $statusVote = $row["STATUS_VOTE"];
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>e-Voting</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" />
  <link rel="shortcut icon" href="assets/img/web-icon.png" type="image/x-icon" />
  <!-- Link Font -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />
  <!-- Link CSS -->
  <link rel="stylesheet" href="assets/css/style.css" />
</head>