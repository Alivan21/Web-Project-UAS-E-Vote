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
                <a class="nav-link text-dark" href="index.php">Home</a>
              </li>
              <li class="nav-item my-nav">
                <a class="nav-link active active-nav" aria-current="page" href="#">Candidate</a>
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
    <div class="my-5 text-center text-my-primary">
      <h2 class="fw-bold">Calon Ketua & Wakil Organisasi</h2>
      <h2 class="fw-bold">Periode 2022/2023</h2>
    </div>
    <h2 class="fw-bold text-primary text-center my-5">Kandidat No 1</h2>
    <div>
      <div class="row my-5">
        <img src="assets/img/ketua-hero-1.svg" alt="" class="img-fluid px-5 px-md-0 col-md-3" />
        <div class="col-md-7 px-5 px-md-0 mx-auto pe-5">
          <div class="my-5">
            <h3 class="text-primary fw-bold mb-4">Visi</h3>
            <p class="text-my fw-bold">
              Mewujudkan generasi muda yang tangguh, mandiri, terampil dan berakhlak mulia
            </p>
          </div>
          <div>
            <h3 class="text-primary fw-bold mb-4">Misi</h3>
            <ol class="text-my fw-bold">
              <li>
                Meningkatkan akses, relevansi, dan mutu dari pendidikan tinggi untuk menghasilkan SDM yang berkualitas
              </li>
              <li>Meningkatkan kemampuan IPTEK dan inovasi untuk menghasilkan nilai tambah produk inovasi</li>
            </ol>
          </div>
        </div>
      </div>
      <div class="row flex-row-reverse my-5">
        <img src="assets/img/ketua-hero-2.svg" alt="" class="img-fluid px-5 px-md-0 col-md-3" />
        <div class="col-md-7 px-5 px-md-0 mx-auto pe-5 text-md-end">
          <div class="my-5">
            <h3 class="text-primary fw-bold mb-4">Visi</h3>
            <p class="text-my fw-bold">
              Mewujudkan generasi muda yang tangguh, mandiri, terampil dan berakhlak mulia
            </p>
          </div>
          <div>
            <h3 class="text-primary fw-bold mb-4">Misi</h3>
            <ol class="text-my fw-bold">
              <li>
                Meningkatkan akses, relevansi, dan mutu dari pendidikan tinggi untuk menghasilkan SDM yang berkualitas
              </li>
              <li>Meningkatkan kemampuan IPTEK dan inovasi untuk menghasilkan nilai tambah produk inovasi</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <h2 class="fw-bold text-primary text-center my-5">Kandidat No 2</h2>
    <div>
      <div class="row my-5">
        <img src="assets/img/wakil-hero-1.svg" alt="" class="img-fluid px-5 px-md-0 col-md-3" />
        <div class="col-md-7 px-5 px-md-0 mx-auto pe-5">
          <div class="my-5">
            <h3 class="text-primary fw-bold mb-4">Visi</h3>
            <p class="text-my fw-bold">
              Mewujudkan generasi muda yang tangguh, mandiri, terampil dan berakhlak mulia
            </p>
          </div>
          <div>
            <h3 class="text-primary fw-bold mb-4">Misi</h3>
            <ol class="text-my fw-bold">
              <li>
                Meningkatkan akses, relevansi, dan mutu dari pendidikan tinggi untuk menghasilkan SDM yang berkualitas
              </li>
              <li>Meningkatkan kemampuan IPTEK dan inovasi untuk menghasilkan nilai tambah produk inovasi</li>
            </ol>
          </div>
        </div>
      </div>
      <div class="row flex-row-reverse my-5">
        <img src="assets/img/wakil-hero-2.svg" alt="" class="img-fluid px-5 px-md-0 col-md-3" />
        <div class="col-md-7 px-5 px-md-0 mx-auto pe-5 text-md-end">
          <div class="my-5">
            <h3 class="text-primary fw-bold mb-4">Visi</h3>
            <p class="text-my fw-bold">
              Mewujudkan generasi muda yang tangguh, mandiri, terampil dan berakhlak mulia
            </p>
          </div>
          <div>
            <h3 class="text-primary fw-bold mb-4">Misi</h3>
            <ol class="text-my fw-bold">
              <li>
                Meningkatkan akses, relevansi, dan mutu dari pendidikan tinggi untuk menghasilkan SDM yang berkualitas
              </li>
              <li>Meningkatkan kemampuan IPTEK dan inovasi untuk menghasilkan nilai tambah produk inovasi</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
  </main>
  <?php
  include_once 'footer.php';
  ?>