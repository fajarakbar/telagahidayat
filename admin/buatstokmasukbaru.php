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
  <!-- DataTables -->
  <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

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
                <li class="nav-item">
                  <a href="ringkasan.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Ringkasan</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/layout/top-nav-sidebar.html" class="nav-link">
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
            <li class="nav-item has-treeview menu-open">
              <a href="#" class="nav-link active">
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
                  <a href="stokmasuk.php" class="nav-link active">
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
          <div class="row">
            <!-- left column -->
            <div class="col-md-3"></div>
            <div class="col-md-6">
              <!-- general form elements -->
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Tambah Stok Baru</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="prosesstokmasuk.php" method="post">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="tanggal">Date *</label>
                      <input type="date" name="date" value="<?= date('Y-m-d') ?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <label for="outlet">Outlet *</label>
                      <select name="outlet" value="" id="outlet" class="form-control" style="width: 100%;" required>
                        <option disabled selected="selected">- Pilih -</option>
                        <?php
                        $query = "SELECT * FROM outlet";
                        $result = mysqli_query($koneksi, $query);
                        while ($outlet = mysqli_fetch_assoc($result)) { ?>
                          <option value="<?php echo "$outlet[outlet_id]"; ?>"><?php echo "$outlet[name]"; ?>
                          </option>
                        <?php
                        }
                        ?>
                      </select>
                    </div>
                    <div>
                      <label for="barcode">Barcode *</label>
                    </div>
                    <div class="form-group input-group">
                      <input type="hidden" name="item_id" id="item_id">
                      <input type="text" name="barcode" id="barcode" class="form-control" autofocus>
                      <span class="input-group-btn">
                        <button type="button" id="produk1" class="btn btn-info " data-toggle="modal" data-target="#modal-item">
                          <i class="fa fa-search"></i>
                        </button>
                      </span>
                    </div>
                    <div class="form-group">
                      <label for="item_name">Nama Produk *</label>
                      <input type="text" name="item_name" id="item_name" class="form-control">
                    </div>
                    <div class="row form-group">
                      <div class="col-md-8">
                        <label for="unit_name">Satuan Barang *</label>
                        <input type="text" name="unit_name" id="unit_name" value="-" class="form-control" readonly>
                      </div>
                      <div class="col-md-4">
                        <label for="stock">Stok Awal *</label>
                        <input type="text" name="stock" id="stock" value="-" class="form-control" readonly>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="detail">Catatan</label>
                      <input type="text" name="detail" class="form-control" placeholder="tambahan / etc">
                    </div>
                    <!-- <div class="form-group">
                      <label for="supplier">Supplier</label>
                      <select name="supplier" class="form-control">
                        <option value=""></option>
                        <?php
                        $query = "SELECT * FROM supplier";
                        $result = mysqli_query($koneksi, $query);
                        while ($supplier = mysqli_fetch_assoc($result)) { ?>
                        <option value="<?php echo $supplier['supplier_id']; ?>"><?php echo "$supplier[name]"; ?></option>
                        <?php } ?>
                      </select>
                    </div> -->
                    <div class="form-group">
                      <label for="qty">Qty *</label>
                      <input type="number" name="qty" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <label for="qty">Harga Beli *</label>
                      <input type="number" name="harga" class="form-control" required>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                      <a href="stokmasuk.php" name="cancel" class="btn btn-secondary">Batal</a>
                      <button type="submit" name="simpanstokmasuk" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
              </div>
              <!-- /.card -->
            </div>
            <!--/.col (left) -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <div class="modal fade" id="modal-item">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Pilih Produk</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <table class="table table-bordered table-striped" id="example1">
              <thead col-sm-4>
                <tr>
                  <th>Outlet</th>
                  <th>Barcode</th>
                  <th>Nama</th>
                  <th>Satuan</th>
                  <th>Harga</th>
                  <th>Stok</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $query = "SELECT outlet.name AS outlet_name, p_item.item_id, p_item.barcode, p_item.name, p_kategori.name AS category_name, p_satuanbarang.name AS unit_name, p_item.price, p_item.stock 
            FROM p_item 
            INNER JOIN p_kategori
            ON p_kategori.category_id=p_item.category_id
            INNER JOIN p_satuanbarang
            ON p_satuanbarang.unit_id=p_item.unit_id
            INNER JOIN outlet
            ON outlet.outlet_id=p_item.outlet_id";
            // WHERE p_item.outlet_id='$outlet'";
                $result = mysqli_query($koneksi, $query);
                function rupiah($angka)
                {
                  $hasil_rupiah = "Rp. " . number_format($angka, 0, '', '.');
                  return $hasil_rupiah;
                }

                while ($produk = mysqli_fetch_assoc($result)) { ?>
                  <tr>
                    <td><?php echo "$produk[outlet_name]"; ?></td>
                    <td><?php echo "$produk[barcode]"; ?></td>
                    <td><?php echo "$produk[name]"; ?></td>
                    <td><?php echo "$produk[unit_name]"; ?></td>
                    <td><?php echo rupiah("$produk[price]"); ?></td>
                    <td><?php echo "$produk[stock]"; ?></td>
                    <td>
                      <button class="btn btn-info btn-sm" id="select" data-id="<?= "$produk[item_id]"; ?>" data-barcode="<?= "$produk[barcode]"; ?>" data-name="<?= "$produk[name]"; ?>" data-unit="<?= "$produk[unit_name]"; ?>" data-stock="<?= "$produk[stock]"; ?>">
                        <i type="button" class="fa fa-check"></i> Select
                      </button>
                    </td>
                  </tr>
                <?php } ?>
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
  <!-- DataTables -->
  <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

  <!-- AdminLTE for demo purposes -->
  <script src="../dist/js/demo.js"></script>
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->

  <script>
    $(document).ready(function() {
      $(function() {
        $("#example1").DataTable({
          "responsive": true,
          "autoWidth": false,
        });
      });
      $(document).on('click', '#select', function() {
        var item_id = $(this).data('id');
        var barcode = $(this).data('barcode');
        var name = $(this).data('name');
        var unit_name = $(this).data('unit');
        var stock = $(this).data('stock');
        $('#item_id').val(item_id);
        $('#barcode').val(barcode);
        $('#item_name').val(name);
        $('#unit_name').val(unit_name);
        $('#stock').val(stock);
        $('#modal-item').modal('hide');
      })

      $(document).on('keyup', '#barcode', function() {
        var barkode = $('#barcode').val()
        var outlet = $('#outlet').val()
        $.ajax({
          type: 'POST',
          url: 'prosesstokmasuk.php',
          data: {
            'barcode': true,
            'barcode': barkode,
            'outlet': outlet
          },
          dataType: 'json',
          success: function(data) {
            $('#item_id').val(data.item_id);
            $('#item_name').val(data.name);
            $('#unit_name').val(data.satuan);
            $('#stock').val(data.stock);
          },
          error: function(xhr, status, error) {
            alert(xhr.responseText);
          }
        })
      })
      $(document).on('keyup', '#item_name', function() {
        var item_name = $('#item_name').val()
        var outlet = $('#outlet').val()
        $.ajax({
          type: 'POST',
          url: 'prosesstokmasuk.php',
          data: {
            'item_name': true,
            'item_name': item_name,
            'outlet': outlet
          },
          dataType: 'json',
          success: function(data) {
            $('#item_id').val(data.item_id);
            $('#barcode').val(data.barcode);
            // $('#item_name').val(data.name);
            $('#unit_name').val(data.satuan);
            $('#stock').val(data.stock);
          },
          error: function(xhr, status, error) {
            alert(xhr.responseText);
          }
        })
      })
    })
  </script>

</body>

</html>