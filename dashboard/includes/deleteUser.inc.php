<?php
include 'dbh.inc.php';
if (isset($_POST['deletedata'])) {
  $id = $_POST['ID_USER'];

  $query = "DELETE FROM user WHERE ID_USER='$id'";
  $query_run = mysqli_query($conn, $query);

  if ($query_run) {
    echo '
    <script> 
    alert("Data Deleted"); 
    window.location.href = "../user.php";
    </script>';
  } else {
    echo '<script> alert("Data Not Deleted"); </script>';
  }
}
