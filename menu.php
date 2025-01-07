<?php
session_start();
if (!isset($_SESSION["username_admin"])) {
    header('Location: loginAdmin.php');
    exit();
}
require "koneksi.php";
$query = mysqli_query($terhubung, "SELECT * FROM produk");
while ($RECORD = mysqli_fetch_array($query)) {
  $result[] = $RECORD;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Menu</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
</head>
<body>
  <nav class="navbar navbar-expand-lg shadow p-3 mb-5 bg-body-tertiary rounded sticky-top">
   <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <!-- Navigasi dropdown AdminUser -->
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link me-2 <?php echo ((isset($_GET['x']) && $_GET['x'] == 'Home') || !isset($_GET['x'])) ? 'active link-info' : 'link-dark'; ?>"
                        aria-current="page" href="index.php?x=Home"><i class="bi bi-house-door"></i> Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2 <?php echo (isset($_GET['x']) && $_GET['x'] == 'tampilanMenu') ? 'active link-info' : 'link-dark'; ?>"
                        href="menu.php"><i class="bi bi-archive"></i> Menu</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        AdminUser
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end mt-2">
                        <li><a class="dropdown-item" href="proses/proses_logout.php">Log out</a></li>
                    </ul>
                </li>
            </ul>
        </div>
  </nav>
  <div class="d-flex justify-content-center"> 
  <div class="col-lg-9 mt-2">
    <div class="card mb-5">
      <div class="card-header text-center">
        <h3>MENU</h3>
      </div>
      <div class="card-body">
        <div class="row mb-3">
          <div class="col text-end">
            <button class="btn btn-primary bg-success" data-bs-toggle="modal" data-bs-target="#modalTambahUser">Tambah Menu</button>
          </div>
        </div>

        <!-- Modal Tambah Menu -->
        <div class="modal fade" id="modalTambahUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-xl modal-fullscreen-md-down">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Menu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form class="needs-validation" novalidate action="proses/proses_tambahMenu.php" method="POST" enctype="multipart/form-data">
                  <div class="row mb-3">
                    <div class="col">
                      <div class="form-floating">
                        <input type="text" class="form-control" id="id_produk" name="id_produk" required placeholder="ID Produk">
                        <label for="id_produk">ID Produk</label>
                         <div class="invalid-feedback">
                           Masukan id.
                          </div>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-floating">
                        <input type="file" class="form-control" id="gambar" name="gambar" required>
                        <label for="gambar">Masukkan Gambar</label>
                         <div class="invalid-feedback">
                           Masukan gambar.
                          </div>
                      </div>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col">
                      <div class="form-floating">
                        <input type="text" class="form-control" id="nama_produk" name="nama_produk" required placeholder="Nama Produk">
                        <label for="nama_produk">Nama Produk</label>
                         <div class="invalid-feedback">
                           Masukan nama produk.
                          </div>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-floating">
                        <input type="text" class="form-control" id="harga" name="harga" required placeholder="Harga">
                        <label for="harga">Harga</label>
                         <div class="invalid-feedback">
                           Masukan harga.
                          </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-floating mb-3">
                    <textarea class="form-control" id="deskripsi" name="deskripsi" required placeholder="Deskripsi" style="height: 100px;"></textarea>
                    <label for="deskripsi">Deskripsi</label>
                     <div class="invalid-feedback">
                           Masukan deskripsi.
                          </div>
                  </div>
                  <div class="text-end">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="input_menu_validate">Save Changes</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- End Modal Tambah Menu -->
      <?php
      foreach($result as $row){
        ?>
        <!--modal edit-->
         <div class="modal fade" id="modaledit<?php echo $row['id_produk']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-fullscreen-md-down">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">EDIT</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form class="needs-validation" novalidate action="proses/proses_edit.php" method="POST" enctype="multipart/form-data">
                  <input type="hidden" value="<?php echo $row['id_produk']?>" name="id_produk">
                  <div class="row mb-3">
                    <div class="col">
                      <div class="form-floating">
                        <input type="text" class="form-control" id="id_produk" name="id_produk" required value="<?php echo $row['id_produk']?>">
                        <label for="id_produk">ID Produk</label>
                         <div class="invalid-feedback">
                           Masukan id.
                         </div>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-floating">
                        <input type="file" class="form-control" id="gambar" name="gambar" value="<?php echo $_gambar['gambar']?>">
                        <label for="gambar">Masukkan Gambar</label>
                         <div class="invalid-feedback">
                           Masukan gambar.
                          </div>
                      </div>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col">
                      <div class="form-floating">
                        <input type="text" class="form-control" id="nama_produk" name="nama_produk" required value="<?php echo $row['nama_produk']?>">
                        <label for="nama_produk">Nama Produk</label>
                         <div class="invalid-feedback">
                           Masukan nama produk.
                          </div>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-floating">
                        <input type="text" class="form-control" id="harga" name="harga" required value="<?php echo $row['harga']?>">
                        <label for="harga">Harga</label>
                         <div class="invalid-feedback">
                           Masukan harga.
                          </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-floating mb-3">
                    <textarea class="form-control" id="deskripsi" name="deskripsi" required style="height: 100px;"><?php echo $row['deskripsi']?></textarea>
                    <label for="deskripsi">Deskripsi</label>
                     <div class="invalid-feedback">
                           Masukan deskripsi.
                          </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="input_menu_validate">Save Changes</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
       <!--end modal edit-->

       <!--modal hapus-->
       <div class="modal fade" id="modalhapus<?php echo $row['id_produk']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md modal-fullscreen-md-down">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">EDIT</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form class="needs-validation" novalidate action="proses/proses_delete.php" method="POST" enctype="multipart/form-data">
                  <input type="hidden" value="<?php echo $row['id_produk']?>" name="id_produk">
                  <div class="col-lg-12"></div>
                 apakah anda yakin menghapus <b><?php echo $row['nama_produk']?></b>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger" name="input_menu_validate">Delete</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
       <!--end modal delete-->
       
        <?php 
      }
        if (empty($result)) { ?>
          <p class="text-center text-muted">Data produk tidak tersedia.</p>
        <?php } else { ?>
          <div class="row row-cols-1 row-cols-md-3 g-4 justify-content-center"> 
            <?php foreach ($result as $row) { ?>
              <div class="col">
                <div class="card h-100">
                  <img src="assets/png/<?php echo $row['gambar']; ?>" class="card-img-top" alt="<?php echo $row['nama_produk']; ?>" style="height: 270px; object-fit: cover;">
                  <div class="card-body">
                    <h5 class="card-title"><?php echo $row['nama_produk']; ?></h5>
                    <p class="card-text"><?php echo $row['deskripsi']; ?></p>
                    <p class="card-text"><strong>Harga:</strong> Rp<?php echo number_format($row['harga'], 0, ',', '.'); ?></p>
                  </div>
                  <div class="card-footer d-flex justify-content-between">
                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modaledit<?php echo $row['id_produk']?>">
                      <i class="bi bi-pencil-square"></i> Edit
                    </button>
                    <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modalhapus<?php echo $row['id_produk']?>">
                      <i class="bi bi-trash"></i> Delete
                    </button>
                  </div>
                </div>
              </div>
            <?php } ?>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

 <script>
        (() => {
            'use strict'

            const forms = document.querySelectorAll('.needs-validation')

            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
        })()
    </script>
</body>
</html>
