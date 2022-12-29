<?php
function emptyInputLogin($username, $password)
{
  $result = false;
  if (empty($username) || empty($password)) {
    $result = true;
  } else {
    $result = false;
  }
  return $result;
}

function invalidUid($username)
{
  $result = false;
  if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
    $result = true;
  } else {
    $result = false;
  }
  return $result;
}

function uidExist($conn, $username)
{
  $sql = "SELECT * FROM admin WHERE USERNAME_ADMIN = ?;";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("location: ../login-admin.php?error=stmtfailed");
    exit();
  }

  mysqli_stmt_bind_param($stmt, "s", $username);
  mysqli_stmt_execute($stmt);

  $resultData = mysqli_stmt_get_result($stmt);

  if ($row = mysqli_fetch_assoc($resultData)) {
    return $row;
  } else {
    $result = false;
    return $result;
  }

  mysqli_stmt_close($stmt);
}

function uidExistUser($conn, $nim)
{
  $sql = "SELECT * FROM user WHERE NIM = ?;";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("location: ../login.php?error=stmtfailed");
    exit();
  }

  mysqli_stmt_bind_param($stmt, "s", $nim);
  mysqli_stmt_execute($stmt);

  $resultData = mysqli_stmt_get_result($stmt);

  if ($row = mysqli_fetch_assoc($resultData)) {
    return $row;
  } else {
    $result = false;
    return $result;
  }

  mysqli_stmt_close($stmt);
}

function loginAdmin($conn, $username, $password)
{
  $uidExist = uidExist($conn, $username);

  if ($uidExist === false) {
    header("location: ../login-admin.php?error=wronglogin");
    exit();
  }

  $checkpw = $uidExist["PASSWORD_ADMIN"];

  if ($checkpw != $password) {
    header("location: ../login-admin.php?error=wrongpw");
    exit();
  } else if ($checkpw == $password) {
    session_start();
    $_SESSION["adminid"] = $uidExist["ID_ADMIN"];
    $_SESSION["adminuid"] = $uidExist["USERNAME_ADMIN"];
    header("location: ../index.php");
    exit();
  }
}

function loginUser($conn, $nim, $password)
{
  $uidExist = uidExistUser($conn, $nim);

  if ($uidExist === false) {
    header("location: ../login.php?error=wronglogin");
    exit();
  }

  $checkpw = $uidExist["PASSWORD_USER"];

  if ($checkpw != $password) {
    header("location: ../login.php?error=wrongpw");
    exit();
  } else if ($checkpw == $password) {
    session_start();
    $_SESSION["userid"] = $uidExist["ID_USER"];
    $_SESSION["useruid"] = $uidExist["NIM"];
    header("location: ../index.php");
    exit();
  }
}

function vote($conn, $number)
{
  session_start();
  $userState = $_SESSION["userid"];
  $sqlStatus = mysqli_query($conn, "SELECT * FROM user WHERE ID_USER = '$userState'");
  $idUser = 0;
  while ($row = $sqlStatus->fetch_assoc()) {
    $idUser = $row["ID_USER"];
  }
  if ($number === 1) {
    $query = "UPDATE `user` SET `STATUS_VOTE` = '1' WHERE `user`.`ID_USER` = $idUser;";
    $query2 = "INSERT INTO `vote` (`ID_USER`, `NO1`, `NO2`) VALUES ('$idUser', '1', '0');";
    mysqli_query($conn, $query);
    mysqli_query($conn, $query2);
  } else if ($number === 2) {
    $query = "UPDATE `user` SET `STATUS_VOTE` = '1' WHERE `user`.`ID_USER` = $idUser;";
    $query2 = "INSERT INTO `vote` (`ID_USER`, `NO1`, `NO2`) VALUES ('$idUser', '0', '1');";
    mysqli_query($conn, $query);
    mysqli_query($conn, $query2);
  }
}

function countRow($query)
{
  $row = mysqli_num_rows($query);
  return $row;
}
