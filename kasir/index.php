<?php
session_start();
include "../koneksi.php"; //cek apakah sudah login
$outlet_id = $_SESSION['outlet_id'];

if (!isset($_SESSION['level'])) { //apakh status tdk bernilai true
  header("Location: ../index.php");
  exit;
}
if ($_SESSION['level'] != '2') {
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
  <!-- <meta http-equiv="refresh" content="60" /> -->

  <title>Telaga</title>
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
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

<body class="hold-transition sidebar-mini sidebar-collapse">
  <!-- Site wrapper -->
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
            <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
            <li class="nav-item has-treeview">
              <a href="index.php" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Kasir
                </p>
              </a>
            </li>
            <li class="nav-item has-treeview">
              <a href="setting.php" class="nav-link">
                <i class="nav-icon fas fa-cog"></i>
                <p>
                  Setting
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
            <div class="col-md-4">
              <div class="card">
                <div class="card-body">
                  <table width="100%">
                    <tr>
                      <td style="vertical-align:top">
                        <label for="date">Tanggal</label>
                      </td>
                      <td>
                        <div class="form-group">
                          <input type="date" id="date" value="<?php echo date('Y-m-d'); ?>" class="form-control">
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td style="vertical-align:top; width:30%">
                        <label for="user">Kasir</label>
                      </td>
                      <td>
                        <div class="form-group">
                          <input type="text" id="user" value="<?php echo $_SESSION['nama']; ?>" class="form-control" readonly>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td style="vertical-align:top">
                        <label for="customer">Customer</label>
                      </td>
                      <td>
                        <div>
                          <select id="customer" class="form-control">
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
                      <td style="vertical-align:top; width:30%">
                        <label for="barcode">Barcode</label>
                      </td>
                      <td>
                        <div class="form-group input-group">
                          <input type="hidden" id="item_id">
                          <input type="hidden" id="price">
                          <input type="hidden" id="stock">
                          <input type="hidden" id="qty_cart">
                          <input type="text" id="barcode" class="form-control" autofocus>
                          <span class="input-group-btn">
                            <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-item">
                              <i class="fas fa-search"></i>
                            </button>
                          </span>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td style="vertical-align:top">
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

            <div class="col-md-4">
              <div class="card">
                <div class="card-body">
                  <div align="right">
                    <h4>Invoice <b>
                        <div id="invoice"></div>
                      </b></h4>
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
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th width="10%">Diskon</th>
                        <th width="15%">Total</th>
                        <th>Action</th>
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
                    <button id="process_payment" class="btn btn-flat btn-lg btn-success">
                      <i class="fa fa-paper-plane-o"></i>Proses Bayar</button>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!--modal add item-->
          <div class="modal fade" id="modal-item">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Pilih Produk</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <?php
                $query = "SELECT p_item.item_id, p_item.barcode, p_item.name, p_item.category_id, p_satuanbarang.name AS unit_name, p_item.price, p_item.stock 
                        FROM p_item 
                        INNER JOIN p_satuanbarang
                        ON p_satuanbarang.unit_id=p_item.unit_id WHERE outlet_id = '$outlet_id'";

                $result = mysqli_query($koneksi, $query); ?>
                <div class="modal-body">
                  <table class="table table-bordered table-striped" id="example1">
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
                    <tbody id="isi_modal">
                      <?php
                      function rupiah($angka)
                      {
                        $hasil_rupiah = "Rp. " . number_format($angka, 0, '', '.');
                        return $hasil_rupiah;
                      }
                      while ($produk = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                          <td><?php echo "$produk[barcode]"; ?></td>
                          <td><?php echo "$produk[name]"; ?></td>
                          <td><?php echo "$produk[unit_name]"; ?></td>
                          <td><?php echo rupiah("$produk[price]"); ?></td>
                          <td><?php echo "$produk[stock]"; ?></td>
                          <td>
                            <button class="btn btn-info btn-sm" id="select" data-id="<?= "$produk[item_id]"; ?>" data-barcode="<?= "$produk[barcode]"; ?>" data-price="<?= "$produk[price]"; ?>" data-stock="<?= "$produk[stock]"; ?>">
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
          <!--/modal add item-->

          <!--modal edit item-->
          <div class="modal fade" id="modal-item-edit">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Update Produk</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>

                <div class="modal-body">
                  <input type="hidden" id="cartid_item">
                  <div class="form-group">
                    <label for="product_item">Produk</label>
                    <div class="row">
                      <div class="col-md-5">
                        <input type="text" id="barcode_item" class="form-control" readonly>
                      </div>
                      <div class="col-md-7">
                        <input type="text" id="product_item" class="form-control" readonly>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="price_item">Harga</label>
                    <input type="text" id="price_item" min="0" class="form-control">
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-7">
                        <label for="qty_item">Qty</label>
                        <input type="number" id="qty_item" min="1" class="form-control">
                      </div>
                      <div class="col-md-5">
                        <label>Stock Item</label>
                        <input type="number" id="stock_item" class="form-control" readonly>
                      </div>
                    </div>
                  </div>
                  <!-- <div class="form-group">
                    <label for="qty_item">Jumlah</label>
                    <input type="number" id="qty_item" min="1" class="form-control">
                  </div> -->
                  <div class="form-group">
                    <label for="total_before">Total Sebelum Diskon</label>
                    <input type="number" id="total_before" class="form-control" readonly>
                  </div>
                  <div class="form-group">
                    <label for="discount_item">Diskon per Produk</label>
                    <input type="number" id="discount_item" min="0" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="total_item">Total Setelah Diskon</label>
                    <input type="number" id="total_item" class="form-control" readonly>
                  </div>
                </div>
                <div class="modal-footer">
                  <div class="pull-right">
                    <button type="button" id="edit_cart" class="btn btn-flat btn-success">
                      <i class="fa fa-paper-plane"></i> Simpan
                    </button>
                  </div>
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
          <!--/modal edit item-->
        </div>
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
      <?php
      $tanggal = time();
      $tahun = date("Y", $tanggal);
      ?>
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
  <!-- DataTables -->
  <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

  <script>
    $(function() {
      $("#example1").DataTable({
        "responsive": true,
        "autoWidth": false,
      });
    });
    $(document).ready(function() {
      loadData()

      setInterval(function() {
        $("#invoice").load('invoice_no.php')
      }, 20000);
      // setInterval(function() {
      //   $("#invoice").load('invoice_no.php')
      // }, 2000);

      $(document).on('click', '#select', function() {
        $('#item_id').val($(this).data('id'))
        $('#barcode').val($(this).data('barcode'))
        $('#price').val($(this).data('price'))
        $('#stock').val($(this).data('stock'))
        $('#modal-item').modal('hide')
        get_cart_qty($(this).data('barcode'))
        $('#qty').focus()
      })

      $(document).on('click', '#add_cart', function() {
        var item_id = $('#item_id').val()
        var price = $('#price').val()
        var stock = $('#stock').val()
        var qty = $('#qty').val()
        var qty_cart = $('#qty_cart').val()
        if (item_id == '') {
          alert('Produk belum dipilih')
          $('#barcode').focus()
        } else if (parseInt(stock) < 1) {
          alert('Stock tidak mencukupi')
          $('#item_id').val('')
          $('#barcode').val('')
          $('#barcode').focus()
        } else if (parseInt(stock) < (parseInt(qty_cart) + parseInt(qty))) {
          alert('Stock tidak mencukupi')
          $('#qty').focus()
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
            success: function(result) {
              if (result.success == true) {
                $('#cart_table').load('tampilcart.php', function(xhr,
                  status, error) {
                  // alert(xhr.responseText);
                  calculate()
                })
                $('#item_id').val('');
                $('#barcode').val('');
                $('#qty').val(1);
                $('#barcode').focus();
              } else {
                alert('Gagal tambah item cart')
              }
            },
            error: function(xhr, status, error) {
              alert(xhr.responseText);
            }
          })
        }
      })

      $(document).on('click', '#edit_cart', function() {
        var cart_id = $('#cartid_item').val()
        var price = $('#price_item').val()
        var qty = $('#qty_item').val()
        var discount = $('#discount_item').val()
        var total = $('#total_item').val()
        var stock = $('#stock_item').val()
        if (price == '' || price < 1) {
          alert('Harga tidak boleh kosong')
          $('#price_item').focus()
        } else if (qty == '' || qty < 1) {
          alert('Jumlah tidak boleh kosong')
          $('#qty_item').focus()
        } else if (parseInt(qty) > parseInt(stock)) {
          alert('Stock tidak mencukupi')
          $('#qty_item').focus()
        } else {
          $.ajax({
            type: 'POST',
            url: 'proseskasir.php',
            data: {
              'edit_cart': true,
              'cart_id': cart_id,
              'price': price,
              'qty': qty,
              'discount': discount,
              'total': total
            },
            dataType: 'json',
            success: function(result) {
              if (result.success == true) {
                $('#cart_table').load('tampilcart.php', function(xhr,
                  status, error) {
                  // alert(xhr.responseText);
                  calculate()
                })
                $('#modal-item-edit').modal('hide')
              } else {
                $('#modal-item-edit').modal('hide')
              }
            },
            error: function(xhr, status, error) {
              alert(xhr.responseText);
            }
          })
        }
      })

      $(document).on('click', '#del_cart', function() {
        if (confirm('Apakah Anda Yakin ?')) {
          var cart_id = $(this).data('cartid')
          $.ajax({
            type: 'POST',
            url: 'proseskasir.php',
            data: {
              'del_cart': true,
              'cart_id': cart_id
            },
            dataType: 'json',
            success: function(result) {
              if (result.success == true) {
                $('#cart_table').load('tampilcart.php', function(xhr,
                  status, error) {
                  // alert(xhr.responseText);
                  calculate()
                })
              } else {
                alert('Gagal tambah item cart')
              }
            }
          })
        }
      })

      $(document).on('click', '#update_cart', function() {
        $('#cartid_item').val($(this).data('cartid'))
        $('#barcode_item').val($(this).data('barcode'))
        $('#product_item').val($(this).data('product'))
        $('#stock_item').val($(this).data('stock'))
        $('#price_item').val($(this).data('price'))
        $('#qty_item').val($(this).data('qty'))
        $('#total_before').val($(this).data('price') * $(this).data('qty'))
        $('#discount_item').val($(this).data('discount'))
        $('#total_item').val($(this).data('total'))
      })

      $(document).on('keyup mouseup', '#price_item, #qty_item, #discount_item', function() {
        count_edit_modal()
      })
      $(document).on('keyup mouseup', '#discount, #cash', function() {
        calculate()
      })

      $(document).on('click', '#process_payment', function() {
        var invoice = $('#invoice').text()
        var customer_id = $('#customer').val()
        var subtotal = $('#sub_total').val()
        var discount = $('#discount').val()
        var grandtotal = $('#grand_total').val()
        var cash = $('#cash').val()
        var change = $('#change').val()
        var note = $('#note').val()
        var date = $('#date').val()

        if (subtotal < 1) {
          alert('Belum ada produk yang dipilih')
          $('#barcode').focus()
        } else if (cash < 1) {
          alert('Jumlah uang cash belum diinput')
          $('#cash').focus()
        } else if (change < 0) {
          alert('Jumlah uang cash kurang')
          $('#cash').focus()
        } else {
          if (confirm('Yakin Proses Transaksi Ini ?')) {
            $.ajax({
              type: 'POST',
              url: 'proseskasir.php',
              data: {
                'process_payment': true,
                'invoice': invoice,
                'customer_id': customer_id,
                'subtotal': subtotal,
                'discount': discount,
                'grandtotal': grandtotal,
                'cash': cash,
                'change': change,
                'note': note,
                'date': date,
              },
              dataType: 'json',
              success: function(result) {
                if (result.success) {
                  // alert('Transaksi Berhasil')
                  window.open('<?= 'receipt_print.php?sale_id= ' ?>' + result.sale_id, '_blank')
                } else {
                  alert('Transaksi Gagal');
                }
                location.href = '<?php 'kasir.php '; ?>'
              },
              error: function(xhr, status, error) {
                alert(xhr.responseText);
              }

            })
          }
        }
      })

      $(document).on('keyup', '#barcode', function() {
        var barkode = $('#barcode').val()
        // var outlet_id = $outlet_id
        $.ajax({
          type: 'POST',
          url: 'proseskasir.php',
          data: {
            'barcode': true,
            'barcode': barkode
            // 'outlet_id' : outlet_id
          },
          dataType: 'json',
          success: function(data) {
            $('#item_id').val(data.item_id);
            $('#price').val(data.price);
            $('#stock').val(data.stock);
          },
          error: function(xhr, status, error) {
            alert(xhr.responseText);
          }
        })

      })

      $(document).on('click', '#cancel_payment', function() {
        if (confirm('Apakah Anda Yakin ?')) {
          $.ajax({
            type: 'POST',
            url: 'proseskasir.php',
            dataType: 'json',
            data: {
              'cancel_payment': true
            },
            success: function(result) {
              if (result.success == true) {
                $('#cart_table').load(('tampilcart.php'),
                  function() {
                    calculate()
                  })
              }
            }
          })
          $('#discount').val(0)
          $('#cash').val(0)
          // $('#qty').val(1)
          $('#customer').val('').change()
          $('#barcode').val('')
          $('#barcode').focus()
        }
      })


    })

    function get_cart_qty(barcode) {
      $('#cart_table tr').each(function() {
        var qty_cart = $("#cart_table td.barcode:contains('" + barcode + "')").parent().find("td").eq(4)
          .html()
        if (qty_cart != null) {
          $('#qty_cart').val(qty_cart)
        } else {
          $("#qty_cart").val(0)
        }
      })
    }

    function calculate() {
      var subtotal = 0;
      $('#cart_table tr').each(function() {
        subtotal += parseInt($(this).find('#total').text())
      })
      isNaN(subtotal) ? $('#sub_total').val(0) : $('#sub_total').val(subtotal)

      var discount = $('#discount').val()
      var grand_total = subtotal - discount
      if (isNaN(grand_total)) {
        $('#grand_total').val(0)
        $('#grand_total2').text(0)
      } else {
        $('#grand_total').val(grand_total)
        $('#grand_total2').text(grand_total)
      }

      var cash = $('#cash').val();
      cash != 0 ? $('#change').val(cash - grand_total) : $('#change').val(0)
      if (discount == '') {
        $('#discount').val(0)
      }
    }

    function count_edit_modal() {
      var price = $('#price_item').val()
      var qty = $('#qty_item').val()
      var discount = $('#discount_item').val()

      total_before = price * qty
      $('#total_before').val(total_before)

      total = (price - discount) * qty
      $('#total_item').val(total)
      if (discount == '') {
        $('#discount_item').val(0)
      }
    }

    function loadData() {
      $.ajax({
        url: 'tampilcart.php',
        type: 'get',
        success: function(data) {
          $('#cart_table').html(data);
          calculate()
          nomor()
        }
      });
    }

    function nomor() {
      $.ajax({
        url: 'invoice_no.php',
        type: 'get',
        success: function(data) {
          $('#invoice').html(data);
        }
      });
    }

    function modal() {
      $.ajax({
        url: 'modal-item.php',
        type: 'get',
        success: function(data) {
          $('#isi_modal').html(data);
        }
      });
    }
  </script>
</body>

</html>