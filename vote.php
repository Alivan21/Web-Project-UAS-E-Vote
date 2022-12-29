<?php
include_once 'header.php';

if (empty($_SESSION["userid"])) {
  echo "
  <script>
  alert('Hanya user yang bisa melakukan vote!');
  window.location.href = 'index.php';
  </script>
  ";
} else {
  $startVote = mysqli_query($conn, "SELECT * FROM announcement");
  $startVote = mysqli_fetch_array($startVote);
  $endVote = $startVote['END_VOTE'];
  $startVote = $startVote['START_VOTE'];
  $dateNow = date("Y-m-d");
  if ($dateNow < $startVote) {
    echo "
  <script>
  alert('Tunggu Vote Sesuai Waktu');
    window.location.href = 'index.php';
  </script>
  ";
  } else if ($dateNow > $endVote) {
    echo "
    <script>
    alert('Waktu Vote Telah Selesai');
      window.location.href = 'index.php';
    </script>
    ";
  }
  if ($statusVote == 1) {
    echo "
    <script>
    alert('Anda Telah Melakukan Vote');
    </script>
    ";
  }
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
                <a class="nav-link text-dark" href="#">Candidate</a>
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
      <h2 class="fw-bold">Pemilihan Wakil & Ketua Organisasi</h2>
      <h2 class="fw-bold">Periode 2022/2023</h2>
    </div>
    <h2 class="fw-bold text-primary text-center my-5">Kandidat No 1</h2>
    <div>
      <div class="d-flex justify-content-around">
        <img src="assets/img/ketua-hero-1.svg" alt="" class="img-fluid my-auto vote-img" />
        <img src="assets/img/ketua-hero-2.svg" alt="" class="img-fluid mt-2 vote-img" />
      </div>
      <form action="includes/vote.inc.php" method="post" class="d-flex flex-column col-md-2 col-5 mx-auto mt-5" onsubmit="return confirm('Apa anda yakin memilih no 1?');">
        <?php
        if ($statusVote == 1) {
          echo "
            <button class='btn bg-my-primary btn-primary rounded-3 fw-bold py-2 fs-6' disabled>Vote</button>
            ";
        } else {
          echo "
            <button type='submit' class='btn bg-my-primary btn-primary rounded-3 fw-bold py-2 fs-6' name='vote1'>Vote</button>
            ";
        }
        ?>
      </form>
    </div>
    <h2 class="fw-bold text-primary text-center my-5">Kandidat No 2</h2>
    <div class="d-flex justify-content-around">
      <img src="assets/img/wakil-hero-1.svg" alt="" class="img-fluid img-vote mt-1 vote-img" />
      <img src="assets/img/wakil-hero-2.svg" alt="" class="img-fluid img-vote my-auto vote-img" />
    </div>
    <form action="includes/vote.inc.php" method="post" class="d-flex flex-column col-md-2 col-5 mx-auto my-5" onsubmit="return confirm('Apa anda yakin memilih no 2?');">
      <?php
      if ($statusVote == 1) {
        echo "
            <button class='btn bg-my-primary btn-primary rounded-3 fw-bold py-2 fs-6' disabled>Vote</button>
            ";
      } else {
        echo "
            <button type='submit' class='btn bg-my-primary btn-primary rounded-3 fw-bold py-2 fs-6' name='vote2'>Vote</button>
            ";
      }
      ?>
    </form>
  </main>

  <?php
  include_once 'footer.php';
  ?>