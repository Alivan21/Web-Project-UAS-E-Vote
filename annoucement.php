<?php
include_once 'header.php';
include_once 'includes/functions.inc.php';
$result = mysqli_query($conn, "SELECT * FROM announcement");
$result = mysqli_fetch_array($result);
$startVote = $result['START_VOTE'];
$endVote = $result['END_VOTE'];
$dateNow = date("Y-m-d");
if ($dateNow < $startVote || $endVote === $dateNow) {
  echo "
  <script>
    window.location.href = 'wait.php';
  </script>
  ";
} else {
  $kandidat1 = countRow(mysqli_query($conn, "SELECT NO1 FROM vote WHERE No1 = 1"));
  $kandidat2 = countRow(mysqli_query($conn, "SELECT NO1 FROM vote WHERE No2 = 1"));
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
                <a class="nav-link text-dark active active-nav" href="#">Announcement</a>
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
  <main class="container mb-5">
    <script>
      window.onload = function() {
        var chart = new CanvasJS.Chart("chartContainer", {
          animationEnabled: true,

          title: {
            text: "Hasil Voting Pemilihan Ketua & Wakil Organisasi",
          },
          axisX: {
            interval: 1,
          },
          axisY2: {
            interlacedColor: "rgba(1,77,101,.2)",
            gridColor: "rgba(1,77,101,.1)",
            title: "Total Suara",
          },
          data: [{
            type: "bar",
            name: "suara",
            axisYType: "secondary",
            color: "#0d6efd",
            dataPoints: [{
                y: <?php echo $kandidat2 ?>,
                label: "Kandidat 2"
              },
              {
                y: <?php echo $kandidat1 ?>,
                label: "Kandidat 1"
              },
            ],
          }, ],
        });
        chart.render();
      };
    </script>
    <div class="my-5 text-center text-my-primary">
      <h2 class="fw-bold">Pengumuman Ketua & Wakil Organisasi</h2>
      <h2 class="fw-bold">Periode 2022/2023</h2>
    </div>
    <div class="d-flex">
      <div class="col-6 d-flex flex-column align-items-center">
        <h2 class="text-primary fw-bold text-center">
          Ketua Organisasi
          <div class="d-none d-lg-block"><br /></div>
        </h2>
        <?php
        if ($kandidat1 > $kandidat2) {
          echo "
            <img src='assets/img/ketua-hero-1.svg' alt='' class='img-fluid my-auto' style='width:55%' />
            ";
        } else if ($kandidat1 < $kandidat2) {
          echo "
            <img src='assets/img/wakil-hero-1.svg' alt='' class='img-fluid my-auto' style='width:55%' />
            ";
        }
        ?>
      </div>
      <div class="col-6 d-flex flex-column align-items-center">
        <h2 class="text-primary fw-bold text-center">Wakil Ketua <br />Organisasi</h2>
        <?php
        if ($kandidat1 > $kandidat2) {
          echo "
            <img src='assets/img/ketua-hero-2.svg' alt='' class='img-fluid my-auto' style='width:55%' />
            ";
        } else if ($kandidat1 < $kandidat2) {
          echo "
            <img src='assets/img/wakil-hero-2.svg' alt='' class='img-fluid my-auto' style='width:55%' />
            ";
        } else {
          echo "
          <script>
            alert('Hasil Vote Seri Mohon Tunggu');
            window.location.href = 'index.php';
          </script>
          ";
        }
        ?>
      </div>
    </div>
    <div class="my-5">
      <div id="chartContainer" style="height: 370px; max-width: 920px; margin: 0px auto"></div>
    </div>
  </main>

  <?php
  include_once 'footer.php';
  ?>