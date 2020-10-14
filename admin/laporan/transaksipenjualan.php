<?php
session_start();
include "../../koneksi.php"; //cek apakah sudah login

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
  <!-- Datepicker -->
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
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
      <a href="../index.php" class="brand-link">
        <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
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
              <a href="../suppliers.php" class="nav-link">
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
                <!-- <li class="nav-item">
                  <a href="ringkasan.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Ringkasan</p>
                  </a>
                </li> -->
                <li class="nav-item">
                  <a href="transaksipenjualan.php" class="nav-link active">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Transaksi Penjualan</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="penjualanproduk.php" class="nav-link">
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
                  <a href="labaharian.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Laba Harian</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="stok.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Stok</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="labaproduk.php" class="nav-link">
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
                  <a href="../daftarproduk.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Daftar Produk</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../kategori.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Kategori</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../satuanbarang.php" class="nav-link">
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
                  <a href="../stokmasuk.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Stok Masuk</p>
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="../stokkeluar.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Stok Keluar</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item has-treeview">
              <a href="../daftaruser.php" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                <p>
                  User
                </p>
              </a>
            </li>
            <li class="nav-item has-treeview">
              <a href="../daftaroutlet.php" class="nav-link">
                <i class="nav-icon fas fa-store-alt"></i>
                <p>
                  Outlet
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
                  <h3 style="padding-top:6px" class="card-title">Transaksi Penjualan</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <div class="row" style="padding-bottom: 10px;">
                    <div class="col-md-2">
                      <input type="text" class="form-control" id="start_date" placeholder="Start Date" readonly>
                    </div>
                    <div class="col-md-2">
                      <input type="text" class="form-control" id="end_date" placeholder="End Date" readonly>
                    </div>
                  </div>
                  <div style="padding-bottom: 10px;">
                    <button id="filter" class="btn btn-outline-info btn-sm">Filter</button>
                    <button id="reset" class="btn btn-outline-warning btn-sm">Reset</button>
                  </div>
                  <?php
                  $no = 1;
                  $query = "SELECT *, user.name AS user_name FROM t_sale INNER JOIN user ON user.user_id=t_sale.user_id ORDER BY sale_id ASC";
                  $result = mysqli_query($koneksi, $query);
                  $query1 = "SELECT *, 
                              SUM(total_price) AS total,
                              SUM(discount) AS diskon,
                              SUM(final_price) AS grand_total
                              FROM t_sale";
                  $result1 = mysqli_query($koneksi, $query1);
                  $data1 = mysqli_fetch_assoc($result1);
                  ?>
                  <!-- <div> -->
                  <table id="records" class="table table-hover table-nowrap" style="width:100%">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Invoice</th>
                        <th>Tanggal</th>
                        <th>Kasir</th>
                        <th>Total</th>
                        <th>Discount</th>
                        <th>Grand Total</th>
                      </tr>
                    </thead>
                    <!-- <tbody>
                      <tr>
                        <?php
                        function rupiah($angka)
                        {
                          $hasil_rupiah = "Rp. " . number_format($angka, 0, '', '.');
                          return $hasil_rupiah;
                        }
                        while ($data = mysqli_fetch_assoc($result)) { ?>
                          <td><?php echo $no++; ?></td>
                          <td><?php echo "$data[invoice]"; ?></td>
                          <td><?php echo date('d-m-Y', strtotime($data['date'])); ?>
                          <td><?php echo "$data[user_name]"; ?></td>
                          <td><?php echo rupiah("$data[total_price]"); ?></td>
                          <td><?php echo rupiah("$data[discount]"); ?></td>
                          <td><?php echo rupiah("$data[final_price]"); ?></td>
                          <td style="width:10%">
                            <div class="dropdown">
                              <a class="btn btn-secondary btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              </a>
                              <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a href="" id="set_detail" class="dropdown-item" data-toggle="modal" data-target="#modal-detail" data-invoice="<?php echo $data['invoice']; ?>" data-date="<?php echo date('d-m-Y', strtotime($data['date'])); ?>" data-time="<?php echo substr($data['created'], 11, 5); ?>" data-cutomer="<?php $customer = "$data[customer_id]" == NULL ? "Umum" : "Umum";
                                                                                                                                                                                                                                                                                                                            echo ($customer); ?>" data-total="<?php rupiah("$data[total_price]"); ?>" data-discount="<?php echo rupiah("$data[discount]"); ?>" data-grandtotal="<?php echo rupiah("$data[final_price]"); ?>" data-cash="<?php echo rupiah("$data[cash]"); ?>" data-remaining="<?php echo rupiah("$data[remaining]"); ?>" data-note="<?php echo "$data[note]"; ?>" data-cashier="<?php echo "$data[user_name]"; ?>" data-saleid="<?php echo "$data[sale_id]"; ?>">Detail</a>
                                <a class="dropdown-item" href="ubahproduk.php?id=<?php echo "$data[sale_id]"; ?>">Print</a>
                                <a class="dropdown-item" href="hapusproduk.php?id=<?php echo "$data[sale_id]"; ?>">Hapus</a>
                              </div>
                            </div>
                          </td>
                      </tr>
                    <?php } ?>
                    </tbody> -->
                    <tfoot>
                      <tr>
                        <!-- <td style="text-align: center;" colspan="4"><b>Grand Total</b></td> -->
                        <!-- <td><b><?php echo rupiah("$data1[total]"); ?></b></td>
                        <td><b><?php echo rupiah("$data1[diskon]"); ?></b></td>
                        <td><b><?php echo rupiah("$data1[grand_total]"); ?></b></td> -->
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                    </tfoot>
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
                        <th>Total</th>
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
  <script src="../../plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../../dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="../../dist/js/demo.js"></script>
  <!-- Datepicker -->
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <!-- DataTables -->
  <script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-flash-1.6.1/b-html5-1.6.1/b-print-1.6.1/r-2.2.3/datatables.min.js"></script>

  <script>
    $(function() {
      $("#start_date").datepicker({
        "dateFormat": "yy-mm-dd"
        // "dateFormat": "yy-mm-yy"
      });
      $("#end_date").datepicker({
        "dateFormat": "yy-mm-dd"
        // "dateFormat": "dd-mm-yy"
      });
    });
  </script>
  <script>
    // Fetch records
    function fetch(start_date, end_date) {
      $.ajax({
        url: "data.php",
        type: "POST",
        data: {
          transaksipenjualan: true,
          start_date: start_date,
          end_date: end_date
        },
        dataType: "json",
        success: function(data) {
          // Datatables
          var t = "1";
          $('#records').DataTable({
            "footerCallback": function(row, data, start, end, display) {
              var api = this.api(),
                data;

              // Remove the formatting to get integer data for summation
              var intVal = function(i) {
                return typeof i === 'string' ?
                  i.replace(/[\$,]/g, '') * 1 :
                  typeof i === 'number' ?
                  i : 0;
              };

              // Total over all pages
              total = api
                .column(4)
                .data()
                .reduce(function(a, b) {
                  return intVal(a) + intVal(b);
                }, 0);
              discount = api
                .column(5)
                .data()
                .reduce(function(a, b) {
                  return intVal(a) + intVal(b);
                }, 0);
              grandtotal = api
                .column(6)
                .data()
                .reduce(function(a, b) {
                  return intVal(a) + intVal(b);
                }, 0);

              // Total over this page
              pagetotal = api
                .column(4, {
                  page: 'current'
                })
                .data()
                .reduce(function(a, b) {
                  return intVal(a) + intVal(b);
                }, 0);
              pagediscount = api
                .column(5, {
                  page: 'current'
                })
                .data()
                .reduce(function(a, b) {
                  return intVal(a) + intVal(b);
                }, 0);
              pagegrandtotal = api
                .column(6, {
                  page: 'current'
                })
                .data()
                .reduce(function(a, b) {
                  return intVal(a) + intVal(b);
                }, 0);

              // Update footer
              $(api.column(1).footer()).html('<b>Total</b>');
              $(api.column(4).footer()).html(
                '<b>Rp. ' + pagetotal + ' ( Rp. ' + total + ')</b>'
              );
              $(api.column(5).footer()).html(
                '<b>Rp. ' + pagediscount + ' ( Rp. ' + discount + ')</b>'
              );
              $(api.column(6).footer()).html(
                '<b>Rp. ' + pagegrandtotal + ' ( Rp. ' + grandtotal + ')</b>'
              );
            },
            "data": data,
            // buttons
            "dom": "<'row'<'col-sm-12 col-md-4'l><'col-sm-12 col-md-4'B><'col-sm-12 col-md-4'f>>" +
              "<'row'<'col-sm-12'tr>>" +
              "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
            "buttons": [
              // 'copy', 'csv', 'excel', 'pdf', 'print'
              'excel', 'pdf', 'print'
            ],
            // responsive
            "responsive": true,
            "header": true,
            "footer": true,
            // "processing": true,
            // "serverSide": true,
            // "ajax": "scripts/server_processing.php",
            "columns": [{
                "data": "",
                "render": function(data, type, row, meta) {
                  return t++;
                }
              },
              {
                "data": "invoice"
              },
              {
                "data": "date",
                "render": function(data, type, row, meta) {
                  return (row.date);
                }
              },
              {
                "data": "user_name"
              },
              {
                "data": "total_price",
                "render": function(data, type, row, meta) {
                  return (row.total_price);
                }
              },
              {
                "data": "discount",
                "render": function(data, type, row, meta) {
                  return (row.discount);
                }
              },
              {
                "data": "final_price",
                "render": function(data, type, row, meta) {
                  return (row.final_price);
                }
              }
            ]
          });
        }
      });
    }
    fetch();

    // Filter
    $(document).on("click", "#filter", function(e) {
      e.preventDefault();

      var start_date = $("#start_date").val();
      var end_date = $("#end_date").val();

      if (start_date == "" || end_date == "") {
        alert("both date required");
      } else {
        $('#records').DataTable().destroy();
        fetch(start_date, end_date);
      }
    });

    // Reset
    $(document).on("click", "#reset", function(e) {
      e.preventDefault();

      $("#start_date").val(''); // empty value
      $("#end_date").val('');

      $('#records').DataTable().destroy();
      fetch();
    });
  </script>
</body>

</html>