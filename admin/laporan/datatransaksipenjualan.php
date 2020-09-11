<?php
  session_start();
  include"../../koneksi.php";//cek apakah sudah login

  if (!isset($_SESSION['level'])) { //apakh status tdk bernilai true
    header("Location: ../../index.php");
    exit;
  }
  if ($_SESSION['level'] != '1') {
    header("Location: ../../index.php");
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
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
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
          <a href="../index.php" class="nav-link">Home</a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index.php" class="brand-link">
        <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
          style="opacity: .8">
        <span class="brand-text font-weight-light">Telaga P.O.S</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
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
              <a href="../index.php" class="nav-link">
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
            <li class="nav-item has-treeview menu-open">
              <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                  Laporan
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="ringkasan.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Ringkasan</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/layout/top-nav-sidebar.html" class="nav-link active">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Data Transaksi Penjualan</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/layout/boxed.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Penjualan Produk</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/layout/fixed-sidebar.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Rekap Kas</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/layout/fixed-topnav.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Laba Harian</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/layout/fixed-footer.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Stok</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/layout/collapsed-sidebar.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Laba Produk</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/layout/collapsed-sidebar.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Penjualan Harian</p>
                  </a>
                </li>

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
                  <a href="kasir.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Kasir</p>
                  </a>
                </li>
              </ul>
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
              <a href="../../logout.php" class="nav-link" onclick=" return confirm('Yakin mau keluar?');">
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
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 style="padding-top:6px" class="card-title">Daftar Produk</h3>
                  <table style="float:right">
                    <td>
                      <a href="buatprodukbaru.php"><button type="button"
                          class="btn btn-block btn-primary btn-sm">Ekspor</button></a>
                    </td>
                  </table>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <!-- <div class="margin" style="padding-bottom:5px">
                    <div class="btn-group">
                      <button style="width:60px" type="button" class="btn btn-sm btn-success">Print</button>
                    </div>
                    <div class="btn-group">
                      <button style="width:60px" type="button" class="btn btn-sm btn-info">Pdf</button>
                    </div>
                  </div> -->

                  <!-- <div> -->
                  <table id="" class="table table-hover table-nowrap">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Invoice</th>
                        <th>Tanggal</th>
                        <th>Costumer</th>
                        <th>Total</th>
                        <th>Discount</th>
                        <th>Grand Total</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <?php
                        function rupiah($angka){
                          $hasil_rupiah = "Rp. " . number_format($angka,0,'','.');
                          return $hasil_rupiah;
                        }
                        $no = 1;

                        $query = "SELECT *, user.name AS user_name FROM t_sale INNER JOIN user ON user.user_id=t_sale.user_id";

                        $result = mysqli_query($koneksi, $query);
                        while ($data = mysqli_fetch_assoc($result)) { ?>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo "$data[invoice]"; ?></td>
                        <td><?php echo date('d-m-Y', strtotime($data['date'])); ?>
                        <td><?php $customer = "$data[customer_id]" == NULL ? "Umum":"Umum"; echo($customer); ?></td>
                        <td><?php echo rupiah("$data[total_price]"); ?></td>
                        <td><?php echo rupiah("$data[discount]"); ?></td>
                        <td><?php echo rupiah("$data[final_price]"); ?></td>
                        <td style="width:10%">
                          <div class="dropdown">
                            <a class="btn btn-secondary btn-sm dropdown-toggle" href="#" role="button"
                              id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a href="" id="set_detail" class="dropdown-item" data-toggle="modal"
                                data-target="#modal-detail" data-invoice="<?php echo $data['invoice'];?>"
                                data-date="<?php echo date('d-m-Y', strtotime($data['date'])); ?>"
                                data-time="<?php echo substr($data['created'], 11, 5);?>"
                                data-cutomer="<?php $customer = "$data[customer_id]" == NULL ? "Umum":"Umum"; echo($customer); ?>"
                                data-total="<?php rupiah("$data[total_price]");?>"
                                data-discount="<?php echo rupiah("$data[discount]");?>"
                                data-grandtotal="<?php echo rupiah("$data[final_price]");?>"
                                data-cash="<?php echo rupiah("$data[cash]");?>"
                                data-remaining="<?php echo rupiah("$data[remaining]");?>"
                                data-note="<?php echo "$data[note]";?>"
                                data-cashier="<?php echo "$data[user_name]";?>"
                                data-saleid="<?php echo "$data[sale_id]";?>">Detail</a>
                              <a class="dropdown-item"
                                href="ubahproduk.php?id=<?php echo "$produk[item_id]"; ?>">Print</a>
                              <a class="dropdown-item"
                                href="hapusproduk.php?id=<?php echo $produk['item_id']?>">Hapus</a>
                            </div>
                          </div>
                        </td>

                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                  <!-- </div> -->
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.row -->
          </div><!-- /.container-fluid -->
          <div class="modal fade" id="modal-detail">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Detail Laporan Penjualan</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>

                <div class="modal-body table-responsive">
                  <table class="table table-bordered table-striped">
                    <tbody>
                      <tr>
                        <th style="width:20%">Invoice</th>
                        <td style="width:30%"><span id="barcode"></span></td>
                        <th style="width:20%">Customer</th>
                        <td style="width:30%"><span id="cust"></span></td>
                      </tr>
                      <tr>
                        <th>Date TIme</th>
                        <td><span id="datetime"></span></td>
                        <th>Cashier</th>
                        <td><span id="cashier"></span></td>
                      </tr>
                      <tr>
                        <th>Total
                        
                        </th>
                        <td><span id="detail"></span></td>
                      <tr>
                      <tr>
                        <th>Supplier</th>
                        <td><span id="supplier"></span></td>
                      <tr>
                        <th>Jumlah</th>
                        <td><span id="qty"></span></td>
                      </tr>
                      <tr>
                        <th>Tanggal</th>
                        <td><span id="date"></span></td>
                      </tr>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
          <!-- /.modal -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php
    $tanggal = time () ;  
    //Untuk mengambil data waktu dan tanggal saat ini dari server 
    $tahun= date("Y",$tanggal);
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
  <script src="../../plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../../dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="../../dist/js/demo.js"></script>
  <!-- DataTables -->
  <script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true,
        "autoWidth": false,

      });

      var table = $('#example1').DataTable();

      // #myInput is a <input type="text"> element
      $('#myInput').on('keyup', function () {
        table.search(this.value).draw();
      });
    });

  </script>
</body>

</html>
