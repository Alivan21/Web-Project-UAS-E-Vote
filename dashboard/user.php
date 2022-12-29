<?php
include_once 'header.php';

$result = mysqli_query($conn, "SELECT * FROM user ORDER BY ID_USER ASC");
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
                <li><a class="dropdown-item" href="includes/logout.inc.php">Sign out</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="p-4 my-3">
          <div class="d-grid gap-2 d-md-block mb-3">
            <a href="tambah_user.php" class="text-decoration-none">
              <button class="btn btn-success" type="button">Tambah Data User</button>
            </a>
          </div>
          <table class="table table-striped border">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">NIM</th>
                <th scope="col">Password</th>
                <th scope="col">Status</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              while ($dataUser = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>" . $dataUser['ID_USER'] . "</td>";
                echo "<td>" . $dataUser['NAMA_USER'] . "</td>";
                echo "<td>" . $dataUser['NIM'] . "</td>";
                echo "<td>" . $dataUser['PASSWORD_USER'] . "</td>";
                echo "<td>" . $dataUser['STATUS_VOTE'] . "</td>";
                echo "<td class='col-2'>
                  <a href='edit_user.php?ID_USER=$dataUser[ID_USER]' class='text-decoration-none'>
                    <button type='button' class='btn btn-success btn-sm'>Edit</button>
                  </a>
                  <a class='text-decoration-none'>
                    <button type='button' class='btn btn-danger btn-sm deletebtn' data-bs-toggle='modal' data-bs-target='#deletemodal'>Delete</button>
                  </a>
                </td>";
                echo "</tr>";
              }
              ?>
            </tbody>
          </table>
        </div>
      </section>
    </div>
    <!-- DELETE MODAL -->
    <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>

          <form action="includes/deleteUser.inc.php" method="POST">

            <div class="modal-body">

              <input type="hidden" name="ID_USER" id="ID_USER">

              <h5 class="text-center my-auto"> Apakah Anda Yakin Menghapus Data Ini ?</h5>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close"> Cancel </button>
              <button type="submit" name="deletedata" class="btn btn-danger"> Delete </button>
            </div>
          </form>

        </div>
      </div>
    </div>
  </main>
  <script>
    $(document).ready(function() {

      $('.deletebtn').on('click', function() {

        $('#deletemodal').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
          return $(this).text();
        }).get();

        console.log(data);

        $('#ID_USER').val(data[0]);

      });
    });
  </script>

  <?php
  include_once 'footer.php';
  ?>