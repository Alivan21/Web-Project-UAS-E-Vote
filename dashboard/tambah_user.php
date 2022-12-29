<?php
include_once 'header.php';
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
              <a href="index.php" class="nav-link px-0 align-middle">
                <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline">Dashboard</span>
              </a>
            </li>
            <li>
              <a href="#" class="nav-link nav-active px-0 align-middle">
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
            <h2 class="my-auto fw-bold text-primary text-opacity-75">Data User</h2>
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
                <li><a class="dropdown-item" href="#">Sign out</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="p-4 my-3">
          <div class="d-grid gap-2 d-md-block mb-3">
            <a href="user.php" class="text-decoration-none">
              <button class="btn btn-danger" type="button">Kembali</button>
            </a>
          </div>
          <h2 class="my-4">Tambah Data User</h2>
          <form class="pe-5" method="post">
            <div class="mb-3">
              <label for="nama" class="form-label">Nama</label>
              <input type="text" class="form-control" id="nama" name="nama" />
            </div>
            <div class="mb-3">
              <label for="nim" class="form-label">NIM</label>
              <input type="text" class="form-control" id="nim" name="nim" />
            </div>
            <div class="mb-3">
              <label for="pw" class="form-label">Password</label>
              <input type="password" class="form-control" id="pw" name="pw" />
            </div>
            <div class="mb-3">
              <fieldset disabled>
                <label for="disabledSelect" class="form-label">Status</label>
                <select id="disabledSelect" class="form-select">
                  <option>0</option>
                </select>
              </fieldset>
            </div>
            <div class="d-grid gap-2 col-2 mt-4">
              <button class="btn btn-primary rounded-3" type="submit" name="submit">Submit</button>
            </div>
          </form>
        </div>
      </section>
    </div>
  </main>
  <?php
  if (isset($_POST['submit'])) {
    $nama = strtoupper($_POST['nama']);
    $nim = $_POST['nim'];
    $pw = $_POST['pw'];

    $SQL = "INSERT INTO user(NAMA_USER,NIM,PASSWORD_USER) VALUES('$nama','$nim','$pw')";

    $result = mysqli_query($conn, $SQL);

    $pesan = "USER Berhasil Ditambahkan";
    echo "<script type='text/javascript'>
            const benar = true;
            alert('$pesan')
            if(benar){
              window.location.href = 'index.php';
            };
          </script>";
  }
  ?>

  <?php
  include_once 'footer.php';
  ?>