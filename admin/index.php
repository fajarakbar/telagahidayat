<?php
session_start();
include "../koneksi.php"; //cek apakah sudah login

if (!isset($_SESSION['level'])) { //apakh status tdk bernilai true
  header("Location: ../index.php");
  exit;
}
if ($_SESSION['level'] != '1') {
  header("Location: ../kasir/index.php");
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

  <!-- REQUIRED SCRIPTS -->
  <!-- jQuery -->
  <script src="../plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../dist/js/adminlte.js"></script>

  <!-- OPTIONAL SCRIPTS -->
  <script src="../dist/js/demo.js"></script>
  <script src="../plugins/charts/jquery.min.js"></script>
  <script src="../plugins/charts/highcharts.js"></script>
  <script src="../plugins/charts/exporting.js"></script>
  <script>
    $(function() {
      //Highcharts with mysqli and PHP - Ajax101.com

      var months = [];
      var transaksi = [];
      var switch1 = true;
      $.get('values.php', function(data) {

        data = data.split('/');
        for (var i in data) {
          if (switch1 == true) {
            months.push(data[i]);
            switch1 = false;
          } else {
            transaksi.push(parseFloat(data[i]));
            switch1 = true;
          }

        }
        months.pop();

        $('#chart').highcharts({
          chart: {
            type: 'spline'
          },
          title: {
            text: 'Grafik Transaksi Penjualan'
          },
          subtitle: {
            text: ''
          },
          xAxis: {
            title: {
              text: ''
            },
            categories: months
          },
          yAxis: {
            title: {
              text: 'Transaksi'
            },
            labels: {
              formatter: function() {
                return this.value;
              }
            }
          },
          tooltip: {
            crosshairs: true,
            shared: true,
            valueSuffix: ''
          },
          plotOptions: {
            spline: {
              marker: {
                radius: 4,
                lineColor: '#666666',
                lineWidth: 1
              }
            }
          },
          series: [{
            name: 'Transaksi',
            data: transaksi
          }]
        });
      });
    });
  </script>
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
              <a href="index.php" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>
            <li class="nav-item has-treeview">
              <a href="suppliers.php" class="nav-link">
                <i class="nav-icon fas fa-truck"></i>
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
              <a href="daftaruser.php" class="nav-link">
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
          <!-- Info boxes -->
          <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box">
                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-thumbs-up"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Total Transaksi</span>
                  <!-- total produk diambil dari database -->
                  <?php
                  $result = mysqli_query($koneksi, "SELECT COUNT(*) AS trans FROM t_sale");
                  if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result); ?>
                    <span class="info-box-number"><?php echo $row['trans']; ?> Transaksi</span>
                  <?php } ?>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-shopping-cart"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Total Produk</span>
                  <!-- total produk diambil dari database -->
                  <?php
                  $result = mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM p_item");
                  if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result); ?>
                    <span class="info-box-number"><?php echo $row['total']; ?> Item</span>
                  <?php } ?>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix hidden-md-up"></div>

            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-users"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Karyawan</span>
                  <!-- total produk diambil dari database -->
                  <?php
                  $result = mysqli_query($koneksi, "SELECT COUNT(*) AS karyawan FROM user WHERE level = 2");
                  if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result); ?>
                    <span class="info-box-number"><?php echo $row['karyawan']; ?> Orang</span>
                  <?php } ?>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-cog"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Outlet</span>
                  <?php
                  $result = mysqli_query($koneksi, "SELECT COUNT(*) AS outlet FROM outlet");
                  if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result); ?>
                    <span class="info-box-number"><?php echo $row['outlet']; ?> Outlet</span>
                  <?php } ?>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->

          <div class="row">
            <div class="col-md-12">
              <!-- LINE CHART -->
              <div class="card" style="margin-right:0px">
                <div style="padding-right:13px" id="chart"></div>
              </div>
              <!-- /.card -->
            </div>
            <!-- </div> -->
            <!-- /.col (LEFT) -->
            <div class="col-md-12">
              <!-- LINE CHART -->
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Pengingat Stok</h3>
                </div>
                <div class="card-body">
                  <table id="example1" class="table table-hover table-nowrap">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Barcode</th>
                        <th>Produk</th>
                        <th>Stok</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $no = 1;
                      $result = mysqli_query($koneksi, "SELECT *,p_item.name AS produk_name, outlet.name AS outlet_name FROM p_item INNER JOIN outlet ON outlet.outlet_id=p_item.outlet_id WHERE stock < 13");
                      while ($stokhabis = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                          <td><?php echo $no++; ?></td>
                          <td><?php echo "$stokhabis[outlet_name]"; ?></td>
                          <td><?php echo "$stokhabis[produk_name]"; ?></td>
                          <td><?php echo "$stokhabis[stock]"; ?></td>
                        </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col (RIGHT) -->

          </div>
          <!-- /.row -->



        </div>
        <!--/. container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    <?php
    $tanggal = time();
    $tahun = date("Y", $tanggal);
    ?>
    <!-- Main Footer -->
    <footer class="main-footer">
      <strong> <?php echo "Copyright &copy; 2020-" . $tahun; ?>
        <div class="float-right d-none d-sm-inline-block">
          <b>Version</b> 1
        </div>
    </footer>
  </div>
  <!-- ./wrapper -->


</body>

</html>