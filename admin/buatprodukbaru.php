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
  <!-- Select2 -->
  <link rel="stylesheet" href="../plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <link rel="stylesheet" href="../plugins/bootstrap-toggle/bootstrap-toggle.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- form validation -->
  <link rel="stylesheet" href="../plugins/parsleyjs/dist/error.css">
  <!-- tagsinput -->
  <link rel="stylesheet" href="../plugins/bootstrap-tag-input/tagsinput.css">
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
            <li class="nav-item has-treeview menu-open">
              <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-chart-pie"></i>
                <p>
                  Kelola Produk
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="daftarproduk.php" class="nav-link active">
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
          <div class="row">
            <!-- left column -->
            <div class="col-md-3"></div>
            <div class="col-md-6">
              <!-- general form elements -->
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Tambah Produk Baru</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="prosesproduk.php" method="post" id="form">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="outlet">Outlet</label>
                      <select name="outlet" class="form-control" style="width: 100%;" required>
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
                    <div class="form-group">
                      <label for="barcode">Barcode</label>
                      <input type="text" name="barcode" class="form-control" data-parsley-type="number">
                    </div>
                    <div class="form-group">
                      <label for="namaproduk">Nama Produk</label>
                      <input type="text" name="namaproduk" class="form-control" required>
                    </div>
                    <div id="kategori"></div>
                    <div id="satuanbarang"></div>
                    <div class="form-group">
                      <label for="harga">Harga</label>
                      <input type="text" name="harga" id="rupiah" class="form-control" id="#" required>
                    </div>
                    <div class="form-group">
                      <label for="varian">Varian Produk</label><br>
                      <input id="toggle-event" type="checkbox" data-toggle="toggle" data-on="Ya" data-off="Tidak" data-width="85" data-height="5">
                    </div>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <a href="daftarproduk.php" name="cancel" class="btn btn-secondary">Batal</a>
                    <button type="submit" name="simpanproduk" class="btn btn-primary">Simpan</button>
                  </div>
                </form>
              </div>
              <!-- /.card -->
            </div>
            <!--/.col (left) -->
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
        <div class="modal fade" id="modal-kategori">
          <div class="modal-dialog modal-default">
            <div class="modal-content">
              <div class="modal-header">
                <h3 class="modal-title">Kategori Baru</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="form-group">
                  <label for="namakategori">Nama Kategori</label>
                  <input type="text" name="namakategori" class="form-control" id="nama_kategori" required data-parsley-pattern="^[a-zA-Z0-9 ]+$">
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" id="simpankategori" class="btn btn-primary">Simpan</button>
              </div>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
        <div class="modal fade" id="modal-satuanbarang">
          <div class="modal-dialog modal-default">
            <div class="modal-content">
              <div class="modal-header">
                <h3 class="modal-title">Satuan Barang</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="form-group">
                  <label for="namasatuanbarang">Nama Satuan Barang</label>
                  <input type="text" name="namasatuanbarang" class="form-control" id="nama_satuanbarang" required data-parsley-pattern="^[a-zA-Z0-9 ]+$">
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" id="simpansatuanbarang" class="btn btn-primary">Simpan</button>
              </div>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
        <!-- /.modal-dialog -->
        <div class="modal fade" id="modal-varian">
          <div class="modal-dialog modal-default">
            <div class="modal-content">
              <div class="modal-header">
                <h3 class="modal-title">Varian Produk</h3>
                <button type="button" id="close" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="form-group">
                  <label for="group_varian">Group Varian *</label>
                  <input type="text" name="group_varian" class="form-control" id="group_varian" required>
                </div>
                <div class="form-group">
                  <label for="pilihan_varian">Pilihan Varian *</label>
                  <input type="text" data-role="tagsinput" name="pilihan_varian" id="pilihan_varian" required>
                </div>
                <div class="form-group" id="detail_varian">
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" id="cancel-varian" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" id="simpan-varian" class="btn btn-primary">Simpan</button>
              </div>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
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
  <!-- Select2 -->
  <script src="../plugins/select2/js/select2.full.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="../dist/js/demo.js"></script>
  <!-- form validation -->
  <script src="../plugins/parsleyjs/dist/parsley.min.js"></script>
  <script src="../plugins/parsleyjs/dist/i18n/id.js"></script>
  <!-- Bootstrap Switch -->
  <script src="../plugins/bootstrap-toggle/bootstrap-toggle.min.js"></script>
  <!-- tagsinput -->
  <script src="../plugins/bootstrap-tag-input/tagsinput.js"></script>
  <script>
    $(document).ready(function() {
      loadData();
      $('#form').parsley();
      mvarian()

    })

    // $(document).on('input', '#pilihan_varian', function() {
    //   $("input").tagsinput('items')
    //   // console.log(a)
    // })

    $(document).on('change', '#toggle-event', function() {
      var a = $('#modal-varian').modal('show')
    })

    $(document, window).on('click', '#cancel-varian, #close', function(event) {
      var modal = $('#modal-varian').modal('show')
      if (event.target == modal) {
        modal.style.display = "block";
      } else {
        $('#modal-varian').modal('hide')
        $('#toggle-event').bootstrapToggle('off')
      }
    })

    $(document).on('click', '#simpankategori', function() {
      var namakategori = $('#nama_kategori').val()
      if (namakategori == '') {
        alert('Wajib diisi')
        $('#nama_kategori').focus()
      } else {
        $.ajax({
          url: 'proseskategori.php',
          method: 'POST',
          data: {
            'simpankategori': true,
            'namakategori': namakategori
          },
          dataType: 'json',
          success: function(result) {
            if (result.success == true) {
              $('#kategori').load('tampilkategori.php', function(xhr, status, error) {
                // alert(xhr.responseText);
                $('#modal-kategori').modal('hide')
              })
            } else {
              alert('Gagal tambah kategori')
            }
          }
        })
      }
    })

    $(document).on('click', '#simpansatuanbarang', function() {
      var namasatuanbarang = $('#nama_satuanbarang').val()
      if (namasatuanbarang == '') {
        alert('Wajib diisi')
        $('#nama_satuanbarang').focus()
      } else {
        $.ajax({
          url: 'prosessatuanbarang.php',
          method: 'POST',
          data: {
            'simpansatuanbarang': true,
            'namasatuanbarang': namasatuanbarang
          },
          dataType: 'json',
          success: function(result) {
            if (result.success == true) {
              $('#satuanbarang').load('tampilsatuanbarang.php', function(xhr, status, error) {
                $('#modal-satuanbarang').modal('hide')
              })
            } else {
              alert('Gagal tambah satuan barang')
            }
          }
        })
      }
    })

    function loadData() {
      $('#kategori').load('tampilkategori.php')
      $('#satuanbarang').load('tampilsatuanbarang.php')
    }

    function mvarian() {
      $("#modal-varian").modal({
        show: false,
        backdrop: 'static'
      });
    }
  </script>
</body>

</html>