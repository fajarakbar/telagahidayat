<?php
session_start();
include "../../koneksi.php";
if (isset($_POST['transaksipenjualan'])) {
    if (isset($_POST['start_date']) && isset($_POST['end_date'])) {
        $start_date = $_POST['start_date'];
        $end_date = $_POST['end_date'];
        $data = [];
        $query = "SELECT t_sale.invoice, t_sale.date, user.name AS user_name, t_sale.total_price, t_sale.discount, t_sale.final_price FROM `t_sale` INNER JOIN user ON user.user_id=t_sale.user_id WHERE `date` BETWEEN '$start_date' AND '$end_date' ORDER BY sale_id ASC";
        if ($result = mysqli_query($koneksi, $query)) {
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }
        } else {
            $query = "SELECT * FROM t_sale";
            if ($result = mysqli_query($koneksi, $query)) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $data[] = $row;
                }
            }
        }
        echo json_encode($data);
    } else {
        $query = "SELECT t_sale.created, t_sale.invoice, t_sale.date, user.name AS user_name, t_sale.total_price, t_sale.discount, t_sale.final_price FROM t_sale INNER JOIN user ON user.user_id=t_sale.user_id ORDER BY created ASC";
        if ($result = mysqli_query($koneksi, $query)) {
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }
        }
        echo json_encode($data);
    }
} elseif (isset($_POST['penjualanproduk'])) {
    $query = "SELECT p_item.name AS nama_produk, 
            SUM(t_sale_detail.qty) AS terjual, 
            SUM(t_sale_detail.price * t_sale_detail.qty) AS penjualan_kotor, 
            SUM(t_sale_detail.discount_item * t_sale_detail.qty) AS diskon_produk, 
            SUM((t_sale_detail.price * t_sale_detail.qty) - (t_sale_detail.discount_item * t_sale_detail.qty)) AS total
            FROM t_sale_detail 
            INNER JOIN p_item ON p_item.item_id=t_sale_detail.item_id
            GROUP BY t_sale_detail.item_id";
    if ($result = mysqli_query($koneksi, $query)) {
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
    }
    echo json_encode($data);
} elseif (isset($_POST['stok'])) {
    $query = "SELECT p_item.name AS produk_name, p_item.barcode, p_item.stock, p_item.stock * p_item.price AS nilai_stok, p_satuanbarang.name AS unit_name
    FROM p_item
    INNER JOIN p_satuanbarang ON p_satuanbarang.unit_id=p_item.unit_id";
    if ($result = mysqli_query($koneksi, $query)) {
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
    }
    echo json_encode($data);
} elseif (isset($_POST['labaproduk'])) {
    $query = "SELECT p_item.name AS nama_produk, 
                    SUM(t_sale_detail.qty) AS terjual, 
                    SUM(t_sale_detail.price * t_sale_detail.qty) AS penjualan_kotor, 
                    SUM(t_sale_detail.discount_item * t_sale_detail.qty) AS diskon_produk,
                    p_item.beli * SUM(t_sale_detail.qty) AS pembelian,
                    (SUM(t_sale_detail.price * t_sale_detail.qty) - SUM(t_sale_detail.discount_item * t_sale_detail.qty) - (p_item.beli * SUM(t_sale_detail.qty))) AS laba_produk 
            FROM t_sale_detail 
            INNER JOIN p_item ON p_item.item_id=t_sale_detail.item_id
            -- INNER JOIN t_stock ON t_stock.item_id=t_sale_detail.item_id
            GROUP BY t_sale_detail.item_id";
    if ($result = mysqli_query($koneksi, $query)) {
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
    }
    echo json_encode($data);
} elseif (isset($_POST['labaharian'])) {
    if (isset($_POST['start_date']) && isset($_POST['end_date'])) {
        $start_date = $_POST['start_date'];
        $end_date = $_POST['end_date'];
        $data = [];
        $query = "SELECT p_item.name AS name_produk, 
        t_sale_detail.date AS tanggal,
        SUM(t_sale_detail.qty) AS terjual, 
        SUM(t_sale.total_price) AS penjualan,
        p_item.beli * SUM(t_sale_detail.qty) AS pembelian,
        t_sale.discount AS diskon,
        (SUM(t_sale_detail.qty * p_item.price) - (p_item.beli * SUM(t_sale_detail.qty)) - t_sale.discount) AS profitharian
        FROM t_sale_detail 
        INNER JOIN p_item ON p_item.item_id=t_sale_detail.item_id 
        INNER JOIN t_sale ON t_sale.sale_id=t_sale_detail.sale_id 
        WHERE t_sale_detail.date BETWEEN '$start_date' AND '$end_date'";
        if ($result = mysqli_query($koneksi, $query)) {
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }
        } else {
            $query = "SELECT * FROM t_sale";
            if ($result = mysqli_query($koneksi, $query)) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $data[] = $row;
                }
            }
        }
        echo json_encode($data);
    } else {
        $query = "SELECT p_item.name AS name_produk, 
        t_sale_detail.date AS tanggal,
        SUM(t_sale_detail.qty) AS terjual, 
        SUM(t_sale.total_price) AS penjualan,
        p_item.beli * SUM(t_sale_detail.qty) AS pembelian,
        t_sale.discount AS diskon,
        (SUM(total_price) - (p_item.beli * SUM(t_sale_detail.qty)) - t_sale.discount) AS profitharian
        FROM t_sale_detail 
        INNER JOIN p_item ON p_item.item_id=t_sale_detail.item_id 
        INNER JOIN t_sale ON t_sale.sale_id=t_sale_detail.sale_id 
        GROUP BY t_sale_detail.date ORDER BY t_sale_detail.date ASC";
        if ($result = mysqli_query($koneksi, $query)) {
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }
        }
        echo json_encode($data);
    }
} else {
}
