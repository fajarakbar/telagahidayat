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
</head>

<body class="hold-transition sidebar-mini sidebar-collapse">
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
      <a href="index3.html" class="brand-link">
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
                <i class="nav-icon fas fa-tachometer-alt"></i>
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
                <i class="nav-icon fas fa-tree"></i>
                <p>
                  Transaksi
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="kasir.php" class="nav-link active">
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
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-4">
              <div class="card">
                <div class="card-body">
                  <table width="100%">
                    <tr>
                      <td style="vertical-allign:top">
                        <label for="date">Tanggal</label>
                      </td>
                      <td>
                        <div class="form-group">
                          <input type="date" id="date" value="<?php echo date('Y-m-d');?>" class="form-control">
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td style="vertical-allign:top; width:30%">
                        <label for="user">Kasir</label>
                      </td>
                      <td>
                        <div class="form-group">
                          <input type="text" id="user" value="<?php echo $_SESSION['nama'];?>" class="form-control"
                            readonly>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td style="vertical-allign:top">
                        <label for="customer">Customer</label>
                      </td>
                      <td>
                        <div>
                          <select id="suctomer" class="form-control">
                            <option value="">Umum</option>
                          </select>
                        </div>
                      </td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card">
                <div class="card-body">
                  <table width="100%">
                    <tr>
                      <td style="vertical-allign:top; width:30%">
                        <label for="barcode">Barcode</label>
                      </td>
                      <td>
                        <div class="form-group input-group">
                          <input type="hidden" id="item_id">
                          <input type="hidden" id="price">
                          <input type="hidden" id="stock">
                          <input type="text" id="barcode" class="form-control" autofocus>
                          <span class="input-group-btn">
                            <button type="button" class="btn btn-info btn-flat" data-toggle="modal"
                              data-target="#modal-item">
                              <i class="fas fa-search"></i>
                            </button>
                          </span>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td style="vertical-allign:top">
                        <label for="qty">Qty</label>
                      </td>
                      <td>
                        <div class="form-group">
                          <input type="number" id="qty" value="1" mim="1" class="form-control">
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td></td>
                      <td>
                        <div>
                          <button type="button" id="add_cart" class="btn btn-primary">
                            <i class="fa fa-cart-plus"></i> Add
                          </button>
                        </div>
                      </td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>

            <?php
              $date = date("ymd");
              $query = "SELECT MAX(MID(invoice,9,4)) AS invoice_no FROM t_sale WHERE (MID(invoice,3,6)) = '$date'";
              $result = mysqli_query($koneksi,$query);
              $data = mysqli_fetch_assoc($result);
              $row = $data['invoice_no'];
              $n = ((int)$row) + 1;
              $no = sprintf("%'.04d", $n);
              $invoice = "TP".date('ymd').$no;
            ?>

            <div class="col-md-4">
              <div class="card">
                <div class="card-body">
                  <div align="right">
                    <h4>Invoice <b><span id="invoice"><?= $invoice?></span></b></h4>
                    <h1><b><span id="grand_total2" style="font-size:50pt">0</span></b></h1>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-body table-responsive">
                  <table class="table table-bordered table-stripled">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Barcode</th>
                        <th>Produk</th>
                        <th>harga</th>
                        <th>Jumlah</th>
                        <th width="10%">Diskon Produk</th>
                        <th width="15%">Total</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody id="cart_table">
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-3">
              <div class="card">
                <div class="card-body">
                  <table width="100%">
                    <tr>
                      <td style="vertical-align:top; width:30%">
                        <label for="sub_total">Sub Total</label>
                      </td>
                      <td>
                        <div class="form-group">
                          <input type="number" id="sub_total" value="" class="form-control" readonly>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td class="vertical-align:top">
                        <label for="discount">Discount</label>
                      </td>
                      <td>
                        <div class="form-group">
                          <input type="number" id="discount" value="0" min="0" class="form-control">
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td class="vertical-align:top">
                        <label for="grand_total">Grand Total</label>
                      </td>
                      <td>
                        <div class="form-group">
                          <input type="number" id="grand_total" class="form-control" readonly>
                        </div>
                      </td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="card">
                <div class="card-body">
                  <table width="100%">
                    <tr>
                      <td style="vertical-align:top; width:30%">
                        <label for="cash">Cash</label>
                      </td>
                      <td>
                        <div class="form-group">
                          <input type="number" id="cash" value="0" min="0" class="form-control">
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td class="vertical-align:top">
                        <label for="change">Change</label>
                      </td>
                      <td>
                        <div class="form-group">
                          <input type="number" id="change" class="form-control" readonly>
                        </div>
                      </td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="card">
                <div class="card-body">
                  <table width="100%">
                    <tr>
                      <td style="vertical-align:top">
                        <label for="note">Note</label>
                      </td>
                      <td>
                        <div>
                          <textarea id="note" rows="3" class="form-control"></textarea>
                        </div>
                      </td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="card">
                <div class="card-body">
                  <div>
                    <button id="cancel_payment" class="btn btn-flat btn-warning">
                      <i class="fa fa-refresh"></i>Cancel
                    </button><br><br>
                    <button id="prosess_payment" class="btn btn-flat btn-lg btn-success">
                      <i class="fa fa-paper-plane-o"></i>Proses Payment</button>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="modal fade" id="modal-item">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Pilih Produk</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>

                <div class="modal-body table-responsive">
                  <table class="table table-bordered table-striped" id="table1">
                    <thead col-sm-4>
                      <tr>
                        <th>Barcode</th>
                        <th>Nama</th>
                        <th>Satuan</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $query = "SELECT p_item.item_id, p_item.barcode, p_item.name, p_kategori.name AS category_name, p_satuanbarang.name AS unit_name, p_item.price, p_item.stock 
                        FROM p_item 
                        INNER JOIN p_kategori
                        ON p_kategori.category_id=p_item.category_id
                        INNER JOIN p_satuanbarang
                        ON p_satuanbarang.unit_id=p_item.unit_id";

                        $result = mysqli_query($koneksi, $query);
                        while ($produk = mysqli_fetch_assoc($result)) { ?>
                      <tr>
                        <td><?php echo "$produk[barcode]"; ?></td>
                        <td><?php echo "$produk[name]"; ?></td>
                        <td><?php echo "$produk[unit_name]"; ?></td>
                        <td><?php echo "$produk[price]"; ?></td>
                        <td><?php echo "$produk[stock]"; ?></td>
                        <td>
                          <button class="btn btn-info btn-sm" id="select" data-id="<?= "$produk[item_id]";?>"
                            data-barcode="<?= "$produk[barcode]";?>" data-price="<?= "$produk[price]";?>"
                            data-stock="<?= "$produk[stock]";?>">
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
        </div>
      </div>
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    <?php
      $tanggal = time () ;
      $tahun= date("Y",$tanggal);
    ?>
    <!-- Main Footer -->
    <footer class="main-footer">
      <strong> <?php echo "Copyright &copy; 2020-" . $tahun; ?> <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
      <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 1
      </div>
    </footer>
  </div>
  <!-- ./wrapper -->

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

  <!-- PAGE PLUGINS -->
  <!-- jQuery Mapael -->
  <script src="../plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
  <script src="../plugins/raphael/raphael.min.js"></script>
  <script src="../plugins/jquery-mapael/jquery.mapael.min.js"></script>
  <script src="../plugins/jquery-mapael/maps/usa_states.min.js"></script>
  <!-- ChartJS -->
  <script src="../plugins/chart.js/Chart.min.js"></script>

  <!-- PAGE SCRIPTS -->
  <script src="../dist/js/pages/dashboard2.js"></script>

  <script>
    $(document).ready(function () {
      loadData();

      $(document).on('click', '#select', function () {
        $('#item_id').val($(this).data('id'))
        $('#barcode').val($(this).data('barcode'))
        $('#price').val($(this).data('price'))
        $('#stock').val($(this).data('stock'))
        $('#modal-item').modal('hide')
      })

      $(document).on('click', '#add_cart', function () {
        var item_id = $('#item_id').val()
        var price = $('#price').val()
        var stock = $('#stock').val()
        var qty = $('#qty').val()
        if (item_id == '') {
          alert('Produk belum dipilih')
          $('#barcode').focus()
        } else if (stock < 1) {
          alert('Stock tidak mencukupi')
          $('#item_id').val('')
          $('#barcode').val('')
          $('#barcode').focus()
        } else {
          $.ajax({
            type: 'POST',
            url: 'proseskasir.php',
            data: {
              'add_cart': true,
              'item_id': item_id,
              'price': price,
              'qty': qty
            },
            dataType: 'json',
            success: function (result) {
              if (result.success == true) {
                $('#cart_table').load('tampilcart.php', function (xhr, status, error) {
                  // alert(xhr.responseText);
                })
                $('#item_id').val('');
                $('#barcode').val('');
                $('#qty').val(1);
                $('#barcode').focus();
              } else {
                alert('Gagal tambah item cart')
              }
            },
            error: function (xhr, status, error) {
              alert(xhr.responseText);
            }
          })
        }
      })

      $(document).on('click', '#del_cart', function() {
        if(confirm('Apakah Anda Yakin ?')) {
          var cart_id = $(this).data('cartid')
          $.ajax({
            type: 'POST',
            url: 'proseskasir.php',
            data: {
              'del_cart': true,
              'cart_id': cart_id
            },
            dataType: 'json',
            success: function (result) {
              if (result.success == true) {
                $('#cart_table').load('tampilcart.php', function (xhr, status, error) {
                  // alert(xhr.responseText);
                })
              } else {
                alert('Gagal tambah item cart')
              }
            }
          })
        }
      })
    })

    function loadData() {
      $.ajax({
        url: 'tampilcart.php',
        type: 'get',
        success: function (data) {
          $('#cart_table').html(data);
        }
      });
    }

  </script>
</body>

</html>
