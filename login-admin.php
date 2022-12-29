<?php
include_once 'header.php';
if ((!empty($_SESSION["adminuid"])) || (!empty($_SESSION["useruid"]))) {
  echo "
  <script>
  alert('Anda Sudah Login!');
  window.location.href = 'index.php';
  </script>
  ";
}
?>

<body>
  <header>
    <nav class="navbar navbar-expand-lg">
      <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
          <div class="offcanvas-header">
            <h4 class="offcanvas-title fw-bold" id="offcanvasNavbarLabel">e-Voting</h4>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body">
            <div class="border-dark border-top border-2"></div>
            <ul class="navbar-nav mx-md-auto gap-md-4 gap-sm-1 py-2">
              <li class="nav-item my-nav">
                <a class="nav-link text-dark" href="index.php">Home</a>
              </li>
              <li class="nav-item my-nav">
                <a class="nav-link text-dark" href="candidate.php">Candidate</a>
              </li>
              <li class="nav-item my-nav">
                <a class="nav-link text-dark" href="annoucement.php">Announcement</a>
              </li>
              <li class="nav-item d-flex align-items-center">
                <?php
                if (isset($_SESSION["adminuid"])) {
                  echo "<div class='dropdown'>
                  <button
                    class='btn btn-sm border-0 btn-secondary fw-bold px-3 mt-2 mt-md-0 rounded-3 bg-opacity-50 dropdown-toggle'
                    type='button'
                    data-bs-toggle='dropdown'
                    aria-expanded='false'
                  >
                    Admin
                  </button>
                  <ul class='dropdown-menu'>
                    <li><a class='dropdown-item' href='dashboard/index.php'>Dashboard</a></li>
                    <li class='dropdown-divider'></li>
                    <li><a class='dropdown-item' href='includes/logout.inc.php'>Logout</a></li>
                  </ul>
                </div>";
                } else if (isset($_SESSION["useruid"])) {
                  echo "<div class='dropdown'>
                  <button
                    class='btn btn-sm border-0 btn-primary fw-bold px-3 mt-2 mt-md-0 rounded-3 bg-opacity-50 dropdown-toggle'
                    type='button'
                    data-bs-toggle='dropdown'
                    aria-expanded='false'
                  >
                    User
                  </button>
                  <ul class='dropdown-menu'>
                    <li><a class='dropdown-item' href='vote.php'>Vote</a></li>
                    <li class='dropdown-divider'></li>
                    <li><a class='dropdown-item' href='includes/logout.inc.php'>Logout</a></li>
                  </ul>
                </div>";
                } else {
                  echo "
                <button type='button' class='btn btn-sm border-0 bg-info fw-bold px-4 mt-2 mt-md-0 rounded-3 bg-opacity-50' data-bs-toggle='modal' data-bs-target='#exampleModal'>
                Login
                </button>";
                }
                ?>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>
    <!-- Modal Login -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content mx-5">
          <div class="modal-body mb-3">
            <button type="button" class="btn-close mb-3" data-bs-dismiss="modal" aria-label="Close"></button>
            <a href="login-admin.php" class="text-decoration-none d-grid col-5 mx-auto mb-3">
              <button type="button" class="btn btn-danger p-2">
                <i class="bi bi-person-fill-gear"></i>
                Admin
              </button>
            </a>
            <a href="login.php" class="text-decoration-none d-grid col-5 mx-auto">
              <button type="button" class="btn btn-primary p-2">
                <i class="bi bi-person-fill"></i>
                User
              </button>
            </a>
          </div>
        </div>
      </div>
    </div>
  </header>
  <main class="container py-md-5 py-0">
    <section class="row my-5 py-md-5 gap-md-2 mx-0 p-3 border border-1 rounded-3">
      <div class="d-block d-xl-block d-md-none col-md-6 my-md-auto mx-md-auto">
        <img src="assets/img/hero-login.png" alt="" class="img-fluid" />
      </div>
      <div class="col-xl-4 col-md-10 mx-md-auto my-md-5">
        <div class="text-center my-4">
          <h1>Login Admin</h1>
          <h1 class="text-my-primary fw-bold">e-Voting</h1>
        </div>
        <form class="d-flex flex-column gap-3" action="includes/login-admin.inc.php" method="POST">
          <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" name="username" autocomplete="username" />
          </div>
          <div class="mb-3">
            <label for="pw" class="form-label">Password</label>
            <input type="password" class="form-control" name="pw" autocomplete="current-password" />
          </div>
          <button type='submit' name='submit' class='btn btn-danger px-5 mx-auto rounded-3'>Login</button>
        </form>
      </div>
    </section>
  </main>

  <?php
  if (isset($_GET["error"])) {
    if ($_GET["error"] == "emptyinput") {
      echo "<script>
        alert('Lengkapi semua data');
      </script>";
    } else if ($_GET["error"] == "wronglogin") {
      echo "<script>
        alert('Data login tidak sesuai');
      </script>";
    } else if ($_GET["error"] == "wrongpw") {
      echo "<script>
        alert('Password salah');
      </script>";
    }
  }
  ?>

  <?php
  include_once 'footer.php';
  ?>