<?php
include_once 'includes/dbh.inc.php';

$query = 'TRUNCATE TABLE `vote`';
$query2 = 'UPDATE user SET STATUS_VOTE = 0 WHERE STATUS_VOTE = 1';

mysqli_query($conn, $query);
mysqli_query($conn, $query2);
echo "
  <script>
    alert('Data Vote Berhasil Di-Reset');
    window.location.href = 'index.php';
  </script>
";
