<?php
include_once 'header.php';
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
                <a class="nav-link active active-nav" aria-current="page" href="#">Home</a>
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
  <main class="container">
    <section class="row flex-md-row-reverse my-3">
      <div class="col-md-6">
        <img src="assets/img/landing_hero.png" alt="" class="img-fluid" />
      </div>
      <div class="col-md-6 col-xl-5 my-md-auto me-md-auto text-justify">
        <h1 class="text-my-primary fw-bold mb-4 text-center text-md-start">e-Voting App</h1>
        <p class="text-my">
          Selamat datang di e-voting apps. e-voting merupakan wujud dari perkembangan teknologi dalam bidang pemilihan
          umum. Silahkan memberikan suara kepada kandidat yang kamu percaya dengan jujur dan adil.
        </p>
        <div class="d-flex flex-column col-xl-4 col-md-6 col-7 mx-auto mx-md-0 gap-2 mt-4">
          <button class="btn bg-my-primary btn-primary fw-bold py-2 fs-6" onclick='window.location.href = "vote.php"'>Use my Vote ></button>
          <a href="#how" class="mx-auto">How to vote?</a>
        </div>
      </div>
    </section>
    <section id="how" class="my-5">
      <div class="shadow p-3 mb-5 bg-body rounded">
        <h1 class="text-primary fw-bold fs-my-1 text-center">How to Vote?</h1>
      </div>
      <div class="d-flex flex-column text-center gap-4">
        <div class="align-self-start">
          <img src="assets/img/how1.svg" alt="" class="img-fluid img-how shadow p-2 py-3 mb-md-4 bg-body rounded rounded-4" />
        </div>
        <div class="align-self-center">
          <img src="assets/img/how2.svg" alt="" class="img-fluid img-how shadow p-2 mb-md-4 bg-body rounded rounded-4" />
        </div>
        <div class="align-self-end">
          <img src="assets/img/how3.svg" alt="" class="img-fluid img-how shadow p-2 py-3 mb-md-4 bg-body rounded rounded-4" />
        </div>
      </div>
    </section>
  </main>

  <?php
  include_once 'footer.php';
  ?>