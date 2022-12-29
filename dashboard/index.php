<?php
include_once 'header.php';
$admin = countRow(mysqli_query($conn, "SELECT ID_ADMIN FROM admin"));
$user = countRow(mysqli_query($conn, "SELECT ID_USER FROM user"));
$userVote = countRow(mysqli_query($conn, "SELECT * FROM user WHERE STATUS_VOTE = 1"));
$userNotVote = countRow(mysqli_query($conn, "SELECT * FROM user WHERE STATUS_VOTE = 0"));

?>

<body>
  <main class="container-fluid">
    <div class="row flex-nowrap">
      <section class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 m-0 bg-primary">
        <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
          <a href="#" class="d-flex align-items-center py-4 mb-md-0 me-md-auto text-white text-decoration-none border-bottom border-1">
            <span class="fs-4 d-none d-sm-inline fw-bold">Dashboard Admin</span>
          </a>
          <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
            <li>
              <a href="#submenu1" class="nav-link nav-active px-0 align-middle">
                <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline">Dashboard</span>
              </a>
            </li>
            <li>
              <a href="user.php" class="nav-link px-0 align-middle">
                <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">User</span>
              </a>
            </li>
            <li>
              <a href="vote.php" class="nav-link px-0 align-middle">
                <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline">Vote</span>
              </a>
            </li>
          </ul>
          <hr />
        </div>
      </section>
      <section class="col p-0 m-0 bg-light">
        <div class="bg-white shadow p-4">
          <div class="d-flex justify-content-between">
            <h2 class="my-auto fw-bold text-primary text-opacity-75">Dashboard</h2>
            <div class="dropdown border border-primary bg-light border-3 p-2 mx-2 rounded-4">
              <a href="#" class="d-flex align-items-center text-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="img/person-fill-gear.svg" alt="hugenerd" width="30" height="30" class="rounded-circle img-fluid" />
                <span class="d-none d-sm-inline mx-1 ms-2 text-dark">Admin</span>
              </a>
              <ul class="mt-2 dropdown-menu text-small shadow">
                <li><a class="dropdown-item" href="../index.php">Back to Home</a></li>
                <li>
                  <hr class="dropdown-divider" />
                </li>
                <li><a class="dropdown-item" href="includes/logout.inc.php">Sign out</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="py-4 my-3">
          <div class="d-md-flex d-inline justify-content-center">
            <div class="col-md-5 col-8 mx-auto card text-center text-white pb-1 bg-primary">
              <i class="bi bi-person-fill-gear fs-1"></i>
              <span class="fs-4 fw-bold">Total Admin</span>
              <span class="fs-5 fw-bold"><?= $admin ?></span>
            </div>
            <div class="col-md-5 col-8 mx-auto mt-md-0 mt-4 card text-center text-white pb-1 bg-info">
              <i class="bi bi-person-fill fs-1"></i>
              <span class="fs-4 fw-bold">Total User</span>
              <span class="fs-5 fw-bold"><?= $user ?></span>
            </div>
          </div>
          <div class="d-md-flex d-inline mt-5 justify-content-center">
            <div class="col-md-5 col-8 mx-auto mt-md-0 mt-4 card text-center text-white pb-1 bg-success">
              <i class="bi bi-person-check-fill fs-1"></i>
              <span class="fs-4 fw-bold">User Sudah Vote</span>
              <span class="fs-5 fw-bold"><?= $userVote ?></span>
            </div>
            <div class="col-md-5 col-8 mx-auto mt-md-0 mt-4 card text-center text-white pb-1 bg-danger">
              <i class="bi bi-person-x-fill fs-1"></i>
              <span class="fs-4 fw-bold">User Belum Vote</span>
              <span class="fs-5 fw-bold"><?= $userNotVote ?></span>
            </div>
          </div>
        </div>
      </section>
    </div>
  </main>

  <?php
  include_once 'footer.php';
  ?>