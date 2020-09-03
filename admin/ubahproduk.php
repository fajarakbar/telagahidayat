<?php
  session_start();
  include"../koneksi.php";//cek apakah sudah login

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
  <!-- Select2 -->
  <link rel="stylesheet" href="../plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
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
        <img src="../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
          style="opacity: .8">
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
              <a href="../logout.php" class="nav-link">
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
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <!-- left column -->
            <div class="col-md-3"></div>
            <div class="col-md-6">
              <!-- general form elements -->
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Ubah Produk</h3>
                </div>
                <?php
                $id = $_GET['id'];
                if(!isset($_GET['id']))
                {
                  echo "
                  <script>alert('Tidak ada ID yang terdeteksi');</script>
                  ";
                }
                $query = "SELECT * FROM p_item WHERE item_id = '$id'";
                $result = mysqli_query($koneksi, $query);
                $produk = mysqli_fetch_assoc($result);
                ?>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="prosesproduk.php" method="post">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="barcode">Barcode</label>
                      <input type="hidden" id="id" name="id" class="form-control"
                        value="<?php echo $produk['item_id']; ?>">
                      <input type="text" name="barcode" class="form-control" value="<?php echo $produk['barcode']; ?>">
                    </div>
                    <div class="form-group">
                      <label for="namaproduk">Nama Produk *</label>
                      <input type="text" name="namaproduk" class="form-control" value="<?php echo $produk['name']; ?>"
                        required>
                    </div>
                    <!-- <div id="ubahkategori"></div> -->
                    <?php
                    $sql = "SELECT p_item.category_id, p_kategori.name AS category_name
                    FROM p_item INNER JOIN p_kategori ON p_kategori.category_id=p_item.category_id 
                    WHERE p_item.item_id = '$id'";
                    $result = mysqli_query($koneksi, $sql);
                    $kategori = mysqli_fetch_assoc($result);?>
                    <div class="form-group">
                      <label for="kategori">Kategori *</label>
                      <div class="row">
                        <div class="col-md-11">
                          <select name="kategori" class="form-control" style="width: 100%;"
                            value="<?php echo $kategori['category_id']; ?>" required>
                            <option value="<?php echo "$kategori[category_id]"; ?>">
                              <?php echo "$kategori[category_name]"; ?>
                            </option>
                            <?php
                            $query = "SELECT * FROM p_kategori";
                            $result = mysqli_query($koneksi, $query);
                            while ($kategori = mysqli_fetch_assoc($result)) 
                            { ?>
                              <option value="<?php echo "$kategori[category_id]"; ?>"><?php echo "$kategori[name]"; ?>
                              </option>
                            <?php } ?>
                            <!-- <div id="pilihankategori"></div> -->
                          </select>
                        </div>
                        <div class="col-md-1" style="padding-left:1px">
                          <button type="button" class="btn btn-info" data-toggle="modal"
                            data-target="#modal-kategori">+</button>
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="satuanbarang">Satuan Barang</label>
                      <?php 
                        $sql1 = "SELECT p_item.unit_id, p_satuanbarang.name AS unit_name
                        FROM p_item INNER JOIN p_satuanbarang ON p_satuanbarang.unit_id=p_item.unit_id 
                        WHERE p_item.item_id = '$id'";
                        $result1 = mysqli_query($koneksi, $sql1);
                        $satuanbarang = mysqli_fetch_assoc($result1);?>
                      <select name="satuanbarang" class="form-control" style="width: 100%;" required>
                        <option value="<?php echo "$satuanbarang[unit_id]"; ?>">
                          <?php echo "$satuanbarang[unit_name]"; ?>
                        </option>


                        <?php
                        $query = "SELECT * FROM p_satuanbarang";
                        $result = mysqli_query($koneksi, $query);

                        while ($satuanbarang = mysqli_fetch_assoc($result)) 
                        { ?>
                        <option value="<?php echo "$satuanbarang[unit_id]"; ?>"><?php echo "$satuanbarang[name]"; ?>
                        </option>
                        <?php
                        }
                        ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="harga">Harga *</label>
                      <input type="text" name="harga" class="form-control" value="<?php echo $produk['price']; ?>">
                    </div>
                  </div>
                  <!-- /.card-body -->

                  <div class="card-footer">
                    <a href="daftarproduk.php" name="cancel" class="btn btn-secondary">Batal</a>
                    <button type="submit" name="ubahproduk" class="btn btn-primary">Simpan</button>
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

              <!-- <div class="modal-body"> -->
              <!-- <form action="" method=""> -->
              <div class="modal-body">
                <div class="form-group">
                  <label for="namakategori">Nama Kategori *</label>
                  <input type="text" name="namakategori" class="form-control" id="nama_kategori">
                </div>
              </div>
              <!-- /.card-body -->

              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" id="simpankategori" class="btn btn-primary">Simpan</button>
              </div>
              <!-- </form> -->
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
$tanggal = time () ;
//Untuk mengambil data waktu dan tanggal saat ini dari server 
$tahun= date("Y",$tanggal);
//Memformat agar hanya menampilkan tahun 4 digit angka dengan Y (kapital)
echo "Copyright @ 2011 - " . $tahun;
/* baris ini mencetak rentang copyright,
Anda perlu mengganti 2011 dengan tahun pertama kali website Anda diluncurkan */
?>
    <footer class="main-footer">
      <strong> <?php echo "Copyright &copy; 2020-" . $tahun; ?> <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
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
  <script>
    $(document).ready(function () {
      loadData()
    })

    $(document).on('click', '#simpankategori', function () {
      // $('.select2').select2({
      //   tags: true
      // })
      var namakategori = $('#nama_kategori').val()
      var id = $('#id').val()
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
          success: function (result) {
            if (result.success == true) {
              // $('#pilihankategori').load('ubahtampilkategori.php', function (xhr, status, error) {
                // alert(xhr.responseText);
                $('#modal-kategori').modal('hide')
                window.location.replace('<?= 'ubahproduk.php?id='?>' + id)
              // })
            } else {
              alert('Gagal tambah kategori')
            }
          }
        })
      }
    })

    function loadData() {
      // $('#pilihankategori').val('d')
      $('#pilihankategori').load('ubahtampilkategori.php')
    }

  </script>
</body>

</html>
