<?php
	include '../koneksi.php';
	$result = mysqli_query($koneksi, "SELECT date, COUNT(final_price) AS total FROM t_sale GROUP BY date") or die ("Error");
	while($row = mysqli_fetch_array($result)) {
		echo (date('d-m-Y', strtotime($row['date']))) . "/" . $row['total']. "/" ;
		}
	mysqli_close($koneksi);
