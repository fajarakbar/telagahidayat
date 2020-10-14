<?php
session_start();
include "../koneksi.php"; //cek apakah sudah login

if (!isset($_SESSION['level'])) { //apakh status tdk bernilai true
  header("Location: ../index.php");
  exit;
}
if ($_SESSION['level'] != '1') {
  header("Location: ../index.php");
  exit;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Telaga</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="index.php" class="nav-link">Home</a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index.php" class="brand-link">
        <img src="../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Telaga P.O.S</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <!-- nama yang login diambil dari database -->
            <a href="#" class="d-block"><?php echo $_SESSION['nama']; ?></a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item has-treeview">
              <a href="index.php" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>
            <li class="nav-item has-treeview">
              <a href="suppliers.php" class="nav-link">
                <i class="nav-icon fas fa-address-book"></i>
                <p>
                  Suppliers
                </p>
              </a>
            </li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                  Laporan
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <!-- <li class="nav-item">
                  <a href="ringkasan.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Ringkasan</p>
                  </a>
                </li> -->
                <li class="nav-item">
                  <a href="laporan/transaksipenjualan.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Transaksi Penjualan</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="laporan/penjualanproduk.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Penjualan Produk</p>
                  </a>
                </li>
                <!-- <li class="nav-item">
                  <a href="pages/layout/fixed-sidebar.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Rekap Kas</p>
                  </a>
                </li>-->
                <li class="nav-item">
                  <a href="laporan/labaharian.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Laba Harian</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="laporan/stok.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Stok</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="laporan/labaproduk.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Laba Produk</p>
                  </a>
                </li>
                <!--<li class="nav-item">
                  <a href="pages/layout/collapsed-sidebar.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Penjualan Harian</p>
                  </a>
                </li> -->
              </ul>
            </li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-chart-pie"></i>
                <p>
                  Kelola Produk
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="daftarproduk.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Daftar Produk</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="kategori.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Kategori</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="satuanbarang.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Satuan Barang</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-shopping-cart"></i>
                <p>
                  Transaksi
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="stokmasuk.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Stok Masuk</p>
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="stokkeluar.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Stok Keluar</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item has-treeview">
              <a href="daftaruser.php" class="nav-link active">
                <i class="nav-icon fas fa-user"></i>
                <p>
                  User
                </p>
              </a>
            </li>
              <li class="nav-item has-treeview">
                <a href="daftaroutlet.php" class="nav-link">
                  <i class="nav-icon fas fa-store-alt"></i>
                  <p>
                    Outlet
                  </p>
                </a>
              </li>
            <li class="nav-item has-treeview">
              <a href="../logout.php" class="nav-link" onclick=" return confirm('Yakin mau keluar?');">
                <i class="nav-icon fas fa-sign-out-alt"></i>
                <p>
                  Log Out
                </p>
              </a>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->

      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

      <!-- Main content -->
      <section class="content" style="padding-top:13px">
        <div class="container-fluid">
          <div class="row">
            <!-- left column -->
            <div class="col-md-3"></div>
            <div class="col-md-6">
              <!-- general form elements -->
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Ubah User</h3>
                </div>
                <!-- /.card-header -->
                <?php
                $user_id = $_GET['id'];
                if (!isset($_GET['id'])) {
                  echo "
                      <script>alert('Tidak ada ID yang terdeteksi');
                      window.location = 'daftaruser.php';</script>
                      ";
                }
                $query = "SELECT user.user_id, user.name, user.telp, user.address, user.username, user.level, outlet.outlet_id, outlet.name AS outlet_name FROM user JOIN outlet ON outlet.outlet_id=user.outlet_id WHERE user.user_id = $user_id";
                $result = mysqli_query($koneksi, $query);
                while ($user = mysqli_fetch_assoc($result)) { ?>
                  <!-- form start -->
                  <form action="prosesuser.php" method="post">
                    <div class="card-body">
                      <div class="form-group">
                        <label for="namalengkap">Nama Lengkap *</label>
                        <input type="hidden" name="user_id" class="form-control" id="#" value="<?php echo $user['user_id']; ?>">
                        <input type="text" name="namalengkap" class="form-control" id="#" value="<?php echo $user['name']; ?>" required>
                      </div>
                      <div class="form-group">
                        <label for="telp">No HP *</label>
                        <input type="text" name="telp" class="form-control" id="#" value="<?php echo $user['telp']; ?>" required>
                      </div>
                      <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea type="text" name="alamat" class="form-control" id="#"><?php echo $user['address']; ?></textarea>
                      </div>
                      <div class="form-group">
                        <label for="username">Username *</label>
                        <input type="text" name="username" class="form-control" id="#" value="<?php echo $user['username']; ?>" disabled>
                      </div>
                      <div class="form-group">
                        <label for="pass">Password *</label>
                        <input type="password" name="pass" class="form-control" id="#" placeholder="Ketik Ulang Password" required>
                      </div>
                      <div class="form-group">
                        <label for="level">Hak Akses *</label>
                        <select value="<?php echo $user['level']; ?>" name="level" class="form-control">
                          <option selected="selected" value="<?php echo "$user[level]"; ?>">
                            <?php $hakakses = $user['level'] == 1 ? "Administrator" : "Kasir";
                            echo strval($hakakses); ?>
                          </option>
                          <option value="1">Administrator</option>
                          <option value="2">Kasir</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="outlet">Outlet *</label>
                        <select value="<?php echo $user['outlet_id']; ?>" name="outlet" class="form-control" required>
                          <option selected="selected" value="<?php echo "$user[outlet_id]"; ?>"><?php echo "$user[outlet_name]"; ?></option>
                          <?php
                          $query = "SELECT * FROM outlet";
                          $result = mysqli_query($koneksi, $query);
                          while ($outlet = mysqli_fetch_assoc($result)) { ?>
                            <option value="<?php echo "$outlet[outlet_id]"; ?>"><?php echo "$outlet[name]"; ?>
                            </option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                      <a href="daftaruser.php" name="cancel" class="btn btn-secondary">Batal</a>
                      <button type="submit" name="ubahuser" class="btn btn-primary">Simpan</button>
                    </div>
                  </form>
                <?php } ?>
              </div>
              <!-- /.card -->
            </div>
            <!--/.col (left) -->
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php
    $tanggal = time();
    //Untuk mengambil data waktu dan tanggal saat ini dari server 
    $tahun = date("Y", $tanggal);
    ?>
    <footer class="main-footer">
      <strong> <?php echo "Copyright &copy; 2020-" . $tahun; ?>
        <div class="float-right d-none d-sm-inline-block">
          <b>Version</b> 1
        </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="../plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="../dist/js/demo.js"></script>
</body>

</html>